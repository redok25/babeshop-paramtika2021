@extends('admin-master')
@section('title','ContactPage Edit')
@section('pages','active')
@section('pages','active')

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

        <?php if (session()->has('pesan')): ?>
            <div id="popup1" class="overlay">
            <div class="popup">
                <h2>Success</h2>
                <BUTTON  onclick="gone();" class="close">&times;</BUTTON>
                <div class="content">
                    {{session()->get('pesan')}}
                </div>
            </div>          
        </div>
        <?php endif ?>
        <script type="text/javascript">
                function gone(){
                    document.getElementById=popup1.style.display = 'none'
                }
            </script>


<div class="main-content">
							<div class="container-fluid">
                                <div class="card">
                                    <div class="card-header">
                                           		<h1>
                                           			Intruksi
									            </h1>
                                    </div>
                                    <div class="card-body">
									        <p>Jika ingin merubah tampilan page, silahkan langsung ubah tulisan di bawah kotak ini dan lihatlah refrensinya di frame yang sudah tersedia. langsung saja di klik jika sudah jangan lupa klik submit agar hasilnya berubah</p>
                                    </div>
                                </div>
                            </div>

							<form action="{{url('admin/pages/contact/proses')}}" method="POST">
							{{csrf_field()}}
							{{method_field('POST')}}
                            <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                  <div class="card">
                                    <div class="card-header">
                                              <h4><input style="width: 100%; background-color: #f8f9fa;  font-weight: bold;" type="" name="judul1" value=" {{$contact->judul1}}"></h4>
                                    </div>
                                    <div class="card-body">
                                      <textarea style="width: 100%;" rows="2" style="resize: none" name="isi1">
                                        {{$contact->isi1}}
                                      </textarea>
                                    </div>
                                 </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="card">
                                    <div class="card-header">
                                              <h4><input style="width: 100%; background-color: #f8f9fa;  font-weight: bold;" type="" name="judul2" value=" {{$contact->judul2}}"></h4>
                                    </div>
                                    <div class="card-body">
                                    <textarea style="width: 100%;" rows="2" style="resize: none" name="isi2">
                                      {{$contact->isi2}}
                                    </textarea>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="card">
                                    <div class="card-header">
                                              <h4><input style="width: 100%; background-color: #f8f9fa;  font-weight: bold;" type="" name="judul3" value=" {{$contact->judul3}}"></h4>
                                    </div>
                                    <div class="card-body">
                                    <textarea style="width: 100%;" rows="2" style="resize: none" name="isi3">
                                      {{$contact->isi3}}
                                    </textarea>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-12" style="margin-bottom: 1em">
                                  <h1 align="center">Koordinat Maps</h1>
                                </div>
                                <div class="col-md-6">
                                  <div class="card">
                                    <div class="card-header">
                                              <h4><input style="width: 100%; background-color: #f8f9fa;  font-weight: bold;" type="" disabled value="Latitude"></h4>
                                    </div>
                                    <div class="card-body">
                                      <input type="text" name="lat" value="{{$contact->lat}}">
                                    </div>
                                 </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="card">
                                    <div class="card-header">
                                              <h4><input style="width: 100%; background-color: #f8f9fa;  font-weight: bold;" type="" disabled value="Longitude"></h4>
                                    </div>
                                    <div class="card-body">
                                      <input type="text" name="lng" value="{{$contact->lng}}">
                                    </div>
                                 </div>
                                </div>
                                <div class="container-fluid ">
                                  <input type="submit" name="submit" class="btn btn-success" style="float: right;">
                                </div>
                            </div>
                            </div>
                            </form>
                            <br><br>
                            <div class="container-fluid">
                                  <iframe src="{{url('/contact')}}" height="420px" width="100%"></iframe>
                            </div>

</div>
@endsection