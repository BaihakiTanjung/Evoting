<?php
$rows = $db->get_results("SELECT * FROM tb_pencalon ORDER BY kode_pencalon"); 
?>
<div class="page-header animated fadeInLeft">
    <h1>Daftar Peserta</h1>
</div>
<div class="gambar animated bounceIn">
<div class="row">
    <?php foreach($rows as $row):?>
    <div class="col-md-4">        
        <div class="thumbnail">
            <img src="gambar/<?=$row->gambar?>" />
        </div>
        <h3 class="text-center"><?=$row->nama_pencalon?></h3>        
    </div>
    <?php endforeach?>  
</div>    
</div>	     
</div>