{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
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
      
                    <h2 class="fw-bold mb-2 text-uppercase" style="color:white;">Login</h2>
                    <p class="text-white-50 mb-3">Please enter your login and password!</p>
                    
                    <x-validation-errors class="mb-2" />
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="form-outline form-white mb-4">
                        <input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <label class="form-label" for="email" value="{{ __('Email') }}" >Email</label>
                        </div>
        
                        <div class="form-outline form-white mb-4">
                        <input id="password" class="form-control form-control-lg" type="password" name="password" required autocomplete="current-password" />
                        <label class="form-label" for="password" value="{{ __('Password') }}" >Password</label>
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
                    <p class="mb-0">Don't have an account? <a href="/register" class="text-white-50 fw-bold">Sign Up</a>
                    </p>
                  </div>
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</x-guest-layout>