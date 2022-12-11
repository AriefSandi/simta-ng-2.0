<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Favicons -->
  <link href="landing/assets/img/favicon.png" rel="icon">
  <link href="landing/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="landing/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="landing/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="landing/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="landing/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="landing/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="landing/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="landing/assets/css/style.css" rel="stylesheet">
  <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    <title>Document</title>
</head>
<body>
    <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo me-auto">
        <a href="/"><img src="landing/img/index.jpg" alt="" class="img-fluid"></a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
      @if (Route::has('login'))
        <nav id="navbar" class="navbar order-last order-lg-0">
          @auth
          <ul>
            <li>
              <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            </li>
            <li>
              <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            </li>
          </ul>
              @else
              <ul>
                <li>
                  <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                </li>
                <li>
                  @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                </li>
              </ul>
              @endif
            @endauth
          </div>
      @endif
    </div>
    </header><!-- End Header -->
    
    <!-- ======= Hero Section ======= -->
    <section id="hero">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
          <div>
            <h1>Sistem Informasi</h1>
            <h1>Tugas Akhir</h1>
            <h2>Departemen Sistem Informasi</h2>
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
          <img src="landing/assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero -->


  <!-- Vendor JS Files -->
  <script src="landing/assets/vendor/aos/aos.js"></script>
  <script src="landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="landing/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="landing/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="landing/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="landing/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="landing/assets/js/main.js"></script>
</body>
</html>