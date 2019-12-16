<?php
    $row = $db->get_row("SELECT * FROM tb_kecamatan WHERE id_kecamatan='$_GET[id_kecamatan]'"); 
?>
<div class="page-header">
    <h1>Ubah Kecamatan</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=kecamatan_ubah&ID=<?=$row->id_kecamatan?>">
            <div class="form-group">
                <label>Id Kecamatan <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="id_kecamatan" value="<?=$row->id_kecamatan?>"/>
            </div>
            <div class="form-group">
                <label>Nama Kecamatan <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_kecamatan" value="<?=$row->nama_kecamatan?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=kecamatan"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>