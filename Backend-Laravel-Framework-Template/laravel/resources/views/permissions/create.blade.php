<x-app-layout>
    <x-slot name="pageHeader">
        Permission Management
    </x-slot>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Create new permission</h5>
                <a class="btn btn-lg btn-info" href="{{ route('permissions.index') }}">
                    Back
                </a>
            </div>
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('permissions.create') }}">
                    @csrf
                    <div class="row mb-3">
                        <x-label for="name" value="Permission name" />
                        <x-input type="text" id="name" name="name" placeholder="Permission name..." />
                        <x-input-error for="name" />
                    </div>

                    <div class="row mb-3">
                        <x-button class="btn-primary">Create</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
