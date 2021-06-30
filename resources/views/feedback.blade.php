@extends('master')
@section('title','Feedback')
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
                                    <a class="nav-link active" href="{{url('feedback')}}">feedback</a>
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
<?php if (session()->has('success')): ?>
    <div id="poup" class="popupbox">
        <div class="box">
            <h2>Thank You..</h2>
            <button class="close" onclick="closekan();">&times;</button>
            <div class="content">
                {{session()->get('success')}}
            </div>
        </div>
        <script type="text/javascript">
            function closekan() {
                document.getElementById=poup.style.display = "none";
            }
        </script>
</div>
<?php endif ?>
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
                    <a href="{{url('feedback')}}">Feedback</a>
                </p>
            </div>
            <h1>Feedback</h1>
        </div>
    </section>
    <!--================ End banner Area =================-->

    <!--================ Start Team Area =================-->
    <section class="team-area section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="section-title">
                        <h1>{{$feedbackpage->judul}}</h1>
                        <p>{{$feedbackpage->isi}}</p>
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
                            <ul class="list list-mendatar">
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
                            <p>{{$barber->kelamin}}</p>
                            <button id="button{{$barber->id}}" onclick="show{{$barber->id}}();" class="genric-btn primary">Feedback</button>
                            <form id="no{{$barber->id}}colFeedback" style="display: none" action="{{url('feedback/proses')}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('POST')}}
                                <input class="single-input" type="hidden" name="tukang_cukur_id" value="{{$barber->id}}">
                                <input type="text" name="contact" class="single-input" placeholder="Info Contact">
                                <textarea required="" name="feedback" class="single-input" placeholder="Feedback"></textarea>
                                <select class="single-input" name="rating">
                                    <option value="5">
                                        &#11088;&#11088;&#11088;&#11088;&#11088;
                                    </option>
                                    <option value="4">
                                        &#11088;&#11088;&#11088;&#11088;
                                    </option>
                                    <option value="3">
                                        &#11088;&#11088;&#11088;
                                    </option>
                                    <option value="2">
                                        &#11088;&#11088;
                                    </option>
                                    <option value="1">
                                        &#11088;
                                    </option>
                                </select>
                                <input class="single-input genric-btn primary" type="submit" name="submit" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    function show{{$barber->id}}() {
                        if (document.getElementById=no{{$barber->id}}colFeedback.style.display == "none") {
                            document.getElementById=no{{$barber->id}}colFeedback.style.display = "block"
                            document.getElementById=button{{$barber->id}}.style.display = "none"
                        }else{
                            document.getElementById=no{{$barber->id}}colFeedback.style.display = "none"
                        }
                    }
                </script>
                @endforeach
        </div>
    </section>
    <!--================ End Team Area =================-->

    <!--================Testimonials Area =================-->
    <section class="testimonials-area section-gap-top">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="text-center">
                <?php if ($feedback->count() > 0): ?>
                    <img class="quote-img" src="img/testimonial/quote.png" alt="">
                <?php endif ?>
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
