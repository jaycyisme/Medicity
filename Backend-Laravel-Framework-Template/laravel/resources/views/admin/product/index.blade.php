<x-app-layout>
    <x-slot name="pageHeader">
        Product Management
    </x-slot>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>List</h5>
                {{-- @can('product-create') --}}
                <div class="dropdown">
                    <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons-two-tone f-18">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('product.create') }}">Create</a>
                    </div>
                </div>
                {{-- @endcan --}}
            </div>
            <div class="card-body table-border-style">
                @livewire('product-table')
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Review</h5>
            </div>
            <div class="card-body table-border-style">
                @livewire('admin.product.review')
            </div>
        </div>
    </div>
</x-app-layout>
