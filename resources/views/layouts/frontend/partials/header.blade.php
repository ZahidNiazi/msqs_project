{{-- HEADER --}}
{{-- @include('frontend.header') --}}
<!DOCTYPE html>
<html lang="en">

<head>


   <!-- Google Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Alatsi&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('web-assets/style.css')}}">
    <!-- Bootstrap 5 CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font-Awesome icons-->
    <link rel="stylesheet" href=https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css>
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- AOS Library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


    <title>McqsLogic</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('web-assets/img/mcq.png') }}"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://kit.fontawesome.com/bb297cda56.css" crossorigin="anonymous">
    <title>MCQs Mind – The Ultimate MCQ Platform</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            height: 6px;
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: linear-gradient(90deg, #0f5a2f 0%, #31c48d 100%);
            border-radius: 3px;
        }

        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #31c48d #e5e7eb;
        }

        .logo-text {
            background: linear-gradient(90deg, #0f5a2f 0%, #31c48d 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
            font-size: 2rem;
            letter-spacing: 2px;
        }

        .newsletter-input:focus {
            outline: none;
            border-color: #31c48d;
            box-shadow: 0 0 0 2px #31c48d33;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans text-[14px] text-black">
    <!-- Header -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center space-x-4">
                <img src="https://img.icons8.com/color/96/000000/brain.png" alt="MCQs Mind Logo"
                    class="h-12 w-12 rounded-full shadow-lg border-2 border-green-600" />
                <span class="logo-text">MCQs Mind</span>
            </a>
            <!-- Toggle Button (Mobile) -->
            <button id="menu-toggle" class="sm:hidden text-2xl text-green-600 focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Desktop Nav -->
            <nav class="hidden sm:flex space-x-6 text-lg font-semibold whitespace-nowrap">
                <a href="{{ url('/') }}" class="hover:text-green-600 transition">Home</a>
                <a href="{{ route('frontend.aboutus') }}" class="hover:text-green-600 transition">About Us</a>
                <a href="#" class="hover:text-green-600 transition">Past Papers</a>
                <a href="#" class="hover:text-green-600 transition">Mock Test</a>
                <a href="#" class="hover:text-green-600 transition">Submit MCQs</a>
                <a href="#" class="hover:text-green-600 transition">Notes</a>
            </nav>

            <!-- Auth / Social -->
            <div class="hidden sm:flex items-center space-x-4">
                <a href="#" class="text-gray-500 hover:text-green-600"><i class="fab fa-facebook-f text-xl"></i></a>
                <a href="#" class="text-gray-500 hover:text-green-600"><i class="fab fa-x-twitter text-xl"></i></a>
                <a href="#" class="text-gray-500 hover:text-green-600"><i class="fab fa-youtube text-xl"></i></a>
                <a href="#" class="text-gray-500 hover:text-green-600"><i class="fab fa-tiktok text-xl"></i></a>
                <a href="https://wa.me/92467873714" target="_blank" class="text-gray-500 hover:text-green-600" aria-label="WhatsApp">
                    <i class="fab fa-whatsapp text-xl"></i>
                </a>


                @auth
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle d-flex align-items-center gap-2" type="button"
                        id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                @else
                <a href="{{ route('login') }}" class="btn btn-success d-flex align-items-center gap-2">
                    <i class="fas fa-user-circle"></i> Login
                </a>
                @endauth
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="sm:hidden hidden flex-col mt-4 space-y-4">
            <nav class="flex flex-col space-y-2 text-base font-semibold">
                <a href="#" class="hover:text-green-600">Home</a>
                <a href="#" class="hover:text-green-600">Notes</a>
                <a href="#" class="hover:text-green-600">Past Papers</a>
                <a href="#" class="hover:text-green-600">Mock Test</a>
                <a href="#" class="hover:text-green-600">Submit MCQs</a>
            </nav>
            <div class="flex space-x-4 mt-4">
                <a href="#" class="text-gray-500 hover:text-green-600"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-gray-500 hover:text-green-600"><i class="fab fa-x-twitter"></i></a>
                <a href="#" class="text-gray-500 hover:text-green-600"><i class="fab fa-youtube"></i></a>
                <a href="#" class="text-gray-500 hover:text-green-600"><i class="fab fa-tiktok"></i></a>
                <a href="#" class="text-gray-500 hover:text-green-600"><i class="fab fa-whatsapp"></i></a>
            </div>
            <div class="mt-3">
                @auth
                <a href="#" class="text-green-600 font-bold">{{ Auth::user()->name }}</a>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"
                    class="ml-2 text-red-600 font-semibold hover:underline">Logout</a>
                <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
                @else
                <a href="{{ route('login') }}" class="text-green-600 font-semibold hover:underline">Login</a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Subject Navigation -->
    <div class="bg-gradient-to-r from-green-700 to-green-400">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between px-4 py-2">
            <nav
                class="flex overflow-x-auto custom-scrollbar space-x-6 text-white font-semibold text-[15px] whitespace-nowrap w-full md:w-auto">
                <a href="#" class="hover:text-yellow-300">General English</a>
                <a href="#" class="hover:text-yellow-300">General Knowledge</a>
                <a href="#" class="hover:text-yellow-300">Pakistan Study</a>
                <a href="#" class="hover:text-yellow-300">Islamic Studies</a>
                <a href="#" class="hover:text-yellow-300">Everyday Science</a>
                <a href="#" class="hover:text-yellow-300">Intelligence Questions</a>
                <a href="#" class="hover:text-yellow-300">Computer</a>
            </nav>
            {{-- <form
                class="hidden md:flex items-center space-x-2 bg-yellow-300 rounded px-3 py-1 ml-4 mt-2 md:mt-0 w-full md:w-auto">
                <input
                    class="flex-grow bg-yellow-300 text-black text-[14px] font-semibold placeholder-black outline-none"
                    placeholder="Search..." type="search" />
                <button class="text-black text-xl font-bold" aria-label="Search"><i class="fas fa-search"></i></button>
            </form> --}}
        </div>
    </div>
</header>
