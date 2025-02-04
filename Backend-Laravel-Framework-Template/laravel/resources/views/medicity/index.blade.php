<x-main-layout>
    <!-- Home Banner -->
    <section class="banner-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-content aos" data-aos="fade-up">
                        <h1>Consult <span>Best Doctors</span> Your Nearby Location.</h1>
                        <img src="{{ asset('medicity/assets/img/icons/header-icon.svg') }}" class="header-icon" alt="header-icon">
                        <p>Embark on your healing journey with Doccure</p>
                        <a href="booking.html" class="btn">Start a Consult</a>
                        <div class="banner-arrow-img">
                            <img src="{{ asset('medicity/assets/img/down-arrow-img.png') }}" class="img-fluid" alt="down-arrow">
                        </div>
                    </div>
                    <div class="search-box-one aos" data-aos="fade-up">
                        <form action="https://doccure.dreamstechnologies.com/html/template/search-2.html">
                            <div class="search-input search-line">
                                <i class="feather-search bficon"></i>
                                <div class=" mb-0">
                                    <input type="text" class="form-control" placeholder="Search doctors, clinics, hospitals, etc">
                                </div>
                            </div>
                            <div class="search-input search-map-line">
                                <i class="feather-map-pin"></i>
                                <div class=" mb-0">
                                    <input type="text" class="form-control" placeholder="Location">
                                    <a class="current-loc-icon current_location" href="javascript:void(0);">
                                        <i class="feather-crosshair"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="search-input search-calendar-line">
                                <i class="feather-calendar"></i>
                                <div class=" mb-0">
                                    <input type="text" class="form-control datetimepicker" placeholder="Date">
                                </div>
                            </div>
                            <div class="form-search-btn">
                                <button class="btn" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-img aos" data-aos="fade-up">
                        <img src="{{ asset('medicity/assets/img/banner-img.png') }}" class="img-fluid" alt="patient-image">
                        <div class="banner-img1">
                            <img src="{{ asset('medicity/assets/img/banner/banner-img1.svg') }}" class="img-fluid" alt="checkup-image">
                        </div>
                        <div class="banner-img2">
                            <img src="{{ asset('medicity/assets/img/banner/banner-img2.svg') }}" class="img-fluid" alt="doctor-slide">
                        </div>
                        <div class="banner-img3">
                            <img src="{{ asset('medicity/assets/img/banner/banner-img3.svg') }}" class="img-fluid" alt="doctors-list">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Home Banner -->

    <!-- Services Section -->
    <section class="specialities-section-one" style="padding: 0;">
        <div class="container">
            <div class="service-sec-one">
                <div class="row row-cols-7 row-cols-xxl-7 row-cols-xl-4 row-cols-lg-4 rows-cols-md-6 justify-content-center">
                    <div class="col-12 d-flex col-xxl col-lg-3 col-sm-6">
                        <a href="" class="serv-wrap blue-bg flex-fill">
                            <span>
                                <img src="{{ asset('medicity/assets/img/icons/service-01.svg') }}" alt="heart-image">
                            </span>
                            <h4>Book Appointment</h4>
                        </a>
                    </div>
                    <div class="col-12 d-flex col-xxl col-lg-3 col-sm-6">
                        <a href="" class="serv-wrap green-bg flex-fill">
                            <span>
                                <img src="{{ asset('medicity/assets/img/icons/service-02.svg') }}" alt="heart-image">
                            </span>
                            <h4>Lab Testing Services</h4>
                        </a>
                    </div>
                    <div class="col-12 d-flex col-xxl col-lg-3 col-sm-6">
                        <a href="" class="serv-wrap info-bg flex-fill">
                            <span>
                                <img src="{{ asset('medicity/assets/img/icons/service-03.svg') }}" alt="heart-image">
                            </span>
                            <h4>Medicines & Supplies</h4>
                        </a>
                    </div>
                    <div class="col-12 d-flex col-xxl col-lg-3 col-sm-6">
                        <a href="" class="serv-wrap red-bg flex-fill">
                            <span>
                                <img src="{{ asset('medicity/assets/img/icons/service-04.svg') }}" alt="heart-image">
                            </span>
                            <h4>Hospitals / Clinics</h4>
                        </a>
                    </div>
                    <div class="col-12 d-flex col-xxl col-lg-3 col-sm-6">
                        <a href="" class="serv-wrap success-bg flex-fill">
                            <span>
                                <img src="{{ asset('medicity/assets/img/icons/service-05.svg') }}" alt="heart-image">
                            </span>
                            <h4>Health Care Services</h4>
                        </a>
                    </div>
                    <div class="col-12 d-flex col-xxl col-lg-3 col-sm-6">
                        <a href="" class="serv-wrap pink-bg flex-fill">
                            <span>
                                <img src="{{ asset('medicity/assets/img/icons/service-06.svg') }}" alt="heart-image">
                            </span>
                            <h4>Talk to Doctor’s</h4>
                        </a>
                    </div>
                    <div class="col-12 d-flex col-xxl col-lg-3 col-sm-6">
                        <a href="" class="serv-wrap danger-bg flex-fill">
                            <span>
                                <img src="{{ asset('medicity/assets/img/icons/service-07.svg') }}" alt="heart-image">
                            </span>
                            <h4>Disease Lookup</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section -->

    <!-- Specialities Section -->
    <section class="clinics-section">
        <div class="shapes">
            <img src="{{ asset('medicity/assets/img/shapes/shape-1.png') }}" alt="shape-image" class="img-fluid shape-1">
            <img src="{{ asset('medicity/assets/img/shapes/shape-2.png') }}" alt="shape-image" class="img-fluid shape-2">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 aos" data-aos="fade-up">
                    <div class="section-heading">
                        <h2>Clinic & Specialities</h2>
                        <p>Access to expert physicians and surgeons, advanced technologies and top-quality surgery
                            facilities right here.</p>
                    </div>
                </div>
                <div class="col-md-6 text-end aos" data-aos="fade-up">
                    <div class="owl-nav slide-nav-1 text-end nav-control"></div>
                </div>
            </div>
            <div class="owl-carousel clinics owl-theme aos" data-aos="fade-up">
                <div class="item">
                    <div class="clinic-item">
                        <div class="clinics-card">
                            <div class="clinics-img">
                                <img src="{{ asset('medicity/assets/img/clinic/clinic-1.jpg') }}" alt="clinic-image" class="img-fluid">
                            </div>
                            <div class="clinics-info">
                                <span class="clinic-img">
                                    <img src="{{ asset('medicity/assets/img/category/category-01.svg') }}" alt="kidney-image" class="img-fluid">
                                </span>
                                <a href="#"><span>Urology</span></a>
                            </div>
                        </div>
                        <div class="clinics-icon">
                            <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="clinic-item">
                        <div class="clinics-card">
                            <div class="clinics-img">
                                <img src="{{ asset('medicity/assets/img/clinic/clinic-2.jpg') }}" alt="clinic-image" class="img-fluid">
                            </div>
                            <div class="clinics-info">
                                <span class="clinic-img">
                                    <img src="{{ asset('medicity/assets/img/category/category-02.svg') }}" alt="bone-image" class="img-fluid">
                                </span>
                                <a href="#"><span>Orthopedic</span></a>
                            </div>
                        </div>
                        <div class="clinics-icon">
                            <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="clinic-item">
                        <div class="clinics-card">
                            <div class="clinics-img">
                                <img src="{{ asset('medicity/assets/img/clinic/clinic-4.jpg') }}" alt="client-image" class="img-fluid">
                            </div>
                            <div class="clinics-info">
                                <span class="clinic-img">
                                    <img src="{{ asset('medicity/assets/img/category/category-03.svg') }}" alt="heart-image" class="img-fluid">
                                </span>
                                <a href="#"><span>Cardiologist</span></a>
                            </div>
                        </div>
                        <div class="clinics-icon">
                            <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="clinic-item">
                        <div class="clinics-card">
                            <div class="clinics-img">
                                <img src="{{ asset('medicity/assets/img/clinic/clinic-3.jpg') }}" alt="client-image" class="img-fluid">
                            </div>
                            <div class="clinics-info">
                                <span class="clinic-img">
                                    <img src="{{ asset('medicity/assets/img/category/category-04.svg') }}" alt="teeth-image" class="img-fluid">
                                </span>
                                <a href="#"><span>Dentist</span></a>
                            </div>
                        </div>
                        <div class="clinics-icon">
                            <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="clinic-item">
                        <div class="clinics-card">
                            <div class="clinics-img">
                                <img src="{{ asset('medicity/assets/img/clinic/clinic-5.jpg') }}" alt="client-image" class="img-fluid">
                            </div>
                            <div class="clinics-info">
                                <span class="clinic-img">
                                    <img src="{{ asset('medicity/assets/img/category/category-05.svg') }}" alt="brain-image" class="img-fluid">
                                </span>
                                <a href="#"><span>Neurology</span></a>
                            </div>
                        </div>
                        <div class="clinics-icon">
                            <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="clinic-item">
                        <div class="clinics-card">
                            <div class="clinics-img">
                                <img src="{{ asset('medicity/assets/img/clinic/clinic-1.jpg') }}" alt="clinic-image" class="img-fluid">
                            </div>
                            <div class="clinics-info">
                                <span class="clinic-img">
                                    <img src="{{ asset('medicity/assets/img/category/category-06.svg') }}" alt="heart-image" class="img-fluid">
                                </span>
                                <a href="#"><span>Cardiologist</span></a>
                            </div>
                        </div>
                        <div class="clinics-icon">
                            <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-content" data-aos="fade-up" style="text-align: center; ">
                    <a href="search.html" class="btn" style="font-size: 16px;">
                        See All Specialities
                    </a>
            </div>
        </div>
    </section>
    <!-- /Specialities Section -->

    <!-- Doctors Section -->
    <section class="doctors-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 aos" data-aos="fade-up">
                    <div class="section-header-one section-header-slider text-center">
                        <h2 class="section-title">Best Doctors</h2>
                    </div>
                </div>
            </div>
            <section class="section section-doctor">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 aos" data-aos="fade-up">
                            <div class="section-header ">
                                <h2>Book Our Doctor</h2>
                                <p>Lorem Ipsum is simply dummy text </p>
                            </div>
                            <div class="about-content">
                                <p>It is a long established fact that a reader will be distracted by the readable content of
                                    a page when looking at its layout. The point of using Lorem Ipsum.</p>
                                <p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem
                                    ipsum' will uncover many web sites still in their infancy. Various versions have evolved
                                    over the years, sometimes</p>
                                <a href="javascript:void(0)">Read More..</a>
                            </div>
                        </div>
                        <div class="col-lg-8 aos" data-aos="fade-up">
                            <div class="doctor-slider slider">

                                <!-- Doctor Widget -->
                                <div class="profile-widget">
                                    <div class="doc-img">
                                        <a href="doctor-profile.html">
                                            <img class="img-fluid" alt="User Image" src="{{ asset('medicity/assets/img/doctors/doctor-01.jpg') }}">
                                        </a>
                                        <a href="javascript:void(0)" class="fav-btn">
                                            <i class="far fa-bookmark"></i>
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="doctor-profile.html">Ruby Perrin</a>
                                            <i class="fas fa-check-circle verified"></i>
                                        </h3>
                                        <p class="speciality">MDS - Periodontology and Oral Implantology, BDS</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <span class="d-inline-block average-rating">(17)</span>
                                        </div>
                                        <ul class="available-info">
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i> Florida, USA
                                            </li>
                                            <li>
                                                <i class="far fa-clock"></i> Available on Fri, 22 Mar
                                            </li>
                                            <li>
                                                <i class="far fa-money-bill-alt"></i> $300 - $1000
                                                <i class="fas fa-info-circle" data-bs-toggle="tooltip"
                                                    title="Lorem Ipsum"></i>
                                            </li>
                                        </ul>
                                        <div class="row row-sm">
                                            <div class="col-6">
                                                <a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="booking.html" class="btn book-btn">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Doctor Widget -->

                                <!-- Doctor Widget -->
                                <div class="profile-widget">
                                    <div class="doc-img">
                                        <a href="doctor-profile.html">
                                            <img class="img-fluid" alt="User Image" src="{{ asset('medicity/assets/img/doctors/doctor-02.jpg') }}">
                                        </a>
                                        <a href="javascript:void(0)" class="fav-btn">
                                            <i class="far fa-bookmark"></i>
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="doctor-profile.html">Darren Elder</a>
                                            <i class="fas fa-check-circle verified"></i>
                                        </h3>
                                        <p class="speciality">BDS, MDS - Oral & Maxillofacial Surgery</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">(35)</span>
                                        </div>
                                        <ul class="available-info">
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i> Newyork, USA
                                            </li>
                                            <li>
                                                <i class="far fa-clock"></i> Available on Fri, 22 Mar
                                            </li>
                                            <li>
                                                <i class="far fa-money-bill-alt"></i> $50 - $300
                                                <i class="fas fa-info-circle" data-bs-toggle="tooltip"
                                                    title="Lorem Ipsum"></i>
                                            </li>
                                        </ul>
                                        <div class="row row-sm">
                                            <div class="col-6">
                                                <a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="booking.html" class="btn book-btn">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Doctor Widget -->

                                <!-- Doctor Widget -->
                                <div class="profile-widget">
                                    <div class="doc-img">
                                        <a href="doctor-profile.html">
                                            <img class="img-fluid" alt="User Image" src="{{ asset('medicity/assets/img/doctors/doctor-03.jpg') }}">
                                        </a>
                                        <a href="javascript:void(0)" class="fav-btn">
                                            <i class="far fa-bookmark"></i>
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="doctor-profile.html">Deborah Angel</a>
                                            <i class="fas fa-check-circle verified"></i>
                                        </h3>
                                        <p class="speciality">MBBS, MD - General Medicine, DNB - Cardiology</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">(27)</span>
                                        </div>
                                        <ul class="available-info">
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i> Georgia, USA
                                            </li>
                                            <li>
                                                <i class="far fa-clock"></i> Available on Fri, 22 Mar
                                            </li>
                                            <li>
                                                <i class="far fa-money-bill-alt"></i> $100 - $400
                                                <i class="fas fa-info-circle" data-bs-toggle="tooltip"
                                                    title="Lorem Ipsum"></i>
                                            </li>
                                        </ul>
                                        <div class="row row-sm">
                                            <div class="col-6">
                                                <a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="booking.html" class="btn book-btn">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Doctor Widget -->

                                <!-- Doctor Widget -->
                                <div class="profile-widget">
                                    <div class="doc-img">
                                        <a href="doctor-profile.html">
                                            <img class="img-fluid" alt="User Image" src="{{ asset('medicity/assets/img/doctors/doctor-04.jpg') }}">
                                        </a>
                                        <a href="javascript:void(0)" class="fav-btn">
                                            <i class="far fa-bookmark"></i>
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="doctor-profile.html">Sofia Brient</a>
                                            <i class="fas fa-check-circle verified"></i>
                                        </h3>
                                        <p class="speciality">MBBS, MS - General Surgery, MCh - Urology</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">(4)</span>
                                        </div>
                                        <ul class="available-info">
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i> Louisiana, USA
                                            </li>
                                            <li>
                                                <i class="far fa-clock"></i> Available on Fri, 22 Mar
                                            </li>
                                            <li>
                                                <i class="far fa-money-bill-alt"></i> $150 - $250
                                                <i class="fas fa-info-circle" data-bs-toggle="tooltip"
                                                    title="Lorem Ipsum"></i>
                                            </li>
                                        </ul>
                                        <div class="row row-sm">
                                            <div class="col-6">
                                                <a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="booking.html" class="btn book-btn">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Doctor Widget -->

                                <!-- Doctor Widget -->
                                <div class="profile-widget">
                                    <div class="doc-img">
                                        <a href="doctor-profile.html">
                                            <img class="img-fluid" alt="User Image" src="{{ asset('medicity/assets/img/doctors/doctor-05.jpg') }}">
                                        </a>
                                        <a href="javascript:void(0)" class="fav-btn">
                                            <i class="far fa-bookmark"></i>
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="doctor-profile.html">Marvin Campbell</a>
                                            <i class="fas fa-check-circle verified"></i>
                                        </h3>
                                        <p class="speciality">MBBS, MD - Ophthalmology, DNB - Ophthalmology</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">(66)</span>
                                        </div>
                                        <ul class="available-info">
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i> Michigan, USA
                                            </li>
                                            <li>
                                                <i class="far fa-clock"></i> Available on Fri, 22 Mar
                                            </li>
                                            <li>
                                                <i class="far fa-money-bill-alt"></i> $50 - $700
                                                <i class="fas fa-info-circle" data-bs-toggle="tooltip"
                                                    title="Lorem Ipsum"></i>
                                            </li>
                                        </ul>
                                        <div class="row row-sm">
                                            <div class="col-6">
                                                <a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="booking.html" class="btn book-btn">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Doctor Widget -->

                                <!-- Doctor Widget -->
                                <div class="profile-widget">
                                    <div class="doc-img">
                                        <a href="doctor-profile.html">
                                            <img class="img-fluid" alt="User Image" src="{{ asset('medicity/assets/img/doctors/doctor-06.jpg') }}">
                                        </a>
                                        <a href="javascript:void(0)" class="fav-btn">
                                            <i class="far fa-bookmark"></i>
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="doctor-profile.html">Katharine Berthold</a>
                                            <i class="fas fa-check-circle verified"></i>
                                        </h3>
                                        <p class="speciality">MS - Orthopaedics, MBBS, M.Ch - Orthopaedics</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">(52)</span>
                                        </div>
                                        <ul class="available-info">
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i> Texas, USA
                                            </li>
                                            <li>
                                                <i class="far fa-clock"></i> Available on Fri, 22 Mar
                                            </li>
                                            <li>
                                                <i class="far fa-money-bill-alt"></i> $100 - $500
                                                <i class="fas fa-info-circle" data-bs-toggle="tooltip"
                                                    title="Lorem Ipsum"></i>
                                            </li>
                                        </ul>
                                        <div class="row row-sm">
                                            <div class="col-6">
                                                <a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="booking.html" class="btn book-btn">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Doctor Widget -->

                                <!-- Doctor Widget -->
                                <div class="profile-widget">
                                    <div class="doc-img">
                                        <a href="doctor-profile.html">
                                            <img class="img-fluid" alt="User Image" src="{{ asset('medicity/assets/img/doctors/doctor-07.jpg') }}">
                                        </a>
                                        <a href="javascript:void(0)" class="fav-btn">
                                            <i class="far fa-bookmark"></i>
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="doctor-profile.html">Linda Tobin</a>
                                            <i class="fas fa-check-circle verified"></i>
                                        </h3>
                                        <p class="speciality">MBBS, MD - General Medicine, DM - Neurology</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">(43)</span>
                                        </div>
                                        <ul class="available-info">
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i> Kansas, USA
                                            </li>
                                            <li>
                                                <i class="far fa-clock"></i> Available on Fri, 22 Mar
                                            </li>
                                            <li>
                                                <i class="far fa-money-bill-alt"></i> $100 - $1000
                                                <i class="fas fa-info-circle" data-bs-toggle="tooltip"
                                                    title="Lorem Ipsum"></i>
                                            </li>
                                        </ul>
                                        <div class="row row-sm">
                                            <div class="col-6">
                                                <a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="booking.html" class="btn book-btn">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Doctor Widget -->

                                <!-- Doctor Widget -->
                                <div class="profile-widget">
                                    <div class="doc-img">
                                        <a href="doctor-profile.html">
                                            <img class="img-fluid" alt="User Image" src="{{ asset('medicity/assets/img/doctors/doctor-08.jpg') }}">
                                        </a>
                                        <a href="javascript:void(0)" class="fav-btn">
                                            <i class="far fa-bookmark"></i>
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="doctor-profile.html">Paul Richard</a>
                                            <i class="fas fa-check-circle verified"></i>
                                        </h3>
                                        <p class="speciality">MBBS, MD - Dermatology , Venereology & Lepros</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">(49)</span>
                                        </div>
                                        <ul class="available-info">
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i> California, USA
                                            </li>
                                            <li>
                                                <i class="far fa-clock"></i> Available on Fri, 22 Mar
                                            </li>
                                            <li>
                                                <i class="far fa-money-bill-alt"></i> $100 - $400
                                                <i class="fas fa-info-circle" data-bs-toggle="tooltip"
                                                    title="Lorem Ipsum"></i>
                                            </li>
                                        </ul>
                                        <div class="row row-sm">
                                            <div class="col-6">
                                                <a href="doctor-profile.html" class="btn view-btn">View Profile</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="booking.html" class="btn book-btn">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Doctor Widget -->

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!-- /Doctors Section -->

    <!-- Work Section -->
    <section class="work-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 work-img-info aos" data-aos="fade-up">
                    <div class="work-img">
                        <img src="{{ asset('medicity/assets/img/work-img.png') }}" class="img-fluid" alt="doctor-image">
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 work-details">
                    <div class="section-header-one aos" data-aos="fade-up">
                        <h5>How it Works</h5>
                        <h2 class="section-title">4 easy steps to get your solution</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 aos" data-aos="fade-up">
                            <div class="work-info">
                                <div class="work-icon">
                                    <span><img src="{{ asset('medicity/assets/img/icons/work-01.svg') }}" alt="search-doctor-icon"></span>
                                </div>
                                <div class="work-content">
                                    <h5>Search Doctor</h5>
                                    <p>Search for a doctor based on specialization, location, or availability. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 aos" data-aos="fade-up">
                            <div class="work-info">
                                <div class="work-icon">
                                    <span><img src="{{ asset('medicity/assets/img/icons/work-02.svg') }}" alt="doctor-profile-icon"></span>
                                </div>
                                <div class="work-content">
                                    <h5>Check Doctor Profile</h5>
                                    <p>Explore detailed doctor profiles on our platform to make informed healthcare decisions.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 aos" data-aos="fade-up">
                            <div class="work-info">
                                <div class="work-icon">
                                    <span><img src="{{ asset('medicity/assets/img/icons/work-03.svg') }}" alt="calendar-icon"></span>
                                </div>
                                <div class="work-content">
                                    <h5>Schedule Appointment</h5>
                                    <p>After choose your preferred doctor, select a convenient time slot, & confirm your appointment.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 aos" data-aos="fade-up">
                            <div class="work-info">
                                <div class="work-icon">
                                    <span><img src="{{ asset('medicity/assets/img/icons/work-04.svg') }}" alt="solution-icon"></span>
                                </div>
                                <div class="work-content">
                                    <h5>Get Your Solution</h5>
                                    <p>Discuss your health concerns with the doctor and receive personalized advice & solution.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Work Section -->

    <!-- Availabe Features -->
    <section class="section section-features">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 features-img aos" data-aos="fade-up">
                    <img src="{{ asset('medicity/assets/img/features/feature.png') }}" class="img-fluid" alt="Feature">
                </div>
                <div class="col-md-7 aos" data-aos="fade-up">
                    <div class="section-header">
                        <h2 class="mt-2">Availabe Features in Our Clinic</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of
                            a page when looking at its layout. </p>
                    </div>
                    <div class="features-slider slider">
                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="{{ asset('medicity/assets/img/features/feature-01.jpg') }}" class="img-fluid" alt="Feature">
                            <p>Patient Ward</p>
                        </div>
                        <!-- /Slider Item -->

                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="{{ asset('medicity/assets/img/features/feature-02.jpg') }}" class="img-fluid" alt="Feature">
                            <p>Test Room</p>
                        </div>
                        <!-- /Slider Item -->

                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="{{ asset('medicity/assets/img/features/feature-03.jpg') }}" class="img-fluid" alt="Feature">
                            <p>ICU</p>
                        </div>
                        <!-- /Slider Item -->

                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="{{ asset('medicity/assets/img/features/feature-04.jpg') }}" class="img-fluid" alt="Feature">
                            <p>Laboratory</p>
                        </div>
                        <!-- /Slider Item -->

                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="{{ asset('medicity/assets/img/features/feature-05.jpg') }}" class="img-fluid" alt="Feature">
                            <p>Operation</p>
                        </div>
                        <!-- /Slider Item -->

                        <!-- Slider Item -->
                        <div class="feature-item text-center">
                            <img src="{{ asset('medicity/assets/img/features/feature-06.jpg') }}" class="img-fluid" alt="Feature">
                            <p>Medical</p>
                        </div>
                        <!-- /Slider Item -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Availabe Features -->

    <!-- FAQ Section -->
    <section class="faq-sec-fourteen">
        <div class="container">
            <div class="row align-items-center">
                <section class="faq-section col-lg-7">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-header-one aos" data-aos="fade-up">
                                    <h5>Get Your Answer</h5>
                                    <h2 class="section-title">Frequently Asked Questions</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="">
                                <div class="faq-info aos" data-aos="fade-up">
                                    <div class="accordion" id="faq-details">

                                        <!-- FAQ Item -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <a href="javascript:void(0);" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    How do I book an appointment with a doctor?
                                                </a>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faq-details">
                                                <div class="accordion-body">
                                                    <div class="accordion-content">
                                                        <p>Yes, simply visit our website and log in or create an account. Search for a doctor based on specialization, location, or availability & confirm your booking.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /FAQ Item -->

                                        <!-- FAQ Item -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Can I request a specific doctor when booking my appointment?
                                                </a>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faq-details">
                                                <div class="accordion-body">
                                                    <div class="accordion-content">
                                                        <p>Yes, you can usually request a specific doctor when booking your appointment, though availability may vary based on their schedule.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /FAQ Item -->

                                        <!-- FAQ Item -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingThree">
                                                <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    What should I do if I need to cancel or reschedule my appointment?
                                                </a>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faq-details">
                                                <div class="accordion-body">
                                                    <div class="accordion-content">
                                                        <p>If you need to cancel or reschedule your appointment, contact the doctor as soon as possible to inform them and to reschedule for another available time slot.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /FAQ Item -->

                                        <!-- FAQ Item -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingFour">
                                                <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                    What if I'm running late for my appointment?
                                                </a>
                                            </h2>
                                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faq-details">
                                                <div class="accordion-body">
                                                    <div class="accordion-content">
                                                        <p>If you know you will be late, it's courteous to call the doctor's office and inform them. Depending on their policy and schedule, they may be able to accommodate you or reschedule your appointment.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /FAQ Item -->

                                        <!-- FAQ Item -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingFive">
                                                <a href="javascript:void(0);" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                    Can I book appointments for family members or dependents?
                                                </a>
                                            </h2>
                                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faq-details">
                                                <div class="accordion-body">
                                                    <div class="accordion-content">
                                                        <p>Yes, in many cases, you can book appointments for family members or dependents. However, you may need to provide their personal information and consent to do so.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /FAQ Item -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="col-lg-5">
                    <div class="faq-sec-imgs">
                        <span class="faq-img-one"><img src="{{ asset('medicity/assets/img/faq-sec-img-01.png') }}" alt="Img"></span>
                        <span class="faq-img-two"><img src="{{ asset('medicity/assets/img/faq-sec-img-02.png') }}" alt="Img"></span>
                        <span class="faq-img-three"><img src="{{ asset('medicity/assets/img/faq-sec-img-03.png') }}" alt="Img"></span>
                        <span class="faq-img-four"><img src="{{ asset('medicity/assets/img/faq-sec-img-04.png') }}" alt="Img"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /FAQ Section -->

    <!-- Testimonial Section -->
    <section class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-slider slick">
                        <div class="testimonial-grid">
                            <div class="testimonial-info">
                                <div class="testimonial-img">
                                    <img src="{{ asset('medicity/assets/img/clients/client-01.jpg') }}" class="img-fluid" alt="John Doe">
                                </div>
                                <div class="testimonial-content">
                                    <div class="section-header-one section-header section-inner-header testimonial-header">
                                        <h5>Testimonials</h5>
                                        <h2 class="section-title">What Our Client Says</h2>
                                    </div>
                                    <div class="testimonial-details">
                                        <p>Doccure exceeded my expectations in healthcare. The seamless booking process, coupled with the expertise of the doctors, made my experience exceptional. Their commitment to quality care and convenience truly sets them apart. I highly recommend Doccure for anyone seeking reliable and accessible healthcare services.</p>
                                        <h6><span class="d-block">John Doe</span> New York</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-grid">
                            <div class="testimonial-info">
                                <div class="testimonial-img">
                                    <img src="{{ asset('medicity/assets/img/clients/client-03.jpg') }}" class="img-fluid" alt="Amanda Warren">
                                </div>
                                <div class="testimonial-content">
                                    <div class="section-header section-inner-header testimonial-header">
                                        <h5>Testimonials</h5>
                                        <h2>What Our Client Says</h2>
                                    </div>
                                    <div class="testimonial-details">
                                        <p>As a busy professional, I don't have time to wait on hold or play phone tag to schedule doctor appointments. Thanks to Doccure, booking appointments has never been easier! The user-friendly interface allows me to quickly find available appointment slots that fit my schedule and book them with just a few clicks. It's a game-changer for anyone looking to streamline their healthcare management.</p>
                                        <h6><span class="d-block">Andrew Denner</span> Nevada</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-grid">
                            <div class="testimonial-info">
                                <div class="testimonial-img">
                                    <img src="{{ asset('medicity/assets/img/clients/client-11.jpg') }}" class="img-fluid" alt="Betty Carlson">
                                </div>
                                <div class="testimonial-content">
                                    <div class="section-header section-inner-header testimonial-header">
                                        <h5>Testimonials</h5>
                                        <h2>What Our Client Says</h2>
                                    </div>
                                    <div class="testimonial-details">
                                        <p>As a parent, coordinating doctor appointments for my family can be overwhelming. Doccure has simplified the process and made scheduling appointments a breeze! I love being able to see all available appointment times in one place and book appointments for multiple family members with ease. Plus, the automatic reminders ensure we never miss an appointment. I highly recommend Doccure to other busy parents!</p>
                                        <h6><span class="d-block">Niya Patel</span> New York</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Testimonial Section -->

    <!-- blog section -->
    <div class="blog-section-fourteen">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header-one text-center aos" data-aos="fade-up">
                        <h2 class="section-title">Recent Articles</h2>
                    </div>
                </div>
            </div>
            <div class="owl-carousel blog-slider-fourteen nav-center owl-theme aos" data-aos="fade-up">
                <div class="card blog-inner-fourt-all">
                    <div class="card-body blog-inner-fourt-main">
                        <div class="blog-inner-right-fourt">
                            <a href="blog-details.html">
                                <div class="blog-inner-right-img">
                                    <img src="{{ asset('medicity/assets/img/blog/blog-15.jpg') }}" alt="image" class="img-fluid blog-inner-right-inner">
                                    <div class="blog-inner-top-content">
                                        <img src="{{ asset('medicity/assets/img/doctors/doctor-04.jpg') }}" alt="Doctor" class="me-2">
                                        <span>Dr. Pamila Certis</span>
                                    </div>
                                </div>
                            </a>
                            <a href="blog-details.html" class="blog-inner-right-fourt-care">How To Get Pregnant: Tips to Increas it Affect Fertility</a>
                            <ul class="articles-list nav blog-articles-list">
                                <li>
                                    <i class="feather-calendar"></i> 15 Nov 2024
                                </li>
                                <li>
                                    <i class="feather-message-square"></i> 68
                                </li>
                                <li>
                                    <i class="feather-eye"></i> 1.5k
                                </li>
                            </ul>
                            <p>Embark on a fertility journey with expert advice on lifestyle changes, nutrition, and holistic...</p>
                            <ul class="articles-list nav blog-articles-list-two">
                                <li>Fertility</li>
                                <li>Pregnancy</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card blog-inner-fourt-all">
                    <div class="card-body blog-inner-fourt-main">
                        <div class="blog-inner-right-fourt">
                            <a href="blog-details.html">
                                <div class="blog-inner-right-img">
                                    <img src="{{ asset('medicity/assets/img/blog/blog-16.jpg') }}" alt="image" class="img-fluid blog-inner-right-inner">
                                    <div class="blog-inner-top-content">
                                        <img src="{{ asset('medicity/assets/img/doctors/doctor-05.jpg') }}" alt="Doctor" class="me-2">
                                        <span>Dr. James Matthew</span>
                                    </div>
                                </div>
                            </a>
                            <a href="blog-details.html" class="blog-inner-right-fourt-care">Flavourful Recipe of Central India to Boost Fertility</a>
                            <ul class="articles-list nav blog-articles-list">
                                <li>
                                    <i class="feather-calendar"></i> 18 Nov 2024
                                </li>
                                <li>
                                    <i class="feather-message-square"></i> 70
                                </li>
                                <li>
                                    <i class="feather-eye"></i> 1.2k
                                </li>
                            </ul>
                            <p>Explore the rich culinary heritage of Central India with a flavourful recipe thought to be...</p>
                            <ul class="articles-list nav blog-articles-list-two">
                                <li>Diet</li>
                                <li>Health</li>
                                <li>Natural Foods</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card blog-inner-fourt-all">
                    <div class="card-body blog-inner-fourt-main">
                        <div class="blog-inner-right-fourt">
                            <a href="blog-details.html">
                                <div class="blog-inner-right-img">
                                    <img src="{{ asset('medicity/assets/img/blog/blog-17.jpg') }}" alt="image" class="img-fluid blog-inner-right-inner">
                                    <div class="blog-inner-top-content">
                                        <img src="{{ asset('medicity/assets/img/doctors/doctor-06.jpg') }}" alt="Doctor" class="me-2">
                                        <span>Dr. James Certis</span>
                                    </div>
                                </div>
                            </a>
                            <a href="blog-details.html" class="blog-inner-right-fourt-care">Sperm Morphology – What is it & How Does it Affect Fertility</a>
                            <ul class="articles-list nav blog-articles-list">
                                <li>
                                    <i class="feather-calendar"></i> 20 Nov 2024
                                </li>
                                <li>
                                    <i class="feather-message-square"></i> 54
                                </li>
                                <li>
                                    <i class="feather-eye"></i> 1.4k
                                </li>
                            </ul>
                            <p>Explore the intricacies of sperm morphology, its role in fertility, and insights into factors...</p>
                            <ul class="articles-list nav blog-articles-list-two">
                                <li>Health</li>
                                <li>Fertility</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card blog-inner-fourt-all">
                    <div class="card-body blog-inner-fourt-main">
                        <div class="blog-inner-right-fourt">
                            <a href="blog-details.html">
                                <div class="blog-inner-right-img">
                                    <img src="{{ asset('medicity/assets/img/blog/fertility-blog-01.jpg') }}" alt="image" class="img-fluid blog-inner-right-inner">
                                    <div class="blog-inner-top-content">
                                        <img src="{{ asset('medicity/assets/img/doctor-profiles/doc-profile-07.jpg') }}" alt="Doctor" class="me-2">
                                        <span>Dr. Kathleen Potts</span>
                                    </div>
                                </div>
                            </a>
                            <a href="blog-details.html" class="blog-inner-right-fourt-care">Top 10 Foods That Can Boost Fertility Naturally</a>
                            <ul class="articles-list nav blog-articles-list">
                                <li>
                                    <i class="feather-calendar"></i> 24 Nov 2024
                                </li>
                                <li>
                                    <i class="feather-message-square"></i> 63
                                </li>
                                <li>
                                    <i class="feather-eye"></i> 2.2k
                                </li>
                            </ul>
                            <p>Discover the power of nutrition in enhancing fertility with a curated list of fertility-friendly...</p>
                            <ul class="articles-list nav blog-articles-list-two">
                                <li>Food</li>
                                <li>Fertility</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-content" data-aos="fade-up" style="text-align: center; ">
                <a href="search.html" class="btn" style="font-size: 16px;">
                    Browse All Blogs
                </a>
        </div>
            <div class="bg-shapes">
                <img src="{{ asset('medicity/assets/img/bg/article-bg.png') }}" alt="image" class="img-fluid shape-1">
            </div>
        </div>
    </div>
    <!-- /blog section -->

    <!-- Partners Section -->
    <section class="partners-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header-one text-center aos" data-aos="fade-up">
                        <h2 class="section-title">Our Partners</h2>
                    </div>
                </div>
            </div>
            <div class="partners-info aos" data-aos="fade-up">
                <ul class="owl-carousel partners-slider d-flex">
                    <li>
                        <a href="javascript:void(0);">
                            <img class="img-fluid" src="{{ asset('medicity/assets/img/partners/partners-1.svg') }}" alt="partners">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <img class="img-fluid" src="{{ asset('medicity/assets/img/partners/partners-2.svg') }}" alt="partners">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <img class="img-fluid" src="{{ asset('medicity/assets/img/partners/partners-3.svg') }}" alt="partners">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <img class="img-fluid" src="{{ asset('medicity/assets/img/partners/partners-4.svg') }}" alt="partners">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <img class="img-fluid" src="{{ asset('medicity/assets/img/partners/partners-5.svg') }}" alt="partners">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <img class="img-fluid" src="{{ asset('medicity/assets/img/partners/partners-6.svg') }}" alt="partners">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <img class="img-fluid" src="{{ asset('medicity/assets/img/partners/partners-1.svg') }}" alt="partners">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <img class="img-fluid" src="{{ asset('medicity/assets/img/partners/partners-2.svg') }}" alt="partners">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <img class="img-fluid" src="{{ asset('medicity/assets/img/partners/partners-3.svg') }}" alt="partners">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <img class="img-fluid" src="{{ asset('medicity/assets/img/partners/partners-4.svg') }}" alt="partners">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <img class="img-fluid" src="{{ asset('medicity/assets/img/partners/partners-5.svg') }}" alt="partners">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <img class="img-fluid" src="{{ asset('medicity/assets/img/partners/partners-6.svg') }}" alt="partners">
                        </a>
                    </li>
                    </ul>
            </div>
        </div>
    </section>
    <!-- /Partners Section -->

    <!-- App Section -->
    <section class="app-section pt-0">
        <div class="container">
            <div class="app-bg">
                <div class="row align-items-end">
                    <div class="col-lg-6 col-md-12">
                        <div class="app-content">
                            <div class="app-header aos" data-aos="fade-up">
                                <h5>Working for Your Better Health.</h5>
                                <h2>Download the Doccure App today!</h2>
                            </div>
                            <div class="app-scan aos" data-aos="fade-up">
                                <p>Scan the QR code to get the app now</p>
                                <img src="{{ asset('medicity/assets/img/scan-img.png') }}" alt="scan-image">
                            </div>
                            <div class="google-imgs aos" data-aos="fade-up">
                                <a href="javascript:void(0);"><img src="{{ asset('medicity/assets/img/icons/google-play-icon.svg') }}" alt="img"></a>
                                <a href="javascript:void(0);"><img src="{{ asset('medicity/assets/img/icons/app-store-icon.svg') }}" alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 aos" data-aos="fade-up">
                        <div class="mobile-img">
                            <img src="{{ asset('medicity/assets/img/mobile-img.png') }}" class="img-fluid" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /App Section -->
</x-main-layout>
