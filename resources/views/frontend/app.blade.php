{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MCQs Mind')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('web-assets/img/mcq.png') }}"/>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alatsi&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('web-assets/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Custom styles you included earlier */
        .custom-scrollbar::-webkit-scrollbar { height: 6px; background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: linear-gradient(90deg, #0f5a2f 0%, #31c48d 100%); border-radius: 3px; }
        .custom-scrollbar { scrollbar-width: thin; scrollbar-color: #31c48d #e5e7eb; }
        .logo-text { background: linear-gradient(90deg, #0f5a2f 0%, #31c48d 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: bold; font-size: 2rem; letter-spacing: 2px; }
        .newsletter-input:focus { outline: none; border-color: #31c48d; box-shadow: 0 0 0 2px #31c48d33; }
    </style>

    @stack('head')
</head>

<body class="bg-gray-100 font-sans text-[14px] text-black">
    
    {{-- HEADER --}}
    @include('frontend.header')

    {{-- CONTENT --}}
    @yield('content')

    {{-- FOOTER --}}
    @include('frontend.footer')

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        function newsletterAlert(event) {
            event.preventDefault();
            const emailInput = event.target.querySelector('input[type="email"]');
            const email = emailInput.value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const successDiv = document.getElementById('newsletter-success');
            if (emailRegex.test(email)) {
                successDiv.textContent = "Thank you for subscribing! Please check your email for confirmation.";
                successDiv.classList.remove('hidden');
                emailInput.value = '';
            } else {
                successDiv.textContent = "Please enter a valid email address.";
                successDiv.classList.remove('hidden');
            }
        }
    </script>
    @stack('scripts')
</body>

</html>
