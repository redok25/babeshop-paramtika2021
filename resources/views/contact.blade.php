<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />                        
@extends('master')
@section('title','Contact')
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
                        <a><img class="mx-auto" src="{{url('img/logo.png')}}" alt=""></a>
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
                                <li class="nav-item" >
                                    <a class="nav-link " href="{{url('booking')}}">Booking</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{url('contact')}}">Contact</a>
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
            <h2>Maaf..</h2>
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
            <img class="img-fluid" src="{{url('/img/banner/banner-bg.jpg')}}" alt="">
            <div class="overlay overlay-bg"></div>
        </div>
        <div class="banner-content text-center">
            <div class="breadcrmb">
                <p>
                    <a href="{{url('/')}}">home</a>
                    <span class="lnr lnr-arrow-right"></span>
                    <a href="{{url('contact')}}">Contact</a>
                </p>
            </div>
            <h1>Contact</h1>
        </div>
    </section>
    <!--================ End banner Area =================-->

    
    <!-- Start contact-page Area -->
    <section class="contact-page-area section-gap">
        <div class="container">
            <div class="row">
                <div class="address-wrap">
                    <div class="single-contact-address d-flex ">
                        <div class="icon">
                            <span class="lnr lnr-home"></span>
                        </div>
                        <div class="contact-details">
                            <h5>{{$contact->judul1}}</h5>
                            <p>
                                {{$contact->isi1}}
                            </p>
                        </div>
                    </div>
                    <div class="single-contact-address d-flex ">
                        <div class="icon">
                            <span class="lnr lnr-phone-handset"></span>
                        </div>
                        <div class="contact-details">
                            <h5>{{$contact->judul2}}</h5>
                            <p>{{$contact->isi2}}</p>
                        </div>
                    </div>
                    <div class="single-contact-address d-flex ">
                        <div class="icon">
                            <span class="lnr lnr-envelope"></span>
                        </div>
                        <div class="contact-details">
                            <h5>{{$contact->judul3}}</h5>
                            <p>{{$contact->isi3}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <h1 align="center" style="margin-bottom: .4em">Maps</h1>
            <script type="text/javascript">
                let map;
                let myCor = { lat: <?php echo $contact->lat ?>, lng:  <?php echo $contact->lng ?>}
                function initMap() {
                  map = new google.maps.Map(document.getElementById("map"), {
                    center: myCor,
                    zoom: 17,
                  });

                  new google.maps.Marker({
                    position: myCor,
                    map,
                    title: "Kami di sini!",
                  });
                }
            </script>
            <style type="text/css">
                #map {
                  height: 50%;
                }
            </style>
             <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA&callback=initMap&libraries=&v=weekly" async></script>
             <div id="map"></div>
        </div>
    </section>
 
   
@endsection
