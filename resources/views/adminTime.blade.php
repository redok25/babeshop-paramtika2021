@extends('admin-master')
@section('title','TimePanel')
@section('time','active')

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

@section('isi')




<div class="main-content">
  
  <div class="container-fluid">

                                 <div class="table-responsive table--no-card m-b-30 " style="position: relative; height: 500px; overflow: auto;">
                                    <table class="table table-borderless table-striped table-earning" >
                                        <thead>
                                            <tr>
                                                <th width="10%">No</th>
                                                <th>Time</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php if (count($time) < 1): ?>
                                            <td colspan="4"><center>NO DATA</center></td>
                                          <?php endif ?>
                                          <?php $no = 1 ?>
                                            <?php foreach ($time as $t): ?>
                                              <tr>
                                                <td>{{$no}}</td>
                                                <td>{{$t->time}}</td>
                                                <td>
                                                  
                                                  <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <a href="{{url('admin/time/delete/'.$t->id)}}"><i class="zmdi zmdi-delete"></i></a>
                                                        </button>
                                                    </div>

                                                </td>
                                            </tr>
                                            </form>                        
                                            <?php $no++ ?>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card">
                                    <div class="card-header">
                                        <strong>Add New</strong> Time
                                    </div>
                                    <div class="card-body card-block" >
                                        <form action="{{url('admin/time/add')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                          {{csrf_field()}}
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Waktu</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input required type="time" id="text-input" name="time" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                        <input type="submit" name="submit" class="btn btn-primary">
                                    </div>
                                    </form>
                                </div>
  </div>


</div>
@endsection