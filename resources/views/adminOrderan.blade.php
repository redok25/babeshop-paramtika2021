@extends('admin-master')
@section('title','OrderanPanel')
@section('orderan','active')

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
                                <h1>Orderan di Barbershop</h1>
                                 <div class="table-responsive table--no-card m-b-30 ">
                                    <table class="table table-borderless table-striped table-earning" >
                                        <thead>
                                            <tr>
                                                <th width="10%">No</th>
                                                <th>Tanggal dan Waktu</th>
                                                <th>Nama Pemesan</th>
                                                <th>Pesanan</th>
                                                <th>Barber</th>
                                                <th>Total Biaya</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php if (count($orderan) < 1): ?>
                                            <td colspan="4"><center>NO DATA</center></td>
                                          <?php endif ?>
                                          <?php $no = 1 ?>
                                            <?php foreach ($orderan as $o): ?>
                                              <tr>
                                                <td>{{$no}}</td>
                                                <td>{{$o->tanggal_memesan}}</td>
                                                <td>{{$o->nama_pemesan}}</td>
                                                <td>{{$o->pesanan}}</td>
                                                <td>{{$o->barbers->nama}} </td>
                                                <td><?php echo $rupiah = "Rp. ".number_format($o->total_biaya,2,',','.') ?></td>
                                                <td>
                                                  <?php if ($o->status_pesanan == 0): ?>
                                                    <span class="status--denied">Belum Bayar</span>
                                                  <?php elseif ($o->status_pesanan == 1): ?>
                                                    <span class="status--process">Sudah Bayar</span>
                                                  <?php endif ?>
                                                </td>
                                                <td>
                                                  
                                                  <div class="table-data-feature">
                                                        <?php if ($o->status_pesanan == 0): ?>
                                                          <button class="item" data-toggle="tooltip" data-placement="top" title="Ubah Status">
                                                            <a href="{{ route('ubahStatus', [$o->id, $o->tukang_cukur]) }}"><i class="zmdi zmdi-money"></i></a>
                                                          </button>
                                                          <button class="item" data-toggle="tooltip" data-placement="top"  title="Edit">
                                                            <a href="#" data-toggle="modal" data-target='#myModal{{$o->id}}'><i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                        <?php endif ?>
                                                        
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <a href="{{url('admin/orderan/delete/'.$o->id)}}"><i class="zmdi zmdi-delete"></i></a>
                                                        </button>
                                                    </div>

                                                </td>
                                            </tr>
                                            <div class="modal fade" id="myModal{{$o->id}}" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Edit Data</h4>
                                            </div>
                                            <div class="modal-body">
                                            <form enctype="multipart/form-data" role="form" action="{{url('admin/orderan/edit')}}" method="post">
                                              <input type="hidden" name="id" value="{{$o->id}}">
                                            {{csrf_field()}}
                                            <div class="mt-10"><input required="" type="text" name="nama" value="{{$o->nama_pemesan}}" disabled="" class="form-control"></div>
                                            <div class="mt-10">
                                            <div class="mt-10">
                                            Waktu : <select name="time" class="form-control">
                                                <?php foreach ($time as $t): ?>
                                                    <option value="{{$t->time}}">{{$t->time}}</option>
                                                <?php endforeach ?>
                                            </select></div>
                                            <div class="mt-10">
                                            <input onclick="panggil{{$o->id}}()" type="checkbox" name="ganti"> Ganti Jadwal <br>
                                            <script type="text/javascript">
                                              function  panggil{{$o->id}}() {
                                                if ( document.getElementById('a{{$o->id}}').style.display == "block") {
                                                   document.getElementById('a{{$o->id}}').style.display = "none"
                                                }else {
                                                   document.getElementById('a{{$o->id}}').style.display = "block"
                                                }
                                                
                                              }
                                            </script>  
                                            <div style="display: none" id="a{{$o->id}}">Tanggal : <input  value="{{date('Y-m-d',strtotime($o->tanggal_memesan))}}" type="date" name="date" class="form-control"></div>
                                            </div>
                                            </div>   
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
                                    {{ $orderan->links() }}
                                
                            </div>


  </div>
   <div class="container-fluid" style="margin-top: -5em;">
                                <h1>Orderan di alamat</h1>
                                 <div class="table-responsive table--no-card m-b-30 ">
                                    <table class="table table-borderless table-striped table-earning" >
                                        <thead>
                                            <tr>
                                                <th width="10%">No</th>
                                                <th>Tanggal dan Waktu</th>
                                                <th>Nama Pemesan</th>
                                                <th>Pesanan</th>
                                                <th>Barber</th>
                                                <th>Total Biaya</th>
                                                <th>No.HP</th>
                                                <th>Alamat</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php if (count($orderan) < 1): ?>
                                            <td colspan="4"><center>NO DATA</center></td>
                                          <?php endif ?>
                                          <?php $no = 1 ?>
                                            <?php foreach ($orderan1 as $o): ?>
                                              <tr>
                                                <td>{{$no}}</td>
                                                <td>{{$o->tanggal_memesan}}</td>
                                                <td>{{$o->nama_pemesan}}</td>
                                                <td>{{$o->pesanan}}</td>
                                                <td>{{$o->tukang_cukur}} </td>
                                                <td><?php echo $rupiah = "Rp. ".number_format($o->total_biaya,2,',','.') ?></td>
                                                <td>{{$o->nope}} </td>
                                                <td>{{$o->alamat}} </td>
                                                <td>
                                                  <?php if ($o->status_pesanan == 0): ?>
                                                    <span class="status--denied">Belum Bayar</span>
                                                  <?php elseif ($o->status_pesanan == 1): ?>
                                                    <span class="status--process">Sudah Bayar</span>
                                                  <?php endif ?>
                                                </td>
                                                  <td> 
                                                  <div class="table-data-feature">
                                                        <?php if ($o->status_pesanan == 0): ?>
                                                          <button class="item" data-toggle="tooltip" data-placement="top" title="Ubah Status">
                                                            <a href="{{ route('ubahStatus', [$o->id, $o->tukang_cukur]) }}"><i class="zmdi zmdi-mail-send"></i></a>
                                                          </button>
                                                          <button class="item" data-toggle="tooltip" data-placement="top"  title="Edit">
                                                            <a href="#" data-toggle="modal" data-target='#myModal{{$o->id}}'><i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                        <?php endif ?>
                                                        
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <a href="{{url('admin/orderan/delete/'.$o->id)}}"><i class="zmdi zmdi-delete"></i></a>
                                                        </button>
                                                    </div>

                                                </td>
                                            </tr>
                                            <div class="modal fade" id="myModal{{$o->id}}" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                            <div class="modal-header">
                                            <h4 class="modal-title">Edit Data</h4>
                                            </div>
                                            <div class="modal-body">
                                            <form enctype="multipart/form-data" role="form" action="{{url('admin/orderan/edit')}}" method="post">
                                              <input type="hidden" name="id" value="{{$o->id}}">
                                              <input type="hidden" name="panggil" value="{{$o->panggil}}">
                                            {{csrf_field()}}
                                            <div class="mt-10"><input required="" type="text" name="nama" value="{{$o->nama_pemesan}}" disabled="" class="form-control"></div>
                                            <div class="mt-10">
                                            <div class="mt-10">
                                            Waktu : <select name="time" class="form-control">
                                                <?php foreach ($time as $t): ?>
                                                    <option value="{{$t->time}}">{{$t->time}}</option>
                                                <?php endforeach ?>
                                            </select></div>
                                            <div class="mt-10">
                                            <input onclick="panggil{{$o->id}}()" type="checkbox" name="ganti"> Ganti Jadwal <br>
                                            <script type="text/javascript">
                                              function  panggil{{$o->id}}() {
                                                if ( document.getElementById('a{{$o->id}}').style.display == "block") {
                                                   document.getElementById('a{{$o->id}}').style.display = "none"
                                                }else {
                                                   document.getElementById('a{{$o->id}}').style.display = "block"
                                                }
                                                
                                              }
                                            </script>  
                                            <div style="display: none" id="a{{$o->id}}">Tanggal : <input  value="{{date('Y-m-d',strtotime($o->tanggal_memesan))}}" type="date" name="date" class="form-control"></div>
                                            Tanggal : <input  value="{{$o->nope}}" type="text" name="nope" class="form-control">
                                            Tanggal : <textarea name="alamat" class="form-control">{{$o->alamat}}</textarea>
                                            </div>
                                            </div>   
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
                                    {{ $orderan->links() }}
                                
                            </div>
                            <br>  <br>  
                            

  </div>


</div>
@endsection