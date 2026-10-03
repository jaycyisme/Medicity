<x-app-layout>
    <x-slot name="pageHeader">
        Body Part Management
    </x-slot>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="text-center mt-3">
                    <div class="chat-avtar d-inline-flex mx-auto">
                        <img class="rounded-circle img-fluid wid-90 img-thumbnail"
                             src="{{ isset($bodypart->image_url) ? asset('storage/BodyPart/'.$bodypart->image_url) : asset('assets/images/user/avatar-1.jpg') }}"
                             alt="{{ $bodypart->name }}">
                    </div>
                    <h5 class="mb-0">{{ $bodypart->name }}</h5>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h5>Body Part ID: {{ $bodypart->id }}</h5>
                <a class="btn btn-lg btn-info" href="{{ route('bodypart.index') }}">
                    Back
                </a>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <x-label for="name" value="Name" />
                    <x-input type="text" id="name" name="name" value="{{ $bodypart->name }}" readonly />
                    <x-input class="mt-3" type="text" id="description" name="description" value="{{ $bodypart->description }}" readonly />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
