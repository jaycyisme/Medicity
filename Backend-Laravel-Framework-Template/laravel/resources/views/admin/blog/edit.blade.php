<x-app-layout>
    <x-slot name="pageHeader">
        Blog Management
    </x-slot>

    @livewire('admin.blog.blog-update', ['blogId' => $id])

</x-app-layout>
