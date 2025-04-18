<div>
    <form wire:submit.prevent="saveExperiences">
        <div class="accordions experience-infos" id="list-accord">

            @foreach ($experiences as $index => $experience)
                <div class="user-accordion-item">
                    <a href="#" class="accordion-wrap" data-bs-toggle="collapse" data-bs-target="#experience{{ $index }}">
                        <h5>Experience</h5>
                        {{-- {{ $experience['hospital_name'] ?? 'New Experience' }} --}}
                        {{-- ({{ $experience['start_time'] ?? 'N/A' }} - {{ $experience['end_time'] ?? 'N/A' }}) --}}
                        <span wire:click="removeExperience({{ $index }})" style="cursor: pointer; color: red;">Delete</span>
                    </a>
                    <div class="accordion-collapse collapse show" id="experience{{ $index }}" data-bs-parent="#list-accord">
                        <div class="content-collapse">
                            <div class="add-service-info setting-card">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Hospital Logo</label>
                                        <div class="change-avatar img-upload mt-3">
                                            <div class="profile-img">
                                                @if (isset($experience['hospital_image']) && is_object($experience['hospital_image']))
                                                    <img src="{{ $experience['hospital_image']->temporaryUrl() }}" alt="Hospital Logo">
                                                @elseif (!empty($experience['hospital_image_url']))
                                                    <img src="{{ asset('storage/Hospital/' . $experience['hospital_image_url']) }}" alt="Hospital Logo">
                                                @else
                                                    <i class="fa-solid fa-file-image"></i>
                                                @endif
                                            </div>
                                            <div class="upload-img">
                                                <h5>Upload Hospital Logo</h5>
                                                <input type="file" wire:model="experiences.{{ $index }}.hospital_image">
                                                <p class="form-text">Your Image should be below 4MB, Accepted format jpg,png,svg</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 mt-2">
                                        <label>Hospital <span class="text-danger">*</span></label>
                                        <input type="text" wire:model="experiences.{{ $index }}.hospital_name" class="form-control">
                                    </div>

                                    <div class="col-lg-4 col-md-6 mt-2">
                                        <label>Year of Experience <span class="text-danger">*</span></label>
                                        <input type="text" wire:model="experiences.{{ $index }}.year_of_experience" class="form-control">
                                    </div>

                                    <div class="col-md-6 mt-2">
                                        <label>Location <span class="text-danger">*</span></label>
                                        <input type="text" wire:model="experiences.{{ $index }}.location" class="form-control">
                                    </div>

                                    <div class="col-lg-12 mt-2">
                                        <label>Specialities <span class="text-danger">*</span></label>
                                        <input type="text" wire:model="experiences.{{ $index }}.specialities" class="form-control">
                                    </div>

                                    <div class="col-lg-12 mt-2">
                                        <label>Job Description <span class="text-danger">*</span></label>
                                        <textarea wire:model="experiences.{{ $index }}.description" class="form-control" rows="3"></textarea>
                                    </div>

                                    <div class="col-lg-4 col-md-6 mt-2">
                                        <label>Start Date <span class="text-danger">*</span></label>
                                        <input type="date" wire:model="experiences.{{ $index }}.start_time" class="form-control">
                                    </div>

                                    <div class="col-lg-4 col-md-6 mt-2">
                                        <label>End Date <span class="text-danger">*</span></label>
                                        <input type="date" wire:model="experiences.{{ $index }}.end_time" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-end">
            <button type="button" wire:click="addExperience" class="btn btn-primary prime-btn mb-3">Add Experience</button>
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
