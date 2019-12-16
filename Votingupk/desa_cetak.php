<h1>Desa</h1>
<table><thead>
    <tr>
        <th>No</th>
        <th>Desa</th>
        <th>Nama Desa</th>
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
</tr>
<?php endforeach;
?>
</table>