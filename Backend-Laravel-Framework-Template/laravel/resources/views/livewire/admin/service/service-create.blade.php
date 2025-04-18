<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between py-3">
            <h5>Create new service</h5>
            <a class="btn btn-lg btn-info" href="{{ route('service.index') }}">
                Back
            </a>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="save">
                @csrf
                @if (session()->has('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Notice!</strong> {{ session('status') }}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Đóng"></button>
                    </div>
                @endif
                <div class="mb-5">
                    <x-label for="name" value="Name" />
                    <x-input wire:model='name' type="text" class="mb-3" id="name" placeholder="Name..." required />
                    <x-input-error for="name" />

                    <div wire:ignore class="image-file mt-3 mb-3">
                        <x-label class="form-label d-flex align-items-center" value="Main Image" />
                        <input
                            type="file"
                            id="thumbnail"
                            class="d-none"
                            accept="image/*">
                        <x-input-error for="thumbnail" />
                        <label class="btn btn-outline-secondary" for="thumbnail">
                            <i class="ti ti-upload me-2"></i> Click to Upload
                        </label>
                        <div class="image-preview mt-3">
                            <img id="thumbnailPreview" class="img-fluid rounded shadow-sm d-block category-image-preview"/>
                        </div>

                        <input wire:model='thumbnail' type="hidden" name="thumbnail" id="thumbnail_url" />
                    </div>

                    <x-label for="duration" value="Duration" />
                    <x-input wire:model='duration' type="number" class="mb-3" id="duration" placeholder="Duration..." required />
                    <x-input-error for="duration" />

                    <x-label for="price" value="Price" />
                    <x-input wire:model='price' type="number" class="mb-3" id="price" placeholder="Price..." required />
                    <x-input-error for="price" />

                    {{-- Upload Images with Uppy --}}
                    <div wire:ignore class="mb-3">
                        <x-label class="form-label d-flex align-items-center" value="Service Images" />
                        <label class="btn btn-outline-secondary" id="uppyModalOpener"><i class="ti ti-upload me-2"></i> Click to upload image</label>
                        <div id="uppyArea"></div>
                        <x-input-error for="images" />

                        {{-- Khu vực hiển thị ảnh đã tải lên --}}
                        <div id="uploadedImagePreviews" class="mt-3 d-flex flex-wrap">

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
                              <h5>Content</h5>
                            </div>
                            <div class="card-body">
                                <textarea wire:model="description" id="blog-content-editor" name="blog-content" cols="50" rows="4"></textarea>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <x-button class="btn-primary">Create Service</x-button>
                </div>
            </form>
        </div>
    </div>
</div>
