<?php
    $row = $db->get_row("SELECT * FROM tb_pemilih WHERE id_pemilih='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Ubah Pemilih</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=pemilih_ubah&ID=<?=$row->id_pemilih?>">
            <div class="form-group">
                <label>No KTP <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="ktp" value="<?=$row->ktp?>"/>
            </div>
            <div class="form-group">
                <label>Nama Pemilih <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_pemilih" value="<?=$row->nama_pemilih?>"/>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat"><?=$row->alamat?></textarea>
            </div>
             <div class="form-group">
                <label>Kecamatan</label>
                <select class="form-control" name="nama_kecamatan">
                <option>---Pilih Kecamatan---</option>
                <?php
                $con = mysqli_connect("localhost","root","","db_voting");

                $result = mysqli_query($con,"SELECT * FROM tb_kecamatan ORDER BY nama_kecamatan");
                    while($row = mysqli_fetch_assoc($result))
                {
                    echo "<option>$row[id_kecamatan]</option>";
                } ?>
            </select>
            </div>
             <div class="form-group">
                <label>Desa</label>   
                <select class="form-control" name="nama_desa">             
                <option>---Pilih Desa---</option>
                <?php
                
                $result = mysqli_query($con,"SELECT * FROM tb_desa ORDER BY nama_desa");
                    while($row = mysqli_fetch_assoc($result))
                {
                    echo "<option>$row[id_desa]</option>";

                } ?></select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=pemilih"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>