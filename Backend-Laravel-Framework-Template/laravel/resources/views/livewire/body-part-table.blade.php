<div class="table-responsive">
    <div class="mb-3">
        <x-input type="text" id="search" name="search" wire:model.live="search" placeholder="Search..." />
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
            @foreach($bodyparts as $bodypart)
            <tr>
                <td class="align-middle"><img class="rounded-circle img-fluid wid-60 img-thumbnail" src="@if(isset($bodypart->image_url)){{ asset('storage/BodyPart/'.$bodypart->image_url) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="chillnfree"></td>
                <td class="align-middle">{{ $bodypart->name }}</td>
                <td class="align-middle">
                    <div class="d-flex align-items-center">
                        {{-- @can('bodypart-list') --}}
                        <div class="p-1 text-center">
                            <a class="btn btn-sm btn-warning wid-50" href="{{ route('bodypart.show', $bodypart->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                <i class="fas fa-file-alt"></i>
                            </a>
                        </div>
                        {{-- @endcan --}}
                        {{-- @can('bodypart-edit') --}}
                        <div class="p-1 text-center">
                            <a class="btn btn-sm btn-info wid-50" href="{{ route('bodypart.edit', $bodypart->id) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                        {{-- @endcan --}}
                        {{-- @can('bodypart-delete') --}}
                        <div class="p-1 text-center">
                            <form method="POST" action="{{ route('bodypart.destroy', $bodypart->id) }}">
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
    {!! $bodyparts->onEachSide(2)->links() !!}
</div>
