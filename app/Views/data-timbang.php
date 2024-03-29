
<style>
    th{
        text-align: center;
    }
    td{
        text-align: center;  
        cursor: pointer;
    }
</style>
<!-- <link href="./assets/css/data-table.css" rel="stylesheet" /> -->
<!-- <link href="./assets/bootstrap5/css/bootstrap.css" rel="stylesheet" /> -->
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
                                        <td>QR</td>
                                        <th>No.</th>
                                        <th>No. Transaksi</th>
                                        <th>Petak</th>
                                        <th>Ancak</th>
                                        <th>Kontraktor</th>
                                        <th>Kontraktor Deliv.</th>
                                        <th>Berat Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?
                                    $i=1 ;
                                     foreach($timbang as $ti){ 
                                         $noTrans = $ti['no_transaksi'];
                                         $file = str_replace("/", "", $noTrans);
                                         ?>
                                        <tr >
                                            <td><a href="<?= base_url()?>/barcode-in?file=<?=$file?>&no=<?= $noTrans ?>" target="_blank" title="Print Tiket Masuk"><i class="ni ni-tablet-button" ></i></a></td>
                                            <td><?=$i ?></td>
                                            <td><?=$ti['no_transaksi'] ?></td>
                                            <td><?=$ti['kode_petak'] ?></td>
                                            <td><?=$ti['ancak'] ?></td>
                                            <td><?=$ti['nama_kontraktor'] ?></td>
                                                
                                            <td><?= $ti['nama_kontraktor_delivery']?></td>
                                            
                                            <td><?=number_format($ti['weight_in'], 2, ",", ".")?></td>
                                            
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
<script src="./assets/bootstrap5/js/bootstrap.bundle.min.js"></script>
<script>

$(document).ready(function () {
    $('#data-timbang').DataTable({
        pageLength: false,
        paging: false
    });
});
</script>

       