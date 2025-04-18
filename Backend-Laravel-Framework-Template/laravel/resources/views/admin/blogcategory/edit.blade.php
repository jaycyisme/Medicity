<x-app-layout>
    <x-slot name="pageHeader">
        Blog Category Management
    </x-slot>

    <div class="col-sm-12">
        <div class="card mt-3">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Update Blog Category ID: {{ $blog_category->id }}</h5>
                <a class="btn btn-lg btn-info" href="{{ route('blogcategory.index') }}">
                    Back
                </a>
            </div>
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('blogcategory.edit', $blog_category->id) }}">
                    @csrf
                    <div class="mb-3">
                        <x-label for="name" value="Name" />
                        <x-input value="{{ $blog_category->name }}" type="text" id="name" name="name" />
                        <x-input-error for="name" />

                        <x-label for="description" value="Description" />
                        <x-input value="{{ $blog_category->description }}" type="text" id="description" name="description" />
                        <x-input-error for="description" />
                    </div>

                    <div class="mb-3">
                        <x-button class="btn-primary" type="submit">Update</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
