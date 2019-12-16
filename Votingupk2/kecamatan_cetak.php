<h1>Kecamatan</h1>
<table><thead>
    <tr>
    	<th>No</th>
        <th>Id Kecamatan</th>
        <th>Nama Kecamatan</th>
    </tr>
</thead>
<?php
$q = esc_field($_GET['q']);
$rows = $db->get_results("SELECT * FROM tb_kecamatan WHERE nama_kecamatan LIKE '%$q%' ORDER BY id_kecamatan");
$no=0;
foreach($rows as $row):?>
<tr>
    <td><?=++$no ?></td>
    <td><?=$row->id_kecamatan?></td>
    <td><?=$row->nama_kecamatan?></td>
</tr>
<?php endforeach;
?>
</table>