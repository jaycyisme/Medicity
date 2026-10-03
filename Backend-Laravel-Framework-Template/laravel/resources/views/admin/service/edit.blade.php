<x-app-layout>
    <x-slot name="pageHeader">
        Service Management
    </x-slot>

    @livewire('admin.service.service-update', ['serviceId' => $id])

</x-app-layout>
