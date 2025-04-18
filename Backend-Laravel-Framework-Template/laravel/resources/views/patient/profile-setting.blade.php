<x-main-layout>

    <!-- Page Content -->
			<div class="content">
				<div class="container mt-5">

					<div class="row" style="margin-top: 100px;">
                        <!-- Profile Sidebar -->
                            @include('layouts.app.patient-sidebar')
                        <!-- /Profile Sidebar -->

                        @livewire('patient.profile.patient-profile-setting')

					</div>

				</div>

			</div>
			<!-- /Page Content -->

</x-main-layout>
