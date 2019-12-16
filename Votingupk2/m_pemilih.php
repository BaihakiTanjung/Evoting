<?php

if(@$_POST['tambah']){
         $ktp = $_POST['ktp'];
         $nama_pemilih = $_POST['nama_pemilih'];
         $alamat = $_POST['alamat'];
         $id_kecamatan = $_POST['id_kecamatan'];
         $id_desa = $_POST['id_desa'];
         $pass = $_POST['pass'];
         }

 class Pemilih {
       private $mysqli;

        function __construct($conn){
            $this -> mysqli -> $conn;
        }

        public function tambah($ktp, $namapemilih, $alamat, $id_kecamatan, $id_desa, $pass) {
            $db = $this ->mysqli -> $conn;
            $db -> query("INSERT INTO tb_pemilih,tb_desa,tb_kecamatan VALUES('','$ktp','$nama_pemilih','$alamat','$id_kecamatan','$id_desa',$pass')") or die ($db->error);
        }
    }
 ?>

