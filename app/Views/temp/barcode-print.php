<!DOCTYPE html>
<html lang="en">
<style >
    @media print{
        @page {
            size: 100%;   /* auto is the initial value */
            size: Portrait;
            margin: 0;  /* this affects the margin in the printer settings */
    
        }
    }
    a{
        font-family: sans-serif;
        font-size: small;
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
<body style="margin-left: -10px">
<div class="table responsive" style="display: block;">
    <table style="width: 100%;">
        <tr>
            <td style="text-align: center;"><u><a style="font-size: 20px">TIKET TIMBANG MASUK</a></u></td>
        </tr>
        <tr>
            <td style="text-align: center;"><a style="font-size: 18px;"> <?= $timbang->no_transaksi ?></a></td>
        </tr>
        <tr>
            <td style="text-align: center;"><a style="font-size: 20px;"> <?= $kontraktor->nama_vendor ?></a></td>
        </tr>
		<tr>
            <td style="text-align: center;"><a style="font-size: 20px;">----------- Scan QR -----------</a></td>
        </tr>
        <tr>
            <? $runTime = date('dMYHis'); ?>
            <td style="text-align: center;"><img style="max-width: 250px; max-height: 250px" src="./assets/qr/<?=$file?>.png?r=<?= $runTime ?>" ></td>
        </tr>
        <tr>
            <td style="text-align: center;"><a style="font-size: 20px;">----------- DETAIL -----------</a></td>
        </tr>

        <tr>
            <td style="text-align: center;">
                <div class="tengah" >
                    <div class="table responsive">
                        <table style="width: 249px;">
                            <tbody>
                                <tr>
                                    <td style="text-align: left;"><a >Kode Petak</a></td>
                                    <td style="text-align: right;"><a ><?= $timbang->kode_petak ?></a></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;"><a >Ancak</a></td>
                                    <td style="text-align: right;"><a ><?= $timbang->ancak ?></a></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;"><a >No Alat Muat</a></td>
                                    <td style="text-align: right;"><a ><?= $timbang->loading_vehicle_number ?></a></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;"><a >No Truck</a></td>
                                    <td style="text-align: right;"><a ><?= $timbang->kode_truck ?></a></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;"><a >Tujuan</a></td>
                                    <td style="text-align: right;"><a ><?= $timbang->tujuan ?></a></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;"><a >Rute</a></td>
                                    <td style="text-align: right;"><a ><?= $timbang->tujuan_tugboat ?></a></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;"><a >Jenis Tebu</a></td>
                                    <td style="text-align: right;"><a ><?= $timbang->jenis_tebu ?></a></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;"><a >Berat Masuk</a></td>
                                    <td style="text-align: right;"><a ><?= $timbang->weight_in ?></a></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;"><a >Jam Timbang</a></td>
                                    <td style="text-align: right;"><a ><?= date_format(date_create($timbang->weight_in_time), "d / m / Y H:i:s")  ?></a></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </td>
        </tr>
      
        
    </table>
</div>



</body>
</html>