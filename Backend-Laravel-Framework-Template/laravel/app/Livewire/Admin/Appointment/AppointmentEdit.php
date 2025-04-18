<?php

namespace App\Livewire\Admin\Appointment;

use Carbon\Carbon;
use App\Models\Clinic;
use App\Models\Product;
use App\Models\Service;
use Livewire\Component;
use App\Models\Medication;
use App\Models\Speciality;
use App\Models\Appointment;
use App\Models\DoctorService;
use App\Models\MedicalRecord;
use App\Models\PaymentMethod;
use Livewire\WithFileUploads;
use App\Models\LaboratoryTest;
use App\Models\ProductVariant;
use App\Models\ViettelPostCity;
use App\Models\ViettelPostWard;
use App\Models\ConsultationType;
use App\Models\LaboratoryResult;
use App\Models\AppointmentStatus;
use App\Models\ViettelPostDistrict;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Illuminate\Support\Facades\Storage;

class AppointmentEdit extends Component
{
    use WithFileUploads;
    public $search = '';
    public $test_final_amount;
    public $medication_final_amount;
    public $final_amount;
    public $appointment;
    public $medicalRecord;
    public $speciality;
    public $service;
    public $doctor;
    public $status;
    public $type;
    public $payment_method;
    public $clinic;

    public $patient_name;
    public $patient_phone;
    public $patient_email;
    public $patient_symptoms;
    public $patient_address_detail;
    public $patient_reason_visit;
    public $gender;
    public $dob;
    public $job;
    public $dependant_role;
    public $dependant_name;
    public $dependant_phone;
    public $appointment_final_price;

    public $citiesList = [];
    public $districtsList = [];
    public $wardsList = [];
    public $address_province;
    public $address_province_name;
    public $address_district;
    public $address_district_name;
    public $address_ward;
    public $address_ward_name;

    public $clinics;
    public $statuses;
    public $types;
    public $paymentMethods;
    public $specialities;
    public $services = [];
    public $doctors = [];

    public $medications = [];
    public $errorMessages = [];

    public $laboratoryTests;
    public $availableTests;
    public $laboratoryResults = [];

    public function mount($appointmentId) {
        $this->appointment = Appointment::findOrFail($appointmentId);
        $this->speciality = $this->appointment->speciality_id;
        $this->service = $this->appointment->service_id;
        $this->doctor = $this->appointment->doctor_id;
        $this->status = $this->appointment->status_id;
        $this->type = $this->appointment->type_id;
        $this->payment_method = $this->appointment->payment_method_id;
        $this->clinic = $this->appointment->clinic_id;

        $this->patient_name = $this->appointment->patient_name ?? '';
        $this->patient_phone = $this->appointment->patient_phone ?? '';
        $this->patient_email = $this->appointment->patient_email ?? '';
        $this->patient_symptoms = $this->appointment->patient_symptoms ?? '';
        $this->patient_address_detail = $this->appointment->patient_address_detail ?? '';
        $this->patient_reason_visit = $this->appointment->patient_reason_visit ?? '';
        $this->appointment_final_price = $this->appointment->appointment_final_price;

        // Lấy thông tin hồ sơ bệnh án
        $this->medicalRecord = MedicalRecord::where('appointment_id', $this->appointment->id)->first();
        $this->gender = $this->medicalRecord->gender ?? 'Male';
        $this->job = $this->medicalRecord->job ?? '';
        $this->dob = $this->medicalRecord && $this->medicalRecord->dob
        ? Carbon::parse($this->medicalRecord->dob)->format('Y-m-d')
        : '';
        $this->dependant_role = $this->medicalRecord->dependant_role ?? '';
        $this->dependant_name = $this->medicalRecord->dependant_name ?? '';
        $this->dependant_phone = $this->medicalRecord->dependant_phone ?? '';

        // Load danh sách tỉnh, quận, phường
        $this->citiesList = ViettelPostCity::get();
        $this->statuses = AppointmentStatus::all();
        $this->types = ConsultationType::all();
        $this->paymentMethods = PaymentMethod::all();
        $this->specialities = Speciality::all();
        $this->clinics = Clinic::all();

        // Gán giá trị địa chỉ từ DB
        $this->address_province = ViettelPostCity::where('province_name', $this->appointment->patient_province)->first()->province_id ?? null;
        $this->onChangeCity();

        $this->address_district = ViettelPostDistrict::where('district_name', $this->appointment->patient_district)->first()->district_id ?? null;
        $this->onChangeDistrict();

        $this->address_ward = ViettelPostWard::where('wards_name', $this->appointment->patient_ward)->first()->wards_id ?? null;

        // Load danh sách dịch vụ & bác sĩ
        $this->onChangeSpeciality();
        $this->onChangeService();

        $this->medications = $this->medicalRecord->medications->map(function ($medications) {
            $product = $medications->productVariant->product;
            $variants = ProductVariant::where('product_id', $product->id)
                                            ->where(function ($query) use ($medications) {
                                                $query->where('quantity', '>', 0)
                                                    ->orWhere('id', $medications->product_variant_id);
                                            })->get();
            return [
                'id' => $medications->id,
                'product_name' => $product->name,
                'variants' => $variants,
                'selected_variant' => $medications->product_variant_id,
                'quantity' => $medications->quantity,
                'dosage' => $medications->dosage,
                'frequency' => $medications->frequency,
                'duration' => $medications->duration,
                'timing' => $medications->timing,
                'instruction' => $medications->instruction,
                'price' => $medications->price,
                'total' => $medications->total,
            ];
        })->toArray();

        // Load các xét nghiệm đã tồn tại từ bảng LaboratoryResult
        $this->laboratoryResults = LaboratoryResult::where('medical_record_id', $this->medicalRecord->id)->get();

        // Chuyển các kết quả xét nghiệm hiện có thành một mảng có thể chỉnh sửa, lấy thêm giá của từng xét nghiệm
        $this->laboratoryTests = $this->laboratoryResults->map(function ($result) {
            return [
                'id' => $result->id,
                'selected_test' => $result->laboratory_test_id, // ID xét nghiệm
                'result' => $result->result, // Kết quả xét nghiệm (PDF file)
                'position' => $result->position, // Kết quả xét nghiệm (PDF file)
                'price' => $result->laboratoryTest->price, // Giá của xét nghiệm
            ];
        })->toArray();

        // Lấy danh sách các xét nghiệm có sẵn
        $this->availableTests = LaboratoryTest::all();
        $this->calculateTotal();
    }

