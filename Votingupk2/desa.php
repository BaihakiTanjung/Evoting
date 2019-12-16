<?php 
    include'desa_tambah.php';    
 ?>

<div class="page-header">
    <h1>Data Desa</h1>
</div>
<div class="pemilih">
<div class="panel panel-default">
    <div class="panel-heading">        
        <form class="form-inline">
            <input type="hidden" name="m" value="desa" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            </div>
            <div class="form-group  <?=($_SESSION['akses']=='admin') ? '' : 'hidden'?>">
                 <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default">
                Tambah
              </button>
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="cetak.php?m=desa&a=<?=$_GET['q']?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Id Desa</th>
            <th>Nama Desa</th>
            <th class=" <?=($_SESSION['akses']=='admin') ? '' : 'hidden'?>">Aksi</th>
        </tr>
    </thead>
    <?php
    $q = esc_field($_GET['q']);
    $rows = $db->get_results("SELECT * FROM tb_desa WHERE nama_desa LIKE '%$q%' ORDER BY id_desa");
    $no=0;
    foreach($rows as $row):?>
    <tr>
        <td><?=++$no ?></td>
        <td><?=$row->id_desa?></td>
        <td><?=$row->nama_desa?></td>
        <td class=" <?=($_SESSION['akses']=='admin') ? '' : 'hidden'?>">
            <a class="btn btn-xs btn-warning" href="?m=desa_ubah&id_desa=<?=$row->id_desa?>"><span class="glyphicon glyphicon-edit"></span></a>
            <a class="btn btn-xs btn-danger" href="aksi.php?act=desa_hapus&id_desa=<?=$row->id_desa?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
    </tr>
    <?php endforeach;
    ?>
    </table>
</div>
</div>
<!-- Modal Desa -->
 <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Desa</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">                
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Id Desa <span class="text-danger"></span></label>
                                <input class="form-control"  name="id_desa" id="id_desa" required="">
                            </div>
                            <div class="form-group">
                                <label>Nama Desa <span class="text-danger"></span></label>
                                <input class="form-control" type="text" name="nama_desa" id="nama_desa" required>
                            </div>
                             <div class="modal-footer">
                                <input type="submit" name="tambah" class="btn btn-success" value="Simpan"></input>
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                            </div>
                        </form>

                        <?php 

                            include'config.php';

                            if (@$_POST['tambah']) {
                                $id_desa = mysqli_real_escape_string($con, $_POST["id_desa"]);
                                $nama_desa = mysqli_real_escape_string($con, $_POST["nama_desa"]);

                            }

                         ?>


                   
                </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
