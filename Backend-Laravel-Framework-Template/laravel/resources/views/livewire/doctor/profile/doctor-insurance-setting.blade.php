<div>
    <form wire:submit.prevent="saveInsurances">
        <div class="dashboard-header border-0 mb-0">
            <h3>Insurance</h3>
            <ul>
                <li>
                    <button type="button" wire:click="addInsurance" class="btn btn-primary prime-btn">Add New Insurance</button>
                </li>
            </ul>
        </div>

        <div class="accordions insurance-infos" id="list-accord">
            @if(empty($insurances))
                <p class="text-muted">No insurance added yet.</p>
            @endif

            @foreach ($insurances as $index => $insurance)
                <div class="user-accordion-item">
                    <a href="#" class="accordion-wrap" data-bs-toggle="collapse" data-bs-target="#insurance{{ $index }}">
                        {{-- {{ $insurance['name'] ?? 'New Insurance' }} --}}
                        <h5>Insurance</h5>
                        <span wire:click="removeInsurance({{ $index }})" style="cursor: pointer; color: red;">Delete</span>
                    </a>
                    <div class="accordion-collapse collapse show" id="insurance{{ $index }}" data-bs-parent="#list-accord">
                        <div class="content-collapse">
                            <div class="add-service-info">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Logo</label>
                                        <div class="change-avatar img-upload mt-2">
                                            <div class="profile-img">
                                                @if (isset($insurance['image']) && is_object($insurance['image']))
                                                    <img src="{{ $insurance['image']->temporaryUrl() }}" alt="Insurance Logo">
                                                @elseif (!empty($insurance['image_url']))
                                                    <img src="{{ asset('storage/' . $insurance['image_url']) }}" alt="Insurance Logo">
                                                @else
                                                    <i class="fa-solid fa-file-image"></i>
                                                @endif
                                            </div>
                                            <div class="upload-img">
                                                <h5>Upload Insurance Logo</h5>
                                                <input type="file" wire:model="insurances.{{ $index }}.image">
                                                <p class="form-text">Your Image should be below 4MB, Accepted format jpg,png,svg</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label>Insurance Name <span class="text-danger">*</span></label>
                                        <input type="text" wire:model="insurances.{{ $index }}.name" class="form-control">
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