    public function onChangeSpeciality()
    {
        if ($this->speciality) {
            $this->services = Service::where('speciality_id', $this->speciality)->get();
            $this->doctors = []; // Reset doctors when changing speciality
        }
    }

    public function onChangeService()
    {
        if ($this->service) {
            $this->doctors = DoctorService::where('service_id', $this->service)
                ->with('doctor')
                ->get()
                ->pluck('doctor');
        }
    }

    public function onChangeCity()
    {
        if ($this->address_province) {
            $province = ViettelPostCity::where('province_id', $this->address_province)->first();
            $this->address_province_name = $province->province_name ?? '';

            $this->districtsList = ViettelPostDistrict::where('province_id', $this->address_province)->get();
            $this->address_district = null;
            $this->address_ward = null;
            $this->wardsList = [];
        }
    }

    public function onChangeDistrict()
    {
        if ($this->address_district) {
            $district = ViettelPostDistrict::where('district_id', $this->address_district)->first();
            $this->address_district_name = $district->district_name ?? '';

            $this->wardsList = ViettelPostWard::where('district_id', $this->address_district)->get();
            $this->address_ward = null;
        }
    }

    public function addProduct($productId)
    {
        $product = Product::with('variants')->findOrFail($productId);
        $variants = ProductVariant::where('product_id', $productId)
                                        ->where('quantity', '>', 0)
                                        ->get();

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

        $variant = ProductVariant::where('id', $variantId)->first();

        if (!$variant) {
            $this->errorMessages[$index] = 'Invalid variant.';
            return;
        }

        $this->medications[$index]['selected_variant'] = $variantId;
        $this->medications[$index]['price'] = $variant->is_sale ? $variant->sale_price : $variant->price;

        // 🔥 Cập nhật total dựa trên quantity đã chọn
        $this->medications[$index]['total'] = $this->medications[$index]['quantity'] * $this->medications[$index]['price'];

        $this->calculateTotal();
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

        // ✅ Đảm bảo `total` được tính đúng với `quantity * price`
        $this->medications[$index]['quantity'] = $quantity;
        $this->medications[$index]['total'] = $quantity * $this->medications[$index]['price'];

        $this->calculateTotal();
    }

    public function calculateTotal()
{
    // Reset final amounts to avoid any residual values from previous calculations
    $this->medication_final_amount = 0;
    $this->test_final_amount = 0;

    // Calculate total price for medications
    foreach ($this->medications as $item) {
        $this->medication_final_amount += $item['total'];  // Add each medication's total price
    }

    // Calculate total price for laboratory tests
    foreach ($this->laboratoryTests as $test) {
        if ($test['selected_test']) {
            $this->test_final_amount += $test['price'];  // Add each test's price
        }
    }

    // Get the service price (if any)
    $service = Service::find($this->service); // Get the current service
    $service_price = $service ? $service->price : 0; // Default to 0 if no service price

    // Calculate the total final amount for the appointment
    // The appointment_final_price will be the sum of medication, test, and service prices
    $this->appointment_final_price = $this->medication_final_amount + $this->test_final_amount + $service_price;

    // Optionally, you can log or debug the totals
    // dd([
    //     'medication_final_amount' => $this->medication_final_amount,
    //     'test_final_amount' => $this->test_final_amount,
    //     'appointment_final_price' => $this->appointment_final_price
    // ]);
}

