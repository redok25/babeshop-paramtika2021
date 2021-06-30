@extends('master')
@section('title','Pricing')

@section('header')
    <header class="header-area">
        <div class="container">
            <div class="header-wrap">
                <div class="header-top d-flex justify-content-between align-items-center navbar-expand-lg">
                    <div class="col menu-left">
                        <a class="" href="{{url('/')}}">Home</a>
                        <a href="{{url('about')}}">about</a>
                        <a href="{{url('barbers')}}">barbers</a>
                        <a href="{{url('galery')}}">galery</a>
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
                                    <a class="nav-link " href="{{url('/')}}">Home</a>
                                </li>
                                <li class="nav-item hide-lg">
                                    <a class="nav-link" href="{{url('about')}}">about</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('feedback')}}">feedback</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{url('pricing')}}">pricing</a>
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
                    <a href="{{url('pricing')}}">Pricing</a>
                </p>
            </div>
            <h1>Pricing Charts</h1>
        </div>
    </section>

   <section class="price-area section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h1>{{$pricingpage->judul}}</h1>
                        <p>{{$pricingpage->isi}}</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                @foreach($pricing as $price)
                <!-- single pricing -->
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-price">
                        <div class="top-sec">
                            <h4>{{$price->nama}}</h4>
                        </div>
                        <div class="bottom-sec">
                            <h1><?php echo $rupiah = "Rp. ".number_format($price->harga,2,',','.') ?></h1>
                        </div>
                        <div class="end-sec">
                            <a class="primary-btn price-btn mt-40" href="{{url('/booking')}}">Order Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
