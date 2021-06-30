@extends('master')
@section('title','About')
@section('header')
    <header class="header-area">
        <div class="container">
            <div class="header-wrap">
                <div class="header-top d-flex justify-content-between align-items-center navbar-expand-lg">
                    <div class="col menu-left">
                        <a href="{{url('/')}}">Home</a>
                        <a class="active"  href="{{url('about')}}">about</a>
                        <a href="{{url('barbers')}}">barbers</a>
                        <a href="{{url('galery')}}">galery</a>
                    </div>
                    <div class="col-3 logo">
                        <a><img class="mx-auto" src="img/logo.png" alt=""></a>
                    </div>
                    <nav class="col navbar navbar-expand-lg justify-content-end">

                        <!-- Toggler/collapsibe Button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                            <span class="lnr lnr-menu"></span>
                        </button>

                        <!-- Navbar links -->
                        <div class="collapse navbar-collapse menu-right" id="collapsibleNavbar">
                            <ul class="navbar-nav justify-content-center w-100">
                                <li class="nav-item hide-lg">
                                    <a class="nav-link" href="{{url('/')}}">Home</a>
                                </li>
                                <li class="nav-item hide-lg">
                                    <a class="nav-link active" href="{{url('about')}}">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('feedback')}}">feedback</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('pricing')}}">pricing</a>
                                </li>
                                <li class="nav-item hide-lg">
                                    <a class="nav-link " href="{{url('barbers')}}">barbers</a>
                                </li>
                                <li class="nav-item hide-lg">
                                    <a class="nav-link " href="{{url('galery')}}">galery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{url('booking')}}">Booking</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('contact')}}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('isi')
    <!--================ Start banner Area =================-->
    <section class="banner-area relative">
        <div class="banner-img">
            <img class="img-fluid" src="img/banner/banner-bg.jpg" alt="">
            <div class="overlay overlay-bg"></div>
        </div>
        <div class="banner-content text-center">
            <div class="breadcrmb">
                <p>
                    <a href="{{url('/')}}">home</a>
                    <span class="lnr lnr-arrow-right"></span>
                    <a href="{{url('about')}}">About</a>
                </p>
            </div>
            <h1>About Us</h1>
        </div>
    </section>
    <!--================ End banner Area =================-->

    <!--================ Start About Area =================-->
    <section class="section-gap about-area">
        <div class="container">
            <div class="single-about row align-items-center">
                <div class="col-lg-4 col-md-6 no-padding about-left">
                    <div class="about-content">
                        <h1>{{$aboutpage->judul1}}</h1>
                        <p>{{$aboutpage->isi1}}</p>
                        <a href="{{url('/')}}" class="primary-btn">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 text-center no-padding about-right">
                    <div class="about-thumb">
                        <img src="img/about-img.jpg" class="img-fluid info-img" alt="">
                    </div>
                </div>
                <div class="bordered-img">
                    <img src="img/about-img2.jpg" class="img-fluid info-img" alt="">
                </div>
            </div>
        </div>
    </section>
    <!--================ End About Area =================-->

    <!--================ Start Catalogue Area =================-->
    <section class="section-gap catalogue-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-1 offset-md-2 col-sm-12 col-md-8">
                    <div class="tab-area">
                        <div class="tab-contact-wraper" id="horizontalTab">
                            <h4>{{$aboutpage->judul2}}</h4>
                            <p>{{$aboutpage->subjudul2}}</p>
                            <div class="jq-tab-menu justify-content-center">
                                <div class="jq-tab-title active" data-tab="1"><img src="img/tab/icon1.png" alt=""></div>
                                <div class="jq-tab-title deff-bg1" data-tab="2"><img src="img/tab/icon2.png" alt=""></div>
                                <div class="jq-tab-title" data-tab="3"><img src="img/tab/icon3.png" alt=""></div>
                                <div class="jq-tab-title deff-bg1" data-tab="4"><img src="img/tab/icon4.png" alt=""></div>
                            </div>

                            <div class="jq-tab-content-wrapper">
                                <div class="jq-tab-content active" data-tab="1">{{$aboutpage->isi_pilihan1_2}}
                                    <a href="{{url('galery')}}" class="view-btn">View Gallery...</a>
                                </div>
                                <div class="jq-tab-content" data-tab="2">{{$aboutpage->isi_pilihan2_2}}
                                    <a href="{{url('galery')}}" class="view-btn">View Gallery...</a>
                                </div>
                                <div class="jq-tab-content" data-tab="3">{{$aboutpage->isi_pilihan3_2}}
                                    <a href="{{url('galery')}}" class="view-btn">View Gallery...</a>
                                </div>
                                <div class="jq-tab-content" data-tab="4">{{$aboutpage->isi_pilihan4_2}}
                                    <a href="{{url('galery')}}" class="view-btn">View Gallery...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Catalogue Area =================-->

    <!--================ Start Team Area =================-->
 <section class="team-area section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="section-title">
                        <h1>{{$barberpage->judul}}</h1>
                        <p>{{$barberpage->isi}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($barbers as $barber)
                <!-- single member -->
                <div class="col-lg-4 col-md-4">
                    <div class="single-team-member">
                        <div class="member-img">
                            <img class="img-fluid" src="img/team/{{$barber->img}}" alt="">
                        </div>

                        <div class="proff">
                            <h4>{{$barber->nama}}</h4>
                            <p>{{$barber->kelamin}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </section>
    <!--================ End Team Area =================-->

    <!--================Testimonials Area =================-->
    <section class="testimonials-area section-gap-top">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="text-center">
                <img class="quote-img" src="img/testimonial/quote.png" alt="">
            </div>
            <div class="testi-slider owl-carousel" data-slider-id="1">
                 <?php if ($feedback->count() > 0): ?>
                @foreach($feedback as $f)
                <div class="item">
                    <div class="testi-item">
                        <h4>{{$f->barbers->nama}}</h4>
                        <ul class="list">
                            @if($f->rating == 5)
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            @elseif($f->rating == 4)
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            @elseif($f->rating == 3)
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            @elseif($f->rating == 2)
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            @elseif($f->rating == 1)
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            @endif
                        </ul>
                        <div class="wow fadeIn" data-wow-duration="1s">
                            <p>
                                {{$f->feedback}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach

                <?php else: ?>
                    <div class="text-center"><h1 style="color: white; margin-bottom: 1em">None</h1></div>
                <?php endif ?>
            </div>       
        </div>
    </section>
    <!--================End Testimonials Area =================-->
@endsection
