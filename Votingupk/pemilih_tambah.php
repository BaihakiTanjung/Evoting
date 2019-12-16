<div class="page-header">
    <h1>Tambah Pemilih</h1>
</div>
    <script type="text/javascript" src="assets/js/vendor/jquery-1.11.2.min.js"></script>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=pemilih_tambah">
            <div class="form-group">
                <label>No KTP <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="ktp" value="<?=$_POST['ktp']?>"/>
            </div>
            <div class="form-group">
                <label>Nama Pemilih <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_pemilih" value="<?=$_POST['nama_pemilih']?>"/>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat"><?=$_POST['alamat']?></textarea>
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
                    echo "<option>$row[nama_kecamatan]</option>";
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
                    echo "<option>$row[nama_desa]</option>";

                } ?></select>
            </div>
            <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="pass" value="<?=$_POST['pass']?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=pemilih"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>