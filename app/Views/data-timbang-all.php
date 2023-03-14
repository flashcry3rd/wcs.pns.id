<style>
    th {
        text-align: center;
    }

    td {
        text-align: center;
        cursor: pointer;
    }

    .bg-loader {
        display: none;
        position: absolute;
        /* left: 45%; */
        width: 100%;
        height: 100%;
        z-index: 99;
        background-color: #00000069;

    }

    .loader {
        position: absolute;
        left: 45%;
        top: 2%;
        border: 16px solid #f3f3f3;
        border-top: 16px solid #3498db;
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
    .paginate_button.page-item.active{
        --bs-pagination-active-bg: #8392ab;
    }
    .paginate_button.page-item.active a{
        color: white;
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
                        <h4>Data Timbang</h4>
                    </div>
                    <div class="form-group">
                        <h5>Modul</h5>
                        <select class="form-control" name="ModuleFilter" title="Pilih Module" onchange="load_filter();">
                            <option value="none">All</option>
                            <option value="truck" <?= $filter_module == 'truck' ? 'selected' : '' ?> >Truk</option>
                            <option value="cu" <?= $filter_module == 'cu' ? 'selected' : '' ?> >CU</option>
                        </select>
                    </div>
                    <div class="row col-12">
                        <div class="col-2">
                            <div class="form-group">
                                <label for="filterStartDate">Tanggal Awal</label>
                                <input type="date" class="form-control" id="filterStartDate" name="filterStartDate" value="<?= $filterStartDate ? $filterStartDate : date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="filterEndDate">Tanggal Akhir</label>
                                <input type="date" class="form-control" id="filterEndDate" name="filterEndDate" value="<?= $filterEndDate ? $filterEndDate : date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label>Filter</label>
                                <input class="form-control btn btn-secondary" type="button" value="Filter" onclick="load_filter();">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="bg-loader">
                            <div class="loader"></div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="data-timbang" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <td>Slip</td>
                                        <!-- <th>No.</th> -->
                                        <th>No. Transaksi</th>
                                        <th>Petak</th>
                                        <th>No Truck</th>
                                        <th>No Barge</th>
                                        <th>Tanggal In</th>
                                        <th>Tanggal Out</th>
                                        <th>Ancak</th>
                                        <th>Kontraktor</th>
                                        <th>Kontraktor Deliv.</th>
                                        <th>Berat Masuk</th>
                                        <th>Berat Keluar</th>
                                        <th>Nett</th>
                                        <th>No Trans Barge</th>
                                        <th>No Tugboat</th>
                                        <th>Nahkoda</th>
                                        <th>Rute</th>
                                        <th>No Alat Muat</th>
                                        <th>Operator Alat Muat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?
                                    $i = 1;
                                    /* echo "<pre>";
									print_r($timbang);
									echo "<pre>"; */
                                    foreach ($timbang as $ti) {

                                        $noTrans = $ti['no_transaksi'];
                                        $file = str_replace("/", "", $noTrans);
                                        if(strtoupper($ti['tipe']) == 'TP' || strtoupper($ti['tipe']) == 'BP'):
                                            $NoAlatMuat = $ti['loading_vehicle_number'];
                                            $OpAlatMuat = $ti['loading_vehicle_operator'];
                                        elseif(strtoupper($ti['tipe']) == 'TD'):
                                            $NoAlatMuat = $ti['no_alat2'];
                                            $OpAlatMuat = $ti['op_alat2'];
                                        else:
                                            $NoAlatMuat = $ti['loading_vehicle_number'];
                                            $OpAlatMuat = $ti['loading_vehicle_operator'];
                                        endif;
                                    ?>
                                        <tr>
                                            <td>
                                                <a href="<?= base_url() ?>/slip-timbang?no=<?= $noTrans ?>" target="_blank" title="Print Tiket Timbang"><i class="ni ni-single-copy-04"></i></a>
                                            </td>
                                            <!-- <td><?= $i ?></td> -->
                                            <td><?= $ti['no_transaksi'] ?></td>
                                            <td><?= $ti['kode_petak'] ?></td>
                                            <td><?= $ti['kode_truck'] ?></td>
                                            <td><?= $ti['kode_barge'] ?></td>
                                            <td><?= $ti['weight_in_time'] ?></td>
                                            <td><?= $ti['weight_out_time'] ?></td>
                                            <td><?= $ti['ancak'] ?></td>
                                            <td><?= $ti['nama_kontraktor'] ?></td>
                                            <td><?= $ti['nama_kontraktor_delivery'] ?></td>
                                            <td><?= number_format($ti['weight_in'], 2, ",", ".") ?></td>
                                            <td><?= number_format($ti['weight_out'], 2, ",", ".") ?></td>
                                            <td><?= number_format($ti['weight_in'] - $ti['weight_out'], 2, ",", ".") ?></td>
                                            <td><?= $ti['tiket_barge'] ?></td>
                                            <td><?= $ti['kode_tugboat'] ?></td>
                                            <td><?= $ti['tugboat_captain'] ?></td>
                                            <td><?= $ti['tujuan'] ?></td>
                                            <td><?= $NoAlatMuat ?></td>
                                            <td><?= $OpAlatMuat ?></td>
                                        </tr>
                                    <? $i++;
                                    } ?>
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
<script src="./assets/js/data-tables.min.js"></script>
<script src="./assets/js/data-tables-bs5.min.js"></script>
<!-- Download / CSV / Copy / Print -->
<script src="./assets/vendor/datatables/buttons.min.js"></script>
<script src="./assets/vendor/datatables/jszip.min.js"></script>
<script src="./assets/vendor/datatables/pdfmake.min.js"></script>
<script src="./assets/vendor/datatables/vfs_fonts.js"></script>
<script src="./assets/vendor/datatables/html5.min.js"></script>
<script src="./assets/vendor/datatables/buttons.print.min.js"></script>

<script src="./assets/bootstrap5/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#data-timbang').DataTable({
            "destroy": true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            order: [[5, 'desc']],
            // pageLength: false,
            // paging: false,
            dom: 'Bfrtip',
            buttons: [
                'pageLength',
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':not(:last-child)',
                    }
                },
                // {
                //     extend: 'csvHtml5',
                //     exportOptions: {
                //         columns: ':not(:last-child)',
                //     }
                // },
                // {
                //     extend: 'pdfHtml5',
                //     exportOptions: {
                //         columns: ':not(:last-child)',
                //     }
                // },
                // {
                //     extend: 'print',
                //     exportOptions: {
                //         columns: ':not(:last-child)',
                //     }
                // },
            ],
        });
    });

    function load_filter() {
        $(".bg-loader").show();
        filter = $("[name=ModuleFilter]").val();
        filterStartDate = $("[name=filterStartDate]").val();
        filterEndDate = $("[name=filterEndDate]").val();
        filter_data = {
            method: filter,
            start_date: filterStartDate,
            end_date: filterEndDate,
        }
        var ses_menu = "<? if (null !== session()->get('menu')) {
                            echo session()->get('menu');
                        } else {
                            echo "";
                        } ?>";
        if (ses_menu == "") {
            $("#page-item").load("home/dashboard");
        } else {
            $("#page-item").load("home" + ses_menu, filter_data);
            // if (filter != 'none') {
            //     $("#page-item").load("home" + ses_menu + '?filter=' + filter);
            // } else {
            //     $("#page-item").load("home" + ses_menu);
            // }
        }
    }
</script>