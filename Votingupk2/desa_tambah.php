<?php 

class Desa {
     private $mysqli;

     function __construct($conn) {
        $db = $this-> mysqli -> conn;
     }

     public function tambah($id_desa, $nama_desa){
        $db = $this-> mysqli -> conn;
        $db -> query("INSERT INTO tb_desa(id_desa,nama_desa) VALUES ('$id_desa','$nama_desa')") or die ($db -> error);
     } 
}

 ?>