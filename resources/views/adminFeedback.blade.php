@extends('admin-master')
@section('title','FeedbackPanel')
@section('feedback','active')



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


      <div class="table-responsive table--no-card m-b-30 " >
                                    <table class="table table-borderless table-striped table-earning" >
                                        <thead>
                                            <tr>
                                                <th width="10%">No</th>
                                                <th>Tanggal</th>
                                                <th>Nama Barber</th>
                                                <th>Contact</th>
                                                <th width="40%">Isi</th>
                                                <th>Rating</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php if (count($feedbacks) < 1): ?>
                                            <td colspan="5"><center>NO DATA</center></td>
                                          <?php endif ?>
                                          <?php $no = 1 ?>
                                            <?php foreach ($feedbacks as $feedback): ?>
                                              <tr>
                                                <td>{{$no}}</td>
                                                <td>{{date("d-m-Y",strtotime($feedback->date))}}</td>
                                                <td>{{$feedback->barbers->nama}}</td>
                                                <td>{{$feedback->contact}}</td>
                                                <td>{{$feedback->feedback}} </td>
                                                <td>
                                                  <style type="text/css">
                                                    .fa {
                                                      color: #ffe900;
                                                    }
                                                  </style>
                                                    @if($feedback->rating == 5)
                                                   <a href="#"><i class="fa fa-star"></i></a>
                                                   <a href="#"><i class="fa fa-star"></i></a>
                                                   <a href="#"><i class="fa fa-star"></i></a>
                                                   <a href="#"><i class="fa fa-star"></i></a>
                                                   <a href="#"><i class="fa fa-star"></i></a>
                                                    ({{$feedback->rating}})
                                                    @elseif($feedback->rating >= 4 && $feedback->rating < 5)
                                                   <a href="#"><i class="fa fa-star"></i></a>
                                                   <a href="#"><i class="fa fa-star"></i></a>
                                                   <a href="#"><i class="fa fa-star"></i></a>
                                                   <a href="#"><i class="fa fa-star"></i></a>
                                                    ({{$feedback->rating}})
                                                    @elseif($feedback->rating >= 3 && $feedback->rating < 4)
                                                   <a href="#"><i class="fa fa-star"></i></a>
                                                   <a href="#"><i class="fa fa-star"></i></a>
                                                   <a href="#"><i class="fa fa-star"></i></a>
                                                    ({{$feedback->rating}})
                                                    @elseif($feedback->rating >= 2 && $feedback->rating < 3)
                                                   <a href="#"><i class="fa fa-star"></i></a>
                                                   <a href="#"><i class="fa fa-star"></i></a>
                                                    ({{$feedback->rating}})
                                                    @elseif($feedback->rating > 0 && $feedback->rating < 2)
                                                   <a href="#"><i class="fa fa-star"></i></a>
                                                    ({{$feedback->rating}})
                                                    @else
                                                   (Not Rated)
                                                    @endif
                                                </td>
                                            <?php $no++ ?>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                                {{ $feedbacks->links() }}
                            </div>
         
                                 

  </div>


</div>
@endsection