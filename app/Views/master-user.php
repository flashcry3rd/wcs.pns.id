<style>

    tr {
        cursor: pointer;
    }

    td {
        text-align: center;
    }

    th {
        text-align: center;
    }
    
    .garis_panjang {
        border: 0.6px;
        color: black;
        border-style: inset;
    }

</style>

<div class="row mt-4" >
    <div class="col-lg-12">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body" >
                    <h4 >Buat User Baru</h4>
                    <form id="form-user">
                        <div class="col-lg-12">
                            <div class="row mt-4">
                                <div class="col-md-6" >
                                    <div class="form-group  col-sm-8" >
                                        <label >Nama</label>    
                                        <input class="form-control" name="nama" type="text">
                                    </div>
                                    <div class="form-group  col-sm-8" >
                                        <label >Username</label>    
                                        <input class="form-control" name="username" id="username" type="text">
                                        <label id="warning"><i><a style='color: red' >Username tidak boleh kosong !</a></i></label>
                                    </div>
                                    <div class="form-group  col-sm-8" >
                                        <label >Posisi</label>    
                                        <input class="form-control" name="posisi" type="text">
                                    </div>
                                    <div class="form-group  col-sm-8" >
                                        <label >Password</label>    
                                        <input class="form-control" name="password" type="text">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                        <h5>List Menu</h5>
                                        <div class="garis_panjang"></div>
                                        <br />
                                        <? foreach($menu as $m){ ?>
                                            <div class="form-group" >
                                                <input type="checkbox" value="<?= $m['id'] ?>" id="menu<?=$m['id']?>" name="menu[]"> <label for=""><?= $m['nama_menu'] ?></label> 
                                            </div>
                                        <? } ?>
                                    
                                </div>
                                <div class="form-group ">
                                    <a class="btn btn-primary" type="button" id="btn-proses" style="float: right;">Buat Akun</a> 
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row mt-4" >
    <div class="col-lg-12">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>List User</h4>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>USERNAME</th>
                                            <th>NAMA USER</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <? foreach($user as $u){ ?> 
                                            <tr class="user_click">
                                                <td><?= $u['id'] ?></td>
                                                <td><?= $u['username'] ?></td>
                                                <td><?= $u['nama'] ?></td>
                                            </tr>
                                        <? } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $("#username").keyup(function(){
        var txt = $(this).val();
        $.ajax({
            data: {txt: txt},
            cache: false,
            type: 'post',
            dataType: 'json',
            url: '<?= base_url()?>/home/checkUsername',
            success: function(msg){
                var html = "<i><a style='color: "+msg['color']+";'>"+msg['msg']+"</a></i>";
                $("#warning").html(html);
                if(msg['status']=='error'){
                    $("#btn-proses").fadeOut(500);
                }else{
                    $("#btn-proses").fadeIn(500);
                }
            }
        })
    })
    
    $("#btn-proses").click(function(){
        $.ajax({
            data: $("#form-user").serialize(),
            cache: false,
            type: 'post',
            dataType: 'json',
            url: '<?=base_url() ?>/home/createUser',
            success: function(msg){
                alert(msg['msg']);
                if($msg['status']=='success'){
                    $("#form-user").reset();
                }
            }
        })
    })
    
</script>