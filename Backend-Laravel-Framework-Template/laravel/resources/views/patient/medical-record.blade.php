<x-main-layout>

    <!-- Page Content -->
			<div class="content">
				<div class="container mt-5">

					<div class="row">
                        <!-- Profile Sidebar -->
                            @include('layouts.app.patient-sidebar')
                        <!-- /Profile Sidebar -->


						<div class="col-lg-8 col-xl-9">

							<div class="dashboard-header">
								<h3>Records</h3>
								<div class="appointment-tabs">
									<ul class="nav">
										<li>
											<a href="#" class="nav-link active" data-bs-toggle="tab" data-bs-target="#medical">Medical Records</a>
										</li>
										<li>
											<a href="#" class="nav-link" data-bs-toggle="tab" data-bs-target="#prescription">Prescriptions</a>
										</li>
									</ul>
								</div>
							</div>

							<div class="tab-content pt-0">

								<!-- Prescription Tab -->
								<div class="tab-pane fade" id="prescription">
									<div class="search-header">
										<div class="search-field">
											<input type="text" class="form-control" placeholder="Search">
											<span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
										</div>
									</div>

									<div class="custom-table">
										<div class="table-responsive">
											<table class="table table-center mb-0">
												<thead>
													<tr>
														<th>ID</th>
														<th>Name</th>
														<th>Created Date</th>
														<th>Prescriped By</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><a class="text-blue-600" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">#PR-123</a></td>
														<td>
															<a href="javascript:void(0);" class="lab-icon prescription">
																<span><i class="fa-solid fa-prescription"></i></span>Prescription
															</a>
														</td>
														<td>24 Mar 2024, 10:30 AM</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																	<img class="avatar-img rounded-3" src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
																</a>
																<a href="doctor-profile.html">Edalin Hendry</a>
															</h2>
														</td>
														<td>
															<div class="action-item">
																<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
																	<i class="fa-solid fa-link"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-download"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-trash-can"></i>
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td><a class="text-blue-600" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">#PR-124</a></td>
														<td>
															<a href="javascript:void(0);" class="lab-icon prescription">
																<span><i class="fa-solid fa-prescription"></i></span>Prescription
															</a>
														</td>
														<td>27 Mar 2024, 11:15 AM</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																	<img class="avatar-img rounded-3" src="assets/img/doctors/doctor-thumb-05.jpg" alt="User Image">
																</a>
																<a href="doctor-profile.html">John Homes</a>
															</h2>
														</td>
														<td>
															<div class="action-item">
																<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
																	<i class="fa-solid fa-link"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-download"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-trash-can"></i>
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td><a class="text-blue-600" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">#PR-125</a></td>
														<td>
															<a href="javascript:void(0);" class="lab-icon prescription">
																<span><i class="fa-solid fa-prescription"></i></span>Prescription
															</a>
														</td>
														<td>11 Apr 2024, 09:00 AM</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																	<img class="avatar-img rounded-3" src="assets/img/doctors/doctor-thumb-03.jpg" alt="User Image">
																</a>
																<a href="doctor-profile.html">Shanta Neill</a>
															</h2>
														</td>
														<td>
															<div class="action-item">
																<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
																	<i class="fa-solid fa-link"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-download"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-trash-can"></i>
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td><a class="text-blue-600" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">#PR-126</a></td>
														<td>
															<a href="javascript:void(0);" class="lab-icon prescription">
																<span><i class="fa-solid fa-prescription"></i></span>Prescription
															</a>
														</td>
														<td>15 Apr 2024, 02:30 PM</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																	<img class="avatar-img rounded-3" src="assets/img/doctors/doctor-thumb-08.jpg" alt="User Image">
																</a>
																<a href="doctor-profile.html">Anthony Tran</a>
															</h2>
														</td>
														<td>
															<div class="action-item">
																<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
																	<i class="fa-solid fa-link"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-download"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-trash-can"></i>
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td><a class="text-blue-600" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">#PR-127</a></td>
														<td>
															<a href="javascript:void(0);" class="lab-icon prescription">
																<span><i class="fa-solid fa-prescription"></i></span>Prescription
															</a>
														</td>
														<td>23 Apr 2024, 06:40 PM</td>
														<td>
															<h2 class="table-avatar">
																<a href="doctor-profile.html" class="avatar avatar-sm me-2">
																	<img class="avatar-img rounded-3" src="assets/img/doctors/doctor-thumb-01.jpg" alt="User Image">
																</a>
																<a href="doctor-profile.html">Susan Lingo</a>
															</h2>
														</td>
														<td>
															<div class="action-item">
																<a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
																	<i class="fa-solid fa-link"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-download"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-trash-can"></i>
																</a>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>

									<!-- Pagination -->
									<div class="pagination dashboard-pagination">
										<ul>
											<li>
												<a href="#" class="page-link"><i class="fa-solid fa-chevron-left"></i></a>
											</li>
											<li>
												<a href="#" class="page-link">1</a>
											</li>
											<li>
												<a href="#" class="page-link active">2</a>
											</li>
											<li>
												<a href="#" class="page-link">3</a>
											</li>
											<li>
												<a href="#" class="page-link">4</a>
											</li>
											<li>
												<a href="#" class="page-link">...</a>
											</li>
											<li>
												<a href="#" class="page-link"><i class="fa-solid fa-chevron-right"></i></a>
											</li>
										</ul>
									</div>
									<!-- /Pagination -->

								</div>
								<!-- /Prescription Tab -->

								<!-- Medical Records Tab -->
								<div class="tab-pane fade show active" id="medical">
									<div class="search-header">
										<div class="search-field">
											<input type="text" class="form-control" placeholder="Search">
											<span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
										</div>
										<div>
											<a href="#" data-bs-toggle="modal" data-bs-target="#add_medical_records" class="btn btn-primary prime-btn">Add Medical Record</a>
										</div>
									</div>

									<div class="custom-table">
										<div class="table-responsive">
											<table class="table table-center mb-0">
												<thead>
													<tr>
														<th>ID</th>
														<th>Name</th>
														<th>Date</th>
														<th>Description</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><a class="text-blue-600" href="javascript:void(0);">#MR-123</a></td>
														<td>
															<a href="javascript:void(0);" class="lab-icon">
																<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
															</a>
														</td>
														<td>24 Mar 2024</td>
														<td>Glucose Test V12</td>
														<td>
															<div class="action-item">
																<a href="javascript:void(0);"  data-bs-toggle="modal" data-bs-target="#edit_medical_records">
																	<i class="fa-solid fa-pen-to-square"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-download"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-trash-can"></i>
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td><a class="text-blue-600" href="javascript:void(0);">#MR-124</a></td>
														<td>
															<a href="javascript:void(0);" class="lab-icon">
																<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
															</a>
														</td>
														<td>27 Mar 2024</td>
														<td>Complete Blood Count(CBC)</td>
														<td>
															<div class="action-item">
																<a href="javascript:void(0);"  data-bs-toggle="modal" data-bs-target="#edit_medical_records">
																	<i class="fa-solid fa-pen-to-square"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-download"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-trash-can"></i>
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td><a class="text-blue-600" href="javascript:void(0);">#MR-125</a></td>
														<td>
															<a href="javascript:void(0);" class="lab-icon">
																<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
															</a>
														</td>
														<td>10 Apr 2024</td>
														<td>Echocardiogram</td>
														<td>
															<div class="action-item">
																<a href="javascript:void(0);"  data-bs-toggle="modal" data-bs-target="#edit_medical_records">
																	<i class="fa-solid fa-pen-to-square"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-download"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-trash-can"></i>
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td><a class="text-blue-600" href="javascript:void(0);">#MR-126</a></td>
														<td>
															<a href="javascript:void(0);" class="lab-icon">
																<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
															</a>
														</td>
														<td>19 Apr 2024</td>
														<td>COVID-19 Test</td>
														<td>
															<div class="action-item">
																<a href="javascript:void(0);"  data-bs-toggle="modal" data-bs-target="#edit_medical_records">
																	<i class="fa-solid fa-pen-to-square"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-download"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-trash-can"></i>
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td><a class="text-blue-600" href="javascript:void(0);">#MR-127</a></td>
														<td>
															<a href="javascript:void(0);" class="lab-icon">
																<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
															</a>
														</td>
														<td>27 Apr 2024</td>
														<td>Allergy Tests</td>
														<td>
															<div class="action-item">
																<a href="javascript:void(0);"  data-bs-toggle="modal" data-bs-target="#edit_medical_records">
																	<i class="fa-solid fa-pen-to-square"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-download"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-trash-can"></i>
																</a>
															</div>
														</td>
													</tr>
													<tr>
														<td><a class="text-blue-600" href="javascript:void(0);">#MR-128</a></td>
														<td>
															<a href="javascript:void(0);" class="lab-icon">
																<span><i class="fa-solid fa-paperclip"></i></span>Lab Report
															</a>
														</td>
														<td>02 May  2024</td>
														<td>Lipid Panel </td>
														<td>
															<div class="action-item">
																<a href="javascript:void(0);"  data-bs-toggle="modal" data-bs-target="#edit_medical_records">
																	<i class="fa-solid fa-pen-to-square"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-download"></i>
																</a>
																<a href="javascript:void(0);">
																	<i class="fa-solid fa-trash-can"></i>
																</a>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>

									<!-- Pagination -->
									<div class="pagination dashboard-pagination">
										<ul>
											<li>
												<a href="#" class="page-link"><i class="fa-solid fa-chevron-left"></i></a>
											</li>
											<li>
												<a href="#" class="page-link">1</a>
											</li>
											<li>
												<a href="#" class="page-link active">2</a>
											</li>
											<li>
												<a href="#" class="page-link">3</a>
											</li>
											<li>
												<a href="#" class="page-link">4</a>
											</li>
											<li>
												<a href="#" class="page-link">...</a>
											</li>
											<li>
												<a href="#" class="page-link"><i class="fa-solid fa-chevron-right"></i></a>
											</li>
										</ul>
									</div>
									<!-- /Pagination -->

								</div>
								<!-- /Medical Records Tab -->


							</div>

						</div>
					</div>

				</div>

			</div>
			<!-- /Page Content -->

