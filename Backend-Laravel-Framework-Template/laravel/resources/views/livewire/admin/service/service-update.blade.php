<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between py-3">
            <h5>Update Service</h5>
            <a class="btn btn-lg btn-info" href="{{ route('service.index') }}">
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
                            <img id="thumbnailPreview" class="img-fluid rounded shadow-sm d-block category-image-preview" src="{{ asset('storage/Clinic/' . $thumbnail) }}"/>
                        </div>

                        <input wire:model='thumbnail' type="hidden" name="thumbnail" id="thumbnail_url" />
                    </div>

                    <x-label for="duration" value="Duration" />
                    <x-input wire:model='duration' type="number" class="mb-3" id="duration" placeholder="Duration..." required />
                    <x-input-error for="duration" />

                    <x-label for="price" value="Price" />
                    <x-input wire:model='price' type="number" class="mb-3" id="price" placeholder="Price..." required />
                    <x-input-error for="price" />

                    {{-- Uploaded Images --}}
                    <div wire:ignore class="mb-3">
                        <x-label class="form-label d-flex align-items-center" value="Service Image" />
                        <label class="btn btn-outline-secondary" id="uppyModalOpener"><i class="ti ti-upload me-2"></i> Click để tải ảnh</label>
                        <div id="uppyArea"></div>
                        <x-input-error for="images" />

                        {{-- Khu vực hiển thị ảnh đã tải lên --}}
                        <div id="uploadedImagePreviews" class="mt-3 d-flex flex-wrap">
                            @foreach ($current_images as $current_image)
                                <div class="image-container" style="position: relative; margin: 5px; display: inline-block;">
                                    <img src="{{ asset('storage/Clinic/' . $current_image->image_url) }}"
                                        alt="{{ $service->name }}"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <button type="button" class="delete-btn"
                                            data-image="{{ $current_image->image_url }}"
                                            style="position: absolute; top: 0; right: 0; background-color: #000000b3; color: white; border: none; width: 20px; cursor: pointer;">
                                        <span>&times;</span>
                                    </button>
                                </div>
                            @endforeach
                        </div>

                        {{-- Hidden input để lưu URL ảnh --}}
                        <input type="hidden" id="uploadedImages" wire:model="images">
                    </div>

                    <div class="mb-3">
                        <x-label for="clinic" value="Clinic" />
                        <select wire:model="clinic_id" class="form-select" id="clinic">
                            @foreach ($clinics as $clinic)
                                <option value="{{ $clinic->id }}">{{ $clinic->name }}</option>
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
                                    <h5>Description</h5>
                                </div>
                                <div class="card-body">
                                    <textarea wire:model="description" id="blog-content-editor" name="blog-content" cols="50" rows="4">{{ $description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <x-button class="btn-primary">Update Service</x-button>
                </div>
            </form>
        </div>
    </div>
</div>
