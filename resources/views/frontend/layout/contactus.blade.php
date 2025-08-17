@include('frontend.header')
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
                        <li><a href="{{route('privacy')}}">Privacy Policy</a></li>
                        <li><a href="{{route('terms')}}">Terms & Conditions</a></li>
                        <li><a href="{{route('contact')}}">Contact Us</a></li>
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
                    <a class="navbar-brand" href="https://mcqslogic.zahidniazi.com/"><img style="padding-top: 0px" src="{{ asset('web-assets/img/abc8.png') }} " width="300" height="100" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="https://mcqslogic.zahidniazi.com/"><span>Home</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('aboutus')}}"><span>About Us</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('blog')}}"><span>Blog</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('contact')}}">Contact Us</a>

                            <li class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    MCQs
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    {{-- @foreach ($categories as $category)

                                    <li><a class="dropdown-item" href="{{url('/all-mcqs/'.$category->id)}}">{{$category->name}}</a></li> --}}

                                    {{-- @endforeach --}}
    <li><a class="dropdown-item" href="all-mcqs/1">CSS</a></li>
    <li><a class="dropdown-item" href="all-mcqs/2">PMS</a></li>
    <li><a class="dropdown-item" href="all-mcqs/3">Political Science</a></li>
    <li><a class="dropdown-item" href="all-mcqs/4">Computer Science</a></li>
    <li><a class="dropdown-item" href="all-mcqs/5">Maths</a></li>
    <li><a class="dropdown-item" href="all-mcqs/6">General Knowledge</a></li>
    <li><a class="dropdown-item" href="all-mcqs/7">Current Affairs</a></li>
    <li><a class="dropdown-item" href="all-mcqs/8">Pak Study</a></li>
    <li><a class="dropdown-item" href="all-mcqs/9">Physics</a></li>
    <li><a class="dropdown-item" href="all-mcqs/10">Urdu</a></li>
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
                <div class="mcqs-heading text-center">
                    <h3 style="padding-top: 20px; ">Contact Us</h3>
                    <p style="text-align: justify; padding-top: 20px; padding:20px; font-family: sans-serif;" >
                        Have a question, suggestion, or just want to get in touch? We're here to help! Feel free to reach out to us using the contact information below:

<strong>Email: zahidurrehman789@gmail.com</strong> 

<strong>Get in Touch: </strong>

If you have any inquiries, feedback, or requests, please don't hesitate to send us an email. We value your input and strive to provide the best possible experience for our users.

<strong>Stay Connected: </strong>

Connect with us on social media to stay up-to-date with the latest news, blog posts, and updates from McqsLogic. You can find us on Facebook and Twitter.

Your feedback and engagement are important to us. We look forward to hearing from you and assisting you in any way we can. Thank you for being a part of the McqsLogic community!
                    </p>
                </div>
               

                {{-- <div class="subjects-details mt-3">
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
                </div> --}}

            </div>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-3" style="border-left: 1px solid #e9e9e9;">
                <div class="sidebar">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search"
                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <button class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></button>
                    </div>
                    {{-- <div class="mcqs-details mt-4">
                        <h6>PAKMCQS MENU</h6>
                        <hr class="mt-0">
                        {{-- <ul>
                            @foreach ($categories as $category)
                                <a href="{{url('/all-mcqs/'.$category->id)}}">
                                    <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp {{$category->name}}  <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>

                                </a>
                            @endforeach
                        </ul> 
                    </div>--}}
                    <div class="mcqs-details mt-3">
                        <h6>LATEST MCQS</h6>
                        <hr class="mt-0">
                        <ul>
                            <a href="all-mcqs/1">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp CSS  <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="all-mcqs/2">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp PMS  <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="all-mcqs/3">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Computer Science  <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="all-mcqs/4">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Political Science  <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="all-mcqs/5">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp  Mathmatics  <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>

                            <a href="all-mcqs/6">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp General Knowledge <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="all-mcqs/7">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Current Affairs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="all-mcqs/8">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Pak Study  <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="all-mcqs/9">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Physics  <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="all-mcqs/10">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp  Urdu  <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                        </ul>
                    </div>
 <!--                    <div class="mcqs-details mt-3">
                        <h6>ENGINEERING MCQS</h6>
                        <hr class="mt-0">
                        <ul>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Electrical Engineering Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img">
                                </li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Civil Engineering Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Mechanical Engineering Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img">
                                </li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Chemical Engineering Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img">
                                </li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Software Engineering Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img">
                                </li>
                            </a>
                        </ul>
                    </div>
                    <div class="mcqs-details mt-3">
                        <h6>MEDICAL SUBJECTS</h6>
                        <hr class="mt-0">
                        <ul>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Medical Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Biochemistry <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Dental Materials <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp General Anatomy Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Microbiology <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Oral Anatomy <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Oral Histology <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Oral Histology <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Oral Pathology and Medicine <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img">
                                </li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Physiology Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Pathology <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Pharmacology <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                        </ul>
                    </div>
                    <div class="mcqs-details mt-3">
                        <h6>OTHER SUBJECTS</h6>
                        <hr class="mt-0">
                        <ul>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Psychology Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Agriculture Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Economics Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Sociology Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Political Science Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Statistics Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp English Literature Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Judiciary And Law Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                        </ul>
                    </div>
                    <div class="mcqs-details mt-3">
                        <h6>SUBMIT MCQS</h6>
                        <hr class="mt-0">
                        <ul>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Submit Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                        </ul>
                    </div>
                    <div class="mcqs-details mt-3">
                        <h6>PAKMCQS QUIZ</h6>
                        <hr class="mt-0">
                        <ul>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp ISLAMIC STUDIES MCQS QUIZ <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img">
                                </li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp GENERAL KNOWLEDGE QUIZ <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp PAKISTAN STUDIES QUIZ <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp EVERYDAY SCIENCE QUIZ <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                            <a href="#">
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp COMPUTER ONLINE QUIZ <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
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
                                <li><i class="fa-solid fa-circle-arrow-right"></i> &nbsp Election Officer Mcqs <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>
                            </a>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>








{{-- <hr class="mt-0"> --}}
<!-- footer section -->
{{-- <footer class="footer-sec text-white">
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
</footer> --}}
@include('frontend.footer')




<!-- Animation -->
{{-- <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
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
</script> --}}

</body>

</html>






