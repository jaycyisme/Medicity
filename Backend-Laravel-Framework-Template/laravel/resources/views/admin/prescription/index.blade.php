<x-app-layout>
    <x-slot name="pageHeader">
        Prescription Management
    </x-slot>

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>List</h5>
            </div>
            <div class="card-body table-border-style">
                @livewire('prescription-table')
            </div>
        </div>
    </div>
</x-app-layout>
