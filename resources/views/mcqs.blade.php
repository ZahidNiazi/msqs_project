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
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
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
                    <a class="navbar-brand" href="https://mcqslogic.zahidniazi.com/"><img style="padding-top: 0px"
                            src="{{ asset('web-assets/img/abc8.png') }} " width="300" height="100"
                            alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center " id="navbarSupportedContent">
                        <ul class="navbar-nav" style="font-weight: bold;">
                            <li class="nav-item">
                                <a class="nav-link" href="https://mcqslogic.zahidniazi.com/"><span>Home</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('aboutus') }}"><span>About Us</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('blog') }}"><span>Blog</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>

                            <li class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false" style="font-weight: bold;">
                                    MCQs
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @foreach ($categories as $category)
                                        <li><a class="dropdown-item"
                                                style="font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;"
                                                href="{{ url('/all-mcqs/' . $category->id) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

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
                    <div class="mcqs-heading text-center">

                    </div>
                </div>
                <div style="padding:40px; ">
                    <span
                        style=" text:bold; text-align: center; font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; font-weight: bold; font-family: Arial, sans-serif; align-items:justify  ">
                        <p style="text-align: justify;">
                            CSS PMS English Essay holds the key, to get success in competitive exams. In fact, most of
                            the students get failed in CSS or PMS in English Essay, even the candidates who have done
                            Masters’s in English Literature. The question comes why?

                            Besides, writing correct English, passing the essay paper requires writing technique, skill,
                            and practice. Most CSS or PMS candidates do not acquire competent guidelines, as a result,
                            their dream not come true to become a bureaucrat.</p>
                    </span>
                </div>
                <div class="mcqs-heading text-center pt-5">
                    @foreach ($mcqs as $mcq)
                        <h3 style="text-decoration: underline overline;padding-bottom:3px;"><b
                                style="font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;  ">{{ $mcq->title }}</b>
                        </h3>
                    @endforeach
                </div>
                @php
                    $perPage = $mcqs->perPage();
                    $currentPage = $mcqs->currentPage();
                    $startIndex = ($currentPage - 1) * $perPage + 1;
                @endphp
                <div class="mcqs-section mb-3">
                    @foreach ($mcqs as $index => $mcq)
                        <div class="mcqs" style="padding-left: 30px;">
                            <span><b style="font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; ">{{ $startIndex + $index }}.
                                    {{ $mcq->question }}</b></span>

                            <p style="font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; ">
                                <?php if($mcq->correct_option == 'a') {?> <b> <?php } ?>A. {{ $mcq->option_a }}<?php if($mcq->correct_option == 'a') {?>
                                </b> <?php } ?><br>
                                <?php if($mcq->correct_option == 'b') {?> <b> <?php } ?>B. {{ $mcq->option_b }}<?php if($mcq->correct_option == 'b') {?>
                                </b> <?php } ?> <br>
                                <?php if($mcq->correct_option == 'c') {?> <b> <?php } ?>C. {{ $mcq->option_c }}<?php if($mcq->correct_option == 'c') {?>
                                </b> <?php } ?><br>
                                <?php if($mcq->correct_option == 'd') {?> <b> <?php } ?>D.
                                    {{ $mcq->option_d }}<?php if($mcq->correct_option == 'd') {?> </b> <?php } ?>
                            </p>
                            <div class="collaps-btn">
                                <button class="btn btn-sm" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#btn-{{ $loop->iteration }}" aria-expanded="false"
                                    aria-controls="btn-{{ $loop->iteration }}">
                                    Answer Detail
                                </button>
                                <a class="btn btn-primary ml-3 btn-sm" href="{{ url('report/' . $mcq->id) }}">Report</a>
                                <p>
                                <div class="collapse" id="btn-{{ $loop->iteration }}">
                                    <div class="card card-body">
                                        {{ $mcq->explanation }}
                                    </div>
                                </div>
                                </p>
                            </div>
                            <hr>

                        </div>
                    @endforeach
                </div>
                <div class="pagination-container ">
                    {{ $mcqs->links() }}
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
                                <a href="{{ url('/all-mcqs/' . $category->id) }}">
                                    <li style="font-family: 'Alatsi', sans-serif;"><i
                                            class="fa-solid fa-circle-arrow-right"></i> &nbsp {{ $category->name }}
                                        <img src="{{ asset('web-assets//img/ZJtB.gif') }}" alt="blink-img"></li>

                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.footer')
</body>
</html>