    public function removeProduct($index)
    {
        if (!empty($this->medications[$index]['id'])) {
            $medicationId = $this->medications[$index]['id'];
            $medication = Medication::find($medicationId);

            if ($medication) {
                $variant = $medication->productVariant;
                $variant->quantity += $medication->quantity;
                $variant->save();
                $medication->delete();
            }
        }
        unset($this->medications[$index]);
        $this->medications = array_values($this->medications);
        $this->calculateTotal();
    }

    public function addLaboratoryTest()
    {
        // Thêm một xét nghiệm mới vào danh sách
        $this->laboratoryTests[] = [
            'selected_test' => null, // Mặc định chọn xét nghiệm trống
            'result' => null, // Kết quả trống
            'position' => null, // Kết quả trống
            'price' => 0, // Giá mặc định là 0
        ];

        $this->calculateTotal();
    }

    public function updateLaboratoryTestResult($index)
{
    // Check if the result is a valid file (an instance of TemporaryUploadedFile)
    if (isset($this->laboratoryTests[$index]['result']) && $this->laboratoryTests[$index]['result'] instanceof TemporaryUploadedFile) {
        // Store the file in the correct directory and get its path
        $file = $this->laboratoryTests[$index]['result'];
        $path = $file->store('laboratory_results', 'public');

        // Update the result path in the laboratoryTests array
        $this->laboratoryTests[$index]['result'] = $path;
    } else {
        // If no file was uploaded, we should not set the 'result' to NULL unless it's necessary (if the result needs to be deleted)
        // Check if it's a removal or an update of the result (like setting it back to NULL when deleting)
        // If you don't want to remove the result, you should ensure that no NULL value is set
        if (empty($this->laboratoryTests[$index]['result'])) {
            $this->laboratoryTests[$index]['result'] = null;  // Only set to null if deletion is intended, else leave it unchanged.
        }
    }
}

    // Xóa xét nghiệm và file đi
    public function removeLaboratoryTest($index)
    {
        // Lấy ID của kết quả xét nghiệm để xóa
        if (isset($this->laboratoryTests[$index]['id'])) {
            $laboratoryResult = LaboratoryResult::find($this->laboratoryTests[$index]['id']);

            // Nếu kết quả xét nghiệm tồn tại trong cơ sở dữ liệu, xóa nó
            if ($laboratoryResult) {
                // Xóa file trong thư mục storage nếu có
                if (Storage::disk('public')->exists($laboratoryResult->result)) {
                    Storage::disk('public')->delete($laboratoryResult->result);
                }
                // Xóa bản ghi trong cơ sở dữ liệu
                $laboratoryResult->delete();
            }
        }

        // Xóa xét nghiệm khỏi mảng
        unset($this->laboratoryTests[$index]);
        $this->laboratoryTests = array_values($this->laboratoryTests); // Reset lại chỉ số mảng

        $this->calculateTotal();
    }

    public function updateLaboratoryTestPrice($index)
    {
        // Lấy giá của xét nghiệm từ `LaboratoryTest`
        $selectedTestId = $this->laboratoryTests[$index]['selected_test'];
        $test = LaboratoryTest::find($selectedTestId);

        if ($test) {
            // Cập nhật giá của xét nghiệm
            $this->laboratoryTests[$index]['price'] = $test->price;
        }

        $this->calculateTotal();
    }