</x-main-layout>

<!-- Add Medical Records Modal -->
<div class="modal fade custom-modals" id="add_medical_records">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add Medical Record</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-wrap">
                                <label class="col-form-label">Title</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-wrap">
                                <label class="col-form-label">Select Patient</label>
                                <select class="select">
                                    <option>Select Patient</option>
                                    <option>Adrian Marshall</option>
                                    <option>Kelly Stevens</option>
                                    <option>Catherine Gracey</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-wrap">
                                <label class="col-form-label">Start Date <span class="text-danger">*</span></label>
                                <input type="text" class="form-control datetimepicker">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-wrap">
                                <label class="col-form-label">Hospital Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label">Symptoms <span class="text-danger">*</span></label>
                            <div class="input-block input-block-new">
                                <input class="input-tags form-control" id="inputBox" type="text" data-role="tagsinput" placeholder="Type New"  name="Label" value="Fever,Headache,Stomach Pain" >
                                <a href="#" class="input-text save-btn">Save</a>
                            </div>
                            <div class="form-wrap mb-0">
                                <label class="col-form-label">Report</label>
                                <div class="upload-file">
                                    <input type="file">
                                    <p>Drop files or Click to upload</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="modal-btn text-end">
                        <a href="#" class="btn btn-gray" data-bs-toggle="modal" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Add Medical Records Modal -->

