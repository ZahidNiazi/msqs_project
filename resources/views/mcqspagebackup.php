<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    <!-- Popen Font Family -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"> -->
    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>


    <title>McqsLogic</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('web-assets/img/mcq.png') }}"/>
</head>


<body>
    <div id="loader">
        <div class="loader-spinner"></div>
      </div>

    <!-- topbar -->
    <div class="sticky-sec">
        <header class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-6">
                        <ul class="top-links d-flex mb-0">
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-6">
                        <div class="top-social-links text-end">
                            <a href="#"><img src="{{ asset('web-assets/img/social-2.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('web-assets/img/social-3.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('web-assets/img/social-4.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('web-assets/img/youtube.svg') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- <hr class="m-0"> -->
        <!-- navigation bar -->
        <section class="navigation-bar">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#"><img style="padding-top: 0px" src="{{ asset('web-assets/img/abc8.png') }} " width="300" height="100" alt="logo"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><span>Home</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><span>About Us</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><span>Maths</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Past Papers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Physics</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Pak Study</a>
                                </li>
                                <li class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        MCQs
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        @foreach ($categories as $category)

                                        <li><a class="dropdown-item" href="{{url('/all-mcqs/'.$category->id)}}">{{$category->name}}</a></li>

                                        @endforeach

                                        {{-- <li><a class="dropdown-item" href="#">PMS</a></li>
                                        <li><a class="dropdown-item" href="#">Current affairs</a></li>
                                        <li><a class="dropdown-item" href="#">Political Science</a></li>
                                        <li><a class="dropdown-item" href="#">Pak Study</a></li>
                                        <li><a class="dropdown-item" href="#">English</a></li>
                                        <li><a class="dropdown-item" href="#">Math</a></li>
                                        <li><a class="dropdown-item" href="#">Computer</a></li>
                                        <li><a class="dropdown-item" href="#">Physics</a></li>
                                        <li><a class="dropdown-item" href="#">Chemistry</a></li>
                                        <li><a class="dropdown-item" href="#">Biology</a></li>
                                        <li><a class="dropdown-item" href="#">Urdu</a></li>
                                        <li><a class="dropdown-item" href="#">pedagogy</a></li> --}}
                                    </ul>
                                </li>
                                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </section>
    </div>
    <!-- hero section  -->
    <section class="hero-sec mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 mb-5" style="border-left: 1px solid #e9e9e9;">
                    <div class="image-sec">
                        <img class="img-fluid" src="{{ asset('web-assets/img/hero-sec.png') }}" alt="">
                    </div>
                    <hr>
                    <div class="mcqs-heading text-center">
                        @foreach ($mcqs as $mcq)
                        <h3><b>{{$mcq->title}}</b></h3>
                        @endforeach
                    </div>
                    <div class="mcqs-section mb-5">

                        @foreach ($mcqs as $mcq)

                        <div class="mcqs">
                            <span><b>{{$loop->iteration}}. {{$mcq->question}}</b></span>
                            <p>
                                <?php if($mcq->correct_option == 'a') {?> <b> <?php } ?>A. {{$mcq->option_a}}<?php if($mcq->correct_option == 'a') {?> </b> <?php } ?><br>
                                <?php if($mcq->correct_option == 'b') {?> <b> <?php } ?>B. {{$mcq->option_b}}<?php if($mcq->correct_option == 'b') {?> </b> <?php } ?> <br>
                                <?php if($mcq->correct_option == 'c') {?> <b> <?php } ?>C. {{$mcq->option_c}}<?php if($mcq->correct_option == 'c') {?> </b> <?php } ?><br>
                                <?php if($mcq->correct_option == 'd') {?> <b> <?php } ?>D. {{$mcq->option_d}}<?php if($mcq->correct_option == 'd') {?> </b> <?php } ?>
                            </p>
                            <div class="collaps-btn">
                                <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#btn-{{$loop->iteration}}"
                                    aria-expanded="false" aria-controls="btn-{{$loop->iteration}}">
                                    Answer Detail
                                </button>
                                <a class="btn btn-primary ml-3" href="{{url('report/'.$mcq->id)}}">Report</a>
                                <p>
                                <div class="collapse" id="btn-{{$loop->iteration}}">
                                    <div class="card card-body">
                                        {{$mcq->explanation}}
                                    </div>
                                </div>
                                </p>
                            </div>
                        </div>
                        <hr>

                        @endforeach

                    </div>
                    <div class="pagination-container " >
                        {{ $mcqs->links() }}
                    </div>
                    <hr>
                    <div class="subjects-details mt-3">
                        <div class="sub-heading mb-4">
                            <h3>Daily Updated MCQS Questions for Practice</h3>
                        </div>
                        <a href="#">
                            <div class="subjects-1 d-flex mb-5">
                                <span class="ms-4">Latest Past Papers</span>
                                <div class="text-end">
                                    <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                </div>
                            </div>
                        </a>
                        <div class="sub-heading">
                            <h3>Subject MCQS Questions For Practice
                            </h3>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                @foreach ($categories as $category)

                                <a href="{{url('/all-mcqs/'.$category->id)}}">
                                    <div class="subjects-2 d-flex mb-3">
                                        <span class="me-5 ms-4">
                                            {{$category->name}}</span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>

                            @endforeach
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <a href="#">
                                    <div class="subjects-2 d-flex mb-3">
                                        <span class="me-5 ms-4">
                                            Maths</span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-3 d-flex mb-3">
                                        <span class="me-5 ms-4">
                                            Chemistry</span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-2 d-flex mb-3">
                                        <span class="me-5 ms-4">
                                            Islamic Studies</span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-3 d-flex mb-3">
                                        <span class="me-5 ms-4">
                                            Pedagogy</span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-2 d-flex mb-3">
                                        <span class="me-5 ms-4">
                                            International Law</span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-3 d-flex mb-3">
                                        <span class="me-5 ms-4">
                                            History</span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="sub-heading mt-5">
                            <h3>General MCQS Question For Practice
                            </h3>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <a href="#">
                                    <div class="subjects-2 d-flex mb-3">
                                        <span class="ms-4">
                                            General Knowledge</span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-3 d-flex mb-3">
                                        <span class="ms-4">
                                            Everyday Science </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <a href="#">
                                    <div class="subjects-2 d-flex mb-3">
                                        <span class="ms-4">
                                            Pakistan Current Affairs</span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-3 d-flex mb-3">
                                        <span class="ms-4">
                                            World Current Affairs</span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="sub-heading mt-5">
                            <h3>Engineering MCQ Question For Practice
                            </h3>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <a href="#">
                                    <div class="subjects-2 d-flex mb-3">
                                        <span class="ms-4">
                                            Electrical Engineering</span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-3 d-flex mb-3">
                                        <span class="ms-4">
                                            Mechanical Engineering </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-2 d-flex mb-3">
                                        <span class="ms-4">
                                            Software Engineering </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <a href="#">
                                    <div class="subjects-2 d-flex mb-3">
                                        <span class="ms-4">
                                            Civil Enigneering</span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-3 d-flex mb-3">
                                        <span class="ms-4">
                                            Chemical Engineering</span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="sub-heading mt-5">
                            <h3>Management & Commerce MCQS Question For Practice
                            </h3>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <a href="#">
                                    <div class="subjects-3 d-flex mb-3">
                                        <span class="ms-4">
                                            Finance </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-2 d-flex mb-3">
                                        <span class="ms-4">
                                            Auditing </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-3 d-flex mb-3">
                                        <span class="ms-4">
                                            Economics </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-2 d-flex mb-3">
                                        <span class="ms-4">
                                            Business Management </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <a href="#">
                                    <div class="subjects-3 d-flex mb-3">
                                        <span class="ms-4">
                                            Marketing </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-2 d-flex mb-3">
                                        <span class="ms-4">
                                            Accounting </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-3 d-flex mb-3">
                                        <span class="ms-4">
                                            HRM </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="sub-heading mt-5">
                            <h3>Medical MCQS Question For Practice
                            </h3>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <a href="#">
                                    <div class="subjects-3 d-flex mb-3">
                                        <span class="ms-4">
                                            Medical </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-2 d-flex mb-3">
                                        <span class="ms-4">
                                            Oral Anatomy </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-3 d-flex mb-3">
                                        <span class="ms-4">
                                            Oral Pathology </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-2 d-flex mb-3">
                                        <span class="ms-4">
                                            Pathology </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-3 d-flex mb-3">
                                        <span class="ms-4">
                                            Pharmacology </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <a href="#">
                                    <div class="subjects-3 d-flex mb-3">
                                        <span class="ms-4">
                                            Biochemistry </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-2 d-flex mb-3">
                                        <span class="ms-4">
                                            General Anatomy </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-3 d-flex mb-3">
                                        <span class="ms-4">
                                            Oral Histology </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-2 d-flex mb-3">
                                        <span class="ms-4">
                                            Dental Materials </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-3 d-flex mb-3">
                                        <span class="ms-4">
                                            Physiology </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="sub-heading mt-5">
                            <h3>Others MCQS Question For Practice
                            </h3>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <a href="#">
                                    <div class="subjects-2 d-flex mb-3">
                                        <span class="ms-4">
                                            Agriculture </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-3 d-flex mb-3">
                                        <span class="ms-4">
                                            Sociology </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <a href="#">
                                    <div class="subjects-2 d-flex mb-3">
                                        <span class="ms-4">
                                            Judiciary and Law </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <a href="#">
                                    <div class="subjects-3 d-flex mb-3">
                                        <span class="ms-4">
                                            Statistics </span>
                                        <div class="text-end">
                                            <img class="image" src="{{ asset('web-assets/img/mcq.png') }}" alt="">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-3" style="border-left: 1px solid #e9e9e9;">
                    <div class="sidebar">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <button class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></button>
                        </div>
                        <div class="mcqs-details mt-4">
                            <h6>PAKMCQS MENU</h6>
                            <hr class="mt-0">
                            <ul>
                                @foreach ($categories as $category)
                                    <a href="{{url('/all-mcqs/'.$category->id)}}">
                                        <li>> &nbsp {{$category->name}} Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>

                                    </a>
                                @endforeach
                            </ul>
                        </div>
                        <div class="mcqs-details mt-3">
                            <h6>MANAGEMENT SCIENCES</h6>
                            <hr class="mt-0">
                            <ul>
                                <a href="#">
                                    <li>> &nbsp Finance Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp HRM Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Marketing Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Accounting Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Auditing Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                            </ul>
                        </div>
                        <div class="mcqs-details mt-3">
                            <h6>ENGINEERING MCQS</h6>
                            <hr class="mt-0">
                            <ul>
                                <a href="#">
                                    <li>> &nbsp Electrical Engineering Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img">
                                    </li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Civil Engineering Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Mechanical Engineering Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img">
                                    </li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Chemical Engineering Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img">
                                    </li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Software Engineering Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img">
                                    </li>
                                </a>
                            </ul>
                        </div>
                        <div class="mcqs-details mt-3">
                            <h6>MEDICAL SUBJECTS</h6>
                            <hr class="mt-0">
                            <ul>
                                <a href="#">
                                    <li>> &nbsp Medical Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Biochemistry <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Dental Materials <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp General Anatomy Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Microbiology <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Oral Anatomy <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Oral Histology <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Oral Histology <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Oral Pathology and Medicine <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img">
                                    </li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Physiology Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Pathology <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Pharmacology <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                            </ul>
                        </div>
                        <div class="mcqs-details mt-3">
                            <h6>OTHER SUBJECTS</h6>
                            <hr class="mt-0">
                            <ul>
                                <a href="#">
                                    <li>> &nbsp Psychology Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Agriculture Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Economics Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Sociology Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Political Science Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Statistics Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp English Literature Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp Judiciary And Law Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                            </ul>
                        </div>
                        <div class="mcqs-details mt-3">
                            <h6>SUBMIT MCQS</h6>
                            <hr class="mt-0">
                            <ul>
                                <a href="#">
                                    <li>> &nbsp Submit Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                            </ul>
                        </div>
                        <div class="mcqs-details mt-3">
                            <h6>PAKMCQS QUIZ</h6>
                            <hr class="mt-0">
                            <ul>
                                <a href="#">
                                    <li>> &nbsp ISLAMIC STUDIES MCQS QUIZ <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img">
                                    </li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp GENERAL KNOWLEDGE QUIZ <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp PAKISTAN STUDIES QUIZ <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp EVERYDAY SCIENCE QUIZ <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                                <a href="#">
                                    <li>> &nbsp COMPUTER ONLINE QUIZ <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                            </ul>
                        </div>
                        <div class="mcqs-details mt-3">
                            <h6>TOP CONTRIBUTORS</h6>
                            <hr class="mt-0">
                        </div>
                        <div class="mcqs-details mt-3">
                            <h6>ELECTION OFFICER</h6>
                            <hr class="mt-0">
                            <ul>
                                <a href="#">
                                    <li>> &nbsp Election Officer Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>








    <hr class="mt-0">
    <!-- footer section -->
    <footer class="footer-sec text-white">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                    <div class="main-content">
                        <h6>About Us</h6>
                        <div class="footer-logo text-center">
                            <img class="img-fluid " src="{{ asset('web-assets/img/abc4.png') }}" alt="footer-logo">
                        </div>
                        <p>Pakistan's top MCQS website, which provides a new way to learn and practice MCQs. We
                            prepare candidates for all kinds of MCQs and aptitude based exams. You can also Submit
                            Mcqs of your recent paper or test in a commit section. We also provide the facility of
                            online Mcqs Quiz test for different grade students.</p>
                        <h6>Follow Us</h6>
                        <div class="footer-social-links mb-3 mt-4">
                            <a href="#"><i class="fa fa-twitter mb-3"></i></a>
                            <a href="#"><i class="fa fa-facebook mb-3"></i></a>
                            <a href="#"><i class="fa fa-linkedin mb-3"></i></a>
                            <a href="#"><i class="fa fa-youtube mb-3"></i></a>
                            <a href="#"><i class="fa fa-envelope mb-0"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                    <div class="main-sec">
                        <h6 class="ms-4">McqsLogic Categories</h6>
                        <ul class="footer-down-links">
                            <a href="#">
                                <li>Islamic Studies</li>
                            </a>
                            <a href="#">
                                <li>Biology</li>
                            </a>
                            <a href="#">
                                <li>Pak Study</li>
                            </a>
                            <a href="#">
                                <li>Pedagogy</li>
                            </a>
                            <a href="#">
                                <li>General Knowledge</li>
                            </a>
                            <a href="#">
                                <li>Pakistan Current Affairs</li>
                            </a>
                            <a href="#">
                                <li>Everyday Science</li>
                            </a>
                            <a href="#">
                                <li>World Current Affairs</li>
                            </a>
                            <a href="#">
                                <li>Computer</li>
                            </a>
                            <a href="#">
                                <li>Oral Anatomy</li>
                            </a>
                            <a href="#">
                                <li>Oral Histology</li>
                            </a>
                            <a href="#">
                                <li>Oral Pathology</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                    <div class="main-sec">
                        <h6 class="ms-4">McqsLogic Categories</h6>
                        <ul class="footer-down-links">
                            <a href="#">
                                <li>Electrical Engineering</li>
                            </a>
                            <a href="#">
                                <li>Mechanical Engineering</li>
                            </a>
                            <a href="#">
                                <li>Civil Engineering</li>
                            </a>
                            <a href="#">
                                <li>Chemical Engineering</li>
                            </a>
                            <a href="#">
                                <li>Software Engineering</li>
                            </a>
                            <a href="#">
                                <li>Finance</li>
                            </a>
                            <a href="#">
                                <li>Marketing</li>
                            </a>
                            <a href="#">
                                <li>Accounting</li>
                            </a>
                            <a href="#">
                                <li>Auditing</li>
                            </a>
                            <a href="#">
                                <li>Economics</li>
                            </a>
                            <a href="#">
                                <li>HRM</li>
                            </a>
                            <a href="#">
                                <li>Business Management</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                    <div class="main-sec">
                        <h6 class="ms-4">McqsLogic Categories</h6>
                        <ul class="footer-down-links">
                            <a href="#">
                                <li>GST</li>
                            </a>
                            <a href="#">
                                <li>Medical</li>
                            </a>
                            <a href="#">
                                <li>Biochemistry</li>
                            </a>
                            <a href="#">
                                <li>General Anatomy</li>
                            </a>
                            <a href="#">
                                <li>Pathology</li>
                            </a>
                            <a href="#">
                                <li>Dental Materials</li>
                            </a>
                            <a href="#">
                                <li>Pharmacology</li>
                            </a>
                            <a href="#">
                                <li>Physiology</li>
                            </a>
                            <a href="#">
                                <li>Agriculture</li>
                            </a>
                            <a href="#">
                                <li>Statistics</li>
                            </a>
                            <a href="#">
                                <li>Sociology</li>
                            </a>
                            <a href="#">
                                <li>Judiciary And Law</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <a id="scrollUp" href="#top" title="Scroll to top" style="position: fixed; z-index: 2147483647; display: block;"></a>
    </footer>



    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <!-- Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('web-assets/index.js')}}"></script>
    <!-- Animation -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
          // When the page has finished loading
    window.addEventListener('load', function() {
      // Hide the loader
      document.getElementById('loader').style.display = 'none';
      // Show the main content
      document.getElementById('content').style.display = 'block';
    });
    </script>

</body>

</html>
