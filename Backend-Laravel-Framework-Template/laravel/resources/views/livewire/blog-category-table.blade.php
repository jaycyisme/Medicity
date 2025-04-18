<div class="table-responsive">
    <div class="mb-3">
        <x-input type="text" id="search" name="search" wire:model.live="search" placeholder="Tìm kiếm..." />
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td class="align-middle">{{ $category->name }}</td>
                <td class="align-middle">
                    <div class="d-flex align-items-center">
                        {{-- @can('blogcategory-list') --}}
                        <div class="p-1 text-center">
                            <a class="btn btn-sm btn-warning wid-50" href="{{ route('blogcategory.show', $category->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                <i class="fas fa-file-alt"></i>
                            </a>
                        </div>
                        {{-- @endcan --}}
                        {{-- @can('blogcategory-edit') --}}
                        <div class="p-1 text-center">
                            <a class="btn btn-sm btn-info wid-50" href="{{ route('blogcategory.edit', $category->id) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                        {{-- @endcan --}}
                        {{-- @can('blogcategory-delete') --}}
                        <div class="p-1 text-center">
                            <form method="POST" action="{{ route('blogcategory.destroy', $category->id) }}">
                                @csrf
                                <button class="btn btn-sm btn-danger wid-50" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        </div>
                        {{-- @endcan --}}
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-end mb-3">
        <button class="btn btn-sm btn-danger"
            data-bs-toggle="modal" data-bs-target="#trash">
            <i class="ph-duotone ph-duotone ph-trash"></i>
        </button>
    </div>

    <div class="modal fade" id="trash" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <div class="collapse multi-collapse show">
                        <h5 class="mb-0">Blog Category</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal"
                            data-bs-toggle="tooltip" title="Close">
                            <i class="ti ti-x f-20"></i>
                        </a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="collapse multi-collapse show">
                        <div class="address-check-block">

                            @foreach ($categories_deleted as $category)
                                <div class="address-check border rounded p-3 d-flex justify-content-between">
                                    <div class="form-check">
                                        <label class="form-check-label d-block" for="address-check-1">
                                            <span class="h6 mb-0 d-block">{{ $category->name }}</span>
                                        </label>
                                    </div>

                                    <div class="action">
                                        <button wire:click.prevent='restore({{ $category->id }})' class="btn btn-sm btn-info">
                                            <i class="ph-duotone ph-rewind"></i>
                                        </button>
                                        <button wire:click.prevent='forceDelete({{ $category->id }})' class="btn btn-sm btn-danger">
                                            <i class="ph-duotone ph-trash-simple"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between collapse multi-collapse show">
                    <div class="flex-grow-1 text-end">
                        <button type="button" class="btn btn-link-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! $categories->onEachSide(2)->links() !!}
</div>
