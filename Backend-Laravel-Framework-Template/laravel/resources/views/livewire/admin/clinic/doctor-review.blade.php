<div class="card-body">
    {{-- Tabs hiển thị danh sách các Clinic --}}
    <ul class="nav nav-tabs">
        @foreach($doctors as $doctor)
            <li class="nav-item">
                <a class="nav-link {{ $selectedDoctorId == $doctor->id ? 'active' : '' }}"
                    wire:click="selectDoctor({{ $doctor->id }})"
                    style="cursor: pointer;">
                    {{ $doctor->name }}
                </a>
            </li>
        @endforeach
    </ul>

    <div class="mt-3">
        <h5>Review list of:
            <span class="text-primary">{{ $doctor->where('id', $selectedDoctorId)->first()->name ?? '' }}</span>
        </h5>

        <div class="table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Active</th>
                        <th>Title</th>
                        <th>Review</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reviews as $review)
                        <tr>
                            <td class="align-middle text-center">
                                <input type="checkbox" wire:click="toggleActive({{ $review['id'] }})"
                                       {{ $review['is_active'] ? 'checked' : '' }} />
                            </td>
                            <td class="align-middle">{{ $review['title'] }}</td>
                            <td class="align-middle">{{ $review['review_detail'] }}</td>
                            <td class="align-middle">{{ \Carbon\Carbon::parse($review['created_at'])->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No reviews yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if(session()->has('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
</div>
