<x-main-layout>
    <!-- Page Content -->
    <div class="content">
        <div class="container mt-5">

            <!-- Doctor Widget -->
            <div class="card doc-profile-card" style="margin-top: 100px;">
                <div class="card-body">
                    <div class="doctor-widget doctor-profile-two">
                        <div class="doc-info-left">
                            <div class="doctor-img">
                                <img src="{{ asset('storage/Disease/' . $disease->image_url) }}" class="img-fluid" alt="User Image">
                            </div>
                            <div class="doc-info-cont">
                                <span class="badge doc-avail-badge"><i class="fa-solid fa-circle"></i>{{ $disease->specialityGroup->name }} </span>
                                <h4 class="doc-name">{{ $disease->name }} <img src="{{ asset('medicity/assets/img/icons/badge-check.svg') }}" alt="Img"><span class="badge doctor-role-badge"><i class="fa-solid fa-circle"></i>{{ $disease->targetGroup->name }}</span></h4>
                                {{-- <p>BDS, MDS - Oral & Maxillofacial Surgery</p>
                                <p>Speaks : English, French, German</p> --}}
                            </div>
                        </div>
                        <div class="doc-info-right">
                            <ul class="doctors-activities">
                                <li>
                                    <div class="hospital-info">
                                        <span class="list-icon"><img src="{{ asset('medicity/assets/img/icons/watch-icon.svg') }}" alt="Img"></span>
                                        <p>{{ $disease->created_at }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="doc-profile-card-bottom">
                        <div class="bottom-book-btn">
                            <div class="clinic-booking">
                                <a data-bs-toggle="modal" data-bs-target="#address-edit_add-modal" class="btn btn-primary">Consultation</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Doctor Widget -->

            <div class="doctors-detailed-info">
                <ul class="information-title-list">
                    <li class="active">
                        <a href="#doc_bio">Overview</a>
                    </li>
                    <li>
                        <a href="#experience">Symptoms</a>
                    </li>
                    <li>
                        <a href="#insurence">Causes</a>
                    </li>
                    <li>
                        <a href="#services">Risk Factors</a>
                    </li>
                    <li>
                        <a href="#speciality">Diagnosis</a>
                    </li>
                    <li>
                        <a href="#availability">Prevention</a>
                    </li>
                    <li>
                        <a href="#clinic">Treatment</a>
                    </li>
                    <li>
                        <a href="#membership">Author</a>
                    </li>
                    <li>
                        <a href="#awards">Meal Plan</a>
                    </li>
                </ul>
                <div class="doc-information-main">
                    <div class="doc-information-details bio-detail" id="doc_bio">
                        <div class="detail-title">
                            <h4>Overview</h4>
                        </div>
                        {!! $disease->overview !!}
                    </div>
                    <div class="doc-information-details" id="experience">
                        <div class="detail-title">
                            <h4>Symptoms</h4>
                        </div>
                        {!! $disease->symptoms !!}
                    </div>
                    <div class="doc-information-details" id="insurence">
                        <div class="detail-title">
                            <h4>Causes</h4>
                        </div>
                        {!! $disease->causes !!}
                    </div>
                    <div class="doc-information-details" id="speciality">
                        <div class="detail-title">
                            <h4>Risk Factors</h4>
                        </div>
                        {!! $disease->risk_factors !!}
                    </div>
                    <div class="doc-information-details" id="services">
                        <div class="detail-title">
                            <h4>Diagnosis</h4>
                        </div>
                        {!! $disease->diagnosis !!}
                    </div>
                    <div class="doc-information-details" id="availability">
                        <div class="detail-title">
                            <h4>Prevention</h4>
                        </div>
                        {!! $disease->prevention !!}
                    </div>
                    <div class="doc-information-details" id="clinic">
                        <div class="detail-title">
                            <h4>Treatment</h4>
                        </div>
                        {!! $disease->treatment !!}
                    </div>
                    <div class="doc-information-details" id="membership">
                        <div class="detail-title">
                            <h4>{{ $disease->doctor_name }}</h4>
                        </div>
                        <div class="about-author">
                            <div class="about-author-img">
                                <div class="author-img-wrap">
                                    <a href="doctor-profile.html"><img class="img-fluid" alt="Darren Elder" src="{{ asset('storage/Disease/' . $disease->doctor_image) }}"></a>
                                </div>
                            </div>
                        </div>
                        <p>{!! $disease->doctor_overview !!}</p>
                    </div>
                    <div class="doc-information-details" id="awards">
                        <div class="detail-title">
                            <h4>Meal Plan</h4>
                        </div>
                        {!! $disease->meal_plan !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Content -->
</x-main-layout>

<div class="modal fade" id="address-edit_add-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header justify-content-between">
                <div class="collapse multi-collapse show">
                    <h5 class="mb-0">Doctor List</h5>
                </div>
                <div class="d-flex align-items-center justify-content-end">
                    <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal"
                        data-bs-toggle="tooltip" title="Close">
                        X
                    </a>
                </div>
            </div>
            <div class="modal-body">
                <div class="multi-collapse show">
                    <div class="address-check-block">

                        @foreach($doctors as $doctor)
                            <div class="address-check border rounded p-3">
                                <div class="form-check">
                                    <label class="form-check-label d-block" for="address-check-{{ $doctor->id }}">
                                        <a href="{{ route('doctor-profile', $doctor->id) }}" class="h6 mb-0 d-block">{{ $doctor->name }}</a>
                                        <span class="row align-items-center justify-content-between">
                                            <span class="col-6">
                                                <span class="text-muted mb-0">Phone: {{ $doctor->phone }}</span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between collapse multi-collapse show">
                <div class="flex-grow-1 text-end">
                    <button type="button" class="btn btn-link-danger" data-bs-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
    </div>
</div>
