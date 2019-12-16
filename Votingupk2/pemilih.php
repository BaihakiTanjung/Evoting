<?php 
    require_once('database.php');
    require_once('config.php');
 ?>
<script src="assets/js/jquery.min.js"></script>
<div class="page-header">
    <h1>Pemilih</h1>
</div>
<div class="pemilih">
<div class="panel panel-default">
    <div class="panel-heading">        
        <form class="form-inline">
            <input type="hidden" name="m" value="pemilih" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            </div>
            <div class="form-group <?=($_SESSION['akses']=='admin') ? '' : 'hidden'?>">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default">
                Tambah
              </button>
            </div>
            <div class="form-group">
                <a class="btn btn-default" href="cetak.php?m=pemilih&a=<?=$_GET['q']?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div>
        </form>
    </div>
    <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>KTP</th>
            <th>Nama Pemilih</th>
            <th>Alamat</th>
            <th>Kecamatan</th>
            <th>Desa</th>
            <th>Status</th>
            <th class=" <?=($_SESSION['akses']=='admin') ? '' : 'hidden'?>">Aksi</th>
        </tr>
    </thead>
    <?php
    $q = esc_field($_GET['q']);
    $rows = $db->get_results("SELECT A.*, P.ID AS pilih, A.KTP,A.NAMA_PEMILIH,A.ALAMAT,B.nama_kecamatan,C.nama_desa  FROM tb_pemilih A 
        LEFT JOIN tb_pilih P ON A.id_pemilih = P.id_pemilih
        LEFT JOIN  tb_desa C ON A.id_desa = C.id_desa
        LEFT JOIN tb_kecamatan B ON A.id_kecamatan = B.id_kecamatan 
        GROUP BY P.ID,A.KTP,A.NAMA_PEMILIH,A.ALAMAT,B.nama_kecamatan,C.nama_desa
        LIKE '%$q%' ORDER BY A.id_pemilih");

    $no=0;
    foreach($rows as $row):?>
    <tr>
        <td><?=++$no ?></td>
        <td><?=$row->ktp?></td>
        <td><?=$row->nama_pemilih?></td>
        <td><?=$row->alamat?></td>
        <td><?=$row->nama_kecamatan?></td>
        <td><?=$row->nama_desa?></td>
        <td><?=($row->pilih) ? '<span class="glyphicon glyphicon-check"></span>' : ''?></td>
        <td class=" <?=($_SESSION['akses']=='admin') ? '' : 'hidden'?>">
            <a class="btn btn-xs btn-warning" href="?m=pemilih_ubah&ID=<?=$row->id_pemilih?>"><span class="glyphicon glyphicon-edit"></span></a>
            <a class="btn btn-xs btn-danger" href="aksi.php?act=pemilih_hapus&ID=<?=$row->id_pemilih?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
    </tr>
    <?php endforeach;
    ?>
    </table>
</div>
</div>
<!-- Modal Tambah Pemilih -->
<?php if($_POST) include'm_pemilih.php'?>
         <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Pemilih</h4>
              </div>
              <div class="modal-body">
        <form method="post" action="m_pemilih.php">
            <div class="form-group">
                <label class="control-label" for="ktp">No KTP <span class="text-danger"></span></label>
                <input class="form-control" type="text" id="ktp" name="ktp" placeholder="No Ktp" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="nama_pemilih">Nama Pemilih <span class="text-danger"></span></label>
                <input class="form-control" type="text" id="nama_pemilih" name="nama_pemilih" placeholder="Nama Pemilih" required>
            </div>
            <div class="form-group">
                <label class="control-label" for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" required></textarea>
            </div>
             <div class="form-group">
                <label class="control-label" for="id_kecamatan">Kecamatan</label>
                <select class="form-control" id="id_kecamatan" name="id_kecamatan" placeholder="Kecamatan" required>
                <option>Pilih</option>
                <?php
                $result = mysqli_query($con,"SELECT * FROM tb_kecamatan ORDER BY nama_kecamatan");
                    while($row = mysqli_fetch_assoc($result))
                {
                    echo "<option>$row[nama_kecamatan]</option>";
                } ?>
            </select>
            </div>
             <div class="form-group">
                <label class="control-label" for="id_desa">Desa</label>   
                <select class="form-control" id="id_desa" name="id_desa" placeholder="Desa" required>             
                <option>Pilih</option>
                <?php
                $result = mysqli_query($con,"SELECT * FROM tb_desa ORDER BY nama_desa");
                    while($row = mysqli_fetch_assoc($result))
                {
                    echo "<option>$row[nama_desa]</option>";

                } ?></select>
            </div>
            <div class="form-group">
                <label class="control-label" for="pass">Password <span class="text-danger"></span></label>
                <input class="form-control" type="password" id="pass" name="pass" placeholder="Password" required>
            </div>
            <div class="modal-footer">
                <input type="submit" name="tambah" class="btn btn-success" value="Simpan"></input>
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
            </div>
        </form>
              </div>
            </div>
          </div>
        </div>
<!-- Modal Tambah Pemilih Selesai  -->