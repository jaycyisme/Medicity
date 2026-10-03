<x-app-layout>
    <x-slot name="pageHeader">
        Blog Category Management
    </x-slot>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="text-center mt-3">
                    <h5 class="mb-0">{{ $blog_category->name }}</h5>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h5>Blog Category ID: {{ $blog_category->id }}</h5>
                <a class="btn btn-lg btn-info" href="{{ route('blogcategory.index') }}">
                    Back
                </a>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <x-label for="name" value="Name" />
                    <x-input type="text" id="name" name="name" value="{{ $blog_category->name }}" readonly />
                </div>
                <div class="mb-3">
                    <x-label for="description" value="Description" />
                    <x-input type="text" id="description" price="description" value="{{ $blog_category->description }}" readonly />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
