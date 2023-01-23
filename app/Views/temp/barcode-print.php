<!DOCTYPE html>
<html lang="en">
<style >
    @media print{
        @page {
            size: auto;   /* auto is the initial value */
            size: landscape;
            margin: 0;  /* this affects the margin in the printer settings */
    
        }
    }
    a{
        font-family: calibri;
    }
    .tengah{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }
</style>
<title>
    <?= $timbang->no_transaksi ?>
</title>
<body>
<div class="table responsive">
    <table style="width: 100%;">
        <tr>
            <td style="text-align: center;"><b><u><a style="font-size: 23px">TIKET TIMBANG MASUK</a></u></b></td>
        </tr>
        <tr>
            <td style="text-align: center;"><b><a style="font-size: 23px;"> <?= $timbang->no_transaksi ?></a></b></td>
        </tr>
        <tr>
            <td style="text-align: center;"><b><a style="font-size: 20px;"> <?= $kontraktor->nama_vendor ?></a></b></td>
        </tr>
        <tr>
            <td style="text-align: center;"><b><a style="font-size: 20px;">----------- DETAIL -----------</a></b></td>
        </tr>

        <tr>
            <td style="text-align: center;">
                <div class="tengah" >
                    <div class="table responsive">
                        <table style="width: 249px;">
                            <tbody>
                                <tr>
                                    <td style="text-align: left;"><b><a >Tgl Harvesting</a></b></td>
                                    <td style="text-align: right;"><b><a ><?= date_format(date_create($timbang->tgl_harvesting), "d/m/Y") ?></a></b></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;"><b><a >Kode Petak</a></b></td>
                                    <td style="text-align: right;"><b><a ><?= $timbang->kode_petak ?></a></b></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;"><b><a >Ancak</a></b></td>
                                    <td style="text-align: right;"><b><a ><?= $timbang->ancak ?></a></b></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;"><b><a >Retase</a></b></td>
                                    <td style="text-align: right;"><b><a ><?= $timbang->retase ?></a></b></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;"><b><a >No Truck</a></b></td>
                                    <td style="text-align: right;"><b><a ><?= $timbang->kode_truck ?></a></b></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;"><b><a >Tujuan</a></b></td>
                                    <td style="text-align: right;"><b><a ><?= $timbang->tujuan ?></a></b></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;"><b><a >Rute</a></b></td>
                                    <td style="text-align: right;"><b><a ><?= $timbang->tujuan_tugboat ?></a></b></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;"><b><a >Jenis Tebu</a></b></td>
                                    <td style="text-align: right;"><b><a ><?= $timbang->jenis_tebu ?></a></b></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;"><b><a >Berat Masuk</a></b></td>
                                    <td style="text-align: right;"><b><a ><?= $timbang->weight_in ?></a></b></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </td>
        </tr>
      
        <tr>
            <td style="text-align: center;"><b><a style="font-size: 20px;">----------- Scan QR -----------</a></b></td>
        </tr>
        <tr>
            <? $runTime = date('dMYHis'); ?>
            <td style="text-align: center;"><img src="./assets/qr/<?=$file?>.png?r=<?= $runTime ?>" ></td>
        </tr>
    </table>
</div>



</body>
</html>