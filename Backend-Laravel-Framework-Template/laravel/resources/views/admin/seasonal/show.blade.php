<x-app-layout>
    <x-slot name="pageHeader">
        Seasonal Management
    </x-slot>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="text-center mt-3">
                    <div class="chat-avtar d-inline-flex mx-auto">
                        <img class="rounded-circle img-fluid wid-90 img-thumbnail"
                             src="{{ isset($seasonal->image_url) ? asset('storage/Seasonal/'.$seasonal->image_url) : asset('assets/images/user/avatar-1.jpg') }}"
                             alt="{{ $seasonal->name }}">
                    </div>
                    <h5 class="mb-0">{{ $seasonal->name }}</h5>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h5>Seasonal ID: {{ $seasonal->id }}</h5>
                <a class="btn btn-lg btn-info" href="{{ route('seasonal.index') }}">
                    Back
                </a>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <x-label for="name" value="Name" />
                    <x-input type="text" id="name" name="name" value="{{ $seasonal->name }}" readonly />
                    <x-input class="mt-3" type="text" id="description" name="description" value="{{ $seasonal->description }}" readonly />
                </div>

                <div class="d-flex gap-3 mt-3">
                    <div>
                        <x-label for="start_at" value="Start At" />
                        <x-input name="start_at" value="{{ date('d/m/Y', strtotime($seasonal->start_at)) }}" type="text" class="mb-3" id="start_at" readonly />
                        <x-input-error for="start_at" />
                    </div>

                    <div>
                        <x-label for="end_at" value="End At" />
                        <x-input name="end_at" value="{{ date('d/m/Y', strtotime($seasonal->end_at)) }}" type="text" class="mb-3" id="end_at" readonly />
                        <x-input-error for="end_at" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
