<x-app-layout>
    <x-slot name="pageHeader">
        Target Group Management
    </x-slot>

    <div class="col-sm-12">
        <div class="card mt-3">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Update Target Group ID: {{ $targetgroup->id }}</h5>
                <a class="btn btn-lg btn-info" href="{{ route('targetgroup.index') }}">
                    Back
                </a>
            </div>
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('targetgroup.edit', $targetgroup->id) }}">
                    @csrf
                    <div class="mb-3">
                        <x-label for="name" value="Name" />
                        <x-input value="{{ $targetgroup->name }}" type="text" id="name" name="name" />
                        <x-input-error for="name" />

                        <div class="image-file mb-3">
                            <x-label class="form-label d-flex align-items-center" value="Image" />
                            <input type="file" id="main_image" class="d-none" accept="image/*">
                            <x-input-error for="image" />
                            <label class="btn btn-outline-secondary" for="main_image">
                                <i class="ti ti-upload me-2"></i> Click to Upload
                            </label>
                            <div class="image-preview mt-3">
                                <img id="imagePreview" src="{{ isset($targetgroup->image_url) ? asset('storage/TargetGroup/' . $targetgroup->image_url) : asset('assets/images/user/avatar-1.jpg') }}"  class="img-fluid rounded shadow-sm d-block category-image-preview" style="width: 30%;"/>
                            </div>
                        </div>

                        <x-label for="description" value="Description" />
                        <x-input value="{{ $targetgroup->description }}" type="text" id="description" name="description" />
                        <x-input-error for="description" />
                    </div>

                    <input type="hidden" value="{{ $targetgroup->image_url }}" name="image_url" id="image_url" />

                    <div class="mb-3">
                        <x-button class="btn-primary" type="submit">Update</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
