<x-app-layout>
    <x-slot name="pageHeader">
        Speciality Management
    </x-slot>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="text-center mt-3">
                    <div class="chat-avtar d-inline-flex mx-auto">
                        <img class="rounded-circle img-fluid wid-90 img-thumbnail"
                             src="{{ isset($speciality->image_url) ? asset('storage/Speciality/'.$speciality->image_url) : asset('assets/images/user/avatar-1.jpg') }}"
                             alt="{{ $speciality->name }}">
                    </div>
                    <h5 class="mb-0">{{ $speciality->name }}</h5>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h5>Danh mục ID: {{ $speciality->id }}</h5>
                <a class="btn btn-lg btn-info" href="{{ route('speciality.index') }}">
                    Quay lại
                </a>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <x-label for="name" value="Tên hiển thị" />
                    <x-input type="text" id="name" name="name" value="{{ $speciality->name }}" readonly />
                </div>

                <div class="image-file mb-3">
                    <div class="sub-image-preview mt-3">
                        <img src="{{ isset($speciality->sub_image_url) ? asset('storage/Speciality/'.$speciality->sub_image_url) : asset('assets/images/user/avatar-1.jpg') }}"
                            id="subImagePreview" class="img-fluid rounded shadow-sm d-block category-image-preview" style="width: 30%;"/>
                    </div>
                </div>

                <div class="mb-3">
                    <x-label class="col-sm-3 col-form-label form-label-title" value="Description" />
                    <textarea wire:model="description"
                        class="form-control"
                        name="description"
                        placeholder="Description..." readonly>{{ $speciality->description }}</textarea>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