<!-- Edit Medical Records Modal -->
<div class="modal fade custom-modals" id="edit_medical_records">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Medical Record</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-wrap">
                                <label class="col-form-label">Title</label>
                                <input type="text" class="form-control" value="Glucose Test V12">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-wrap">
                                <label class="col-form-label">Select Patient</label>
                                <select class="select">
                                    <option>Select Patient</option>
                                    <option selected>Adrian Marshall</option>
                                    <option>Kelly Stevens</option>
                                    <option>Catherine Gracey</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-wrap">
                                <label class="col-form-label">Start Date <span class="text-danger">*</span></label>
                                <input type="text" class="form-control datetimepicker" value="23/04/2024">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-wrap">
                                <label class="col-form-label">Hospital Name</label>
                                <input type="text" class="form-control" value="ENT Hospital">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label">Symptoms <span class="text-danger">*</span></label>
                            <div class="input-block input-block-new">
                                <input class="input-tags form-control" id="inputBox" type="text" data-role="tagsinput" placeholder="Type New"  name="Label" value="Fever,Headache,Stomach Pain" >
                                <a href="#" class="input-text save-btn">Save</a>
                            </div>
                            <div class="form-wrap mb-0">
                                <label class="col-form-label">Report</label>
                                <div class="upload-file">
                                    <input type="file">
                                    <p>Drop files or Click to upload</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="modal-btn text-end">
                        <a href="#" class="btn btn-gray" data-bs-toggle="modal" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Edit Medical Records Modal -->

