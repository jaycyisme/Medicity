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
							<div class="dashboard-header">
								<h3>Change Password</h3>
							</div>
                            <div class="card pass-card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                                @livewire('profile.update-password-form')
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>

				</div>

			</div>
			<!-- /Page Content -->

</x-main-layout>
