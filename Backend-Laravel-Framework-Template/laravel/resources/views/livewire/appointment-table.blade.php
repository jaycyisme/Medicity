<div class="table-responsive">
    <div class="mb-3">
        <x-input type="text" id="search" name="search" wire:model.live="search" placeholder="Search..." />
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Doctor Name</th>
                <th>Patient Name</th>
                <th>Appointment Code</th>
                <th>Service</th>
                <th>Business Hour</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            @php
                // Giải mã JSON, đảm bảo dữ liệu hợp lệ
                $businessHour = json_decode($appointment->business_hour, true);

                // Kiểm tra nếu JSON chưa decode đúng do bị encode hai lần
                if (!is_array($businessHour)) {
                    $businessHour = json_decode(json_decode($appointment->business_hour), true);
                }

                // Lấy giá trị ngày và giờ từ dữ liệu đã decode
                $date = $businessHour['date'] ?? null;
                $time = $businessHour['time'] ?? null;

                if (!$date || !$time) {
                    $formattedDateTime = 'Not Set';
                } else {
                    try {
                        $formattedDateTime = \Carbon\Carbon::parse($date)->format('d M, Y') . " at " . $time;
                    } catch (\Exception $e) {
                        $formattedDateTime = 'Invalid Date';
                    }
                }
            @endphp
            <tr>
                <td class="align-middle">{{ $appointment->doctor->name }}</td>
                <td class="align-middle">{{ $appointment->user->name }}</td>
                <td class="align-middle">{{ $appointment->appointment_code }}</td>
                <td class="align-middle">{{ $appointment->service->name }}</td>
                <td class="align-middle">{{ $formattedDateTime }}</td>
                <td class="align-middle"><span class="badge bg-light-info">{{ $appointment->appointmentStatus->name }}</span></td>
                <td class="align-middle">
                    <div class="d-flex align-items-center">
                        {{-- @can('appointment-list') --}}
                        {{-- <div class="p-1 text-center">
                            <a class="btn btn-sm btn-warning wid-50" href="{{ route('appointment.show', $appointment->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Xem">
                                <i class="fas fa-file-alt"></i>
                            </a>
                        </div> --}}
                        {{-- @endcan --}}
                        {{-- @can('appointment-edit') --}}
                        <div class="p-1 text-center">
                            <a class="btn btn-sm btn-info wid-50" href="{{ route('appointment.edit', $appointment->id) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                        {{-- @endcan --}}
                        {{-- @can('appointment-delete') --}}
                        <div class="p-1 text-center">
                            <form method="POST" action="{{ route('appointment.destroy', $appointment->id) }}">
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
                        <h5 class="mb-0">Appointment</h5>
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

                            @foreach ($appointments_deleted as $appointment)
                                <div class="address-check border rounded p-3 d-flex justify-content-between">
                                    <div class="form-check">
                                        <label class="form-check-label d-block" for="address-check-1">
                                            <div class="chat-avtar d-inline-flex mx-auto">
                                                <img class="rounded-circle img-fluid wid-90 img-thumbnail"
                                                    src="@if (isset($appointment->user->profile_photo_path)) {{ asset('storage/' . $appointment->user->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }} @endif"
                                                    alt="chillnfree">
                                            </div>
                                            <span class="h6 mb-0 d-block">{{ $appointment->appointment_code }}</span>
                                        </label>
                                    </div>

                                    <div class="action">
                                        <button wire:click.prevent='restore({{ $appointment->id }})' class="btn btn-sm btn-info">
                                            <i class="ph-duotone ph-rewind"></i>
                                        </button>
                                        <button wire:click.prevent='forceDelete({{ $appointment->id }})' class="btn btn-sm btn-danger">
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
    {!! $appointments->onEachSide(2)->links() !!}
</div>
