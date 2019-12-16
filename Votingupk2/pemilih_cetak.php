<h1>Pemilih</h1>
<table>
<thead>
    <tr>
        <th>No</th>
        <th>KTP</th>
        <th>Nama Pemilih</th>
        <th>Alamat</th>
        <th>Nama Kecamatan</th>
        <th>Nama Desa</th>
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
</tr>
<?php endforeach;
?>
</table>