<x-main-layout>

    <!-- Page Content -->
			<div class="content">
				<div class="container mt-5">

					<div class="row" style="margin-top: 100px;">
						<div class="col-lg-4 col-xl-3 theiaStickySidebar">

							<!-- Profile Sidebar -->
                                @include('layouts.app.doctor-sidebar')
							<!-- /Profile Sidebar -->

						</div>

						<div class="col-lg-8 col-xl-9">

							<!-- Profile Settings -->
							<div class="dashboard-header">
								<h3>Profile Settings</h3>
							</div>

							<!-- Settings List -->
							<div class="setting-tab">
								<div class="appointment-tabs">
									<ul class="nav">
										<li class="nav-item">
											<a class="nav-link @if (Route::is('doctor.doctor-profile-setting')) active @endif" href="{{ route('doctor.doctor-profile-setting') }}">Basic Details</a>
										</li>
										<li class="nav-item">
											<a class="nav-link @if (Route::is('doctor.doctor-experience-setting')) active @endif" href="{{ route('doctor.doctor-experience-setting') }}">Experience</a>
										</li>
										<li class="nav-item">
											<a class="nav-link @if (Route::is('doctor.doctor-education-setting')) active @endif" href="{{ route('doctor.doctor-education-setting') }}">Assignments</a>
										</li>
										<li class="nav-item">
											<a class="nav-link @if (Route::is('doctor.doctor-award-setting')) active @endif" href="{{ route('doctor.doctor-award-setting') }}">Awards</a>
										</li>
										<li class="nav-item">
											<a class="nav-link @if (Route::is('doctor.doctor-insurance-setting')) active @endif" href="{{ route('doctor.doctor-insurance-setting') }}">Insurances</a>
										</li>
										<li class="nav-item">
											<a class="nav-link @if (Route::is('doctor.doctor-clinic-setting')) active @endif" href="{{ route('doctor.doctor-clinic-setting') }}">Clinics</a>
										</li>
										<li class="nav-item">
											<a class="nav-link @if (Route::is('doctor.doctor-business-setting')) active @endif" href="{{ route('doctor.doctor-business-setting') }}">Business Hours</a>
										</li>
									</ul>
								</div>
							</div>
							<!-- /Settings List -->

                            @livewire('doctor.profile.doctor-education-setting')
							<!-- /Profile Settings -->

						</div>
					</div>

				</div>

			</div>
			<!-- /Page Content -->

</x-main-layout>
