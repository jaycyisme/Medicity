<div class="table-responsive">
    <div class="mb-3">
        <x-input type="text" id="search" name="search" wire:model.live="search" placeholder="Tìm kiếm..." />
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($brands as $brand)
            <tr>
                <td class="align-middle"><img class="rounded-circle img-fluid wid-60 img-thumbnail" src="@if(isset($brand->image_url)){{ asset('storage/Brand/'.$brand->image_url) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="chillnfree"></td>
                <td class="align-middle">{{ $brand->name }}</td>
                <td class="align-middle">
                    <div class="d-flex align-items-center">
                        {{-- @can('brand-list') --}}
                        <div class="p-1 text-center">
                            <a class="btn btn-sm btn-warning wid-50" href="{{ route('brand.show', $brand->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                <i class="fas fa-file-alt"></i>
                            </a>
                        </div>
                        {{-- @endcan --}}
                        {{-- @can('brand-edit') --}}
                        <div class="p-1 text-center">
                            <a class="btn btn-sm btn-info wid-50" href="{{ route('brand.edit', $brand->id) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                        {{-- @endcan --}}
                        {{-- @can('brand-delete') --}}
                        <div class="p-1 text-center">
                            <form method="POST" action="{{ route('brand.destroy', $brand->id) }}">
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
                        <h5 class="mb-0">Brand</h5>
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

                            @foreach ($brands_deleted as $brand)
                                <div class="address-check border rounded p-3 d-flex justify-content-between">
                                    <div class="form-check">
                                        <label class="form-check-label d-block" for="address-check-1">
                                            <div class="chat-avtar d-inline-flex mx-auto">
                                                <img class="rounded-circle img-fluid wid-90 img-thumbnail"
                                                    src="@if (isset($brand->image_url)) {{ asset('storage/Brand/' . $brand->image_url) }}@else{{ asset('assets/images/user/avatar-1.jpg') }} @endif"
                                                    alt="chillnfree">
                                            </div>
                                            <span class="h6 mb-0 d-block">{{ $brand->name }}</span>
                                        </label>
                                    </div>

                                    <div class="action">
                                        <button wire:click.prevent='restore({{ $brand->id }})' class="btn btn-sm btn-info">
                                            <i class="ph-duotone ph-rewind"></i>
                                        </button>
                                        <button wire:click.prevent='forceDelete({{ $brand->id }})' class="btn btn-sm btn-danger">
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
    {!! $brands->onEachSide(2)->links() !!}
</div>
