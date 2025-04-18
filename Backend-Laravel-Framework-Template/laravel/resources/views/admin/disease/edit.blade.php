<x-app-layout>
    <x-slot name="pageHeader">
        Disease Management
    </x-slot>

    @livewire('admin.disease.disease-update', ['diseaseId' => $id])

</x-app-layout>
