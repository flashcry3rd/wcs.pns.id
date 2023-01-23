<!DOCTYPE html>
<html lang="en">
<style >
    a{
        font-family: calibri;
    }
    .tengah{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }
    table {
        border: 0px solid white;
        border-collapse: collapse;
        border-spacing: 0px;
    }
    td {
        padding: 1%
    }
    .garis-panjang {
        border: 1px solid black;
        margin-top: 1%;
    }
    th {
        border: 1px solid black;
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
                <td>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-2" style="text-align: center;"><img src="assets/img/logo.png" style="height: 140px;width: 160px"></div>
                            <div class="col-10 tengah" style="text-align: center;">
                                <b><a style="font-size: 29px;">PT. PRATAMA NUSANTARA SAKTI</a>
                                    <br />
                                    
                                    <a style="font-size: 18;">Taman Perkantoran Kuningan - Wisma GAWI</a>
                                    <br />
                                    <a style="font-size: 18;">Bumi Pratama Mandiri, Kec. Sungai Menang OKI Sumsel</a>
                                    <br />
                                    <a style="font-size: 18;">Telp: , FAX: , </a>
                                </b>
                            </div>
                        </div>
                        <div class="garis-panjang"></div>
                    </div>               
                </td>
            </tr>
            <tr>
                <td style="padding: 0%; ">
                    <div class="tengah"><strong><a style="font-size: 18px;">SLIP TIMBANGAN OUT</a></strong></div>
                </td>
            </tr>
            <tr>
                <td>
                    <table style="width: 100%; ">
                        <tbody> 
                            <tr >
                                <td style="width: 15%; padding: 0%; padding-left: 2%"><b><a>No. Transaksi</a></b></td>
                                <td style="width: 5%;  padding: 0%; padding-left: 2%"><b><a> : </a></b></td>
                                <td style="width: 80%;  padding: 0%; padding-left: 0%;border-bottom: 0.8px; border-style: dashed"><a ><?= $timbang->no_transaksi ?></a></td>
                            </tr>
                            <tr >
                                <td style="width: 15%;  padding: 0%; padding-left: 2%"><b><a>No. Truk</a></b></td>
                                <td style="width: 5%;  padding: 0%; padding-left: 2%"><b><a> : </a></b></td>
                                <td style="width: 80%;  padding: 0%; padding-left: 0%;border-bottom: 0.8px; border-style: dashed"><a ><?= $timbang->kode_truck ?></a></td>
                            </tr>
                            <tr >
                                <td style="width: 15%;  padding: 0%; padding-left: 2%"><b><a>Supir</a></b></td>
                                <td style="width: 5%;  padding: 0%; padding-left: 2%"><b><a> : </a></b></td>
                                <td style="width: 80%;  padding: 0%; padding-left: 0%;border-bottom: 0.8px; border-style: dashed"><a ><?= $timbang->supir ?></a></td>
                            </tr>
                            <tr >
                                <td style="width: 15%;  padding: 0%; padding-left: 2%"><b><a>Tgl. Timbang</a></b></td>
                                <td style="width: 5%;  padding: 0%; padding-left: 2%"><b><a> : </a></b></td>
                                <td style="width: 80%;  padding: 0%; padding-left: 0%;border-bottom: 0.8px; border-style: dashed"><a ><?= date_format(date_create($timbang->weight_in_time), "d  M  Y") ?></a></td>
                            </tr>
                            <tr >
                                <td style="width: 15%;  padding: 0%; padding-left: 2%"><b><a>Kontraktor</a></b></td>
                                <td style="width: 5%;  padding: 0%; padding-left: 2%"><b><a> : </a></b></td>
                                <td style="width: 80%;  padding: 0%; padding-left: 0%;border-bottom: 0.8px; border-style: dashed"><a ><?= $kontraktor->nama_vendor ?></a></td>
                            </tr>
                            <tr >
                                <td style="width: 15%;  padding: 0%; padding-left: 2%"><b><a>Petak</a></b></td>
                                <td style="width: 5%;  padding: 0%; padding-left: 2%"><b><a> : </a></b></td>
                                <td style="width: 80%;  padding: 0%; padding-left: 0%;border-bottom: 0.8px; border-style: dashed"><a ><?= $timbang->kode_petak ?></a></td>
                            </tr>
                        </tbody>
                    </table>
                <td>
            </tr>
            <tr>
                <td>
                    <table style="width: 100%; border: 1px solid black; border-collapse: collapse;">
                        <thead> 
                            <tr style="border: 1px solid black;">
                                <th style="width: 25%;text-align: center; padding: 0%;border: 1px solid black"><a>No. WO</a></th>
                                <th style="width: 25%;text-align: center; padding: 0%;border: 1px solid black"><a>No. Truk</a></th>
                                <th style="width: 25%;text-align: center; padding: 0%;border: 1px solid black"><a>Jam In</a></th>
                                <th style="width: 25%;text-align: center; padding: 0%;border: 1px solid black"><a>Jam Out</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border: 1px solid black;">
                                <td style="text-align: center;border: 1px solid black"><a><?= $timbang->no_wo ?></a></td>
                                <td style="text-align: center;border: 1px solid black"><a><?= $timbang->kode_truck ?></a></td>
                                <td style="text-align: center;border: 1px solid black"><a><?= date_format(date_create($timbang->weight_in_time), 'H : i : s')?></a></td>
                                <td style="text-align: center;border: 1px solid black"><a><?= date_format(date_create($timbang->weight_out_time), 'H : i : s')?></a></td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: right;border-bottom: 0;border-right: 1px solid black; padding: 0%;">
                                    <strong><a>Timbang Masuk</a> &emsp;</strong>
                                </td>
                                <td style=" padding: 0% ;"><strong><a>  &emsp; <?= number_format($timbang->weight_in, 2, ",", ".") ?> Kg</a></strong></td>
                            </tr>
                            <tr style="border: none; padding: 0%;">
                                <td colspan="3" style="text-align: right;border-bottom: 0; padding: 0%;border-right: 1px solid black">
                                    <strong><a>Timbang Keluar</a> &emsp;</strong>
                                </td>
                                <td style="padding-left: 3%;padding: 0% ;"><strong><a> &emsp; <?= number_format($timbang->weight_out, 2, ",", ".") ?> Kg</a></strong></td>
                            </tr>
                            <tr style="border: none; padding: 0%;">
                                <td colspan="3" style="text-align: right;border-bottom: 0; padding: 0%;border-right: 1px solid black">
                                    <strong><a>Nett</a> &emsp;</strong>
                                </td>
                                <td style="padding-left: 3%;padding: 0% ;"><strong><a> &emsp; <?= number_format($timbang->weight_in - $timbang->weight_out, 2, ",", ".") ?> Kg</a></strong></td>
                            </tr>
                            <tr style="border: 1px solid black;">
                                <td colspan="3">
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
                                    <a >Sungai Menang, <strong><?= $d ?> <?= date("d")?> <?= $m." ".date("Y") ?></strong></a></br>
                                    <a ><strong>Supir</strong></a>
                                    <br />
                                    <br />
                                    <br />
                                    <a ><strong><?= $timbang->supir ?></strong></a>
                                </td>
                                <td >
                                    <a ><strong>Operator</strong></a>
                                    <br />
                                    <br />
                                    <br />
                                    <a ><strong><?= session()->get('nama') ?></strong></a>
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
