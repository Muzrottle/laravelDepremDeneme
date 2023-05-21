{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

          <!-- Styles -->
          <link rel="stylesheet" href="{{ asset('css/app.css') }}">
          @livewireStyles
      
          <!-- Scripts -->
          <script src="{{ asset('js/app.js') }}" defer></script>
      
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Deprem Bağiş</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Mansalva|Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @livewireStyles
  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id=" ">

      <header class="site-navbar site-navbar-target shadow" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">
            

            <div class="site-logo">
              <a href="/" >Fundraiser</a>
            </div>


            <nav class="site-navigation text-left ml-auto " role="navigation">
              <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">

                @if (Route::has('login'))
                    @auth
                        @if (Auth::user()->utype === 'ADM')
                            <li><a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a></li>
                            <li><a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                              @csrf
                            </form>
                          @else
                            <li><a href="{{ route('user.dashboard') }}" class="nav-link">Dashboard</a></li>
                            <li><a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                              @csrf
                            </form>
                        @endif
                    @else
                      <li><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                      <li><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    @endif
                @endif
              </ul>
            </nav>


            <div class="ml-auto toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-white"><span class="icon-menu h3 text-white"></span></a></div>

            

          </div>
        </div>

      </header>
    
    </div>
      
    {{$slot}}
    
    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    @livewireScripts
    <script src="js/jquery-3.3.1.min.js"></script> --}}
    @livewire('livewire-ui-modal')

  </body>
  
</html>
