@extends('admin-master')
@section('title','GalleryPanel')
@section('galery','active')



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
            .gallery {
              -webkit-column-count: 3;
              -moz-column-count: 3;
              column-count: 3;
              -webkit-column-width: 33%;
              -moz-column-width: 33%;
              column-width: 33%; }
              .gallery .pics {
              -webkit-transition: all 350ms ease;
              transition: all 350ms ease; }
              .gallery .animation {
              -webkit-transform: scale(1);
              -ms-transform: scale(1);
              transform: scale(1); }

              @media (max-width: 450px) {
              .gallery {
              -webkit-column-count: 1;
              -moz-column-count: 1;
              column-count: 1;
              -webkit-column-width: 100%;
              -moz-column-width: 100%;
              column-width: 100%;
              }
              }

              @media (max-width: 400px) {
              .btn.filter {
              padding-left: 1.1rem;
              padding-right: 1.1rem;
              }
              }
</style>

        <?php if (session()->has('success')): ?>
            <div id="popup1" class="overlay">
            <div class="popup">
                <h2>Success</h2>
                <BUTTON  onclick="document.location.reload(true)" class="close">&times;</BUTTON>
                <div class="content">
                    {{session()->get('success')}}
                </div>
            </div>          
        </div>
        <?php endif ?>

        <script type="text/javascript">
                function gone(){
                    document.getElementById=popup1.style.display = "none"
                }
        </script>

<div class="main-content">
  
  <div class="container-fluid">


                           <!-- Grid row -->
                            <div class="row">

                              <!-- Grid column -->
                              <div class="col-md-12 d-flex justify-content-center mb-5">

                                <button style="margin: 0 .5em;" type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-success btn-lg" data-rel="all"><i class="fas fa-plus"></i> Add</button>
                                

                              </div>
                              <!-- Grid column -->

                            </div>
                            <!-- Grid row -->

                            <!-- Grid row -->
                            <div class="gallery" id="gallery">

                              <?php foreach ($galerys as $galery): ?>
                                <!-- Grid column -->
                              <div class="mb-3 pics animation all 2">
                                <a style="position: absolute;" href="{{url('admin/galery/delete/'.$galery->id)}}" class="btn btn-outline-danger btn-lg" ><i class="fas fa-trash"></i></a>
                                <img class="img-fluid" src="{{asset('img/gallery/'.$galery->img)}}" alt="{{$galery->keterangan}}">
                              </div>
                              <!-- Grid column -->
                              <?php endforeach ?>
                            </div>
                            <!-- Grid row --> 

                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Add Photo</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form enctype="multipart/form-data" role="form" action="{{url('admin/galery/add')}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('POST')}}
                                             <div class="form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Photo</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="img" name="file" class="form-control-file">
                                                </div>
                                        
                                            </div>   
                                            <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" name="keterangan" class="form-control" >      
                                            </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-success">Add</button>
                                            </form>  
                                </div>
                              </div>
                            </div>
                          </div>
                                 

  </div>


</div>
@endsection