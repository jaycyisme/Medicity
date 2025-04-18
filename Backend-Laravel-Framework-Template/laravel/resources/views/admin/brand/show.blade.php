<x-app-layout>
    <x-slot name="pageHeader">
        Brand Management
    </x-slot>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="text-center mt-3">
                    <div class="chat-avtar d-inline-flex mx-auto">
                        <img class="rounded-circle img-fluid wid-90 img-thumbnail"
                             src="{{ isset($brand->image_url) ? asset('storage/Brand/'.$brand->image_url) : asset('assets/images/user/avatar-1.jpg') }}"
                             alt="{{ $brand->name }}">
                    </div>
                    <h5 class="mb-0">{{ $brand->name }}</h5>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h5>Brand ID: {{ $brand->id }}</h5>
                <a class="btn btn-lg btn-info" href="{{ route('brand.index') }}">
                    Back
                </a>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <x-label for="name" value="Name" />
                    <x-input type="text" id="name" name="name" value="{{ $brand->name }}" readonly />
                </div>
                <div class="mb-3 table-border-style">
                    <div class="table-responsive">
                        <x-label for="permission" value="Product" />
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">Product Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td class="align-middle">{{ $product->name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
