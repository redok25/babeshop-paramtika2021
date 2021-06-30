@extends('admin-master')
@section('title','BarbersPanel')
@section('barbers','active')

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
                                                <th>Nama</th>
                                                <th>Kelamin</th>
                                                <th>Pesanan Selesai</th>
                                                <th>Total Feedback</th>
                                                <th>Rating</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php if (count($barbers) < 1): ?>
                                            <td colspan="7"><center>NO DATA</center></td>
                                          <?php endif ?>
                                          <?php $no = 1 ?>
                                            <?php foreach ($barbers as $barber): ?>
                                              <tr>
                                                <td>{{$no}}</td>
                                                <td>{{$barber->nama}}</td>
                                                <td>{{$barber->kelamin}}</td>
                                                <td>{{$barber->pesanan}} </td>
                                                <td>{{$barber->total_feedback}}</td>
                                                <td>{{$barber->rating}}</td>
                                                <td>
                                                  
                                                  <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"  title="Edit">
                                                            <a href="#" data-toggle="modal" data-target='#myModal{{$barber->id}}'><i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <a href="{{url('admin/barbers/delete/'.$barber->id)}}"><i class="zmdi zmdi-delete"></i></a>
                                                        </button>
                                                    </div>

                                                </td>
                                            </tr>
                                            <div class="modal fade" id="myModal{{$barber->id}}" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Edit Data</h4>
                                            </div>
                                            <div class="modal-body">
                                            <form enctype="multipart/form-data" role="form" action="{{url('admin/barbers/edit')}}" method="post">

                                              {{csrf_field()}}
                                            <input type="hidden" name="id" value="{{$barber->id}}">
                                            <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" class="form-control" value="{{$barber->nama}}">      
                                            </div>

                                            <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select required name="kelamin" id="select" class="form-control">
                                                        <?php if ($barber->kelamin == 'Laki-Laki'): ?>
                                                          <option value="Laki-Laki" selected="">Laki-Laki</option>
                                                          <option value="Perempuan">Perempuan</option>
                                                        <?php elseif($barber->kelamin == 'Perempuan') : ?>
                                                          <option value="Laki-Laki" >Laki-Laki</option>
                                                          <option value="Perempuan" selected="">Perempuan</option>
                                                        <?php endif ?>
                                                        
                                            </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Photo</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="img" name="file" class="form-control-file">
                                                </div>
                                            </div>   
                                            <div class="modal-footer"> 
                                            <p align="justify">*Jika tidak ingin mengganti photo, cukup abaikan saja pilihan Photo biarkan kosong saja</p> 
                                            <button type="submit" class="btn btn-success">Edit</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>

                                            </form>                        
                                            <?php $no++ ?>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card">
                                    <div class="card-header">
                                        <strong>Add New</strong> Barber
                                    </div>
                                    <div class="card-body card-block" >
                                        <form action="{{url('admin/barbers/add')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                          {{csrf_field()}}
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Nama</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input required type="text" id="text-input" name="nama" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Jenis Kelamin</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select required name="kelamin" id="select" class="form-control">
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-input" class=" form-control-label">Photo</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="img" name="file" class="form-control-file">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        @if(count($errors) > 0)
                                        <div class="alert alert-danger">
                                          @foreach ($errors->all() as $error)
                                          {{ $error }} <br/>
                                          @endforeach
                                        </div>
                                        @endif    
                                        <input type="submit" name="submit" class="btn btn-primary">
                                    </div>
                                    </form>
                                </div>
  </div>


</div>
@endsection