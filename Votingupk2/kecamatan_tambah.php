<div class="page-header">
    <h1>Tambah Kecamatan</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=kecamatan_tambah">
            <div class="form-group">
                <label>Id Kecamatan <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="id_kecamatan" value="<?=$_POST['id_kecamatan']?>"/>
            </div>
            <div class="form-group">
                <label>Nama Kecamatan <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_kecamatan" value="<?=$_POST['nama_kecamatan']?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=kecamatan"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>