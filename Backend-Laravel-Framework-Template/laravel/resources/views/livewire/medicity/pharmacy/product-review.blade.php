<form wire:submit.prevent="submitReview">
    <div class="mb-3">
        <label class="mb-2">Star Rating</label>
        <select wire:model="star" class="form-control">
            <option value="">Select Rating</option>
            @for ($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}">{{ $i }} Stars</option>
            @endfor
        </select>
        @error('star') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="mb-2">Review Title</label>
        <input type="text" wire:model="title" class="form-control" placeholder="Enter review title">
        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label class="mb-2">Review</label>
        <textarea wire:model="review" class="form-control" placeholder="Write your review"></textarea>
        @error('review') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit Review</button>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</form>
