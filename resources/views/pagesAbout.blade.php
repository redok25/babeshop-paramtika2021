@extends('admin-master')
@section('title','AboutPage Edit')
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

							<form action="{{url('admin/pages/about/proses')}}" method="POST">
							{{csrf_field()}}
							{{method_field('POST')}}
                            <div class="container-fluid">
                                <div class="card">
                                    <div class="card-header">
                                           		<h1>
									               <input style="width: 100%; background-color: #f8f9fa;  font-weight: bold;" type="" name="judul1" value=" {{$about->judul1}}">
									            </h1>
                                    </div>
                                    <div class="card-body">
									        <textarea style="width: 100%;" rows="10" style="resize: none" name="isi1">
									        	{{$about->isi1}}
									        </textarea>
                                    </div>
                                    <div class="card-header">
                                                <h1>
                                                   <input style="width: 100%; background-color: #f8f9fa;  font-weight: bold;" type="" name="judul2" value=" {{$about->judul2}}">
                                                </h1>
                                    </div>
                                    <div class="card-body">
                                            <input style="width: 100%; background-color: #fff;  font-weight: bold;" type="" name="subjudul2" value=" {{$about->subjudul2}}">
                                            <br><hr>
                                            
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <div style="border: 1px solid #6c757d; border-radius: 20px; padding: 1em; margin: 1em" class="col-md-4 col-sm-1">
                                                        <img style="text-align: center;" src="{{asset('img/tab/icon1.png')}}"><br><hr>
                                                        <textarea style="width: 100%;" rows="10" style="resize: none" name="isi_pilihan1_2">
                                                            {{$about->isi_pilihan1_2}}
                                                        </textarea>
                                                    </div>
                                                    <div style="border: 1px solid #6c757d; border-radius: 20px; padding: 1em; margin: 1em" class="col-md-4 col-sm-1">
                                                        <img style="text-align: center;" src="{{asset('img/tab/icon2.png')}}"><br><hr>
                                                        <textarea style="width: 100%;" rows="10" style="resize: none" name="isi_pilihan2_2">
                                                            {{$about->isi_pilihan2_2}}
                                                        </textarea>
                                                    </div>
                                                    <div style="border: 1px solid #6c757d; border-radius: 20px; padding: 1em; margin: 1em" class="col-md-4 col-sm-1">
                                                        <img style="text-align: center;" src="{{asset('img/tab/icon3.png')}}"><br><hr>
                                                        <textarea style="width: 100%;" rows="10" style="resize: none" name="isi_pilihan3_2">
                                                            {{$about->isi_pilihan3_2}}
                                                        </textarea>
                                                    </div>
                                                    <div style="border: 1px solid #6c757d; border-radius: 20px; padding: 1em; margin: 1em" class="col-md-4 col-sm-1">
                                                        <img style="text-align: center;" src="{{asset('img/tab/icon4.png')}}"><br><hr>
                                                        <textarea style="width: 100%;" rows="10" style="resize: none" name="isi_pilihan4_2">
                                                            {{$about->isi_pilihan4_2}}
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="submit" name="submit" class="btn btn-success" style="float: right;">
                                    </div>
                                </div>
                            </div>
                            </form>

                            <center><iframe src="{{url('/about')}}" height="720px" width="100%"></iframe></center>


</div>
@endsection