    public function update()
    {
        foreach ($this->laboratoryTests as $index => $test) {
            $this->updateLaboratoryTestResult($index);
        }
        $ward = ViettelPostWard::where('wards_id', $this->address_ward)->first();
        $this->address_ward_name = $ward->wards_name ?? '';

        $this->validate([
            'patient_name' => 'required|string|max:255',
            'patient_phone' => 'required|string|max:20',
            'patient_email' => 'required|email',
            'patient_symptoms' => 'required|string|max:500',
            'patient_address_detail' => 'required|string|max:1000',
            'patient_reason_visit' => 'required|string|max:1000',
            'speciality' => 'required',
            'service' => 'required',
            'doctor' => 'required',
            'status' => 'required',
            'type' => 'required',
        ]);

        $this->appointment->update([
            'doctor_id' => $this->doctor,
            'status_id' => $this->status,
            'payment_method_id' => $this->payment_method,
            'type_id' => $this->type,
            'clinic_id' => $this->clinic,
            'service_id' => $this->service,
            'speciality_id' => $this->speciality,
            'patient_name' => $this->patient_name,
            'patient_phone' => $this->patient_phone,
            'patient_email' => $this->patient_email,
            'patient_symptoms' => $this->patient_symptoms,
            'patient_province' => $this->address_province_name,
            'patient_district' => $this->address_district_name,
            'patient_ward' => $this->address_ward_name,
            'patient_address_detail' => $this->patient_address_detail,
            'patient_reason_visit' => $this->patient_reason_visit,
            'appointment_final_price' => $this->appointment_final_price + $this->final_amount,
        ]);

        $this->medicalRecord->clinic_id = $this->appointment->clinic_id;
        $this->medicalRecord->service_id = $this->appointment->service_id;
        $this->medicalRecord->speciality_id = $this->appointment->speciality_id;
        $this->medicalRecord->medical_record_code = 'MED' . str_pad(MedicalRecord::max('id') + 1, 10, '0', STR_PAD_LEFT);
        $this->medicalRecord->name = $this->patient_name;
        $this->medicalRecord->phone = $this->patient_phone;
        $this->medicalRecord->email = $this->patient_email;
        $this->medicalRecord->gender = $this->gender;
        $this->medicalRecord->dob = $this->dob ? Carbon::parse($this->dob)->format('Y-m-d') : null;
        $this->medicalRecord->job = $this->job;
        $this->medicalRecord->symptoms = $this->patient_symptoms;
        $this->medicalRecord->province = $this->address_province_name;
        $this->medicalRecord->district = $this->address_district_name;
        $this->medicalRecord->ward = $this->address_ward_name;
        $this->medicalRecord->address_detail = $this->patient_address_detail;
        $this->medicalRecord->dependant_role = $this->dependant_role;
        $this->medicalRecord->dependant_name = $this->dependant_name;
        $this->medicalRecord->dependant_phone = $this->dependant_phone;

        $this->medicalRecord->save();

        foreach ($this->medications as $itemData) {
            $existingProduct = Medication::find($itemData['id'] ?? null);

            if ($existingProduct) {
                $previousQuantity = $existingProduct->quantity;
                $existingProduct->update([
                    'medical_record_id' => $this->medicalRecord->id,
                    'product_variant_id' => $itemData['selected_variant'],
                    'quantity' => $itemData['quantity'],
                    'dosage' => $itemData['dosage'],
                    'frequency' => $itemData['frequency'],
                    'duration' => $itemData['duration'],
                    'timing' => $itemData['timing'],
                    'instruction' => $itemData['instruction'],
                ]);

                // Cập nhật lại số lượng biến thể
                $variant = ProductVariant::findOrFail($itemData['selected_variant']);
                $variant->quantity += $previousQuantity - $itemData['quantity'];
                $variant->save();
            } else {
                Medication::create([
                    'medical_record_id' => $this->medicalRecord->id,
                    'product_variant_id' => $itemData['selected_variant'],
                    'quantity' => $itemData['quantity'],
                    'dosage' => $itemData['dosage'],
                    'frequency' => $itemData['frequency'],
                    'duration' => $itemData['duration'],
                    'timing' => $itemData['timing'],
                    'instruction' => $itemData['instruction'],
                    'price' => $itemData['price'],
                    'total' => $itemData['total'],
                ]);

                $variant = ProductVariant::findOrFail($itemData['selected_variant']);
                $variant->quantity -= $itemData['quantity'];
                $variant->save();
            }
        }

        foreach ($this->laboratoryTests as $test) {
            if ($test['selected_test']) {
                $existingResult = LaboratoryResult::find($test['id'] ?? null);

                if ($existingResult) {
                    // If the result is not null, update the record
                    if ($test['result']) {
                        $existingResult->update([
                            'result' => $test['result'], // File path
                            'laboratory_test_id' => $test['selected_test'],
                        ]);
                    }
                } else {
                    // Create new LaboratoryResult entry
                    if ($test['result']) {  // Ensure that result is not NULL
                        LaboratoryResult::create([
                            'medical_record_id' => $this->medicalRecord->id,
                            'laboratory_test_id' => $test['selected_test'],
                            'position' => $test['position'], // File path
                            'result' => $test['result'], // File path
                        ]);
                    }
                }
            }
        }

        return redirect()->route('appointment.index')->with('success', 'Appointment updated successfully!');
    }

    public function render()
    {
        $products = Product::query()->where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'ASC')->get();
        return view('livewire.admin.appointment.appointment-edit', ['products' => $products]);
    }
}
