
<style>
    th{
        text-align: center;
    }
    td{
        text-align: center;  
        cursor: pointer;
    }
</style>
<link href="./assets/css/data-table.css" rel="stylesheet" />
<link href="./assets/css/data-table-min.css" rel="stylesheet" />
<div class="container-fluid">
    <div class="row mt-4">

        <div class="col-12">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h4>Data Timbang ( Scan Barcode )</h4>
                    </div>
                    <div class="form-group">
                        <div class="table-responsive">
                            <table class="table table-striped" id="data-timbang" style="width: 100%;"> 
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No. Transaksi</th>
                                        <th>Petak</th>
                                        <th>Ancak</th>
                                        <th>Kontraktor</th>
                                        <th>Kontraktor Deliv.</th>
                                        <th>Berat Masuk</th>
                                        <th>Berat Keluar</th>
                                        <th>Nett</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?
                                    $i=1 ;
                                     foreach($timbang as $ti){ ?>
                                        <tr >
                                            <td><?=$i ?></td>
                                            <td><?=$ti['no_transaksi'] ?></td>
                                            <td><?=$ti['kode_petak'] ?></td>
                                            <td><?=$ti['ancak'] ?></td>
                                            <? foreach($vendor as $v){ 
                                                if($v['kode_vendor']==$ti['kode_kontraktor']){
                                                    echo "<td>".$v['nama_vendor']."</td>";
                                                } ?>
                                            <? } ?>
                                            <? foreach($vendor as $v2){ 
                                                if($v2['kode_vendor']==$ti['kontraktor_delivery']){
                                                    echo "<td>".$v['nama_vendor']."</td>";
                                                } ?>
                                            <? } ?>
                                            <td><?=number_format($ti['weight_in'], 2, ",", ".")?></td>
                                            <td><?=number_format($ti['weight_out'], 2, ",", ".")?></td>
                                            <td><?=number_format($ti['weight_in']-$ti['weight_out'], 2, ",", ".")?></td>
                                        </tr>
                                    <? $i++;} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="./assets/js/jquery-3.5.1.js"></script>
<script src="./assets/js/data-tables-bs5.min.js"></script>
<script src="./assets/js/data-tables.min.js"></script>
<script>

$(document).ready(function () {
    $('#data-timbang').DataTable({
        
    });
});
</script>

       