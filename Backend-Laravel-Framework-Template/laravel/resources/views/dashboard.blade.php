<x-app-layout>
    <x-slot name="pageHeader">
        Dashboard
    </x-slot>


    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Appointment Revenue</h5>
                      <input type="date" class="form-control form-control-sm w-auto border-0 shadow-none2" >
                      <input type="date" class="form-control form-control-sm w-auto border-0 shadow-none2" >
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-1">
                      <h3 class="mb-0">$894.39 <small class="text-muted">/+$200.10</small></h3>
                      <span class="badge bg-light-success ms-2">36%</span>
                    </div>
                    <p>Number of completed appointments</p>
                    <div id="customer-rate-graph"></div>
                  </div>
                </div>
              </div>
            <div class="col-xxl-6">
                <div class="card">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>Order Revenue</h5>
                    <input type="date" class="form-control form-control-sm w-auto border-0 shadow-none2" >
                    <input type="date" class="form-control form-control-sm w-auto border-0 shadow-none2" >
                  </div>
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center justify-content-between">
                      <ul class="list-inline me-auto mb-3 mb-sm-0">
                        <li class="list-inline-item">
                          Order
                        </li>
                        <li class="list-inline-item">
                          <button id="chart-line" class="avtar avtar-s btn btn-light-secondary">
                            <i class="ph-duotone ph-chart-line f-18"></i>
                          </button>
                        </li>
                        <li class="list-inline-item">
                          <button id="chart-bar" class="avtar avtar-s btn btn-light-secondary">
                            <i class="ph-duotone ph-chart-bar f-18"></i>
                          </button>
                        </li>
                        <li class="list-inline-item">
                          <button id="chart-area" class="avtar avtar-s btn btn-light-secondary">
                            <i class="ph-duotone ph-wave-sine f-18"></i>
                          </button>
                        </li>
                      </ul>
                      <div class="d-flex align-items-center">
                        <h3 class="mb-0 me-1">$ 82.99</h3>
                        <span class="badge bg-success"><i class="ti ti-arrow-narrow-up"></i> 2.6%</span>
                      </div>
                    </div>
                    <div id="reports-chart"></div>
                  </div>
                </div>
              </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="card statistics-card-1 overflow-hidden ">
                  <div class="card-body">
                    <img src="../assets/images/widget/img-status-4.svg" alt="img" class="img-fluid img-bg" >
                    <h5 class="mb-4">Daily Sales</h5>
                    <div class="d-flex align-items-center mt-3">
                      <h3 class="f-w-300 d-flex align-items-center m-b-0">$249.95</h3>
                      <span class="badge bg-light-success ms-2">36%</span>
                    </div>
                    {{-- <p class="text-muted mb-2 text-sm mt-3">You made an extra 35,000 this daily</p> --}}
                    <div class="progress" style="height: 7px">
                      <div
                        class="progress-bar bg-brand-color-3"
                        role="progressbar"
                        style="width: 75%"
                        aria-valuenow="75"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="card statistics-card-1 overflow-hidden ">
                  <div class="card-body">
                    <img src="../assets/images/widget/img-status-5.svg" alt="img" class="img-fluid img-bg" >
                    <h5 class="mb-4">Monthly Sales</h5>
                    <div class="d-flex align-items-center mt-3">
                      <h3 class="f-w-300 d-flex align-items-center m-b-0">$1249.95</h3>
                      <span class="badge bg-light-primary ms-2">20%</span>
                    </div>
                    {{-- <p class="text-muted mb-2 text-sm mt-3">You made an extra 35,000 this Monthly</p> --}}
                    <div class="progress" style="height: 7px">
                      <div
                        class="progress-bar bg-brand-color-3"
                        role="progressbar"
                        style="width: 75%"
                        aria-valuenow="75"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="card statistics-card-1 overflow-hidden  bg-brand-color-3">
                  <div class="card-body">
                    <img src="../assets/images/widget/img-status-6.svg" alt="img" class="img-fluid img-bg" >
                    <h5 class="mb-4 text-white">Yearly Sales</h5>
                    <div class="d-flex align-items-center mt-3">
                      <h3 class="text-white f-w-300 d-flex align-items-center m-b-0">$10249.95</h3>
                    </div>
                    {{-- <p class="text-white text-opacity-75 mb-2 text-sm mt-3">You made an extra 35,000 this Daily</p> --}}
                    <div class="progress bg-white bg-opacity-10" style="height: 7px">
                      <div
                        class="progress-bar bg-white"
                        role="progressbar"
                        style="width: 75%"
                        aria-valuenow="75"
                        aria-valuemin="0"
                        aria-valuemax="100"
                      ></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-xl-7">
                <div class="card bg-brand-color-3 earning-card statistics-card-1">
                  <div class="card-body overflow-hidden">
                    <img src="../assets/images/widget/img-earning-bg.svg" alt="img" class="img-fluid img-bg h-100" >
                    <ul class="mt-3 nav nav-fill nav-pills align-items-center justify-content-center mb-5" id="pills-tab" role="tablist">
                      <li class="nav-item">
                        <a
                          class="nav-link active"
                          id="pills-earnings-mon"
                          data-bs-toggle="pill"
                          href="#earnings-mon"
                          role="tab"
                          aria-controls="earnings-mon"
                          aria-selected="true"
                          >Mon</a
                        >
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          id="pills-earnings-tue"
                          data-bs-toggle="pill"
                          href="#earnings-tue"
                          role="tab"
                          aria-controls="earnings-tue"
                          aria-selected="false"
                          >Tue</a
                        >
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          id="pills-earnings-wed"
                          data-bs-toggle="pill"
                          href="#earnings-wed"
                          role="tab"
                          aria-controls="earnings-wed"
                          aria-selected="false"
                          >Wed</a
                        >
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          id="pills-earnings-thu"
                          data-bs-toggle="pill"
                          href="#earnings-thu"
                          role="tab"
                          aria-controls="earnings-thu"
                          aria-selected="false"
                          >Thu</a
                        >
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          id="pills-earnings-fri"
                          data-bs-toggle="pill"
                          href="#earnings-fri"
                          role="tab"
                          aria-controls="earnings-fri"
                          aria-selected="false"
                          >Fri</a
                        >
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          id="pills-earnings-sat"
                          data-bs-toggle="pill"
                          href="#earnings-sat"
                          role="tab"
                          aria-controls="earnings-sat"
                          aria-selected="false"
                          >Sat</a
                        >
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          id="pills-earnings-sun"
                          data-bs-toggle="pill"
                          href="#earnings-sun"
                          role="tab"
                          aria-controls="earnings-sun"
                          aria-selected="false"
                          >Sun</a
                        >
                      </li>
                    </ul>
                    <div class="mb-3 tab-content" id="tabContent-pills">
                      <div class="tab-pane fade show active" id="earnings-mon" role="tabpanel" aria-labelledby="pills-earnings-mon">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="d-flex align-items-center">
                              <div class="avtar bg-white bg-opacity-50 flex-shrink-0">
                                <i class="ph-duotone ph-chart-bar text-white f-30"></i>
                              </div>
                              <div class="flex-grow-1 ms-3">
                                <div class="d-inline-flex align-items-center mb-1">
                                  <h3 class="mb-0 text-white">984,632</h3>
                                  <span class="badge bg-light-danger ms-2">10%</span>
                                </div>
                                <p class="mb-0 text-white text-opacity-75">Total Earnings</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="d-flex align-items-center">
                              <div class="avtar bg-white bg-opacity-50 flex-shrink-0">
                                <i class="ti ti-zoom-money text-white f-30"></i>
                              </div>
                              <div class="flex-grow-1 ms-3">
                                <div class="d-inline-flex align-items-center mb-1">
                                  <h3 class="mb-0 text-white">134,276</h3>
                                  <span class="badge bg-light-success ms-2">12%</span>
                                </div>
                                <p class="mb-0 text-white text-opacity-75">Total Expenses</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="earnings-tue" role="tabpanel" aria-labelledby="pills-earnings-tue">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="d-flex align-items-center">
                              <div class="avtar avtar-l bg-white bg-opacity-50 flex-shrink-0">
                                <i class="ph-duotone ph-chart-bar text-white f-30"></i>
                              </div>
                              <div class="flex-grow-1 ms-3">
                                <div class="d-inline-flex align-items-center mb-1">
                                  <h3 class="mb-0 text-white">222,586</h3>
                                  <span class="badge bg-light-success ms-2">30%</span>
                                </div>
                                <p class="mb-0 text-white text-opacity-75">Total Earnings</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="d-flex align-items-center">
                              <div class="avtar bg-white bg-opacity-50 flex-shrink-0">
                                <i class="ti ti-zoom-money text-white f-30"></i>
                              </div>
                              <div class="flex-grow-1 ms-3">
                                <div class="d-inline-flex align-items-center mb-1">
                                  <h3 class="mb-0 text-white">344,624</h3>
                                  <span class="badge bg-light-success ms-2">12%</span>
                                </div>
                                <p class="mb-0 text-white text-opacity-75">Total Expenses</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="earnings-wed" role="tabpanel" aria-labelledby="pills-earnings-wed">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="d-flex align-items-center">
                              <div class="avtar bg-white bg-opacity-50 flex-shrink-0">
                                <i class="ph-duotone ph-chart-bar text-white f-30"></i>
                              </div>
                              <div class="flex-grow-1 ms-3">
                                <div class="d-inline-flex align-items-center mb-1">
                                  <h3 class="mb-0 text-white">984,632</h3>
                                  <span class="badge bg-light-danger ms-2">10%</span>
                                </div>
                                <p class="mb-0 text-white text-opacity-75">Total Earnings</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="d-flex align-items-center">
                              <div class="avtar bg-white bg-opacity-50 flex-shrink-0">
                                <i class="ti ti-zoom-money text-white f-30"></i>
                              </div>
                              <div class="flex-grow-1 ms-3">
                                <div class="d-inline-flex align-items-center mb-1">
                                  <h3 class="mb-0 text-white">134,276</h3>
                                  <span class="badge bg-light-success ms-2">12%</span>
                                </div>
                                <p class="mb-0 text-white text-opacity-75">Total Expenses</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="earnings-thu" role="tabpanel" aria-labelledby="pills-earnings-thu">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="d-flex align-items-center">
                              <div class="avtar avtar-l bg-white bg-opacity-50 flex-shrink-0">
                                <i class="ph-duotone ph-chart-bar text-white f-30"></i>
                              </div>
                              <div class="flex-grow-1 ms-3">
                                <div class="d-inline-flex align-items-center mb-1">
                                  <h3 class="mb-0 text-white">222,586</h3>
                                  <span class="badge bg-light-success ms-2">30%</span>
                                </div>
                                <p class="mb-0 text-white text-opacity-75">Total Earnings</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="d-flex align-items-center">
                              <div class="avtar bg-white bg-opacity-50 flex-shrink-0">
                                <i class="ti ti-zoom-money text-white f-30"></i>
                              </div>
                              <div class="flex-grow-1 ms-3">
                                <div class="d-inline-flex align-items-center mb-1">
                                  <h3 class="mb-0 text-white">344,624</h3>
                                  <span class="badge bg-light-success ms-2">12%</span>
                                </div>
                                <p class="mb-0 text-white text-opacity-75">Total Expenses</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="earnings-fri" role="tabpanel" aria-labelledby="pills-earnings-fri">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="d-flex align-items-center">
                              <div class="avtar bg-white bg-opacity-50 flex-shrink-0">
                                <i class="ph-duotone ph-chart-bar text-white f-30"></i>
                              </div>
                              <div class="flex-grow-1 ms-3">
                                <div class="d-inline-flex align-items-center mb-1">
                                  <h3 class="mb-0 text-white">984,632</h3>
                                  <span class="badge bg-light-danger ms-2">10%</span>
                                </div>
                                <p class="mb-0 text-white text-opacity-75">Total Earnings</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="d-flex align-items-center">
                              <div class="avtar bg-white bg-opacity-50 flex-shrink-0">
                                <i class="ti ti-zoom-money text-white f-30"></i>
                              </div>
                              <div class="flex-grow-1 ms-3">
                                <div class="d-inline-flex align-items-center mb-1">
                                  <h3 class="mb-0 text-white">134,276</h3>
                                  <span class="badge bg-light-success ms-2">12%</span>
                                </div>
                                <p class="mb-0 text-white text-opacity-75">Total Expenses</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="earnings-sat" role="tabpanel" aria-labelledby="pills-earnings-sat">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="d-flex align-items-center">
                              <div class="avtar avtar-l bg-white bg-opacity-50 flex-shrink-0">
                                <i class="ph-duotone ph-chart-bar text-white f-30"></i>
                              </div>
                              <div class="flex-grow-1 ms-3">
                                <div class="d-inline-flex align-items-center mb-1">
                                  <h3 class="mb-0 text-white">222,586</h3>
                                  <span class="badge bg-light-success ms-2">30%</span>
                                </div>
                                <p class="mb-0 text-white text-opacity-75">Total Earnings</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="d-flex align-items-center">
                              <div class="avtar bg-white bg-opacity-50 flex-shrink-0">
                                <i class="ti ti-zoom-money text-white f-30"></i>
                              </div>
                              <div class="flex-grow-1 ms-3">
                                <div class="d-inline-flex align-items-center mb-1">
                                  <h3 class="mb-0 text-white">344,624</h3>
                                  <span class="badge bg-light-success ms-2">12%</span>
                                </div>
                                <p class="mb-0 text-white text-opacity-75">Total Expenses</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="earnings-sun" role="tabpanel" aria-labelledby="pills-earnings-sun">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="d-flex align-items-center">
                              <div class="avtar bg-white bg-opacity-50 flex-shrink-0">
                                <i class="ph-duotone ph-chart-bar text-white f-30"></i>
                              </div>
                              <div class="flex-grow-1 ms-3">
                                <div class="d-inline-flex align-items-center mb-1">
                                  <h3 class="mb-0 text-white">984,632</h3>
                                  <span class="badge bg-light-danger ms-2">10%</span>
                                </div>
                                <p class="mb-0 text-white text-opacity-75">Total Earnings</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="d-flex align-items-center">
                              <div class="avtar bg-white bg-opacity-50 flex-shrink-0">
                                <i class="ti ti-zoom-money text-white f-30"></i>
                              </div>
                              <div class="flex-grow-1 ms-3">
                                <div class="d-inline-flex align-items-center mb-1">
                                  <h3 class="mb-0 text-white">134,276</h3>
                                  <span class="badge bg-light-success ms-2">12%</span>
                                </div>
                                <p class="mb-0 text-white text-opacity-75">Total Expenses</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xl-5">
                <div class="card">
                  <div class="card-header d-flex align-items-center justify-content-between py-3">
                    <h5>Users From VietNam</h5>
                    <div class="dropdown">
                      <a
                        class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        ><i class="material-icons-two-tone f-18">more_vert</i></a
                      >
                      <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">View</a>
                        <a class="dropdown-item" href="#">Edit</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="avtar avtar-s bg-light-primary flex-shrink-0">
                        <i class="ph-duotone ph-money f-20"></i>
                      </div>
                      <div class="flex-grow-1 ms-3">
                        <p class="mb-0 text-muted">Total Earnings</p>
                        <h5 class="mb-0">$249.95</h5>
                      </div>
                    </div>
                    <div id="earnings-users-chart"></div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-6">
                        <div class="d-flex align-items-center">
                          <div class="avtar avtar-s bg-light-warning flex-shrink-0">
                            <i class="ph-duotone ph-lightning f-20"></i>
                          </div>
                          <div class="flex-grow-1 ms-2">
                            <p class="mb-0 text-muted">Total orders</p>
                            <h6 class="mb-0">235</h6>
                          </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="d-flex align-items-center">
                          <div class="avtar avtar-s bg-light-danger flex-shrink-0">
                            <i class="ph-duotone ph-map-pin f-20"></i>
                          </div>
                          <div class="flex-grow-1 ms-2">
                            <p class="mb-0 text-muted">Total appointments</p>
                            <h6 class="mb-0">116</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>Total Sales</h5>
                    <i class="ph-duotone ph-info f-20 ms-1" data-bs-toggle="tooltip" data-bs-title="Total Sales"></i>
                  </div>
                  <div class="card-body">
                    <div class="d-flex align-items-center justify-content-center">
                      <h3 class="mb-0 me-1">$ 82.99</h3>
                      <span class="badge bg-success"><i class="ti ti-arrow-narrow-up"></i> 2.6%</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-3 flex-wrap">
                      <p class="mb-0">Online store</p>
                      <div class="d-flex align-items-center">
                        <h5 class="mb-0 me-1">$1550.99</h5>
                        <span class="badge bg-light-success"><i class="ti ti-arrow-narrow-up"></i> 2.6%</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap">
                      <p class="mb-0">In-store</p>
                      <div class="d-flex align-items-center">
                        <h5 class="mb-0 me-1">$1332.00</h5>
                        <span class="badge bg-light-danger"><i class="ti ti-arrow-narrow-down"></i> 2.6%</span>
                      </div> </div
                    ><div id="total-sales-chart"></div>
                  </div>
                </div>
              </div>
              {{-- <div class="col-md-6 col-xl-4">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                      <h5>Your team performance</h5>
                      <i class="ph-duotone ph-arrow-square-out f-20 ms-1" data-bs-toggle="tooltip" data-bs-title="Your team performance"></i>
                    </div>
                    <select class="form-select form-select-sm w-auto border-0 shadow-none">
                      <option>Today</option>
                      <option selected="">This week</option>
                      <option>Monthly</option>
                    </select>
                    <div id="performance-chart"></div>
                    <div class="text-center">
                      <p>your team performance is 5% better this week</p>
                      <div>
                        <button class="btn btn-primary mb-3">View details</button>
                      </div>
                      <div class="d-inline-flex align-items-center m-1">
                        <p class="mb-0"><i class="ph-duotone ph-circle text-primary f-12"></i> Completed </p>
                        <span class="badge bg-light-secondary ms-1">56</span>
                      </div>
                      <div class="d-inline-flex align-items-center m-1">
                        <p class="mb-0"><i class="ph-duotone ph-circle text-secondary f-12"></i> Percentage </p>
                        <span class="badge bg-light-danger ms-1">34</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-xl-4">
                <div class="card">
                  <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>Overview</h5>
                    <i class="ph-duotone ph-info f-20 ms-1" data-bs-toggle="tooltip" data-bs-title="Overview"></i>
                  </div>
                  <div class="card-body">
                    <div id="overview-bar-chart"></div>
                    <div class="bg-body mt-3 py-2 px-3 rounded d-flex align-items-center justify-content-between">
                      <p class="mb-0"><i class="ph-duotone ph-circle text-danger f-12"></i> Apps</p>
                      <h5 class="mb-0 ms-1">10+</h5>
                    </div>
                    <div class="bg-body mt-1 py-2 px-3 rounded d-flex align-items-center justify-content-between">
                      <p class="mb-0"><i class="ph-duotone ph-circle text-primary f-12"></i> Other</p>
                      <h5 class="mb-0 ms-1">5</h5>
                    </div>
                    <div class="bg-body mt-1 py-2 px-3 rounded d-flex align-items-center justify-content-between">
                      <p class="mb-0"><i class="ph-duotone ph-circle text-purple-500 f-12"></i> Widgets</p>
                      <h5 class="mb-0 ms-1">150+</h5>
                    </div>
                    <div class="bg-body mt-1 py-2 px-3 rounded d-flex align-items-center justify-content-between">
                      <p class="mb-0"><i class="ph-duotone ph-circle text-success f-12"></i> Forms</p>
                      <h5 class="mb-0 ms-1">50+</h5>
                    </div>
                    <div class="bg-body mt-1 py-2 px-3 rounded d-flex align-items-center justify-content-between">
                      <p class="mb-0"><i class="ph-duotone ph-circle text-warning f-12"></i> Components</p>
                      <h5 class="mb-0 ms-1">200+</h5>
                    </div>
                    <div class="bg-body mt-1 py-2 px-3 rounded d-flex align-items-center justify-content-between">
                      <p class="mb-0"><i class="ph-duotone ph-circle text-info f-12"></i> Pages</p>
                      <h5 class="mb-0 ms-1">150+</h5>
                    </div>
                  </div>
                </div>
              </div> --}}
        </div>
    </div>
</x-app-layout>
