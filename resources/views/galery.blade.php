@extends('master')
@section('title','Gallery')
@section('header')
    <header class="header-area">
        <div class="container">
            <div class="header-wrap">
                <div class="header-top d-flex justify-content-between align-items-center navbar-expand-lg">
                    <div class="col menu-left">
                        <a href="{{url('/')}}">Home</a>
                        <a href="{{url('about')}}">about</a>
                        <a href="{{url('barbers')}}">barbers</a>
                        <a class="active" href="{{url('galery')}}">galery</a>
                    </div>
                    <div class="col-3 logo">
                        <a href="index.html"><img class="mx-auto" src="img/logo.png" alt=""></a>
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
                                    <a class="nav-link" href="{{url('about')}}">About</a>
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
                                    <a class="nav-link active" href="{{url('galery')}}">galery</a>
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
                    <a href="{{url('galery')}}">Gallery</a>
                </p>
            </div>
            <h1>Gallery</h1>
        </div>
    </section>
    <!--================ End banner Area =================-->

    <section class="gallery-area" id="gallery">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="section-title">
                        <h1>{{$galerypage->judul}}</h1>
                        <p>{{$galerypage->isi}}</p>
                    </div>
                </div>
            </div>
            <div class="filters-content">
                <div class="row grid">

                    @foreach($galery as $img)
                    <div class="single-gallery col-lg-4 col-md-6 all">
                        <div class="relative">
                            <div class="thumb">
                                <div class="overlay overlay-bg"></div>
                                <img class="image img-fluid" src="img/gallery/{{$img->img}}" alt="{{$img->keterangan}}">
                            </div>
                            <a href="img/gallery/{{$img->img}}" class="img-pop-up">
                                <div class="middle">
                                    <div class="text align-self-center d-flex">
                                        <img src="img/gallery/preview.png" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </section>
@endsection
