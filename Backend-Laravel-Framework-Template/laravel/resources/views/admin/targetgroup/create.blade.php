<x-app-layout>
    <x-slot name="pageHeader">
        Target Group Management
    </x-slot>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Create New Target Group</h5>
                <a class="btn btn-lg btn-info" href="{{ route('targetgroup.index') }}">
                    Back
                </a>
            </div>
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('targetgroup.create') }}">
                    @csrf
                    <div class="mb-5">
                        <x-label for="name" value="Name" />
                        <x-input name='name' type="text" class="mb-3" id="name" placeholder="Name..." required />
                        <x-input-error for="name" />

                        <div class="image-file mb-3">
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

                        <x-label for="description" value="Description" />
                        <x-input name='description' type="text" class="mb-3" id="description" placeholder="Description..." />
                        <x-input-error for="description" />
                    </div>

                    <input type="hidden" name="image_url" id="image_url" />

                    <div class="mb-3">
                        <x-button class="btn-primary">Create</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
