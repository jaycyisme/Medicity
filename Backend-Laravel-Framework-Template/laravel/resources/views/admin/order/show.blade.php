<x-app-layout>
    <x-slot name="pageHeader">
        Quản lý hóa đơn
    </x-slot>

    @livewire('admin.order.order-show', ['id' => $id])
</x-app-layout>

