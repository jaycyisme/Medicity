<x-app-layout>
    <x-slot name="pageHeader">
        Product Management
    </x-slot>

    @livewire('admin.product.product-update', ['id' => $id])

</x-app-layout>
