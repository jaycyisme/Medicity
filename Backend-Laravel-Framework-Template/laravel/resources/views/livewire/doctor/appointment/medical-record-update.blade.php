<div>
    <h5 class="head-text">Create Appointment Details</h5>
    <div class="create-details-card">
        <div class="create-details-card-head">
            <div class="card-title-text">
                <h5>Patient Information</h5>
            </div>
            <div class="patient-info-box">
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <ul class="info-list">
                            <li>DOB / Gender</li>
                            <li><h6>{{$medical_record->dob->format('d M, Y')}} / {{$medical_record->gender}}</h6></li>
                        </ul>
                    </div>
                    <div class="col-xl-6 col-md-12">
                        <ul class="info-list">
                            <li>Address</li>
                            <li><h6>{{$medical_record->province}} - {{$medical_record->district}} - {{$medical_record->ward}}</h6></li>
                        </ul>
                    </div>
                    {{-- <div class="col-xl-3 col-md-6">
                        <ul class="info-list">
                            <li>Blood Group</li>
                            <li><h6>O+ve</h6></li>
                        </ul>
                    </div> --}}
                    <div class="col-xl-3 col-md-6">
                        <ul class="info-list">
                            <li>No of Visit</li>
                            <li><h6>{{$appointment->where('user_id', $appointment->user_id)->where('status_id', 2)->count()}}</h6></li>
                        </ul>
                    </div>
                </div>
            </div>

            @if ($symptom_images)
                <div class="card-title-text">
                    <h5>Symptom Images</h5>
                    <div class="col-xl-6 col-md-3">
                        @foreach ($symptom_images as $current_image)
                            <div class="image-container" style="position: relative; margin: 5px; display: inline-block;">
                                <img src="{{ asset('storage/Appointment/' . $current_image->image_url) }}"
                                    alt="medicity"
                                    style="width: 200px; object-fit: cover;">
                            </div>

                            <a href="{{ asset('storage/Appointment/' . $current_image->image_url) }}"
                                target="_blank"
                                class="btn btn-outline-primary btn-sm mt-2 w-100" style="width: 100px;">
                                 View Image
                             </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        <div class="create-details-card-body">
            <form wire:submit.prevent="updateMedicalRecord">
                @csrf
                <div class="start-appointment-set">
                    <div class="form-bg-title">
                        <h5>Vitals</h5>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="input-block input-block-new">
                                <label class="form-label">Temprature</label>
                                <div class="input-text-field">
                                    <input wire:model="temperature" type="text" class="form-control" placeholder="Eg : 97.8">
                                    <span class="input-group-text">F</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="input-block input-block-new">
                                <label class="form-label">Pulse</label>
                                <div class="input-text-field">
                                    <input wire:model="pulse" type="text" class="form-control" placeholder="454">
                                    <span class="input-group-text">mmHg</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="input-block input-block-new">
                                <label class="form-label">Systolic</label>
                                <div class="input-text-field">
                                    <input wire:model="systolic" type="text" class="form-control" placeholder="Eg : 97.8">
                                    <span class="input-group-text">mmHg</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="input-block input-block-new">
                                <label class="form-label">Diastolic</label>
                                <div class="input-text-field">
                                    <input wire:model="diastolic" type="text" class="form-control" placeholder="Eg : 97.8">
                                    <span class="input-group-text">mmHg</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="input-block input-block-new">
                                <label class="form-label">SPO2</label>
                                <div class="input-text-field">
                                    <input wire:model="spo2" type="text" class="form-control" placeholder="Eg : 98">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="input-block input-block-new">
                                <label class="form-label">BSA</label>
                                <div class="input-text-field">
                                    <input wire:model="bsa" type="text" class="form-control" placeholder="Eg : 54">
                                    <span class="input-group-text">M</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="input-block input-block-new">
                                <label class="form-label">Height</label>
                                <div class="input-text-field">
                                    <input wire:model="height" type="text" class="form-control" placeholder="Eg : 97.8">
                                    <span class="input-group-text">cm</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="input-block input-block-new">
                                <label class="form-label">Weight</label>
                                <div class="input-text-field">
                                    <input wire:model="weight" type="text" class="form-control" placeholder="Eg : 97.8">
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="input-block input-block-new">
                                <label class="form-label">BMI</label>
                                <div class="input-text-field">
                                    <input wire:model="body_mass_index" type="text" class="form-control" placeholder="Eg : 454">
                                    <span class="input-group-text">kg/cm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="start-appointment-set">
                    <div class="form-bg-title">
                        <h5>Previous Medical History</h5>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-block input-block-new">
                                <textarea wire:model="previous_medical_history" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="start-appointment-set">
                    <div class="form-bg-title">
                        <h5>Clinical Notes</h5>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-block input-block-new">
                                <textarea wire:model="clinical_notes" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="start-appointment-set">
                    <div class="form-bg-title">
                        <h5>Laboratory Tests</h5>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><span class="text-danger">*</span>Name</th>
                                        <th>Position</th>
                                        <th><span class="text-danger">*</span>Price</th>
                                        <th>Upload PDF Result</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tests as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <select wire:model="tests.{{ $index }}.selected_test" wire:change="updateTest({{ $index }}, $event.target.value)" class="form-select">
                                                    <option value="">Select Test</option>
                                                    @foreach ($laboratoryTests as $test)
                                                        <option value="{{ $test->id }}">{{ $test->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" wire:model="tests.{{ $index }}.position" class="form-control" />
                                            </td>
                                            <td>{{ $item['price'] }}</td>
                                            <td>
                                                <!-- Thêm input cho việc upload file PDF -->
                                                <input type="file" wire:model="pdf_results.{{ $index }}" class="form-control" />

                                                @if (!empty($item['result_path']))
                                                    <a href="{{ asset('storage/' . $item['result_path']) }}"
                                                       target="_blank"
                                                       class="btn btn-outline-primary btn-sm mt-2">
                                                        View PDF
                                                    </a>
                                                @endif

                                                @error('pdf_results.' . $index)
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </td>
                                            <td class="text-center">
                                                <a wire:click.prevent="removeTest({{ $index }})" class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="add-new-med text-end mb-4 mt-3">
                            <a wire:click.prevent="addTest" class="btn btn-primary add-medical more-item mb-0">Add New</a>
                        </div>
                        <div class="col-12">
                            <div class="invoice-total ms-auto">
                                <div class="text-end">
                                    <p class="fw-bold">Test Final Price: {{ $test_final_amount }}</p>
                                </div>
                                @if (session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="start-appointment-set">
                    <div class="form-bg-title">
                        <h5>Medications</h5>
                    </div>
                    <div class="row meditation-row">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><span class="text-danger">*</span>Name</th>
                                        <th><span class="text-danger">*</span>Variant</th>
                                        <th><span class="text-danger">*</span>Quantity</th>
                                        <th><span class="text-danger">*</span>Dosage</th>
                                        <th><span class="text-danger">*</span>Frequency</th>
                                        <th><span class="text-danger">*</span>Duration</th>
                                        <th><span class="text-danger">*</span>Timing</th>
                                        <th><span class="text-danger">*</span>Instruction</th>
                                        <th><span class="text-danger">*</span>Unit Price</th>
                                        <th>Total Price</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($medications as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item['product_name'] }}
                                                @if(isset($errorMessages[$index]))
                                                    <div class="text-danger">{{ $errorMessages[$index] }}</div>
                                                @endif
                                            </td>
                                            <td>
                                                <select
                                                    wire:model="medications.{{ $index }}.selected_variant"
                                                    wire:change="updateVariant({{ $index }}, $event.target.value)"
                                                    class="form-select">
                                                    <option value="">Select Variant</option>
                                                    @foreach ($item['variants'] as $variant)
                                                        <option value="{{ $variant->id }}">
                                                            @if ($variant->packaging_type_id)
                                                            Packaging: {{ $variant->packagingType->name }} -
                                                            @endif
                                                            @if ($variant->size_id)
                                                            Size: {{ $variant->size->name }} -
                                                            @endif
                                                            @if ($variant->color_id)
                                                            Color: {{ $variant->color->name }}
                                                            @endif
                                                            @if (!$variant->size_id && !$variant->color_id && !$variant->packaging_type_id)
                                                            {{$variant->product->name}}
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number"
                                                    wire:model="medications.{{ $index }}.quantity"
                                                    wire:change="updateQuantity({{ $index }}, $event.target.value)"
                                                    class="form-control" min="1">
                                            </td>
                                            <td>
                                                <input type="text"
                                                    wire:model="medications.{{ $index }}.dosage"
                                                    class="form-control" min="1">
                                            </td>
                                            <td>
                                                <input type="text"
                                                    wire:model="medications.{{ $index }}.frequency"
                                                    class="form-control" min="1">
                                            </td>
                                            <td>
                                                <input type="text"
                                                    wire:model="medications.{{ $index }}.duration"
                                                    class="form-control" min="1">
                                            </td>
                                            <td>
                                                <input type="text"
                                                    wire:model="medications.{{ $index }}.timing"
                                                    class="form-control" min="1">
                                            </td>
                                            <td>
                                                <input type="text"
                                                    wire:model="medications.{{ $index }}.instruction"
                                                    class="form-control" min="1">
                                            </td>
                                            <td>{{ $item['price'] }}</td>
                                            <td>{{ $item['total'] }}</td>
                                            <td class="text-center">
                                                <a wire:click.prevent="removeProduct({{ $index }})"
                                                    class="avtar avtar-s btn-link-danger btn-pc-default">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No products are available
                                                choose
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3"> <!-- Hoặc col-lg-6, col-sm-12 tùy theo nhu cầu -->
                                    <div class="text-start">
                                        <hr class="mb-4 mt-0 border-secondary border-opacity-50">
                                        <a class="btn btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#product-add-modal">+ Add Product</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="invoice-total ms-auto">
                                <div class="text-end">
                                    <p class="fw-bold">Final Price: {{ $final_amount }}</p>
                                </div>
                                @if (session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <select required wire:model='payment_method_id' class="form-select rounded mb-3" aria-label="Default select example">
                                <option selected>Payment Method</option>
                                @foreach($payment_methods as $payment_method)
                                <option value="{{ $payment_method->id }}"
                                @if ($payment_method_id == $payment_method->id)
                                    selected
                                @endif>{{ $payment_method->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <select required wire:model='status_id' class="form-select rounded mb-3" aria-label="Default select example">
                                <option selected>Status</option>
                                @foreach($appointment_statuses as $appointment_status)
                                <option value="{{ $appointment_status->id }}"
                                @if ($status_id == $appointment_status->id)
                                    selected
                                @endif>{{ $appointment_status->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="start-appointment-set">
                    <div class="form-bg-title">
                        <h5>Advice</h5>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-block input-block-new">
                                <textarea wire:model="advice" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="form-set-button">
                        <a href="{{ route('doctor.appointment') }}" class="btn btn-light" type="button">Cancel</a>
                        <button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#end_session">Save & End Appointment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" wire:ignore.self id="product-add-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <div class="collapse multi-collapse show">
                        <h5 class="mb-0">Select Product</h5>
                    </div>

                    <div class="collapse multi-collapse">
                        <h5 class="mb-0">Add Product</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal"
                            data-bs-toggle="tooltip" title="Close">
                            X
                        </a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="collapse multi-collapse show">
                        <div class="address-check-block">
                            <div class="mb-3">
                                <x-input type="text" id="search" name="search" wire:model.live="search"
                                    placeholder="Search..." />
                            </div>

                            @foreach ($products as $product)
                                <div class="address-check border rounded p-3">
                                    <div class="form-check">
                                        <label class="form-check-label d-block" for="address-check-1">
                                            <div class="chat-avtar d-inline-flex mx-auto">
                                                <img class="rounded-circle img-fluid wid-90 img-thumbnail"
                                                    src="@if (isset($product->thumbnail)) {{ asset('storage/Product/' . $product->thumbnail) }}@else{{ asset('assets/images/user/avatar-1.jpg') }} @endif"
                                                    alt="{{ $product->name }}">
                                            </div>
                                            <span class="h6 mb-0 d-block">{{ $product->name }} <small
                                                    class="text-muted">({{ $product->category->name }})</small></span>

                                            <span class="col-6 text-end">
                                                <span
                                                    class="address-btns d-flex align-items-center justify-content-end">
                                                    <a wire:click.prevent="addProduct({{ $product->id }})"
                                                        class="avtar avtar-s btn-link-danger btn-pc-default"
                                                        data-bs-dismiss="modal">
                                                        +
                                                    </a>
                                                </span>
                                            </span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between collapse multi-collapse show">
                    <div class="flex-grow-1 text-end">
                        <button type="button" class="btn btn-link-danger" data-bs-dismiss="modal">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
