@extends('master')
@section('title','Home')

@section('header')
    <header class="header-area">
        <div class="container">
            <div class="header-wrap">
                <div class="header-top d-flex justify-content-between align-items-center navbar-expand-lg">
                    <div class="col menu-left">
                        <a class="active" href="{{url('/')}}">Home</a>
                        <a href="{{url('about')}}">about</a>
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
                                    <a class="nav-link active" href="{{url('/')}}">Home</a>
                                </li>
                                <li class="nav-item hide-lg">
                                    <a class="nav-link" href="{{url('about')}}">about</a>
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
    <section class="home-banner-area relative">
        <div class="owl-carousel home-banner-owl">
            <div class="banner-img">
                <img class="img-fluid" src="img/banner/b1.jpg" alt="">
                <div class="overlay overlay-bg"></div>
            </div>
            <div class="banner-img">
                <img class="img-fluid" src="img/banner/b2.jpg" alt="">
                <div class="overlay overlay-bg"></div>
            </div>
            <div class="banner-img">
                <img class="img-fluid" src="img/banner/b3.jpg" alt="">
                <div class="overlay overlay-bg"></div>
            </div>
        </div>

        <div class="text-wrapper">
            <h1>
                {{$home->judul}}
            </h1>
            <p>
                {{$home->isi}}
            </p>
        </div>
    </section>
@endsection
