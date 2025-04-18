<x-app-layout>
    <x-slot name="pageHeader">
        Category Management
    </x-slot>

    <div class="col-sm-12">
        <div class="card mt-3">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Update Category ID: {{ $category->id }}</h5>
                <a class="btn btn-lg btn-info" href="{{ route('category.index') }}">
                    Back
                </a>
            </div>
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('category.edit', $category->id) }}">
                    @csrf
                    <div class="mb-3">
                        <x-label for="name" value="Name" />
                        <x-input value="{{ $category->name }}" type="text" id="name" name="name" />
                        <x-input-error for="name" />

                        <div class="image-file mb-3">
                            <x-label class="form-label d-flex align-items-center" value="Thumbnail" />
                            <input type="file" id="main_image" class="d-none" accept="image/*">
                            <x-input-error for="image" />
                            <label class="btn btn-outline-secondary" for="main_image">
                                <i class="ti ti-upload me-2"></i> Click to Upload
                            </label>
                            <div class="image-preview mt-3">
                                <img id="imagePreview" src="{{ isset($category->image_url) ? asset('storage/Category/' . $category->image_url) : asset('assets/images/user/avatar-1.jpg') }}"  class="img-fluid rounded shadow-sm d-block category-image-preview"/>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" value="{{ $category->image_url }}" name="image_url" id="image_url" />

                    <div class="mb-3">
                        <x-button class="btn-primary" type="submit">Update</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
