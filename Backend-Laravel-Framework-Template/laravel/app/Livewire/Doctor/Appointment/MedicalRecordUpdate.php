<?php

namespace App\Livewire\Doctor\Appointment;

use App\Models\Product;
use Livewire\Component;
use App\Models\Medication;
use App\Models\Appointment;
use App\Models\MedicalRecord;
use App\Models\PaymentMethod;
use Livewire\WithFileUploads;
use App\Models\LaboratoryTest;
use App\Models\ProductVariant;
use App\Models\LaboratoryResult;
use App\Models\AppointmentStatus;

class MedicalRecordUpdate extends Component
{
    use WithFileUploads;
    public $search = '';
    public $medications = [];
    public $tests = [];
    public $errorMessages = [];

    public $final_amount;
    public $test_final_amount;
    public $medical_record;
    public $appointment;
    public $payment_method_id;
    public $status_id;
    public $payment_methods;
    public $appointment_statuses;
    public $laboratoryTests;

    public $temperature;
    public $pulse;
    public $systolic;
    public $diastolic;
    public $spo2;
    public $bsa;
    public $height;
    public $weight;
    public $body_mass_index;
    public $previous_medical_history;
    public $clinical_notes;
    public $laboratory_tests;
    public $advice;

    public $symptom_images;

    public $pdf_results = [];


    public function mount($id) {
        $this->medical_record = MedicalRecord::findOrFail($id);
        $this->payment_methods = PaymentMethod::all();
        $this->appointment_statuses = AppointmentStatus::all();
        $this->laboratoryTests = LaboratoryTest::all();
        $this->appointment = Appointment::with([
            'user', 'service'
        ])->findOrFail($this->medical_record->appointment_id);
        $this->payment_method_id = $this->appointment->payment_method_id  ?? '';
        $this->status_id = $this->appointment->status_id  ?? '';

        $this->temperature = $this->medical_record->temperature;
        $this->pulse = $this->medical_record->pulse;
        $this->systolic = $this->medical_record->systolic;
        $this->diastolic = $this->medical_record->diastolic;
        $this->spo2 = $this->medical_record->spo2;
        $this->bsa = $this->medical_record->bsa;
        $this->height = $this->medical_record->height;
        $this->weight = $this->medical_record->weight;
        $this->body_mass_index = $this->medical_record->body_mass_index;
        $this->previous_medical_history = $this->medical_record->previous_medical_history;
        $this->clinical_notes = $this->medical_record->clinical_notes;
        $this->laboratory_tests = $this->medical_record->laboratory_tests;
        $this->advice = $this->medical_record->advice;

        $this->symptom_images = $this->appointment->symptomImages;

        $this->medications = Medication::with('productVariant')
        ->where('medical_record_id', $this->medical_record->id)
        ->get()
        ->map(function ($med) {
            $variant = $med->productVariant;
            $product = $variant->product;
            $variants = ProductVariant::where('product_id', $product->id)->where('quantity', '>', 0)->get();
            return [
                'id' => $product->id,
                'product_name' => $product->name,
                'variants' => $variants,
                'selected_variant' => $variant->id,
                'quantity' => $med->quantity,
                'dosage' => $med->dosage,
                'frequency' => $med->frequency,
                'duration' => $med->duration,
                'timing' => $med->timing,
                'instruction' => $med->instruction,
                'price' => $med->price,
                'total' => $med->total,
            ];
        })->toArray();

        $this->tests = LaboratoryResult::with('laboratoryTest')
        ->where('medical_record_id', $this->medical_record->id)
        ->get()
        ->map(function ($test) {
            return [
                'selected_test' => $test->laboratory_test_id,
                'position' => $test->position,
                'price' => $test->laboratoryTest->price ?? 0,
                'total' => $test->laboratoryTest->price ?? 0,
                'result_path' => $test->result,
            ];
        })->toArray();

        $this->updateTestFinalAmount();
        $this->updateTotalMoney();
    }

    public function addTest()
    {
        $this->tests[] = [
            'selected_test' => null,
            'position' => null,
            'price' => 0,
            'total' => 0,
        ];
    }

    public function updateTest($index, $testId)
    {
        unset($this->errorMessages[$index]);
        if ($testId == '') {
            $this->errorMessages[$index] = 'Please select a valid test.';
            $this->tests[$index]['selected_test'] = null;
            return;
        }

        $test = LaboratoryTest::find($testId);
        if ($test) {
            $this->tests[$index]['selected_test'] = $testId;
            $this->tests[$index]['price'] = $test->price;
            $this->updateTestTotal($index);
        }
    }

    private function updateTestTotal($index)
    {
        $this->tests[$index]['total'] = $this->tests[$index]['price'];
        $this->updateTestFinalAmount();
    }

    private function updateTestFinalAmount()
    {
        $this->test_final_amount = 0;
        foreach ($this->tests as $test) {
            $this->test_final_amount += $test['total'];
        }
    }

    public function removeTest($index)
    {
        unset($this->tests[$index]);
        $this->tests = array_values($this->tests);
        $this->updateTestFinalAmount();
    }

    public function addProduct($productId) {
        $product = Product::findOrFail($productId);
        $variants = ProductVariant::where('product_id', $productId)->where('quantity', '>', 0)->get();

        $this->medications[] = [
            'id' => $productId,
            'product_name' => $product->name,
            'variants' => $variants,
            'selected_variant' => null,
            'quantity' => 1,
            'dosage' => null,
            'frequency' => null,
            'duration' => null,
            'timing' => null,
            'instruction' => null,
            'price' => 0,
            'total' => 0
        ];
    }

