<x-app-layout>
    <x-slot name="pageHeader">
        Clinic Management
    </x-slot>

    @livewire('admin.clinic.clinic-update', ['clinicId' => $id])

</x-app-layout>
