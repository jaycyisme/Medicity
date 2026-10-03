<x-app-layout>
    <x-slot name="pageHeader">
        Appointment Management
    </x-slot>

    @livewire('admin.appointment.appointment-edit', ['appointmentId' => $id])

</x-app-layout>
