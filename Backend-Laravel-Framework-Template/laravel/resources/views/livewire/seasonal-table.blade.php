<div class="table-responsive">
    <div class="mb-3">
        <x-input type="text" id="search" name="search" wire:model.live="search" placeholder="Search..." />
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Start At</th>
                <th>End At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($seasonals as $seasonal)
            <tr>
                <td class="align-middle"><img class="rounded-circle img-fluid wid-60 img-thumbnail" src="@if(isset($seasonal->image_url)){{ asset('storage/Seasonal/'.$seasonal->image_url) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="chillnfree"></td>
                <td class="align-middle">{{ $seasonal->name }}</td>
                <td class="align-middle">{{ $seasonal->start_at }}</td>
                <td class="align-middle">{{ $seasonal->end_at }}</td>
                <td class="align-middle">
                    <div class="d-flex align-items-center">
                        {{-- @can('seasonal-list') --}}
                        <div class="p-1 text-center">
                            <a class="btn btn-sm btn-warning wid-50" href="{{ route('seasonal.show', $seasonal->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                <i class="fas fa-file-alt"></i>
                            </a>
                        </div>
                        {{-- @endcan --}}
                        {{-- @can('seasonal-edit') --}}
                        <div class="p-1 text-center">
                            <a class="btn btn-sm btn-info wid-50" href="{{ route('seasonal.edit', $seasonal->id) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                        {{-- @endcan --}}
                        {{-- @can('seasonal-delete') --}}
                        <div class="p-1 text-center">
                            <form method="POST" action="{{ route('seasonal.destroy', $seasonal->id) }}">
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
    {!! $seasonals->onEachSide(2)->links() !!}
</div>
