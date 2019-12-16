<?php
    $row = $db->get_row("SELECT * FROM tb_desa WHERE id_desa='$_GET[id_desa]'"); 
?>
<div class="page-header">
    <h1>Ubah Desa</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=desa_ubah&ID=<?=$row->id_desa?>">
            <div class="form-group">
                <label>Id Desa <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="id_desa" value="<?=$row->id_desa?>"/>
            </div>
            <div class="form-group">
                <label>Nama Desa <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_desa" value="<?=$row->nama_desa?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=desa"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>