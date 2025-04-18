<div class="card-body">
    <ul class="nav nav-tabs">
        @foreach($services as $service)
            <li class="nav-item">
                <a class="nav-link {{ $selectedServiceId == $service->id ? 'active' : '' }}"
                    wire:click="selectService({{ $service->id }})"
                    style="cursor: pointer;">
                    {{ $service->name }}
                </a>
            </li>
        @endforeach
    </ul>

    <div class="mt-3">
        <h5>Review list of:
            <span class="text-primary">{{ $services->where('id', $selectedServiceId)->first()->name ?? '' }}</span>
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
                            <td class="align-middle">{{ $review['review'] }}</td>
                            <td class="align-middle">{{ \Carbon\Carbon::parse($review['created_at'])->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Chưa có review nào.</td>
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
