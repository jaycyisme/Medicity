<x-app-layout>
    <x-slot name="pageHeader">
        Quản lý hóa đơn sản phẩm
    </x-slot>

    @livewire('admin.order.order-update', ['id' => $id])

</x-app-layout>
