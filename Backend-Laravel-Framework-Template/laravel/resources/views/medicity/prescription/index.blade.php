<x-main-layout>
    <!-- Terms -->
    <div class="doctor-content">
        <div class="container mt-5">
            <div class="row" style="margin-top: 100px;">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form" method="POST" action="{{ route('prescription.create') }}">
                                @csrf
                                <div class="mb-5">
                                    <div class="row">
                                        <div class="col-6">
                                            <x-label for="customer_name" value="Name" />
                                            <x-input name='customer_name' type="text" class="mb-3" id="customer_name" placeholder="Name..." required />
                                            <x-input-error for="customer_name" />
                                        </div>

                                        <div class="col-6">
                                            <x-label for="phone" value="Phone" />
                                            <x-input name='phone' type="text" class="mb-3" id="phone" placeholder="Phone..." required />
                                            <x-input-error for="phone" />
                                        </div>
                                    </div>

                                    <div class="image-file mb-3">
                                        <x-label class="form-label d-flex align-items-center" value="Prescription Image" />
                                        <input type="file" id="main_image" class="d-none" accept="image/*">
                                        <x-input-error for="image" />
                                        <label class="btn btn-outline-primary" for="main_image">
                                            <i class="ti ti-upload me-2"></i> Click to Upload
                                        </label>
                                        <div class="image-preview mt-3">
                                            <img id="imagePreview" class="img-fluid rounded shadow-sm d-block category-image-preview"/>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="image_url" id="image_url" />

                                <div class="mb-3">
                                    <x-label class="col-sm-3 col-form-label form-label-title" value="Note" />
                                    <textarea
                                        class="form-control"
                                        name="note"
                                        placeholder="Note..." style="height: 200px;">
                                    </textarea>
                                </div>

                                <div class="mb-3">
                                    <x-button class="btn-primary">Create</x-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Terms -->
</x-main-layout>
