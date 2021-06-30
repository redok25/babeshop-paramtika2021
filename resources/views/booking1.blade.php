<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />                        
@extends('master')
@section('title','Booking')
@section('header')
<?php if (!session()->has('nama_barber')): ?>
    <?php echo "GALAT !!!!" ?>
    <?php return 0; ?>
<?php endif ?>
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
                        <a ><img class="mx-auto" src="{{url('img/logo.png')}}" alt=""></a>
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
                                <li class="nav-item" >
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
                    <a href="{{url('about')}}">About</a>
                </p>
            </div>
            <h1>Booking</h1>
        </div>
    </section>
    <!--================ End banner Area =================-->

    
    <!--================ Start Team Area =================-->
 <section class="price-area section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h1>{{$bookingpage->judul2}}</h1>
                        <p>{{$bookingpage->isi2}}</p>
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
                            <a class="primary-btn price-btn mt-40" data-toggle="modal" data-target="#exampleModal{{$price->id}}">Order Now</a>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div style="top: 100px;"  class="modal fade" id="exampleModal{{$price->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$price->id}}" aria-hidden="true">
                  <div  class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel{{$price->id}}">Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{url('booking/proses')}}" method="post">
                            {{csrf_field()}}
                            <div class="mt-10">Nama Pemesan: <input required="" type="text" name="nama" placeholder="Nama" class="single-input"></div>
                            <div class="mt-10">Barber: <input required="" type="text" name="tukang_cukur" value="{{session()->get('nama_barber')}}" disabled class="single-input"></div>
                            <div class="mt-10">
                            Waktu : <select name="time" class="single-input">
                                <?php foreach ($time as $t): ?>
                                    <option value="{{$t->time}}">{{$t->time}}</option>
                                <?php endforeach ?>
                            </select></div>
                            <div class="mt-10">
                            Tanggal : <br><input required="" type="date" name="date" class="single-input" value="{{date('Y-m-d')}}">
                            </div>
                            <div class="mt-10">
                                <select required="" style="width: 100%;" id="paket{{$price->id}}" name="pesanan[]" class="single-input" multiple="multiple">
                                    @foreach($services as $service)
                                    <?php if ($price->nama == $service->nama): ?>
                                        <option value="{{$service->nama}},{{$service->harga}}"  selected >{{$service->nama}}</option>
                                    <?php else: ?>
                                        <option value="{{$service->nama}},{{$service->harga}}">{{$service->nama}}</option>
                                    <?php endif ?>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-10">
                                <div class="switch-wrap d-flex justify-content-between">
                                <p style="font-size: .8em">Memanggil Barber (Ada biaya tambahan tergantung alamat) </p>
                                <div class="primary-switch">
                                    <input onclick="panggil{{$price->id}}()" name="panggil" type="checkbox" id="default-switch{{$price->id}}">
                                    <label for="default-switch{{$price->id}}"></label>
                                </div>
                                <script type="text/javascript">
                                    function panggil{{$price->id}}() {
                                       if ( document.getElementById('a{{$price->id}}').style.display == "none") {
                                             document.getElementById('a{{$price->id}}').style.display = "block"
                                             document.getElementById('b{{$price->id}}').style.display = "block"
                                         }else if(document.getElementById('a{{$price->id}}').style.display == "block") {
                                             document.getElementById('a{{$price->id}}').style.display = "none"
                                             document.getElementById('b{{$price->id}}').style.display = "none"
                                         }
                                    }
                                </script>
                            </div>
                            </div>
                            <div style="display: none" id="a{{$price->id}}" class="mt-10">
                                Alamat :
                                <textarea name="alamat" class="single-input"></textarea>
                            </div>
                            <div style="display: none" id="b{{$price->id}}" class="mt-10">
                            No HP : <input  type="text" name="nope" class="single-input">
                            </div>
                            <script src="{{asset('js/vendor/jquery-2.2.4.min.js')}}"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
                            <script>

                                $(document).ready(function () {

                                    $("#paket{{$price->id}}").select2({

                                        placeholder: "Pilih Servis"

                                    });

                                });

                            </script>
                            <div class="mt-10">Kode Verifikasi: <input required="" type="text" name="code" placeholder="Nama" class="single-input"></div>
                            <p style="font-size: .8em">*Kode verifikasi bisa diketauhi dengan cara menghubungi nomor babeshop di {{$pagesContact->isi2}}</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Order Now</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
   
@endsection
