<div>
    <form wire:submit.prevent="saveAwards">
        <div class="dashboard-header border-0 mb-0">
            <h3>Awards</h3>
            <ul>
                <li>
                    <button type="button" wire:click="addAward" class="btn btn-primary prime-btn">Add New Award</button>
                </li>
            </ul>
        </div>

        <div class="accordions award-infos" id="list-accord">
            @if(empty($awards))
                <p class="text-muted">No awards added yet.</p>
            @endif

            @foreach ($awards as $index => $award)
                <div class="user-accordion-item">
                    <a href="#" class="accordion-wrap" data-bs-toggle="collapse" data-bs-target="#award{{ $index }}">
                        {{-- {{ $award['name'] ?? 'New Award' }} ({{ $award['year'] ?? 'N/A' }}) --}}
                        <h5>Award</h5>
                        <span wire:click="removeAward({{ $index }})" style="cursor: pointer; color: red;">Delete</span>
                    </a>
                    <div class="accordion-collapse collapse show" id="award{{ $index }}" data-bs-parent="#list-accord">
                        <div class="content-collapse">
                            <div class="add-service-info">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <label>Award Name</label>
                                        <input type="text" wire:model="awards.{{ $index }}.name" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label>Year <span class="text-danger">*</span></label>
                                        <input type="text" wire:model="awards.{{ $index }}.year" class="form-control">
                                    </div>

                                    <div class="col-lg-12">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea wire:model="awards.{{ $index }}.description" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="modal-btn text-end">
            <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
        </div>

        @if (session()->has('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </form>
</div>
