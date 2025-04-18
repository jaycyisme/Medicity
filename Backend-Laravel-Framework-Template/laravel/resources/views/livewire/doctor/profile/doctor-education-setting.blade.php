<div>
    <div class="dashboard-header border-0 mb-0">
        <div class="card">
            <div class="card-header">
                <h4>Choose Service For Doctor</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Image</th>
                                <th>Service Name</th>
                                <th>Clinic</th>
                                <th>Speciality</th>
                                <th>Duration</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td class="text-center align-middle">
                                        <input type="checkbox"
                                               wire:click="toggleService({{ $service->id }})"
                                               {{ in_array($service->id, $selectedServices) ? 'checked' : '' }} />
                                    </td>
                                    <td class="align-middle"><img class="rounded-circle img-fluid wid-60 img-thumbnail" style="width: 100px;" src="{{ asset('storage/Clinic/'.$service->thumbnail) }}" alt="medicity"></td>
                                    <td class="align-middle">{{ $service->name }}</td>
                                    <td class="align-middle">{{ $service->clinic->name }}</td>
                                    <td class="align-middle">{{ $service->speciality->name }}</td>
                                    <td class="align-middle">{{ $service->duration }}</td>
                                    <td class="align-middle">{{ $service->price }}</td>
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

    <div class="dashboard-header border-0 mb-0">
        <div class="card">
            <div class="card-header">
                <h4>Choose Laboratory Test For Doctor</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Laboratory Test Name</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tests as $test)
                                <tr>
                                    <td class="text-center align-middle">
                                        <input type="checkbox"
                                               wire:click="toggleTest({{ $test->id }})"
                                               {{ in_array($test->id, $selectedTests) ? 'checked' : '' }} />
                                    </td>
                                    <td class="align-middle">{{ $test->name }}</td>
                                    <td class="align-middle">{{ $test->price }}</td>
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
