<x-app-layout>
    <x-slot name="pageHeader">
        Prescription Management
    </x-slot>

    <div class="col-sm-12">
        <div class="card mt-3">
            <div class="card-header">
                <h5>Prescription ID: {{ $prescription->id }}</h5>
                <a class="btn btn-lg btn-info" href="{{ route('prescription.index') }}">
                    Back
                </a>
            </div>
            <div class="card-body">
                <div class="image-file mb-3">
                    <x-label class="form-label d-flex align-items-center" value="Thumbnail" />
                    <div class="image-preview mt-3">
                        <img src="{{ asset('storage/Prescription/' . $prescription->image_url) }}" alt="{{ $prescription->name }}"
                            id="thumbnailPreview" class="img-fluid rounded shadow-sm d-block" style="width: 100%;" />
                    </div>
                </div>
                <div class="mb-3">
                    <x-label for="name" value="Name" />
                    <x-input type="text" id="name" name="name" value="{{ $prescription->customer_name }}" readonly />
                </div>

                <div class="mb-3">
                    <x-label for="name" value="Name" />
                    <x-input type="text" id="name" name="name" value="{{ $prescription->phone }}" readonly />
                </div>

                <div class="mb-3">
                    <x-label class="col-sm-3 col-form-label form-label-title" value="Manufacturing Info" />
                    <textarea class="form-control" name="note" placeholder="{{ $prescription->note }}" readonly style="height: 200px;"></textarea>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
