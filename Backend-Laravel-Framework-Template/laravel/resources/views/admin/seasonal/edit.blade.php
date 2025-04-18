<x-app-layout>
    <x-slot name="pageHeader">
        Seasonal Management
    </x-slot>

    <div class="col-sm-12">
        <div class="card mt-3">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Update Seasonal ID: {{ $seasonal->id }}</h5>
                <a class="btn btn-lg btn-info" href="{{ route('seasonal.index') }}">
                    Back
                </a>
            </div>
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('seasonal.edit', $seasonal->id) }}">
                    @csrf
                    <div class="mb-3">
                        <x-label for="name" value="Name" />
                        <x-input value="{{ $seasonal->name }}" type="text" id="name" name="name" />
                        <x-input-error for="name" />

                        <div class="image-file mb-3">
                            <x-label class="form-label d-flex align-items-center" value="Image" />
                            <input type="file" id="main_image" class="d-none" accept="image/*">
                            <x-input-error for="image" />
                            <label class="btn btn-outline-secondary" for="main_image">
                                <i class="ti ti-upload me-2"></i> Click to Upload
                            </label>
                            <div class="image-preview mt-3">
                                <img id="imagePreview" src="{{ isset($seasonal->image_url) ? asset('storage/Seasonal/' . $seasonal->image_url) : asset('assets/images/user/avatar-1.jpg') }}"  class="img-fluid rounded shadow-sm d-block category-image-preview" style="width: 30%;"/>
                            </div>
                        </div>

                        <x-label for="description" value="Description" />
                        <x-input value="{{ $seasonal->description }}" type="text" id="description" name="description" />
                        <x-input-error for="description" />
                        <div class="d-flex gap-3 mt-3">
                            <div>
                                <x-label for="start_at" value="Start At" />
                                <x-input name="start_at" value="{{ $seasonal->start_at }}" type="date" class="mb-3" id="start_at" required />
                                <x-input-error for="start_at" />
                            </div>

                            <div>
                                <x-label for="end_at" value="End At" />
                                <x-input name="end_at" value="{{ $seasonal->end_at }}" type="date" class="mb-3" id="end_at" required />
                                <x-input-error for="end_at" />
                            </div>
                        </div>
                    </div>

                    <input type="hidden" value="{{ $seasonal->image_url }}" name="image_url" id="image_url" />

                    <div class="mb-3">
                        <x-button class="btn-primary" type="submit">Update</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
