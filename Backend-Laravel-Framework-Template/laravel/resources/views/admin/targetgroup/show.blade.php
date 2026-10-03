<x-app-layout>
    <x-slot name="pageHeader">
        Target Group Management
    </x-slot>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="text-center mt-3">
                    <div class="chat-avtar d-inline-flex mx-auto">
                        <img class="rounded-circle img-fluid wid-90 img-thumbnail"
                             src="{{ isset($targetgroup->image_url) ? asset('storage/TargetGroup/'.$targetgroup->image_url) : asset('assets/images/user/avatar-1.jpg') }}"
                             alt="{{ $targetgroup->name }}">
                    </div>
                    <h5 class="mb-0">{{ $targetgroup->name }}</h5>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h5>Target Group ID: {{ $targetgroup->id }}</h5>
                <a class="btn btn-lg btn-info" href="{{ route('targetgroup.index') }}">
                    Back
                </a>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <x-label for="name" value="Name" />
                    <x-input type="text" id="name" name="name" value="{{ $targetgroup->name }}" readonly />
                    <x-input class="mt-3" type="text" id="description" name="description" value="{{ $targetgroup->description }}" readonly />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
