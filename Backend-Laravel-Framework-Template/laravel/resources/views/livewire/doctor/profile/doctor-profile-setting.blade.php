<div>
    <form wire:submit.prevent="saveProfile">
        <div class="setting-card">
            <div class="change-avatar img-upload">
                <div class="profile-img">
                    @if ($profile_image && is_object($profile_image))
                        <img src="{{ $profile_image->temporaryUrl() }}" alt="Profile Image">
                    @elseif ($doctor->profile_photo_path)
                        <img src="{{ asset('storage/' . $doctor->profile_photo_path) }}" alt="Profile Image">
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
        </div>

        <div class="setting-title">
            <h5>Information</h5>
        </div>

        <div class="setting-card">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <label>Display Name <span class="text-danger">*</span></label>
                    <input type="text" wire:model="name" class="form-control">
                </div>

                <div class="col-lg-4 col-md-6">
                    <label>Designation</label>
                    <input type="text" wire:model="designation" class="form-control">
                </div>

                <div class="col-lg-4 col-md-6">
                    <label>Phone Number <span class="text-danger">*</span></label>
                    <input type="text" wire:model="phone_number" class="form-control">
                </div>

                <div class="col-lg-12">
                    <label>Known Languages</label>
                    <input type="text" wire:model="languages" class="form-control">
                </div>

                <div class="col-lg-12 mt-2">
                    <label>Doctor Bio <span class="text-danger"></span></label>
                    <textarea wire:model="doctor_bio" class="form-control" rows="3"></textarea>
                </div>

                <label class="mt-3">Consultation Type <span class="text-danger"></span></label>
                <div class="col-lg-12">
                    @foreach ($consultationTypes as $consultationType)
                        <input type="radio"
                            wire:click="toggleConsultationType({{ $consultationType->id }})"
                            {{ $selectedConsultationTypeId == $consultationType->id ? 'checked' : '' }} />
                        <label>{{ $consultationType->name }}</label>
                    @endforeach
                </div>

                <div class="col-lg-12 mt-3">
                    <label>Gender:</label>
                    <div class="d-flex">
                        <input type="radio" wire:model="gender" wire:change="toggleGender('Male')" id="gender_male" value="Male">
                        <label for="gender_male" class="ms-2 me-4">Male</label>

                        <input type="radio" wire:model="gender" wire:change="toggleGender('Female')" id="gender_female" value="Female">
                        <label for="gender_female" class="ms-2">Female</label>
                    </div>
                </div>

            </div>
        </div>

        <div class="setting-title">
            <h5>Memberships</h5>
        </div>

        <div class="setting-card">
            @foreach ($memberships as $index => $membership)
                <div class="row membership-content">
                    <div class="col-lg-3 col-md-6">
                        <label>Title <span class="text-danger">*</span></label>
                        <input type="text" wire:model="memberships.{{ $index }}.title" class="form-control">
                    </div>
                    <div class="col-lg-9 col-md-6">
                        <label>About Membership</label>
                        <input type="text" wire:model="memberships.{{ $index }}.description" class="form-control">
                        <button type="button" wire:click="removeMembership({{ $index }})" class="btn btn-danger btn-sm text-end mb-2 mt-2">Delete</button>
                    </div>
                </div>
            @endforeach

            <!-- Ô nhập dữ liệu membership mới -->
            <div class="row membership-content">
                <div class="col-lg-3 col-md-6">
                    <label>Title <span class="text-danger">*</span></label>
                    <input type="text" wire:model="newTitle" placeholder="New Membership Title" class="form-control mb-2">
                </div>
                <div class="col-lg-9 col-md-6">
                    <label>About Membership</label>
                    <input type="text" wire:model="newDescription" placeholder="Description" class="form-control mb-2">
                </div>
            </div>
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
