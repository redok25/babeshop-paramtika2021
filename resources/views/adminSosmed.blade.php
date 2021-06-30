@extends('admin-master')
@section('title','SosialMediaPanel')
@section('sosmed','active')



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
  
  <div class="container-fluid">

                                 <div class="table-responsive table--no-card m-b-30 ">
                                    <table class="table table-borderless table-striped table-earning" >
                                        <thead>
                                            <tr>
                                                <th width="10%">No</th>
                                                <th>Jenis Sosmed</th>
                                                <th>Link</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php if (count($sosmed) < 1): ?>
                                            <td colspan="4"><center>NO DATA</center></td>
                                          <?php endif ?>
                                          
                                          <?php $no = 1 ?>
                                            <?php foreach ($sosmed as $s): ?>
                                              <tr>
                                                <td>{{$no}}</td>
                                                <td>{{ucfirst($s->jenis_sosmed)}}</td>
                                                <td><a target="_blank" href="http:\\{{$s->link}}"><i style="font-size: 3em;" class="fab fa-{{$s->jenis_sosmed}}"></i></a></td>
                                                <td>
                                                  
                                                  <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"  title="Edit">
                                                            <a href="#" data-toggle="modal" data-target='#myModal{{$s->id}}'><i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <a href="{{url('admin/sosmed/delete/'.$s->id)}}"><i class="zmdi zmdi-delete"></i></a>
                                                        </button>
                                                    </div>

                                                </td>
                                            </tr>
                                            <div class="modal fade" id="myModal{{$s->id}}" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Edit Data</h4>
                                            </div>
                                            <div class="modal-body">
                                            <form  role="form" action="{{url('admin/sosmed/edit')}}" method="post">

                                              {{csrf_field()}}
                                            <input type="hidden" name="id"  value="{{$s->id}}">
                                                    <label for="text-input" class=" form-control-label">Link :</label>
                                                    <input required type="text" value="{{$s->link}}"  name="link" placeholder="" class="form-control"><br>  
                                                    <label for="text-input" class=" form-control-label">Jenis Sosmed :</label>
                                                    <select class="form-control" name="jenis_sosmed">
                                                      <?php if ($s->jenis_sosmed == "facebook"): ?>
                                                      <option selected value="facebook">Facebook</option>
                                                      <option value="instagram">Instagram</option>
                                                      <option value="youtube">Youtube</option>
                                                      <option value="twitter">Twitter</option>
                                                      <option value="whatsapp">WhatsApp</option>
                                                      <option value="line">Line</option>
                                                      <?php elseif($s->jenis_sosmed == 'instagram'): ?>  
                                                      <option value="facebook">Facebook</option>
                                                      <option selected value="instagram">Instagram</option>
                                                      <option value="youtube">Youtube</option>
                                                      <option value="twitter">Twitter</option>
                                                      <option value="whatsapp">WhatsApp</option>
                                                      <option value="line">Line</option>
                                                      <?php elseif($s->jenis_sosmed == 'twitter'): ?>  
                                                      <option value="facebook">Facebook</option>
                                                      <option value="instagram">Instagram</option>
                                                      <option value="youtube">Youtube</option>
                                                      <option selected="" value="twitter">Twitter</option>
                                                      <option value="whatsapp">WhatsApp</option>
                                                      <option value="line">Line</option>
                                                      <?php elseif($s->jenis_sosmed == 'youtube'): ?>  
                                                      <option value="facebook">Facebook</option>
                                                      <option value="instagram">Instagram</option>
                                                      <option selected="" value="youtube">Youtube</option>
                                                      <option value="twitter">Twitter</option>
                                                      <option value="whatsapp">WhatsApp</option>
                                                      <option value="line">Line</option>
                                                      <?php elseif($s->jenis_sosmed == 'line'): ?>  
                                                      <option value="facebook">Facebook</option>
                                                      <option value="instagram">Instagram</option>
                                                      <option value="youtube">Youtube</option>
                                                      <option value="twitter">Twitter</option>
                                                      <option value="whatsapp">WhatsApp</option>
                                                      <option selected="" value="line">Line</option>
                                                      <?php elseif($s->jenis_sosmed == 'whatsapp'): ?>  
                                                      <option value="facebook">Facebook</option>
                                                      <option value="instagram">Instagram</option>
                                                      <option value="youtube">Youtube</option>
                                                      <option value="twitter">Twitter</option>
                                                      <option selected value="whatsapp">WhatsApp</option>
                                                      <option value="line">Line</option>
                                                      <?php endif ?>
                                                      
                                                    </select>
                                            <div class="modal-footer"> 
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
                                        <strong>Add New</strong> Social Media
                                    </div>
                                    <div class="card-body card-block" >
                                        <form action="{{url('admin/sosmed/add')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                          {{csrf_field()}}
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Link</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input required type="text"  name="link" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Jenis Sosmed</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select class="form-control" name="jenis_sosmed">
                                                      <option value="facebook">Facebook</option>
                                                      <option value="instagram">Instagram</option>
                                                      <option value="youtube">Youtube</option>
                                                      <option value="twitter">Twitter</option>
                                                      <option value="whatsapp">WhatsApp</option>
                                                      <option value="line">Line</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <p>*Ingat linknya saja tidak pake https://  (contoh : facebook.com)</p>  <br> 
                                        <input type="submit" name="submit" class="btn btn-primary">
                                    </div>
                                    </form>
                                </div>
  </div>


</div>
@endsection