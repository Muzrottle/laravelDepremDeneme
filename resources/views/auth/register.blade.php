{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}


<x-guest-layout>
    <section class="vh-80 gradient-custom">
        <div class="container mt-md-4 py-1 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white">
                <div class="card-body p-5 text-center">
      
                  <div class="mb-md-2 mt-md-4 pb-1">
      
                    <h2 class="fw-bold mb-2 text-uppercase" style="color:white;">Register</h2>
                    <p class="text-white-50 mb-3">Please fill the needed information!</p>
                    
                    <x-validation-errors class="mb-2" />
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-outline form-white mb-2">
                            <input id="name" class="form-control form-control-lg" type="text" name="name"required autofocus autocomplete="name" />
                            <label class="form-label" for="email" value="{{ __('Email') }}" >Name</label>
                        </div>
                        
                        <div class="form-outline form-white mb-2">
                            <input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autofocus/>
                            <label class="form-label" for="email" value="{{ __('Email') }}" >Email</label>
                        </div>
        
                        <div class="form-outline form-white mb-2">
                            <input id="password" class="form-control form-control-lg" type="password" name="password" required autocomplete="new-password" />
                            <label class="form-label" for="password" value="{{ __('Password') }}" >Password</label>
                        </div>

                        <div class="form-outline form-white mb-2">
                            <input id="password" class="form-control form-control-lg" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <label class="form-label" for="password" value="{{ __('Password') }}" >Confirm Password</label>
                        </div>

                        <button class="btn btn-outline-light btn-lg px-5" type="submit" value="Login" name="submit">{{ __('Login') }}</button>
                    </form>
      
                    <div class="d-flex justify-content-center text-center">
                      <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                      <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                      <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                    </div>
      
                  </div>
      
                  <div>
                    <p class="mb-0">Already have an account? <a href="/login" class="text-white-50 fw-bold">Sign In</a>
                    </p>
                  </div>
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</x-guest-layout>