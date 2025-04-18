<div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between py-3">
                <h5>Create New Clinic</h5>
                <a class="btn btn-lg btn-info" href="{{ route('clinic.index') }}">Back</a>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="store">
                    @csrf
                    <div class="mb-5">
                        <x-label for="name" value="Name" />
                        <x-input wire:model="name" type="text" class="mb-3" id="name" placeholder="Name..." required />
                        <x-input-error for="name" />

                        <x-label for="phone_number" value="Phone Number" />
                        <x-input wire:model="phone_number" type="text" class="mb-3" id="phone_number" placeholder="Phone Number..." required />
                        <x-input-error for="phone_number" />

                        <x-label for="address_detail" value="Address" />
                        <x-input wire:model="address_detail" type="text" class="mb-3" id="address_detail" placeholder="Address..." required />
                        <x-input-error for="address_detail" />

                        <x-label for="coordinates" value="Coordinates" />
                        <x-input wire:model="coordinates" type="text" class="mb-3" id="coordinates" placeholder="Coordinates..." />
                        <x-input-error for="coordinates" />

                        <x-label for="about_me" value="About Me" />
                        <textarea wire:model="about_me" class="form-control" placeholder="About Me..."></textarea>
                        <x-input-error for="about_me" />

                        <div wire:ignore class="image-file mt-3 mb-3">
                            <x-label class="form-label d-flex align-items-center" value="Main Image" />
                            <input
                                type="file"
                                id="thumbnail"
                                class="d-none"
                                accept="image/*">
                            <x-input-error for="thumbnail" />
                            <label class="btn btn-outline-secondary" for="thumbnail">
                                <i class="ti ti-upload me-2"></i> Click to Upload
                            </label>
                            <div class="image-preview mt-3">
                                <img id="thumbnailPreview" class="img-fluid rounded shadow-sm d-block category-image-preview"/>
                            </div>

                            <input wire:model='image_url' type="hidden" name="thumbnail" id="thumbnail_url" />
                        </div>

                    </div>

                    {{-- Business Hours --}}
                    <h5>Business Hours</h5>
                    @foreach($business_hour as $day => $hours)
                        <div class="d-flex align-items-center mb-3">
                            <label class="me-3">{{ $day }}</label>
                            <input wire:model="business_hour.{{ $day }}.start" type="time" class="form-control w-25 me-2">
                            <input wire:model="business_hour.{{ $day }}.end" type="time" class="form-control w-25">
                        </div>
                    @endforeach

                    {{-- Upload Images with Uppy --}}
                    <div wire:ignore class="mb-3">
                        <x-label class="form-label d-flex align-items-center" value="Clinic Images" />
                        <label class="btn btn-outline-secondary" id="uppyModalOpener"><i class="ti ti-upload me-2"></i> Click to upload image</label>
                        <div id="uppyArea"></div>
                        <x-input-error for="images" />

                        {{-- Khu vực hiển thị ảnh đã tải lên --}}
                        <div id="uploadedImagePreviews" class="mt-3 d-flex flex-wrap">

                        </div>

                        {{-- Hidden input để lưu URL ảnh --}}
                        <input type="hidden" id="uploadedImages" wire:model="images">
                    </div>

                    {{-- Awards Section --}}
                    <h5>Awards</h5>
                    <button wire:click.prevent="addAward" class="btn btn-primary mb-3">Thêm Award</button>
                    <div id="awards-container">
                        @foreach($awards as $index => $award)
                            <div class="card mb-3">
                                <div class="card-header d-flex justify-content-between">
                                    <h6>Award</h6>
                                    <button wire:click.prevent="removeAward({{ $index }})" class="btn btn-danger btn-sm">Xóa</button>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <x-label value="Name" />
                                        <input wire:model="awards.{{ $index }}.name" type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <x-label value="Description" />
                                        <textarea wire:model="awards.{{ $index }}.description" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <x-label value="Date" />
                                        <input wire:model="awards.{{ $index }}.date" type="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Submit Button --}}
                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-3">Create Clinic</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
