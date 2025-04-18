<x-app-layout>
    <x-slot name="pageHeader">
        Blog Category Management
    </x-slot>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Create New Blog Category</h5>
                <a class="btn btn-lg btn-info" href="{{ route('blogcategory.index') }}">
                    Back
                </a>
            </div>
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('blogcategory.create') }}">
                    @csrf
                    <div class="mb-5">
                        <x-label for="name" value="Name" />
                        <x-input name='name' type="text" class="mb-3" id="name" placeholder="Name..." required />
                        <x-input-error for="name" />
                    </div>

                    <div class="mb-5">
                        <x-label for="description" value="Description" />
                        <x-input name='description' type="text" class="mb-3" id="description" placeholder="Description..." required />
                        <x-input-error for="description" />
                    </div>

                    <div class="mb-3">
                        <x-button class="btn-primary">Create</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
