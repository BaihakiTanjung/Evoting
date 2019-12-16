<?php
$row = $db->get_row("SELECT * FROM tb_pemilih WHERE id_pemilih='$_SESSION[id_pemilih]'");
?>
<div class="page-header">
    <h1>Data Identitas Pemilih Pilkada</h1>
</div>
<div class="identitas" style="margin: 0px 80px 10.5px;">
<table class="table table-hover aw">
    <div class="border border-primary">
    <tr>
        <td>Nama Pemilih</td>
        <td><?=$row->nama_pemilih?></td>
    </tr>
    <tr>
        <td>No KTP</td>
        <td><?=$row->ktp?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td><?=$row->alamat?></td>
    </tr>
    </div>
</table> 
<a class="btn btn-primary" href="?m=tanda_terima&act=pilih">Lanjutkan <span class="glyphicon glyphicon-chevron-right"></span></a>
</div>