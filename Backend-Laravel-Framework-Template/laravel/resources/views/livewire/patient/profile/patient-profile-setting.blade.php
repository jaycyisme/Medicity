<div class="col-lg-8 col-xl-9">

    {{-- <div class="setting-card">
        <div class="change-avatar img-upload">
            <div class="profile-img">
                @if ($profile_image && is_object($profile_image))
                    <img src="{{ $profile_image->temporaryUrl() }}" alt="Profile Image">
                @elseif ($doctor->profile_photo_path)
                    <img src="{{ asset('storage/Avatar/' . $doctor->profile_photo_path) }}" alt="Profile Image">
                @else
                    <i class="fa-solid fa-file-image"></i>
                @endif
            </div>
            <div class="upload-img">
                <h5>Profile Image</h5>
                <input type="file" wire:model="profile_image">
                <p class="form-text">Your Image should be below 4MB, Accepted format jpg,png,svg</p>
            </div>
        </div>
    </div> --}}
    <div class="setting-title">
        <h5>Information</h5>
    </div>
    <div class="setting-card">
        <div class="row">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')
            @endif
            {{-- <div class="col-lg-4 col-md-6">
                <label>Display Name <span class="text-danger">*</span></label>
                <input type="text" wire:model="name" class="form-control">
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-wrap">
                    <label class="col-form-label">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-wrap">
                    <label class="col-form-label">Date of Birth <span class="text-danger">*</span></label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-wrap">
                    <label class="col-form-label">Phone Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-wrap">
                    <label class="col-form-label">Email Address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="form-wrap">
                    <label class="col-form-label">Blood Group <span class="text-danger">*</span></label>
                    <input type="text" class="form-control">
                </div>
            </div> --}}
        </div>
    </div>
    {{-- <div class="setting-title">
        <h5>Address</h5>
    </div>
    <div class="setting-card">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-wrap">
                    <label class="col-form-label">Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-wrap">
                    <label class="col-form-label">City <span class="text-danger">*</span></label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-wrap">
                    <label class="col-form-label">State <span class="text-danger">*</span></label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-wrap">
                    <label class="col-form-label">Country <span class="text-danger">*</span></label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-wrap">
                    <label class="col-form-label">Pincode <span class="text-danger">*</span></label>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-btn text-end">
        <a href="#" class="btn btn-gray">Cancel</a>
        <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
    </div> --}}
</div>
