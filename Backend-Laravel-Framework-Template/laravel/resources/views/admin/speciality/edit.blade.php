<x-app-layout>
    <x-slot name="pageHeader">
        Speciality Management
    </x-slot>

    <div class="col-sm-12">
        <div class="card mt-3">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Update speciality ID: {{ $speciality->id }}</h5>
                <a class="btn btn-lg btn-info" href="{{ route('speciality.index') }}">
                    Back
                </a>
            </div>
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('speciality.edit', $speciality->id) }}">
                    @csrf
                    <div class="mb-3">
                        <x-label for="name" value="Name" />
                        <x-input value="{{ $speciality->name }}" type="text" id="name" name="name" />
                        <x-input-error for="name" />

                        <div class="image-file mt-3 mb-3">
                            <x-label class="form-label d-flex align-items-center" value="Image" />
                            <input type="file" id="main_image" class="d-none" accept="image/*">
                            <x-input-error for="image" />
                            <label class="btn btn-outline-secondary" for="main_image">
                                <i class="ti ti-upload me-2"></i> Click to Upload
                            </label>
                            <div class="image-preview mt-3">
                                <img id="imagePreview" class="img-fluid rounded shadow-sm d-block category-image-preview"/>
                            </div>
                        </div>

                        <div class="image-file mb-3">
                            <x-label class="form-label d-flex align-items-center" value="Sub Image" />
                            <input type="file" id="sub_image_url" class="d-none" accept="image/*">
                            <x-input-error for="sub_image_url" />
                            <label class="btn btn-outline-secondary" for="sub_image_url">
                                <i class="ti ti-upload me-2"></i> Click to Upload
                            </label>
                            <div class="sub-image-preview mt-3">
                                <img id="subImagePreview" class="img-fluid rounded shadow-sm d-block category-image-preview"/>
                            </div>
                        </div>

                        <div class="mb-3">
                            <x-label class="col-sm-3 col-form-label form-label-title" value="Description" />
                            <textarea wire:model="description"
                                class="form-control"
                                name="description"
                                placeholder="Description...">{{ $speciality->description }}</textarea>
                    </div>

                    <input type="hidden" value="{{ $speciality->image_url }}" name="image_url" id="image_url" />
                    <input type="hidden" value="{{ $speciality->sub_image_url }}" name="sub_image_url" id="hidden_sub_image_url" />

                    <div class="mb-3">
                        <x-button class="btn-primary" type="submit">Update</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
