<x-app-layout>
    <x-slot name="pageHeader">
        Laboratory Test Management
    </x-slot>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="text-center mt-3">
                    {{-- <div class="chat-avtar d-inline-flex mx-auto">
                        <img class="rounded-circle img-fluid wid-90 img-thumbnail"
                             src="{{ isset($category->image_url) ? asset('storage/Category/'.$category->image_url) : asset('assets/images/user/avatar-1.jpg') }}"
                             alt="{{ $category->name }}">
                    </div> --}}
                    <h5 class="mb-0">{{ $laboratory_test->name }}</h5>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h5>Laboratory Test ID: {{ $laboratory_test->id }}</h5>
                <a class="btn btn-lg btn-info" href="{{ route('laboratory-test.index') }}">
                    Back
                </a>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <x-label for="name" value="Name" />
                    <x-input type="text" id="name" name="name" value="{{ $laboratory_test->name }}" readonly />
                </div>
                <div class="mb-3">
                    <x-label for="price" value="Price" />
                    <x-input type="text" id="price" price="price" value="{{ $laboratory_test->price }}" readonly />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
