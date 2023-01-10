
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
                            <table class="table"> 
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No. Transaksi</th>
                                        <th>Petak</th>
                                        <th>Ancak</th>
                                        <th>Kontraktor</th>
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


       