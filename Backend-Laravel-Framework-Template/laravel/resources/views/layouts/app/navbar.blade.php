<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="/" class="b-brand text-primary">
                <img src="{{ asset('assets/images/Medicity.jpg') }}" alt="logo image" class="logo-lg" style="width:150px;" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>Sidebar</label>
                </li>
                <li class="pc-item">
                    <a href="{{ route('dashboard') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-gauge"></i>
                        </span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>
                @role('Quản trị viên')
                <li class="pc-item pc-caption">
                    <label>System Management</label>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-user-circle-gear"></i>
                        </span>
                        <span class="pc-mtext">Permission and Role</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('permissions.index') }}">Permission</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('roles.index') }}">Role</a></li>
                    </ul>
                </li>
                <li class="pc-item">
                    <a href="{{ route('users.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-user"></i>
                        </span>
                        <span class="pc-mtext">User</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('speciality.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-heartbeat"></i>
                        </span>
                        <span class="pc-mtext">Speciality</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('clinic.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-first-aid-kit"></i>
                        </span>
                        <span class="pc-mtext">Clinic</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('service.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-first-aid"></i>
                        </span>
                        <span class="pc-mtext">Service</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('laboratory-test.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-test-tube"></i>
                        </span>
                        <span class="pc-mtext">Laboratory Test</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('appointment.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-calendar-check"></i>
                        </span>
                        <span class="pc-mtext">Appointment</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('prescription.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-file-arrow-down"></i>
                        </span>
                        <span class="pc-mtext">Prescription</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label>Disease</label>
                </li>
                <li class="pc-item">
                    <a href="{{ route('bodypart.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-person-arms-spread"></i>
                        </span>
                        <span class="pc-mtext">Body Part</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('targetgroup.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-target"></i>
                        </span>
                        <span class="pc-mtext">Target Group</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('seasonal.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-wind"></i>
                        </span>
                        <span class="pc-mtext">Seasonal</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('disease.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-virus"></i>
                        </span>
                        <span class="pc-mtext">Disease</span>
                    </a>
                </li>

                <li class="pc-item pc-caption">
                    <label>Product</label>
                </li>
                <li class="pc-item">
                    <a href="{{ route('category.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-stack-simple"></i>
                        </span>
                        <span class="pc-mtext">Category</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('brand.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-apple-logo"></i>
                        </span>
                        <span class="pc-mtext">Brand</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('product.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-t-shirt"></i>
                        </span>
                        <span class="pc-mtext">Product</span>
                    </a>
                </li>

                <li class="pc-item pc-caption">
                    <label>Order</label>
                </li>
                <li class="pc-item">
                    <a href="{{ route('coupon.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-money"></i>
                        </span>
                        <span class="pc-mtext">Coupon</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('order.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-handbag-simple"></i>
                        </span>
                        <span class="pc-mtext">Order</span>
                    </a>
                </li>

                <li class="pc-item pc-caption">
                    <label>Blog</label>
                </li>
                <li class="pc-item">
                    <a href="{{ route('blogcategory.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-book-bookmark"></i>
                        </span>
                        <span class="pc-mtext">Blog Category</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('blog.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-books"></i>
                        </span>
                        <span class="pc-mtext">Blog</span>
                    </a>
                </li>

                @endrole
            </ul>
        </div>
        @if(Auth::check())
        <div class="card pc-user-card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="user-avtar wid-45 rounded-circle" />
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <div class="dropdown">
                            <a href="#" class="arrow-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="0,20">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                        <small>{{ Auth::user()->roles->pluck('name')[0] ?? 'Thành viên' }}</small>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="btn btn-icon btn-link-secondary avtar">
                                            <i class="ph-duotone ph-windows-logo"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li>
                                        <a class="pc-user-links" href="{{ route('profile.show') }}">
                                            <i class="ph-duotone ph-gear"></i>
                                            <span>Tài khoản</span>
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf
                                            <a class="pc-user-links" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                                <i class="ph-duotone ph-power"></i>
                                                <span>Đăng xuất</span>
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</nav>

<header class="pc-header">
    <div class="header-wrapper">
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <li class="pc-h-item pc-sidebar-collapse">
                    <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="pc-h-item pc-sidebar-popup">
                    <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="ms-auto">
            <ul class="list-unstyled">
                <li class="dropdown pc-h-item header-user-profile">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
                        <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="user-avtar" />
                    </a>
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                            <h5 class="m-0">Hồ sơ cá nhân</h5>
                        </div>
                        <div class="dropdown-body">
                            <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
                                <ul class="list-group list-group-flush w-100">
                                    <li class="list-group-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="wid-50 rounded-circle" />
                                            </div>
                                            <div class="flex-grow-1 mx-3">
                                                <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                                                <a class="link-primary" href="{{ Auth::user()->email }}">{{ Auth::user()->email }}</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ route('profile.show') }}" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph-duotone ph-user-circle"></i>
                                                <span>Quản lý Tài khoản</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf
                                            <a class="dropdown-item" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                                <span class="d-flex align-items-center">
                                                    <i class="ph-duotone ph-power"></i>
                                                    <span>Đăng xuất</span>
                                                </span>
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