<!--View Prescription -->
<div class="modal fade custom-modals" id="view_prescription">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">View Prescription</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body pb-0">
                <div class="prescribe-download">
                    <h5>21 Mar  2024</h5>
                    <ul>
                        <li><a href="javascript:void(0);" class="print-link"><i class="fa-solid fa-print"></i></a></li>
                        <li><a href="#" class="btn btn-primary prime-btn">Download</a></li>
                    </ul>
                </div>
                <div class="view-prescribe invoice-content">
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-logo">
                                    <img src="assets/img/logo.png" alt="logo">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="invoice-details">
                                    <strong>Prescription ID :</strong> #PR-123 <br>
                                    <strong>Issued:</strong> 21 Mar 2024
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Invoice Item -->
                    <div class="invoice-item">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="invoice-info">
                                    <h6 class="customer-text">Doctor Details</h6>
                                    <p class="invoice-details invoice-details-two">
                                        Edalin Hendry <br>
                                        806 Twin Willow Lane, <br>
                                        Newyork, USA <br>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="invoice-info invoice-info2">
                                    <h6 class="customer-text">Patient Details</h6>
                                    <p class="invoice-details">
                                        Adrian Marshall <br>
                                        299 Star Trek Drive,<br>
                                        Florida, 32405, USA <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->

                    <!-- Invoice Item -->
                    <div class="invoice-item invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <h6>Prescription  Details</h6>
                                <div class="table-responsive">
                                    <table class="invoice-table table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Medicine Name</th>
                                                <th>Dosage</th>
                                                <th>Frequency</th>
                                                <th>Duration</th>
                                                <th>Timings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Ecosprin 75MG [Asprin 75 MG Oral Tab]</td>
                                                <td>75 mg <span>Oral Tab</span></td>
                                                <td>1-0-0-1</td>
                                                <td>1 month</td>
                                                <td>Before Meal</td>
                                            </tr>
                                            <tr>
                                                <td>Alexer 90MG Tab</td>
                                                <td>90 mg <span>Oral Tab</span></td>
                                                <td>1-0-0-1</td>
                                                <td>1 month</td>
                                                <td>Before Meal</td>
                                            </tr>
                                            <tr>
                                                <td>Ramistar XL2.5</td>
                                                <td>60 mg <span>Oral Tab</span></td>
                                                <td>1-0-0-0</td>
                                                <td>1 month</td>
                                                <td>After Meal</td>
                                            </tr>
                                            <tr>
                                                <td>Metscore</td>
                                                <td>90 mg <span>Oral Tab</span></td>
                                                <td>1-0-0-1</td>
                                                <td>1 month</td>
                                                <td>After Meal</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Item -->

                    <!-- Invoice Information -->
                    <div class="other-info">
                        <h4>Other information</h4>
                        <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
                    </div>
                    <div class="other-info">
                        <h4>Follow Up</h4>
                        <p class="text-muted mb-0">Follow u p after 3 months, Have to come on empty stomach</p>
                    </div>
                    <div class="prescriber-info">
                        <h6>Dr. Edalin Hendry</h6>
                        <p>Dept of Cardiology</p>
                    </div>
                    <!-- /Invoice Information -->

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /View Prescription -->
