<div>
    <div class="dashboard-header border-0 mb-0">
        <div class="card">
            <div class="card-header">
                <h4>Choose Clinic For Doctor</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Image</th>
                                <th>Clinic Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clinics as $clinic)
                                <tr>
                                    <td class="text-center align-middle">
                                        <input type="checkbox"
                                               wire:click="toggleClinic({{ $clinic->id }})"
                                               {{ in_array($clinic->id, $selectedClinics) ? 'checked' : '' }} />
                                    </td>
                                    <td class="align-middle"><img class="rounded-circle img-fluid wid-60 img-thumbnail" style="width: 100px;" src="{{ asset('storage/Clinic/'.$clinic->image_url) }}" alt="medicity"></td>
                                    <td class="align-middle">{{ $clinic->name }}</td>
                                    <td class="align-middle">{{ $clinic->address_detail }}</td>
                                    <td class="align-middle">{{ $clinic->phone_number }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if(session()->has('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>Choose Speciality For Doctor</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Image</th>
                                <th>Speciality Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($specialities as $speciality)
                                <tr>
                                    <td class="text-center align-middle">
                                        <input type="checkbox"
                                               wire:click="toggleSpeciality({{ $speciality->id }})"
                                               {{ in_array($speciality->id, $selectedSpecialities) ? 'checked' : '' }} />
                                    </td>
                                    <td class="align-middle"><img class="rounded-circle img-fluid wid-60 img-thumbnail" style="width: 100px;" src="{{ asset('storage/Speciality/'.$speciality->image_url) }}" alt="medicity"></td>
                                    <td class="align-middle">{{ $speciality->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if(session()->has('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
