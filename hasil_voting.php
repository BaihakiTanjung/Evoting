<div class="page-header animated fadeInLeft">
    <h1>Hasil Voting</h1>
</div>
<div class="hasilvoting">
<?php
    $rows = $db->get_results("SELECT c.*, COUNT(p.ID) as total  FROM tb_pencalon c LEFT JOIN tb_pilih p ON p.id_pencalon=c.id_pencalon GROUP BY c.id_pencalon");
    foreach($rows as $row){
        $categories[] = $row->nama_pencalon;
        $data[] = $row->total * 1;
    }
        
    $chart = array();
    $chart['chart']['type'] = 'column';
    $chart['title']['text'] = 'Grafik Hasil Voting';    
    $chart['xAxis'] = array(
        'categories' => array_values(array_unique($categories)),              
    );
    
    $chart['yAxis'] = array(
        'min' => 0,
        'title' => array('text' => 'Voting'),
    );
    
    $chart['series']= array(
        array(
            'name' => 'Voting',
            'data'=>$data,
        )
    );
    
?>
<script src="assets/js/highcharts.js"></script>
<script>
$(function(){
    $('#chart').highcharts(<?=json_encode($chart)?>);     
})
</script>
<div id="chart" style="min-width: 310px; height: 400px; margin: 0 auto; padding-bottom: 20px; "></div>


</div>