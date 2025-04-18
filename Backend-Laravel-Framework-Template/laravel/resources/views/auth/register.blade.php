<x-main-layout>
    <x-authentication-card>
        {{-- <x-authentication-card-logo>
            <x-slot name="logoUrl">{{ asset('assets/images/authentication/img-auth-login.png') }}</x-slot>
            <x-slot name="title">Đăng ký</x-slot>
        </x-authentication-card-logo> --}}

        <x-validation-errors class="mb-3" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="login-content-info">
				<div class="container mt-5">

					<!-- Patient Signup -->
					<div class="row justify-content-center" style="margin-top: 100px;">
						<div class="col-lg-5 col-md-6">
							<div class="account-content">
								<div class="account-info">
									<div class="login-title">
										<h3>Signup</h3>
										<p class="mb-0">Enter your credentials & create your account</p>
									</div>
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <x-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <x-input id="email" type="email" name="email" :value="old('email')" required autocomplete="email" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <x-input id="password" type="password" name="password" required autocomplete="new-password" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password Confirmation</label>
                                        <x-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                                    </div>
                                    {{-- <div class="mb-3 form-check-box terms-check-box">
                                        <div class="form-group-flex">
                                            <div class="form-check mb-0">
                                                <input class="form-check-input" type="checkbox" id="remember" checked>
                                                <label class="form-check-label" for="remember">
                                                    I have read and agree to Doccure’s <a href="terms-condition.html">Terms of Service</a> and <a href="privacy-policy.html">Privacy Policy.</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="mb-3">
                                        <x-button class="btn btn-primary-gradient btn-xl w-100" type="submit">Register Now</x-button>
                                    </div>
                                    {{-- <div class="mb-3">
                                        <button class="btn btn-light btn-xl w-100" type="submit">Create an Account</button>
                                    </div> --}}
                                    {{-- <div class="login-or">
                                        <span class="or-line"></span>
                                        <span class="span-or">or</span>
                                    </div>
                                    <div class="social-login-btn">
                                        <a href="javascript:void(0);" class="btn w-100">
                                            <img src="{{ asset('medicity/assets/img/icons/google-icon.svg') }}" alt="google-icon">Sign in With Google
                                        </a>
                                        <a href="javascript:void(0);" class="btn w-100">
                                            <img src="{{ asset('medicity/assets/img/icons/facebook-icon.svg') }}" alt="fb-icon">Sign in With Facebook
                                        </a>
                                    </div> --}}
                                    <div class="account-signup">
                                        <p>Already have account? <a href="{{ route('login') }}">Sign In</a></p>
                                    </div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Patient Signup -->

				</div>
			</div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-3">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif
        </form>
    </x-authentication-card>
</x-main-layout>
