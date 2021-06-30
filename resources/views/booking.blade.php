@extends('master')
@section('title','Booking')
@section('header')
    <header class="header-area">
        <div class="container">
            <div class="header-wrap">
                <div class="header-top d-flex justify-content-between align-items-center navbar-expand-lg">
                    <div class="col menu-left">
                        <a href="{{url('/')}}">Home</a>
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
                                    <a class="nav-link" href="{{url('/')}}">Home</a>
                                </li>
                                <li class="nav-item hide-lg">
                                    <a class="nav-link " href="{{url('about')}}">About</a>
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
                                <li class="nav-item ">
                                    <a class="nav-link active" href="{{url('booking')}}">Booking</a>
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
            <h1>Booking</h1>
        </div>
    </section>
    <!--================ End banner Area =================-->

    
    <!--================ Start Team Area =================-->
 <section class="team-area section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="section-title">
                        <h1>{{$bookingpage->judul1}}</h1>
                        <p>{{$bookingpage->isi1}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($barbers as $barber)
                <!-- single member -->
                <div class="col-lg-4 col-md-4">
                    <div class="single-team-member">
                        <div class="member-img">
                            <a href="{{url('booking/service/'.$barber->id)}}"><img class="img-fluid" src="img/team/{{$barber->img}}" alt=""></a>
                        </div>

                        <div class="proff">
                            <h4>{{$barber->nama}}</h4>
                            <p>{{$barber->kelamin}}</p>
                            <ul class="list list-mendatar" style="margin-bottom: 1em;">
                            @if($barber->rating == 5)
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            ({{$barber->rating}})
                            @elseif($barber->rating >= 4 && $barber->rating < 5)
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            ({{$barber->rating}})
                            @elseif($barber->rating >= 3 && $barber->rating < 4)
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            ({{$barber->rating}})
                            @elseif($barber->rating >= 2 && $barber->rating < 3)
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            ({{$barber->rating}})
                            @elseif($barber->rating > 0 && $barber->rating < 2)
                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                            ({{$barber->rating}})
                            @else
                            <li>(Not Rated)</li>
                            @endif
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </section>
   
@endsection
