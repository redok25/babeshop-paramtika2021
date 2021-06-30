<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
    #invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>
<!--Author      : @arboshiki-->
<div id="invoice">

    
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                            <a href="{{url('/')}}"><img src="{{asset('img/logo.png')}}" width="10%" data-holder-rendered="true" /></a>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to">{{$pesanan->nama_pemesan}}</h2>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">No Booking: {{$pesanan->id}}</h1>
                        <div class="date">Date of Booked: <?php echo date('d-m-Y',strtotime($pesanan->tanggal_memesan)) ?></div>
                        <div class="date">Time of Booked: <?php echo date('H:i:s',strtotime($pesanan->tanggal_memesan)) ?></div>
                        <div class="date">Barber of Booked: {{$pesanan->tukang_cukur}}</div>
                        <div class="date">Tempat: <?php if ($pesanan->panggil == 1): ?>
                                <?php   $status = $pesanan->panggil ?>
                            Dipanggil (Ada biaya extra tergantung alamat)
                        <?php else: ?>  
                            Di Barbershop
                        <?php endif ?></div>
                    </div>
                </div>
                <table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-left">DESCRIPTION</th>
                            <th width="10%" class="text-right">PRICE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php 
                            $no = 1;
                            $pesanan = session()->get('rincian');
                            for($x=0;$x<count($pesanan);$x++){
                                 $PecahStr = explode(",", $pesanan[$x]);
                                    for ( $i = 0; $i < 1; $i++ ) {
                                     echo '<tr>';
                                     echo '<td class="no">'.$no.'</td>';
                                     echo '<td><h3>'.$PecahStr[0].'</h3></td>';
                                     echo '<td class="text-right"><h3>'.$PecahStr[1].'</h3></td>';
                                     echo '</tr>';

                                    }
                                $no++;
                            }
                             ?>
                        </tr>
                       
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan=""></td>
                            <td colspan="" class="text-right">TOTAL :</td>
                            <td><?php echo $rupiah = "Rp. ".number_format(session()->get('total'),2,',','.') ?></td>
                        </tr>
                    </tfoot>
                </table><br><br>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>Penting :</div>
                    <?php if (isset($status)): ?>
                    <div class="notice">Total Biaya belum termasuk, biaya extra pemanggilan barber</div>
                    <?php endif ?>
                    <div class="notice">Harap invoice ini discreenshot dan ditunjukan ke kasir. Karena jika page ini direfresh invoice akan hilang!</div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
</body>
<script type="text/javascript">
     $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
</script>
<?php 

    session()->forget('id_pesanan');
    session()->forget('rincian');
    session()->forget('tanggal');
    session()->forget('total');

 ?>
</html>