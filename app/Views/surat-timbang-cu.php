<!DOCTYPE html>
<html lang="en">
<style >

    
    @media print{
        @page {
           
            margin: 0;  /* this affects the margin in the printer settings */
    
        }
    }

    a{
        font-family: tahoma;
        font-size: medium;
    }
    .tengah{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }
    table {
        border: 0px dotted white;
        border-collapse: collapse;
        border-spacing: 0px;
    }
    td {
        padding: 0.1%;
        
    }
    .garis-panjang {
        border: 0.1px dotted black;
        margin-top: 1%;
    }
    th {
        border: 0.1px dotted black;
    }
 
 
    
</style>
<script src="./assets/fonts/42.js" crossorigin="anonymous"></script>
<link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- CSS Files -->
<link id="pagestyle" href="./assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
<title>
    <?= $timbang->no_transaksi ?>
</title>
<body>
<div class="table responsive">
    <table style="width: 100%; ">
        <tbody>
            <tr>
                <td style=" padding-left: 1%; padding-right: 1%">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2" style="text-align: center;"><img src="assets/img/logo.png" style="height: 100px;width: 120px;"></div>
                            <div class="col-10 tengah" style="text-align: center;">
                                <div class="form-control" style="border: none;">
                                    <a style="font-size: 25px;">PT. PRATAMA NUSANTARA SAKTI</a>
                                        <br />
                                        <a style="font-size: 14px;">Taman Perkantoran Kuningan - Wisma GAWI</a>
                                        <br />
                                        <a style="font-size: 14px;">Bumi Pratama Mandiri, Kec. Sungai Menang OKI Sumsel</a>
                                        <br />
                         
                                    
                                </div>
                            </div>
                        </div>
                        <div class="garis-panjang"></div>
                    </div>               
                </td>
            </tr>
            <tr>
                <td style="padding: 0%; ">
                    <div class="tengah"><a style="font-size: 18px;">SLIP TIMBANGAN CU</a></div>
                </td>
            </tr>
            <tr>
                <td>
                    <table style="width: 100%; ">
                        <tbody> 
                            <tr >
                                <td style="width: 15%; padding: 0%; padding-left: 2%"><b><a >No. Transaksi</a></b></td>
                                <td style="width: 5%;  padding: 0%; padding-left: 2%"><b><a> : </a></b></td>
                                <td style="width: 30%;  padding: 0%; padding-left: 0%;"><a ><b><?= $timbang->no_transaksi ?></b></a></td>
                                <td style="width: 15%;  padding: 0%; padding-left: 2%"><b><a>Tgl. Timbang</a></b></td>
                                <td style="width: 5%;  padding: 0%; padding-left: 2%"><b><a> : </a></b></td>
                                <? 
                                $month = date_format(date_create($timbang->weight_in_time), "m");
                                if($month=="01"){
                                    $m = "Januari";
                                }else if($month=="02"){
                                    $m = "Februari";
                                }else if($month=="03"){
                                    $m = "Maret";
                                }else if($month=="04"){
                                    $m = "April";
                                }else if($month=="05"){
                                    $m = "Mei";
                                }else if($month=="06"){
                                    $m = "Juni";
                                }else if($month=="07"){
                                    $m = "Juli";
                                }else if($month=="08"){
                                    $m= "Agustus";
                                }else if($month=="09"){
                                    $m = "September";
                                }else if($month=="10"){
                                    $m = "Oktober";
                                }else if($month=="11"){
                                    $m = "November";
                                }else if($month=='12'){
                                    $m = 'Desember';
                                }else{
                                    $m ="";
                                }
                                ?>
                                <td style="width: 30%;  padding: 0%; padding-left: 0%;"><a ><b><?= date_format(date_create($timbang->weight_in_time), "d")." ".$m." ".date_format(date_create($timbang->weight_in_time), "Y") ?></b></a></td>
                            </tr>
                            <tr >
                                <td style="width: 15%;  padding: 0%; padding-left: 2%"><b><a >No. Barge</a></b></td>
                                <td style="width: 5%;  padding: 0%; padding-left: 2%"><b><a> : </a></b></td>
                                <td style="width: 30%;  padding: 0%; padding-left: 0%;"><a ><b><?= $timbang->kode_barge ?></b></a></td>
                                <td style="width: 15%;  padding: 0%; padding-left: 2%"><b><a>Kontraktor</a></b></td>
                                <td style="width: 5%;  padding: 0%; padding-left: 2%"><b><a > : </a></b></td>
                                <td style="width: 30%;  padding: 0%; padding-left: 0%;"><a ><b><?= $kontraktor->nama_vendor ?></b></a></td>
                            </tr>
                            <tr >
                                <td style="width: 15%;  padding: 0%; padding-left: 2%"><b><a>No. Tugboat</a></b></td>
                                <td style="width: 5%;  padding: 0%; padding-left: 2%"><b><a> : </a></b></td>
                                <td style="width: 30%;  padding: 0%; padding-left: 0%;"><a ><b><?= $timbang->kode_tugboat ?></b></a></td>
                                <td style="width: 15%;  padding: 0%; padding-left: 2%"><b><a>Petak</a></b></td>
                                <td style="width: 5%;  padding: 0%; padding-left: 2%"><b><a> : </a></b></td>
                                <td style="width: 30%;  padding: 0%; padding-left: 0%;"><a ><b><?= $timbang->kode_petak ?></b></a></td>
                            </tr>
                        </tbody>
                    </table>
                <td>
            </tr>
            <tr>
                <td style="padding-left: 1%; padding-right: 1%">
                    <table style="width: 100%; border: border-collapse: collapse;">
                        <thead> 
                            <tr >
                                <th style="width: 25%;text-align: center; padding: 0%;border-top: 1px dotted black"><a>No. Ticket</a></th>
                                <th style="width: 25%;text-align: center; padding: 0%;border-top: 1px dotted black"><a>Gross</a></th>
                                <th style="width: 25%;text-align: center; padding: 0%;border-top: 0.1px dotted black"><a>Tare</a></th>
                                <th style="width: 25%;text-align: center; padding: 0%;border-top: 0.1px dotted black"><a>Nett</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							$cnt = count($timbang_detail);
							$i = 1;
							foreach($timbang_detail as $td) :
							if($cnt == $i){ 
							$border = "border-bottom: 0.1px dotted black;";}else{ $border = "";}?>
                                <tr style="border: 0.1px none black;">
                                    <td style="text-align: center;border: 0.1px none black; <?= $border ?>"><b><a><?= $td['no_ticket'] ?></a></b></td>
                                    <td style="text-align: center;border: 0.1px none black; <?= $border ?>"><b><a><?= number_format($td['gross'], 2, ",", ".") ?></a></b></td>
                                    <td style="text-align: center;border: 0.1px none black; <?= $border ?>"><b><a><?= number_format($td['tare'], 2, ",", ".") ?></a></b></td>
                                    <td style="text-align: center;border: 0.1px none black; <?= $border ?>"><b><a><?= number_format($td['nett'], 2, ",", ".") ?></a></b></td>
                                </tr>
                            <?php $i++; endforeach;?>
                            <tr>
                                <td colspan="3" style="text-align: right;border-bottom: 0; padding: 0%;border-right: 0px dotted black">
                                    <a >Gross</a> &emsp;
                                </td>
                                <td style=" padding: 0% ;"><b><a >  &emsp; <?= number_format($timbang->weight_in, 2, ",", ".") ?> Kg</a></b></td>
                            </tr>
                            <tr style="border: none; padding: 0%;">
                                <td colspan="3" style="text-align: right;border-bottom: 0; padding: 0%;border-right: 0px dotted black">
                                    <a >Tare</a> &emsp;
                                </td>
                                <td style="padding-left: 3%;padding: 0% ;"><b><a > &emsp; <?= number_format($timbang->weight_out, 2, ",", ".") ?> Kg</a></b></td>
                            </tr>
                            <tr style="border: none; padding: 0%;">
                                <td colspan="3" style="text-align: right;border-bottom: 0; padding: 0%;border-right: 0px dotted black">
                                    <a >Nett</a> &emsp;
                                </td>
                                <td style="padding-left: 3%;padding: 0% ;"><b><a > &emsp; <?= number_format($timbang->weight_in - $timbang->weight_out, 2, ",", ".") ?> Kg</a></b></td>
                            </tr>
                            <tr style="border-top: 0.1px dotted black;border-bottom: 0">
                                <td colspan="3" style="padding-left: 1%">
                                    <?
                                    $day = date('l');
                                    $month = date('m');
                                    if($day=="Monday"){
                                        $d = "Senin";
                                    }else if($day=="Tuesday"){
                                        $d = "Selasa";
                                    }else if($day=="Wednesday"){
                                        $d = "Rabu";
                                    }else if($day=="Thursday"){
                                        $d = "Kamis";
                                    }else if($day=="Friday"){
                                        $d = "Jumat";
                                    }else if($day=="Saturday"){
                                        $d = "Sabtu";
                                    }else if($day=="Sunday"){
                                        $d = "Minggu";
                                    }else{
                                        $d = "";
                                    }
                                    if($month=="01"){
                                        $m = "Januari";
                                    }else if($month=="02"){
                                        $m = "Februari";
                                    }else if($month=="03"){
                                        $m = "Maret";
                                    }else if($month=="04"){
                                        $m = "April";
                                    }else if($month=="05"){
                                        $m = "Mei";
                                    }else if($month=="06"){
                                        $m = "Juni";
                                    }else if($month=="07"){
                                        $m = "Juli";
                                    }else if($month=="08"){
                                        $m= "Agustus";
                                    }else if($month=="09"){
                                        $m = "September";
                                    }else if($month=="10"){
                                        $m = "Oktober";
                                    }else if($month=="11"){
                                        $m = "November";
                                    }else if($month=='12'){
                                        $m = 'Desember';
                                    }else{
                                        $m ="";
                                    }
                                    
                                     ?>
                                    <b><a >Sungai Menang, <?= $d ?> <?= date("d")?> <?= $m." ".date("Y") ?></a></b></br>
                                    <b><a ></a></b>
                                    <br />
                                    <br />
                                    <br />
                                    <b><a >Pengawas</a></b>
                                </td>
                                <td style="border-bottom: 0">
                                    <a >Operator</a>
                                    <br />
                                    <br />
                                    <br />
                                    <a ><?= session()->get('nama') ?></a>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>



</body>
</html>
