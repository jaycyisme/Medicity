<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between py-3">
            <h5>Update Disease</h5>
            <a class="btn btn-lg btn-info" href="{{ route('disease.index') }}">
                Back
            </a>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="update">
                @csrf
                @if (session()->has('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Notice!</strong> {{ session('status') }}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="mb-5">
                    <x-label for="name" value="Name" />
                    <x-input wire:model='name' type="text" class="mb-3" id="name" placeholder="Name..." required />
                    <x-input-error for="name" />

                    <div wire:ignore class="image-file mt-3 mb-3">
                        <x-label class="form-label d-flex align-items-center" value="Main Image" />
                        <input type="file" id="thumbnail" class="d-none" accept="image/*">
                        <x-input-error for="thumbnail" />
                        <label class="btn btn-outline-secondary" for="thumbnail">
                            <i class="ti ti-upload me-2"></i> Click to Upload
                        </label>
                        <div class="image-preview mt-3">
                            <img id="thumbnailPreview" style="width: 30%;" class="img-fluid rounded shadow-sm d-block category-image-preview" src="{{ asset('storage/Disease/' . $image_url) }}"/>
                        </div>

                        <input wire:model='image_url' type="hidden" name="thumbnail" id="thumbnail_url" />
                    </div>

                    <div class="mb-3">
                        <x-label for="bodypart" value="Body Part" />
                        <select wire:model="body_part_id" class="form-select" id="bodypart">
                            @foreach ($bodyparts as $bodypart)
                                <option value="{{ $bodypart->id }}">{{ $bodypart->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <x-label for="targetgroup" value="Target Group" />
                        <select wire:model="target_group_id" class="form-select" id="targetgroup">
                            @foreach ($targetgroups as $targetgroup)
                                <option value="{{ $targetgroup->id }}">{{ $targetgroup->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <x-label for="seasonal" value="Seasonal" />
                        <select wire:model="seasonal_id" class="form-select" id="seasonal">
                            @foreach ($seasonals as $seasonal)
                                <option value="{{ $seasonal->id }}">{{ $seasonal->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <x-label for="speciality" value="Speciality" />
                        <select wire:model="speciality_id" class="form-select" id="speciality">
                            @foreach ($specialities as $speciality)
                                <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div wire:ignore class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Overview</h5>
                                </div>
                                <div class="card-body">
                                    <textarea wire:model="overview" id="overview-content-editor" name="blog-content" cols="50" rows="4">{{ $overview }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div wire:ignore class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Symptoms</h5>
                                </div>
                                <div class="card-body">
                                    <textarea wire:model="symptoms" id="symptoms-content-editor" name="blog-content" cols="50" rows="4">{{ $symptoms }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div wire:ignore class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Causes</h5>
                                </div>
                                <div class="card-body">
                                    <textarea wire:model="causes" id="causes-content-editor" name="blog-content" cols="50" rows="4">{{ $causes }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div wire:ignore class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Risk Factors</h5>
                                </div>
                                <div class="card-body">
                                    <textarea wire:model="risk_factors" id="risk-factors-content-editor" name="blog-content" cols="50" rows="4">{{ $risk_factors }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div wire:ignore class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Diagnosis</h5>
                                </div>
                                <div class="card-body">
                                    <textarea wire:model="diagnosis" id="diagnosis-content-editor" name="blog-content" cols="50" rows="4">{{ $diagnosis }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div wire:ignore class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Prevention</h5>
                                </div>
                                <div class="card-body">
                                    <textarea wire:model="prevention" id="prevention-content-editor" name="blog-content" cols="50" rows="4">{{ $prevention }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div wire:ignore class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Treatment</h5>
                                </div>
                                <div class="card-body">
                                    <textarea wire:model="treatment" id="treatment-content-editor" name="blog-content" cols="50" rows="4">{{ $treatment }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <x-label for="doctor_name" value="Doctor Name" />
                    <x-input wire:model='doctor_name' type="text" class="mb-3" id="doctor_name" placeholder="Doctor Name..." required />
                    <x-input-error for="doctor_name" />

                    <div wire:ignore class="image-file mt-3 mb-3">
                        <x-label class="form-label d-flex align-items-center" value="Main Image" />
                        <input type="file" id="doctor_image" class="d-none" accept="image/*">
                        <x-input-error for="doctor_image" />
                        <label class="btn btn-outline-secondary" for="doctor_image">
                            <i class="ti ti-upload me-2"></i> Click to Upload
                        </label>
                        <div class="image-preview mt-3">
                            <img id="doctorImagePreview" style="width: 30%;" class="img-fluid rounded shadow-sm d-block category-image-preview" src="{{ asset('storage/Disease/' . $doctor_image) }}"/>
                        </div>

                        <input wire:model='doctor_image' type="hidden" name="doctor_image" id="doctor_image_url" />
                    </div>

                    <x-label for="doctor_overview" value="Doctor Overview" />
                    <x-input wire:model='doctor_overview' type="text" class="mb-3" id="doctor_overview" placeholder="Doctor Name..." required />
                    <x-input-error for="doctor_overview" />

                    <div wire:ignore class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Meal Plan</h5>
                                </div>
                                <div class="card-body">
                                    <textarea wire:model="meal_plan" id="meal-plan-content-editor" name="blog-content" cols="50" rows="4">{{ $meal_plan }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <x-button class="btn-primary">Update Disease</x-button>
                </div>
            </form>
        </div>
    </div>
</div>
