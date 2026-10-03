<!-- Profile Sidebar -->
<div class="profile-sidebar doctor-sidebar profile-sidebar-new">
    <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
            <a href="#" class="booking-doc-img">
                <img src="@if(isset(Auth::user()->profile_photo_path)){{ asset('storage/'.Auth::user()->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="Medicity" alt="User Image">

            </a>
            <div class="profile-det-info">
                <h3><a href="doctor-profile.html">{{Auth::user()->name}}</a></h3>
                <div class="patient-details">
                    <h5 class="mb-0">{{Auth::user()->designation ?? ''}}</h5>
                </div>
                <span class="badge doctor-role-badge"><i class="fa-solid fa-circle"></i>{{Auth::user()->roles->pluck('name')[0]}}</span>
            </div>
        </div>
    </div>
    {{-- <div class="doctor-available-head">
        <div class="input-block input-block-new">
            <label class="form-label">Availability <span class="text-danger">*</span></label>
            <select class="select form-control">
                <option>I am Available Now</option>
                <option>Not Available</option>
            </select>
        </div>
    </div> --}}
    <div class="dashboard-widget">
        <nav class="dashboard-menu">
            <ul>
                <li @if (Route::is('doctor.dashboard')) class="active" @endif>
                    <a href="{{ route('doctor.dashboard') }}">
                        <i class="fa-solid fa-shapes"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li @if (Route::is('doctor.request')) class="active" @endif>
                    <a href="{{ route('doctor.request') }}">
                        <i class="fa-solid fa-calendar-check"></i>
                        <span>Requests</span>
                        {{-- <small class="unread-msg">2</small> --}}
                    </a>
                </li>
                <li @if (Route::is('doctor.appointment')) class="active" @endif>
                    <a href="{{ route('doctor.appointment') }}">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>Appointments</span>
                    </a>
                </li>
                {{-- <li @if (Route::is('doctor.available-timing')) class="active" @endif>
                    <a href="{{ route('doctor.available-timing') }}">
                        <i class="fa-solid fa-calendar-day"></i>
                        <span>Available Timings</span>
                    </a>
                </li> --}}
                {{-- <li @if (Route::is('doctor.my-patient')) class="active" @endif>
                    <a href="{{ route('doctor.my-patient') }}">
                        <i class="fa-solid fa-user-injured"></i>
                        <span>My Patients</span>
                    </a>
                </li> --}}
                {{-- <li @if (Route::is('doctor.speciality')) class="active" @endif>
                    <a href="{{ route('doctor.speciality') }}">
                        <i class="fa-solid fa-clock"></i>
                        <span>Specialties & Services</span>
                    </a>
                </li> --}}
                {{-- <li @if (Route::is('doctor.review')) class="active" @endif>
                    <a href="{{ route('doctor.review') }}">
                        <i class="fas fa-star"></i>
                        <span>Reviews</span>
                    </a>
                </li> --}}
                {{-- <li>
                    <a href="{{ route('doctor.dashboard') }}">
                        <i class="fa-solid fa-file-contract"></i>
                        <span>Accounts</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('doctor.dashboard') }}">
                        <i class="fa-solid fa-file-lines"></i>
                        <span>Invoices</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('doctor.dashboard') }}">
                        <i class="fa-solid fa-money-bill-1"></i>
                        <span>Payout Settings</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('doctor.chats') }}">
                        <i class="fa-solid fa-comments"></i>
                        <span>Message</span>
                        {{-- <small class="unread-msg">7</small> --}}
                    </a>
                </li>
                <li @if (Route::is('doctor.doctor-profile-setting')) class="active" @endif>
                    <a href="{{ route('doctor.doctor-profile-setting') }}">
                        <i class="fa-solid fa-user-pen"></i>
                        <span>Profile Settings</span>
                    </a>
                </li>
                {{-- <li @if (Route::is('doctor.doctor-media-setting')) class="active" @endif>
                    <a href="{{ route('doctor.doctor-media-setting') }}">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span>Social Media</span>
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('doctor.doctor-change-password') }}">
                        <i class="fa-solid fa-key"></i>
                        <span>Change Password</span>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" x-data id="logout-form">
                        @csrf
                        <a href="#" onclick="document.getElementById('logout-form').submit(); return false;">
                            <i class="fa-solid fa-calendar-check"></i>
                            <span>Logout</span>
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /Profile Sidebar -->