    public function updateVariant($index, $variantId)
    {
        unset($this->errorMessages[$index]);
        if ($variantId == '') {
            $this->errorMessages[$index] = 'Please select a valid variant.';
            $this->medications[$index]['selected_variant'] = null;
            return;
        }
        $variant = ProductVariant::find($variantId);
        if ($variant) {
            $this->medications[$index]['selected_variant'] = $variantId;
            $this->medications[$index]['price'] = $variant->is_sale ? $variant->sale_price : $variant->price;
            $this->updateTotal($index);
            $this->updateTotalMoney($index);
        }
    }

    public function updateQuantity($index, $quantity)
    {
        unset($this->errorMessages[$index]);
        $selectedVariantId = $this->medications[$index]['selected_variant'];
        if (!$selectedVariantId) {
            $this->errorMessages[$index] = 'Please select the variant before updating the quantity.';
            return;
        }

        $variant = ProductVariant::findOrFail($selectedVariantId);

        if ($quantity > $variant->quantity) {
            $this->errorMessages[$index] = 'The quantity exceeds the existing quantity of this variant.';
            $this->medications[$index]['quantity'] = 1;
            return;
        }
        $this->medications[$index]['quantity'] = $quantity;
        $this->updateTotal($index);
        $this->updateTotalMoney($index);
    }

    private function updateTotal($index)
    {
        $this->medications[$index]['total'] =
        $this->medications[$index]['price'] * $this->medications[$index]['quantity'];
    }

    public function updateTotalMoney() {
        $this->final_amount = $this->appointment->service->price;
        foreach ($this->medications as $item) {
            $this->final_amount += $item['total'];
        }

        foreach ($this->tests as $item) {
            $this->final_amount += $item['price'];
        }
    }

    public function removeProduct($index)
    {
        unset($this->medications[$index]);
        $this->medications = array_values($this->medications);
        $this->updateTotalMoney($index);
    }

    public function updateMedicalRecord()
    {
        Medication::where('medical_record_id', $this->medical_record->id)->delete();
        LaboratoryResult::where('medical_record_id', $this->medical_record->id)->delete();
        $this->validate([
            'temperature' => 'nullable|string|max:10',
            'pulse' => 'nullable|string|max:10',
            'systolic' => 'nullable|string|max:10',
            'diastolic' => 'nullable|string|max:10',
            'spo2' => 'nullable|string|max:10',
            'bsa' => 'nullable|string|max:10',
            'height' => 'nullable|string|max:10',
            'weight' => 'nullable|string|max:10',
            'body_mass_index' => 'nullable|string|max:10',
            'previous_medical_history' => 'nullable|string|max:500',
            'clinical_notes' => 'nullable|string|max:500',
            'laboratory_tests' => 'nullable|string|max:500',
            'advice' => 'nullable|string|max:500',
        ]);

        $this->medical_record->update([
            'temperature' => $this->temperature,
            'pulse' => $this->pulse,
            'systolic' => $this->systolic,
            'diastolic' => $this->diastolic,
            'spo2' => $this->spo2,
            'bsa' => $this->bsa,
            'height' => $this->height,
            'weight' => $this->weight,
            'body_mass_index' => $this->body_mass_index,
            'previous_medical_history' => $this->previous_medical_history,
            'clinical_notes' => $this->clinical_notes,
            'laboratory_tests' => $this->laboratory_tests,
            'advice' => $this->advice,
            'price' => $this->appointment->appointment_final_price,
            'appointment_final_price' => $this->final_amount,
        ]);

        $this->appointment->update([
            'status_id' => $this->status_id,
            'payment_method_id' => $this->payment_method_id,
            'appointment_final_price' => $this->final_amount,
        ]);

        foreach($this->medications as $item) {
            $itemData = [
                'medical_record_id' => $this->medical_record->id,
                'product_variant_id' => $item['selected_variant'],
                'quantity' => $item['quantity'],
                'dosage' => $item['dosage'],
                'frequency' => $item['frequency'],
                'duration' => $item['duration'],
                'timing' => $item['timing'],
                'instruction' => $item['instruction'],
                'price' => $item['price'],
                'total' => $item['total'],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            Medication::create($itemData);

            $variant = ProductVariant::findOrFail($item['selected_variant']);
            $variant->quantity = $variant->quantity - $item['quantity'];
            $variant->save();
        }

        foreach ($this->tests as $index => $test) {
            $testData = [
                'medical_record_id' => $this->medical_record->id,
                'laboratory_test_id' => $test['selected_test'],
                'result' => 'Pending',
                'position' => $test['position'],
            ];
            if (isset($this->pdf_results[$index])) {
                $pdfPath = $this->pdf_results[$index]->store('laboratory_results', 'public');  // Save the file in storage
                $testData['result'] = $pdfPath;  // Lưu đường dẫn file PDF vào trường 'result'
            }
            LaboratoryResult::create($testData);
        }

        session()->flash('message', 'Medical record updated successfully!');
    }

    public function render()
    {
        $products = Product::query()
                    ->where('name', 'like', '%' . $this->search . '%')
                    ->orderBy('id', 'ASC')
                    ->get();
        return view('livewire.doctor.appointment.medical-record-update', [
            'products' => $products,
        ]);
    }
}
