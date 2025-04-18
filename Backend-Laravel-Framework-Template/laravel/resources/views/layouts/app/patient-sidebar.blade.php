<!-- Profile Sidebar -->
<div class="col-lg-4 col-xl-3 theiaStickySidebar">

    <!-- Profile Sidebar -->
    <div class="profile-sidebar patient-sidebar profile-sidebar-new">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="@if(isset(Auth::user()->profile_photo_path)){{ asset('storage/'.Auth::user()->profile_photo_path) }}@else{{ asset('assets/images/user/avatar-1.jpg') }}@endif" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3><a href="#">{{Auth::user()->name}}</a></h3>
                    <div class="patient-details">
                        <h5 class="mb-0">Patient Email : {{Auth::user()->email}}</h5>
                    </div>
                    {{-- <span>Female <i class="fa-solid fa-circle"></i> 32 years 03 Months</span> --}}
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li i @if (Route::is('patient.dashboard')) class="active" @endif>
                        <a href="{{ route('patient.dashboard') }}">
                            <i class="fa-solid fa-shapes"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li @if (Route::is('patient.appointment')) class="active" @endif>
                        <a href="{{ route('patient.appointment') }}">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span>My Appointments</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="favourites.html">
                            <i class="fa-solid fa-user-doctor"></i>
                            <span>Favourites</span>
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a href="dependent.html">
                            <i class="fa-solid fa-user-plus"></i>
                            <span>Dependants</span>
                        </a>
                    </li> --}}
                    {{-- <li @if (Route::is('patient.medical-record')) class="active" @endif>
                        <a href="{{ route('patient.medical-record') }}">
                            <i class="fa-solid fa-money-bill-1"></i>
                            <span>Add Medical Records</span>
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a href="patient-accounts.html">
                            <i class="fa-solid fa-file-contract"></i>
                            <span>Accounts</span>
                        </a>
                    </li> --}}
                    <li @if (Route::is('patient.invoice')) class="active" @endif>
                        <a href="{{ route('patient.invoice') }}">
                            <i class="fa-solid fa-file-lines"></i>
                            <span>Invoices</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.chats') }}">
                            <i class="fa-solid fa-comments"></i>
                            <span>Message</span>
                            {{-- <small class="unread-msg">7</small> --}}
                        </a>
                    </li>
                    <li @if (Route::is('patient.profile-setting')) class="active" @endif>
                        <a href="{{ route('patient.profile-setting') }}">
                            <i class="fa-solid fa-user-pen"></i>
                            <span>Profile Settings</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="medical-details.html">
                            <i class="fa-solid fa-shield-halved"></i>
                            <span>Medical Details</span>
                        </a>
                    </li> --}}
                    <li @if (Route::is('patient.change-password')) class="active" @endif>
                        <a href="{{ route('patient.change-password') }}">
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

</div>
<!-- / Profile Sidebar -->
