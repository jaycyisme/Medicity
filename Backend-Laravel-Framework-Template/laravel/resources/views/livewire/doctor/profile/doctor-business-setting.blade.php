<div class="card">
    <div class="card-header">
        <h4>Business Hour Setting</h4>
    </div>

    <div class="card-body">
        <form wire:submit.prevent="updateBusinessHours">
            <div class="mb-3">
                @foreach($business_hours as $day => $hours)
                    <div class="d-flex align-items-center mb-3">
                        <label class="me-3" style="width: 100px;">{{ $day }}</label>
                        <input type="time" wire:model="business_hours.{{ $day }}.start" class="form-control w-25 me-2">
                        <input type="time" wire:model="business_hours.{{ $day }}.end" class="form-control w-25">
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary  prime-btn">Save</button>

            @if(session()->has('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif
        </form>
    </div>
</div>
