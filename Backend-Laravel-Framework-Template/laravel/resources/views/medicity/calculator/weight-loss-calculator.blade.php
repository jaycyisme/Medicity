<x-main-layout>
    <!-- Terms -->
    <div class="doctor-content">
        <div class="container mt-5">
            <div class="row" style="margin-top: 100px;">
                <div class="col-lg-10 mx-auto">
                    <div class="booking-wizard">
                        <ul class="form-wizard-steps d-sm-flex align-items-center justify-content-center" id="progressbar2">
                            <li class="progress-active">
                                <div class="profile-step">
                                    <span class="multi-steps">1</span>
                                    <div class="step-section">
                                        <h6>STEP 1 OF 5</h6>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="profile-step">
                                    <span class="multi-steps">2</span>
                                    <div class="step-section">
                                        <h6>STEP 2 OF 5</h6>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="profile-step">
                                    <span class="multi-steps">3</span>
                                    <div class="step-section">
                                        <h6>STEP 3 OF 5</h6>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="profile-step">
                                    <span class="multi-steps">4</span>
                                    <div class="step-section">
                                        <h6>STEP 4 OF 5</h6>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="profile-step">
                                    <span class="multi-steps">5</span>
                                    <div class="step-section">
                                        <h6>STEP 5 OF 5</h6>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="booking-widget multistep-form mb-5">
                        <form action="{{ route('macro.calculate') }}" method="POST">
                            @csrf
                            <fieldset id="first">
                                <div class="card booking-card mb-0">
                                    <div class="card-header">
                                        <div class="booking-header pb-0">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center flex-wrap rpw-gap-2 flex-wrap row-gap-2">
                                                        <h2 class="mb-1" style="margin: auto;">Let's start by getting to know you</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body booking-body">
                                        <div class="card mb-0">
                                            <div class="card-body pb-1">
                                                <div class=" row mb-5">
                                                    <label class="col-form-label col-lg-4 col-sm-12 text-lg-end">What's your age?</label>
                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <div class="row align-items-center g-5">
                                                        <div class="col-sm-4">
                                                        <input type="text" name="age" class="form-control" id="pc-no_ui_slider-1-input" placeholder="Age" required>
                                                        </div>
                                                        <div class="col-sm-8">
                                                        <div id="pc-no_ui_slider-1" class="pc-no_ui_slider--drag-danger"></div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class=" row mb-5">
                                                    <label class="col-form-label col-lg-4 col-sm-12 text-lg-end">How tall are you?</label>
                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <div class="row align-items-center g-5">
                                                        <div class="col-sm-4">
                                                        <input type="text" name="height" class="form-control" id="pc-no_ui_slider-2-input" placeholder="Height" required>
                                                        </div>
                                                        <div class="col-sm-8">
                                                        <div id="pc-no_ui_slider-2" class="pc-no_ui_slider--drag-danger"></div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class=" row mb-5">
                                                    <label class="col-form-label col-lg-4 col-sm-12 text-lg-end">How much do you weigh right now?</label>
                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <div class="row align-items-center g-5">
                                                        <div class="col-sm-4">
                                                        <input type="text" name="weight" class="form-control" id="pc-no_ui_slider-3-input" placeholder="Weight" required>
                                                        </div>
                                                        <div class="col-sm-8">
                                                        <div id="pc-no_ui_slider-3" class="pc-no_ui_slider--drag-danger"></div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class=" row mb-5">
                                                    <label class="col-form-label col-lg-4 col-sm-12 text-lg-end">Gender</label>
                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="radio" name="gender" value="male" id="flexCheckDefault" checked>
                                                            <label class="form-check-label" for="flexCheckDefault"> Male </label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="radio" name="gender" value="female" id="flexCheckChecked">
                                                            <label class="form-check-label" for="flexCheckChecked"> Female </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between">
                                            <a href="javascript:void(0);" class="btn btn-md btn-dark inline-flex align-items-center rounded-pill">
                                                <i class="isax isax-arrow-left-2 me-1"></i>
                                                Back
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-md btn-primary-gradient next_btns inline-flex align-items-center rounded-pill">
                                                Next
                                                <i class="isax isax-arrow-right-3 ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="card booking-card mb-0">
                                    <div class="card-header">
                                        <div class="booking-header pb-0">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center flex-wrap rpw-gap-2 flex-wrap row-gap-2">
                                                        <h2 class="mb-1" style="margin: auto;">What's your goal?</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body booking-body">
                                        <div class="card mb-0">
                                            <div class="card-body pb-1">
                                                {{-- <h6 class="mb-3">Select Appointment Type</h6> --}}
                                                <div class="row">
                                                    <div class=" col-md-12 col-sm-12">
                                                        <div class="radio-select text-center">
                                                            <input class="form-check-input ms-0 mt-0" name="goal" value="Lose Weight" type="radio" id="service7" checked>
                                                            <label class="form-check-label" for="service7">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2"><img src="{{ asset('medicity/assets/img/calculator/weigh-scale.png') }}" class="cacl-icon-rounded" alt=""></span>
                                                                    <span>
                                                                        <span class="service-title option-cacl-title d-block mb-1">Lose Weight</span>
                                                                        <span class="fs-14">Lose at least 10 to 15 pounds (or more).</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>

                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-12 col-sm-12">
                                                        <div class="radio-select text-center">
                                                            <input class="form-check-input ms-0 mt-0" name="goal" value="Build Muscle" type="radio" id="service8">
                                                            <label class="form-check-label" for="service8">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2"><img src="{{ asset('medicity/assets/img/calculator/build-muscle.png') }}" class="cacl-icon-rounded" alt=""></span>
                                                                    <span>
                                                                        <span class="service-title option-cacl-title d-block mb-1">Build Muscle</span>
                                                                        <span class="fs-14">Build muscle and increase your overall body weight.</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>

                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-12 col-sm-12">
                                                        <div class="radio-select text-center">
                                                            <input class="form-check-input ms-0 mt-0" name="goal" value="Athletic Performance" type="radio" id="service9">
                                                            <label class="form-check-label" for="service9">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2"><img src="{{ asset('medicity/assets/img/calculator/exercise.png') }}" class="cacl-icon-rounded" alt=""></span>
                                                                    <span>
                                                                        <span class="service-title option-cacl-title d-block mb-1">Athletic Performance</span>
                                                                        <span class="fs-14">Support long and intense athletic training.</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>

                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-12 col-sm-12">
                                                        <div class="radio-select text-center">
                                                            <input class="form-check-input ms-0 mt-0" name="goal" value="Body Recomposition" type="radio" id="service10">
                                                            <label class="form-check-label" for="service10">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2"><img src="{{ asset('medicity/assets/img/calculator/lose-weight.png') }}" class="cacl-icon-rounded" alt=""></span>
                                                                    <span>
                                                                        <span class="service-title option-cacl-title d-block mb-1">Body Recomposition</span>
                                                                        <span class="fs-14">Lose body fat, while simultaneously building muscle.</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>

                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-12 col-sm-12">
                                                        <div class="radio-select text-center">
                                                            <input class="form-check-input ms-0 mt-0" name="goal" value="Improve Health" type="radio" id="service11">
                                                            <label class="form-check-label" for="service11">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2"><img src="{{ asset('medicity/assets/img/calculator/medical-care.png') }}" class="cacl-icon-rounded" alt=""></span>
                                                                    <span>
                                                                        <span class="service-title option-cacl-title d-block mb-1">Improve Health</span>
                                                                        <span class="fs-14">Improve nutrition and health, maintaining current weight.</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>

                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class=" row mt-5 mb-3">
                                                    <label class="col-form-label col-lg-4 col-sm-12 text-lg-end">How much do you want to weigh?</label>
                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <div class="row align-items-center g-5">
                                                        <div class="col-sm-4">
                                                        <input type="text" class="form-control" id="pc-no_ui_slider-weigh-input" name="goal_weight" placeholder="Goal Weight">
                                                        </div>
                                                        <div class="col-sm-8">
                                                        <div id="pc-no_ui_slider-weigh" class="pc-no_ui_slider--drag-danger"></div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class=" row mb-5">
                                                    <label class="col-form-label col-lg-4 col-sm-12 text-lg-end">By when?</label>
                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <div class="row align-items-center g-5">
                                                        <div class="col-sm-6">
                                                        <input type="date" name="target_date" class="form-control" placeholder="Date">
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between">
                                            <a href="javascript:void(0);" class="btn btn-md btn-dark prev_btns inline-flex align-items-center rounded-pill">
                                                <i class="isax isax-arrow-left-2 me-1"></i>
                                                Back
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-md btn-primary-gradient next_btns inline-flex align-items-center rounded-pill">
                                                Next
                                                <i class="isax isax-arrow-right-3 ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="card booking-card mb-0">
                                    <div class="card-header">
                                        <div class="booking-header pb-0">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center flex-wrap rpw-gap-2 flex-wrap row-gap-2">
                                                        <h2 class="mb-1" style="margin: auto;">What's your preferred eating style?</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body booking-body">
                                        <div class="card mb-0">
                                            <div class="card-body pb-1">
                                                {{-- <h6 class="mb-3">Select Appointment Type</h6> --}}
                                                <div class="row">
                                                    <div class=" col-md-12 col-sm-12">
                                                        <div class="radio-select text-center">
                                                            <input class="form-check-input ms-0 mt-0" name="eating_style" value="anything" type="radio" id="service12" checked>
                                                            <label class="form-check-label" for="service12">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2"><img src="{{ asset('medicity/assets/img/calculator/burger.png') }}" class="cacl-icon-rounded" alt=""></span>
                                                                    <span>
                                                                        <span class="service-title option-cacl-title d-block mb-1">Anything</span>
                                                                        <span class="fs-14">No major preferences or restrictions. Will eat practically anything.</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>

                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-12 col-sm-12">
                                                        <div class="radio-select text-center">
                                                            <input class="form-check-input ms-0 mt-0" name="eating_style" value="mediterranean" type="radio" id="service13">
                                                            <label class="form-check-label" for="service13">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2"><img src="{{ asset('medicity/assets/img/calculator/mediterranean-diet.png') }}" class="cacl-icon-rounded" alt=""></span>
                                                                    <span>
                                                                        <span class="service-title option-cacl-title d-block mb-1">Mediterranean</span>
                                                                        <span class="fs-14">Features plant foods, healthy fats, and some lean protein.</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>

                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-12 col-sm-12">
                                                        <div class="radio-select text-center">
                                                            <input class="form-check-input ms-0 mt-0" name="eating_style" value="paleo" type="radio" id="service14">
                                                            <label class="form-check-label" for="service14">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2"><img src="{{ asset('medicity/assets/img/calculator/paleo-diet.png') }}" class="cacl-icon-rounded" alt=""></span>
                                                                    <span>
                                                                        <span class="service-title option-cacl-title d-block mb-1">Paleo</span>
                                                                        <span class="fs-14">Emphasizes meats, vegetables, and healthy fats.</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>

                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-12 col-sm-12">
                                                        <div class="radio-select text-center">
                                                            <input class="form-check-input ms-0 mt-0" name="eating_style" value="vegetarian" type="radio" id="service15">
                                                            <label class="form-check-label" for="service15">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2"><img src="{{ asset('medicity/assets/img/calculator/salad.png') }}" class="cacl-icon-rounded" alt=""></span>
                                                                    <span>
                                                                        <span class="service-title option-cacl-title d-block mb-1">Vegetarian</span>
                                                                        <span class="fs-14">A plant-based diet, plus small amounts of eggs and dairy.</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>

                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-12 col-sm-12">
                                                        <div class="radio-select text-center">
                                                            <input class="form-check-input ms-0 mt-0" name="eating_style" value="ketogenic" type="radio" id="service16">
                                                            <label class="form-check-label" for="service16">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2"><img src="{{ asset('medicity/assets/img/calculator/ketogenic-diet.png') }}" class="cacl-icon-rounded" alt=""></span>
                                                                    <span>
                                                                        <span class="service-title option-cacl-title d-block mb-1">Ketogenic</span>
                                                                        <span class="fs-14">A high-fat, very-low carbohydrate diet.</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>

                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-12 col-sm-12">
                                                        <div class="radio-select text-center">
                                                            <input class="form-check-input ms-0 mt-0" name="eating_style" value="plantBased" type="radio" id="service17">
                                                            <label class="form-check-label" for="service17">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2"><img src="{{ asset('medicity/assets/img/calculator/vegetable.png') }}" class="cacl-icon-rounded" alt=""></span>
                                                                    <span>
                                                                        <span class="service-title option-cacl-title d-block mb-1">Fully Plant-Based</span>
                                                                        <span class="fs-14">All plant-based foods. No animal products of any kind.</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>

                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class=" row mt-5 mb-3">
                                                    <label class="col-form-label col-lg-6 col-sm-12 text-lg-end">How many meals do you like to eat each day?</label>
                                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <div class="row align-items-center g-5">
                                                        <div class="col-sm-4">
                                                        <input type="text" name="meals_per_day" class="form-control" id="pc-no_ui_slider-meals-input" placeholder="Meal">
                                                        </div>
                                                        <div class="col-sm-8">
                                                        <div id="pc-no_ui_slider-meals" class="pc-no_ui_slider--drag-danger"></div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between">
                                            <a href="javascript:void(0);" class="btn btn-md btn-dark prev_btns inline-flex align-items-center rounded-pill">
                                                <i class="isax isax-arrow-left-2 me-1"></i>
                                                Back
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-md btn-primary-gradient next_btns inline-flex align-items-center rounded-pill">
                                                Next
                                                <i class="isax isax-arrow-right-3 ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="card booking-card mb-0">
                                    <div class="card-header">
                                        <div class="booking-header pb-0">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center flex-wrap rpw-gap-2 flex-wrap row-gap-2">
                                                        <h2 class="mb-1" style="margin: auto;">How active are you daily, excluding exercise?</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body booking-body">
                                        <div class="card mb-0">
                                            <div class="card-body pb-1">
                                                {{-- <h6 class="mb-3">Select Appointment Type</h6> --}}
                                                <div class="row">
                                                    <div class=" col-md-12 col-sm-12">
                                                        <div class="radio-select text-center">
                                                            <input class="form-check-input ms-0 mt-0" name="daily_activity" value="veryLight" type="radio" id="service18" checked>
                                                            <label class="form-check-label" for="service18">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2"><img src="{{ asset('medicity/assets/img/calculator/slow.png') }}" class="cacl-icon-rounded" alt=""></span>
                                                                    <span>
                                                                        <span class="service-title option-cacl-title d-block mb-1">Very Light</span>
                                                                        <span class="fs-14">Sitting most of the day (e.g., desk job).</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>

                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-12 col-sm-12">
                                                        <div class="radio-select text-center">
                                                            <input class="form-check-input ms-0 mt-0" name="daily_activity" value="light" type="radio" id="service19">
                                                            <label class="form-check-label" for="service19">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2"><img src="{{ asset('medicity/assets/img/calculator/medium.png') }}" class="cacl-icon-rounded" alt=""></span>
                                                                    <span>
                                                                        <span class="service-title option-cacl-title d-block mb-1">Light</span>
                                                                        <span class="fs-14">A mix of sitting, standing, and light activity (e.g., teacher).</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>

                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-12 col-sm-12">
                                                        <div class="radio-select text-center">
                                                            <input class="form-check-input ms-0 mt-0" name="daily_activity" value="moderate" type="radio" id="service20">
                                                            <label class="form-check-label" for="service20">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2"><img src="{{ asset('medicity/assets/img/calculator/speedometer.png') }}" class="cacl-icon-rounded" alt=""></span>
                                                                    <span>
                                                                        <span class="service-title option-cacl-title d-block mb-1">Moderate</span>
                                                                        <span class="fs-14">Continuous gentle to moderate activity (e.g., restaurant server).</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>

                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-12 col-sm-12">
                                                        <div class="radio-select text-center">
                                                            <input class="form-check-input ms-0 mt-0" name="daily_activity" value="heavy" type="radio" id="service21">
                                                            <label class="form-check-label" for="service21">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2"><img src="{{ asset('medicity/assets/img/calculator/fast.png') }}" class="cacl-icon-rounded" alt=""></span>
                                                                    <span>
                                                                        <span class="service-title option-cacl-title d-block mb-1">Heavy</span>
                                                                        <span class="fs-14">Strenuous activity throughout the day (e.g., construction work).</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>

                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between">
                                            <a href="javascript:void(0);" class="btn btn-md btn-dark prev_btns inline-flex align-items-center rounded-pill">
                                                <i class="isax isax-arrow-left-2 me-1"></i>
                                                Back
                                            </a>
                                            <a href="javascript:void(0);" class="btn btn-md btn-primary-gradient next_btns inline-flex align-items-center rounded-pill">
                                                Next
                                                <i class="isax isax-arrow-right-3 ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="card booking-card mb-0">
                                    <div class="card-header">
                                        <div class="booking-header pb-0">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center flex-wrap rpw-gap-2 flex-wrap row-gap-2">
                                                        <h2 class="mb-1" style="margin: auto;">What best describes your weekly workouts?</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body booking-body">
                                        <div class="card mb-0">
                                            <div class="card-body pb-1">
                                                {{-- <h6 class="mb-3">Select Appointment Type</h6> --}}
                                                <div class="row">
                                                    <div class=" col-md-12 col-sm-12">
                                                        <div class="radio-select text-center">
                                                            <input class="form-check-input ms-0 mt-0" name="exercise_level" value="veryLight" type="radio" id="service22" checked>
                                                            <label class="form-check-label" for="service22">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2"><img src="{{ asset('medicity/assets/img/calculator/battery1.png') }}" class="cacl-icon-rounded" alt=""></span>
                                                                    <span>
                                                                        <span class="service-title option-cacl-title d-block mb-1">Very Light</span>
                                                                        <span class="fs-14">Almost no purposeful exercise.</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>

                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-12 col-sm-12">
                                                        <div class="radio-select text-center">
                                                            <input class="form-check-input ms-0 mt-0" name="exercise_level" value="light" type="radio" id="service23">
                                                            <label class="form-check-label" for="service23">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2"><img src="{{ asset('medicity/assets/img/calculator/battery2.png') }}" class="cacl-icon-rounded" alt=""></span>
                                                                    <span>
                                                                        <span class="service-title option-cacl-title d-block mb-1">Light</span>
                                                                        <span class="fs-14">1-3 hours of gentle to moderate exercise.</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>

                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-12 col-sm-12">
                                                        <div class="radio-select text-center">
                                                            <input class="form-check-input ms-0 mt-0" name="exercise_level" value="moderate" type="radio" id="service24">
                                                            <label class="form-check-label" for="service24">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2"><img src="{{ asset('medicity/assets/img/calculator/battery3.png') }}" class="cacl-icon-rounded" alt=""></span>
                                                                    <span>
                                                                        <span class="service-title option-cacl-title d-block mb-1">Moderate</span>
                                                                        <span class="fs-14">3-4 hours of moderate exercise.</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>

                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-12 col-sm-12">
                                                        <div class="radio-select text-center">
                                                            <input class="form-check-input ms-0 mt-0" name="exercise_level" value="intense" type="radio" id="service25">
                                                            <label class="form-check-label" for="service25">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2"><img src="{{ asset('medicity/assets/img/calculator/battery4.png') }}" class="cacl-icon-rounded" alt=""></span>
                                                                    <span>
                                                                        <span class="service-title option-cacl-title d-block mb-1">Intense</span>
                                                                        <span class="fs-14">4-6 hours of moderate to strenuous exercise.</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>

                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class=" col-md-12 col-sm-12">
                                                        <div class="radio-select text-center">
                                                            <input class="form-check-input ms-0 mt-0" name="exercise_level" value="veryIntense" type="radio" id="service26">
                                                            <label class="form-check-label" for="service26">
                                                                <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                    <span class="d-inline-block me-2"><img src="{{ asset('medicity/assets/img/calculator/battery5.png') }}" class="cacl-icon-rounded" alt=""></span>
                                                                    <span>
                                                                        <span class="service-title option-cacl-title d-block mb-1">Very Intense</span>
                                                                        <span class="fs-14">7+ hours of strenuous exercise.</span>
                                                                        <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>

                                                                    </span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between">
                                            <a href="javascript:void(0);" class="btn btn-md btn-dark prev_btns inline-flex align-items-center rounded-pill">
                                                <i class="isax isax-arrow-left-2 me-1"></i>
                                                Back
                                            </a>
                                            <button type="submit" class="btn btn-md btn-primary-gradient next_btns inline-flex align-items-center rounded-pill">
                                                Calculate Result
                                                <i class="isax isax-arrow-right-3 ms-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Terms -->
</x-main-layout>
