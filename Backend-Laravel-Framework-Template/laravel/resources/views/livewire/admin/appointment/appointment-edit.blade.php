<div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Update Appointment</h5>
                <a class="btn btn-lg btn-info" href="{{ route('appointment.index') }}">Back</a>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="update">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input wire:model='patient_name' type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input wire:model='patient_phone' type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input wire:model='patient_email' type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <label class="form-label">Gender</label>
                            <select wire:model='gender' class="form-select rounded mb-3" aria-label="Default select example">
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-3">
                            <label class="form-label">DOB</label>
                            <input wire:model='dob' type="date" class="form-control">
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Job</label>
                                <input wire:model='job' type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Dependant Role</label>
                                <input wire:model='dependant_role' type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Dependant Name</label>
                                <input wire:model='dependant_name' type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Dependant Phone</label>
                                <input wire:model='dependant_phone' type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Symptoms</label>
                                <input wire:model='patient_symptoms' type="text" class="form-control">
                            </div>
                        </div>

                        <label class="form-label">Speciality</label>
                        <div class="col-lg-4 col-md-6">
                            <select required wire:model='speciality' wire:change='onChangeSpeciality' class="form-select rounded mb-3" aria-label="Default select example">
                                <option selected>Speciality</option>
                                @foreach($specialities as $speciality)
                                <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <select required wire:model='service' wire:change='onChangeService' class="form-select rounded mb-3" aria-label="Default select example">
                                <option selected>Service</option>

                                @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <select required wire:model='doctor' class="form-select rounded mb-3" aria-label="Default select example">
                                <option selected>Doctor</option>
                                @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-lg-12 col-form-label">Address :</label>
                        <div class="mb-3 row">
                            <div class="col-lg-4 col-md-6">
                                <select required wire:model='address_province' wire:change='onChangeCity' class="col-lg-4 form-select rounded mb-3" aria-label="Default select example">
                                    <option selected>Tỉnh/Thành phố</option>
                                    @foreach($citiesList as $city)
                                    <option value="{{ $city->province_id }}">{{ $city->province_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <select required wire:model='address_district' wire:change='onChangeDistrict' class="col-lg-4 form-select rounded mb-3" aria-label="Default select example">
                                    <option selected>Quận/Huyện</option>

                                    @foreach($districtsList as $district)
                                    <option value="{{ $district->district_id }}">{{ $district->district_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <select required wire:model='address_ward' class="col-lg-4 form-select rounded mb-3" aria-label="Default select example">
                                    <option selected>Phường/Xã</option>
                                    @foreach($wardsList as $ward)
                                    <option value="{{ $ward->wards_id }}">{{ $ward->wards_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Address Detail</label>
                                <input wire:model='patient_address_detail' type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Reason for Visit</label>
                                <textarea wire:model='patient_reason_visit' class="form-control" rows="3"></textarea>
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
                                                <th><span class="text-danger">*</span>Result (PDF)</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($laboratoryTests as $index => $test)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <select wire:model="laboratoryTests.{{ $index }}.selected_test" class="form-select">
                                                            <option value="">Select Test</option>
                                                            @foreach($availableTests as $testOption)
                                                                <option value="{{ $testOption->id }}">{{ $testOption->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" wire:model="laboratoryTests.{{ $index }}.position" class="form-control">
                                                    </td>
                                                    <td>
                                                        <input type="file" wire:model="laboratoryTests.{{ $index }}.result" class="form-control">
                                                        @if($test['result'])
                                                            <a href="{{ asset('storage/' . $test['result']) }}" target="_blank">View Result</a>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <button wire:click.prevent="removeLaboratoryTest({{ $index }})" class="btn btn-danger btn-sm">Remove</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="add-new-med text-end mb-4">
                                    <a wire:click.prevent="addLaboratoryTest" class="btn btn-light-primary add-medical more-item mb-0">Add New Test</a>
                                </div>
                                <div class="col-12">
                                    <div class="invoice-total ms-auto">
                                        <div class="text-end">
                                            <p class="fw-bold">Test Price: {{ $test_final_amount }}</p>
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
                                                            <i class="ti ti-trash f-20"></i>
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
                                                <a class="btn btn-light-primary d-flex align-items-center gap-2"
                                                    data-bs-toggle="modal" data-bs-target="#product-add-modal"><i
                                                        class="ti ti-plus"></i> Add Product</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="invoice-total ms-auto">
                                        <div class="text-end">
                                            <p class="fw-bold">Final Price: {{ $medication_final_amount }}</p>
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

                        <div class="col-lg-6 col-md-12">
                            <select required wire:model='status' class="form-select rounded mb-3" aria-label="Default select example">
                                <option selected>Status</option>
                                @foreach($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <select required wire:model='payment_method' class="form-select rounded mb-3" aria-label="Default select example">
                                <option selected>Payment Method</option>
                                @foreach($paymentMethods as $paymentMethod)
                                <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <select required wire:model='type' class="form-select rounded mb-3" aria-label="Default select example">
                                <option selected>Type</option>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <select required wire:model='clinic' class="form-select rounded mb-3" aria-label="Default select example">
                                <option selected>Clinic</option>
                                @foreach($clinics as $clinic)
                                <option value="{{ $clinic->id }}">{{ $clinic->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-3">Update Appointment</button>
                        </div>
                    </div>
                </form>
            </div>
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
                            <i class="ti ti-x f-20"></i>
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
                                                        <i class="ti ti-plus f-20"></i>
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
