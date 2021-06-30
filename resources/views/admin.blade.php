@extends('admin-master')
@section('title','Dashboard')
@section('dashboard','active')
@section('isi')

<style type="text/css">
            .overlay {
              position: fixed;
              top: 0;
              bottom: 0;
              left: 0;
              z-index: 99;
              right: 0;
              background: rgba(0, 0, 0, 0.7);
              transition: opacity 500ms;
              
            }
            .overlay:target {
              visibility: visible;
              opacity: 1;
            }

            .popup {
              margin: 70px auto;
              padding: 20px;
              background: #fff;
              border-radius: 5px;
              width: 30%;
              position: relative;
              transition: all 5s ease-in-out;
            }

            .popup h2 {
              margin-top: 0;
              color: #333;
              font-family: Tahoma, Arial, sans-serif;
            }
            .popup .close {
              position: absolute;
              top: 20px;
              right: 30px;
              transition: all 200ms;
              font-size: 30px;
              font-weight: bold;
              text-decoration: none;
              color: #333;
            }
            .popup .close:hover {
              color: #06D85F;
            }
            .popup .content {
              max-height: 30%;
              overflow: auto;
            }

            @media screen and (max-width: 700px){
              .box{
                width: 70%;
              }
              .popup{
                width: 70%;
              }
            }
</style>

        <?php if (session()->has('success')): ?>
            <div id="popup1" class="overlay">
            <div class="popup">
                <h2>Success</h2>
                <BUTTON  onclick="document.location.reload(true);" class="close">&times;</BUTTON>
                <div class="content">
                    {{session()->get('success')}}
                </div>
            </div>          
        </div>
        <?php endif ?>

        <script type="text/javascript">
                function gone(){
                    document.location.reload(true);
                }
        </script>

<div class="main-content">
	<div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{count($barber)}}</h2>
                                                <span>Tukang Cukur</span><br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{count($pesanan)}}</h2>
                                                <span>Pesanan</span><br> <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-cut"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{count($service)}}</h2>
                                                <span>Servis</span><br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-camera"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{count($photo)}}</h2>
                                                <span>Photo</span><br> <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-comments"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{count($feedback)}}</h2>
                                                <span>Feedback Masuk</span><br> <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-clock"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{count($time)}}</h2>
                                                <span>Waktu Pemesanan</span><br> <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-copy"></i>
                                            </div>
                                            <div class="text">
                                                <h2>8</h2>
                                                <span>Halaman Web</span><br> <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <div class="text">
                                                <h2>{{count($user)}}</h2>
                                                <span>Administrator</span><br> <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-dollar"></i>
                                            </div>
                                            <div class="text">
                                                <h2 style="font-size: 1.5em; margin-top: .5em;"><?php echo $rupiah = "Rp. ".number_format($earning,2,',','.') ?></h2>
                                                <span>Pemasukan</span><br> <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9 col-lg-6">
                                <div class="overview-item overview-item--c3" data-toggle="modal" data-target="#verify-modal" style="cursor: pointer;">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-qrcode"></i>
                                            </div>
                                            <div class="text">
                                                <h2 style="font-size: 1.5em; margin-top: .5em;">{{$verify->code}}</h2>
                                                <span>Verify Code</span><br> <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
</div>

@endsection

@section('verify')
<div class="modal fade" id="verify-modal" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Change Verify Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    <form action="{{url('admin/verify-code')}}" method="post" class="form-horizontal">
                        {{csrf_field()}}  
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="text-input" class=" form-control-label">Verify Code</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input required type="text" value="{{$verify->code}}" id="text-input" name="code" placeholder="" class="form-control">
                            </div>
                        </div> 
                    
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection