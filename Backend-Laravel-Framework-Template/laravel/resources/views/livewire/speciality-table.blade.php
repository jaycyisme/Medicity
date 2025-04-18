<div class="table-responsive">
    <div class="mb-3">
        <x-input type="text" id="search" name="search" wire:model.live="search" placeholder="Search..." />
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($specialities as $speciality)
            <tr>
                <td class="align-middle"><img class="rounded-circle img-fluid wid-60 img-thumbnail" src="@if(isset($speciality->image_url)){{ asset('storage/Speciality/'.$speciality->image_url) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="medicity"></td>
                <td class="align-middle">{{ $speciality->name }}</td>
                <td class="align-middle">
                    <div class="d-flex align-items-center">
                        {{-- @can('speciality-list') --}}
                        <div class="p-1 text-center">
                            <a class="btn btn-sm btn-warning wid-50" href="{{ route('speciality.show', $speciality->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                <i class="fas fa-file-alt"></i>
                            </a>
                        </div>
                        {{-- @endcan --}}
                        {{-- @can('speciality-edit') --}}
                        <div class="p-1 text-center">
                            <a class="btn btn-sm btn-info wid-50" href="{{ route('speciality.edit', $speciality->id) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                        {{-- @endcan --}}
                        {{-- @can('speciality-delete') --}}
                        <div class="p-1 text-center">
                            <form method="POST" action="{{ route('speciality.destroy', $speciality->id) }}">
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
                        <h5 class="mb-0">Speciality</h5>
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

                            @foreach ($specialities_deleted as $speciality)
                                <div class="address-check border rounded p-3 d-flex justify-content-between">
                                    <div class="form-check">
                                        <label class="form-check-label d-block" for="address-check-1">
                                            <div class="chat-avtar d-inline-flex mx-auto">
                                                <img class="rounded-circle img-fluid wid-90 img-thumbnail"
                                                    src="@if (isset($speciality->image_url)) {{ asset('storage/Speciality/' . $speciality->image_url) }}@else{{ asset('assets/images/user/avatar-1.jpg') }} @endif"
                                                    alt="chillnfree">
                                            </div>
                                            <span class="h6 mb-0 d-block">{{ $speciality->name }}</span>
                                        </label>
                                    </div>

                                    <div class="action">
                                        <button wire:click.prevent='restore({{ $speciality->id }})' class="btn btn-sm btn-info">
                                            <i class="ph-duotone ph-rewind"></i>
                                        </button>
                                        <button wire:click.prevent='forceDelete({{ $speciality->id }})' class="btn btn-sm btn-danger">
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
    {!! $specialities->onEachSide(2)->links() !!}
</div>
