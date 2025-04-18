<div class="table-responsive">
    <div class="mb-3">
        <x-input type="text" id="search" name="search" wire:model.live="search" placeholder="Search..." />
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th class="text-center">Accepted</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prescriptions as $prescription)
            <tr>
                <td class="align-middle">{{ $prescription->customer_name }}</td>
                <td class="align-middle">{{ $prescription->phone }}</td>
                <td class="align-middle text-center">
                    <input type="checkbox" wire:click="toggleAccept({{ $prescription->id }})" {{ $prescription->is_accept ? 'checked' : '' }}>
                </td>
                <td class="align-middle">
                    <div class="d-flex align-items-center">
                        {{-- @can('prescription-list') --}}
                            <div class="p-1 text-center">
                                <a class="btn btn-sm btn-warning wid-50" href="{{ route('prescription.show', $prescription->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                    <i class="fas fa-file-alt"></i>
                                </a>
                            </div>
                        {{-- @endcan --}}
                        {{-- @can('prescription-delete') --}}
                        <div class="p-1 text-center">
                            <form method="POST" action="{{ route('prescription.destroy', $prescription->id) }}">
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
    {!! $prescriptions->onEachSide(2)->links() !!}
</div>
