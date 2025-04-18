<x-main-layout>
    <x-authentication-card>
        {{-- <x-authentication-card-logo>
            <x-slot name="logoUrl">{{ asset('assets/images/authentication/img-auth-login.png') }}</x-slot>
            <x-slot name="title">Đăng nhập</x-slot>
        </x-authentication-card-logo> --}}

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="content" style="background-color: white;">
				<div class="container-fluid mt-5">

					<div class="row" style="margin-top: 100px;">
						<div class="col-md-8 offset-md-2">

							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="{{ asset('medicity/assets/img/login-banner.png') }}" class="img-fluid" alt="Doccure Login">
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Login <span>Doccure</span></h3>
										</div>
                                        <div class="mb-3">
                                            <label class="form-label">E-mail</label>
                                            <x-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group-flex">
                                                <label class="form-label">Password</label>
                                                <a href="forgot-password.html" class="forgot-link">Forgot password?</a>
                                            </div>
                                            <div class="pass-group">
                                                <x-input id="password" type="password" name="password" required autocomplete="current-password" />
                                                <span class="feather-eye-off toggle-password"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3 form-check-box">
                                            <div class="form-group-flex">
                                                <div class="form-check mb-0">
                                                    <x-checkbox id="remember_me" name="remember" />
                                                    <label class="form-check-label" for="remember">
                                                        Remember Me
                                                    </label>
                                                </div>
                                                {{-- <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox" id="remember1">
                                                    <label class="form-check-label" for="remember1">
                                                        Login with OTP
                                                    </label>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <x-button class="btn btn-primary-gradient w-100" type="submit">Sign in</x-button>
                                        </div>
                                        <div class="login-or">
                                            <span class="or-line"></span>
                                            <span class="span-or">or</span>
                                        </div>
                                        {{-- <div class="social-login-btn">
                                            <a href="javascript:void(0);" class="btn w-100">
                                                <img src="{{ asset('medicity/assets/img/icons/google-icon.svg') }}" alt="google-icon">Sign in With Google
                                            </a>
                                            <a href="javascript:void(0);" class="btn w-100">
                                                <img src="{{ asset('medicity/assets/img/icons/facebook-icon.svg') }}" alt="fb-icon">Sign in With Facebook
                                            </a>
                                        </div> --}}
                                        <div class="account-signup">
                                            <p>Don't have an account ? <a href="register.html">Sign up</a></p>
                                        </div>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->

						</div>
					</div>

				</div>

			</div>
        </form>
    </x-authentication-card>
</x-main-layout>
