<h1>Tanda Terima</h1>
<table>
<thead>
    <tr>
</table>
        <th>Id Pemilih</th>
        <th class="nw">Tanda Terima</th>
    </tr>
</thead>
<?php
$q = esc_field($_GET['q']);
$rows = $db->get_results("SELECT * FROM tb_pilih 
    WHERE ID LIKE '%$q%' 
        OR tanda_terima LIKE '%$q%'
    ORDER BY id_pemilih");
foreach($rows as $row):?>
<tr>
    <td><?=$row->ID?></td>
    <td><?=$row->tanda_terima0?></td>
</tr>
<?php endforeach;
?>