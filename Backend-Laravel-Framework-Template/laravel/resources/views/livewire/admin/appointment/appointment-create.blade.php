<div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Create New Appointment</h5>
                <a class="btn btn-lg btn-info" href="{{ route('appointment.index') }}">Back</a>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="store">
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
                            <button type="submit" class="btn btn-primary mt-3">Create Appointment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
