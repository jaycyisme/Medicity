<div class="table-responsive">
    <div class="mb-3">
        <x-input type="text" id="search" name="search" wire:model.live="search" placeholder="Search..." />
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th></th>
                <th width="30%">Name</th>
                <th width="30%">Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr wire:key="{{ $user->id }}">
                <td class="align-middle text-center"><img class="rounded-circle img-fluid wid-60 img-thumbnail" src="@if(isset($user->profile_photo_path)){{ asset('storage/'.$user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="{{ $user->name }}" /></td>
                <td class="align-middle">{{ $user->name }}</td>
                <td class="align-middle">{{ $user->email }}</td>
                <td class="align-middle text-center"><span class="badge text-bg-primary">{{ $user->roles->pluck('name')[0] ?? 'Thành viên' }}</span></td>
                <td class="align-middle">
                    <div class="d-flex align-items-center">
                        @can('users-list')
                        <div class="p-1 text-center">
                            <a class="btn btn-sm btn-warning wid-50" href="{{ route('users.show', $user->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                <i class="fas fa-file-alt"></i>
                            </a>
                        </div>
                        @endcan
                        @can('users-edit')
                        <div class="p-1 text-center">
                            <a class="btn btn-sm btn-info wid-50" href="{{ route('users.edit', $user->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Sửa">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                        @endcan
                        @can('users-delete')
                        <div class="p-1 text-center">
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                @csrf
                                <button class="btn btn-sm btn-danger wid-50" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        </div>
                        @endcan
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
                        <h5 class="mb-0">User</h5>
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

                            @foreach ($users_deleted as $user)
                                <div class="address-check border rounded p-3 d-flex justify-content-between">
                                    <div class="form-check">
                                        <label class="form-check-label d-block" for="address-check-1">
                                            <div class="chat-avtar d-inline-flex mx-auto">
                                                <img class="rounded-circle img-fluid wid-90 img-thumbnail"
                                                    src="@if (isset($user->profile_photo_path)) {{ asset('storage/'.$user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }} @endif"
                                                    alt="chillnfree">
                                            </div>
                                            <span class="h6 mb-0 d-block">{{ $user->name }}</span>
                                        </label>
                                    </div>

                                    <div class="action">
                                        <button wire:click.prevent='restore({{ $user->id }})' class="btn btn-sm btn-info">
                                            <i class="ph-duotone ph-rewind"></i>
                                        </button>
                                        <button wire:click.prevent='forceDelete({{ $user->id }})' class="btn btn-sm btn-danger">
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
    {!! $users->onEachSide(2)->links() !!}
</div>
