<?php
require_once'functions.php';
 
    /** LOGIN */ 
    if ($mod=='login_pemilih'){
        $user = esc_field($_POST['user']);
        $pass = esc_field($_POST['pass']);
        
        $row = $db->get_row("SELECT * FROM tb_pemilih WHERE ktp='$user' AND pass='$pass'");
        if($row){
            $_SESSION['login'] = TRUE;
            $_SESSION['id_pemilih'] = $row->id_pemilih;
            $_SESSION['level'] = 'pemilih';
            redirect_js("tanda_terima.php");
        } else{
            print_msg("Salah kombinasi no KTP dan password.");
        }          
    }elseif ($mod=='login'){
        $user = esc_field($_POST['user']);
        $pass = esc_field($_POST['pass']);
        
        $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$user' AND pass='$pass'");
        if($row){
            $_SESSION['login'] = $row->user;
            $_SESSION['level'] = 'admin';
            $_SESSION['akses'] = $row->level;
            
            redirect_js("tampilan_depan.php");
        } else{
            print_msg("Salah kombinasi username dan password.");
        }          
    }else if ($mod=='password'){
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        $pass3 = $_POST['pass3'];
        
        if($_SESSION['level']=='pemilih')
            $row = $db->get_row("SELECT * FROM tb_pemilih WHERE id_pemilih='$_SESSION[id_pemilih]' AND pass='$pass1'");        
        
        if($pass1=='' || $pass2=='' || $pass3=='')
            print_msg('Field bertanda * harus diisi.');
        elseif(!$row)
            print_msg('Password lama salah.');
        elseif( $pass2 != $pass3 )
            print_msg('Password baru dan konfirmasi password baru tidak sama.');
        else{        
            if($_SESSION['level']=='pemilih')
                $db->query("UPDATE tb_pemilih SET pass='$pass2' WHERE id_pemilih='$_SESSION[id_pemilih]'");
                                                
            print_msg('Password berhasil diubah.', 'success');
        }
    } elseif($act=='logout'){
        session_destroy();
        header("location:index.php");
    }
    
    /** PENCALON **/
    elseif($mod=='pencalon_tambah'){
        $kode_pencalon = $_POST['kode_pencalon'];
        $nama_pencalon = $_POST['nama_pencalon'];
        $gambar = $_FILES['gambar'];
        $keterangan = $_POST['keterangan'];
        
        if(!$kode_pencalon || !$nama_pencalon || !$gambar['tmp_name'])
            print_msg("Field bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM tb_pencalon WHERE kode_pencalon='$kode_pencalon'"))
            print_msg("Kode sudah ada!");
        else{
            $filename = rand(1000, 999) . str_replace(' ', '-', $gambar['name']);
            $img = new SimpleImage($gambar['tmp_name']);               
            $img->thumbnail(640, 480);     
            $img->save('gambar/' . $filename, 100);
            
            $db->query("INSERT INTO tb_pencalon (kode_pencalon, nama_pencalon, gambar, keterangan) VALUES ('$kode_pencalon', '$nama_pencalon', '$filename', '$keterangan')");                 
            redirect_js("tampilan_depan.php.php?m=pencalon");
        }
    } elseif ($mod=='pencalon_ubah'){
        $kode_pencalon = $_POST['kode_pencalon'];
        $nama_pencalon = $_POST['nama_pencalon'];
        $gambar = $_FILES['gambar'];
        $keterangan = $_POST['keterangan'];
        
        if(!$kode_pencalon || !$nama_pencalon)        
            print_msg("Field bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM tb_pencalon WHERE kode_pencalon='$kode_pencalon' AND id_pencalon<>'$_GET[ID]'"))
            print_msg("Kode sudah ada!");
        else{
            if($gambar['tmp_name']){
                hapus_gambar($_GET['ID']);
                
                $filename = rand(1000, 9999) . str_replace(' ', '-', $gambar['name']);
                $img = new SimpleImage($gambar['tmp_name']);               
                $img->thumbnail(640, 480);       
                $img->save('gambar/' . $filename, 100);
                
                $sql_gambar = ", gambar='$filename'";
            }
                
            $db->query("UPDATE tb_pencalon SET kode_pencalon='$kode_pencalon', nama_pencalon='$nama_pencalon' $sql_gambar, keterangan='$keterangan' WHERE id_pencalon='$_GET[ID]'");
            redirect_js("tampilan_depan.php?m=pencalon");
        }
    } elseif ($act=='pencalon_hapus'){
        hapus_gambar($_GET['ID']);
        
        $db->query("DELETE FROM tb_pencalon WHERE id_pencalon='$_GET[ID]'");
        $db->query("DELETE FROM tb_pilih WHERE id_pencalon='$_GET[ID]'");
        header("location:tampilan_depan.php?m=pencalon");
    } 
    
    /** PEMILIH */    

       

    /* Desa */
    if($mod=='desa_tambah'){
        $id_desa = $_POST['id_desa'];
        $nama_desa = $_POST['nama_desa'];
        
        if(!$id_desa || !$nama_desa)
            print_msg("Data bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM tb_desa WHERE $nama_desa ='$nama_desa'"))
            print_msg("Data Sudah Terdaftar");
        else{
            $db->query("INSERT INTO tb_desa (id_desa, nama_desa) VALUES ('$id_desa', '$nama_desa')");
            redirect_js("tampilan_depan.php?m=desa");
        }     
    } else if($mod=='desa_ubah'){
        $id_desa = $_POST['id_desa'];
        $nama_desa   = $_POST['nama_desa'];
        
        if(!$id_desa || !$nama_desa)
            print_msg("Data bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM tb_desa WHERE nama_desa = '$nama_desa' AND id_desa<>'$_GET[id_desa]'"))
            print_msg("Data sudah terdaftar!");
        else{
            $db->query("UPDATE tb_desa SET nama_desa='$nama_desa' WHERE id_desa='$id_desa'");
            redirect_js("tampilan_depan.php?m=desa");
        }    
    } else if ($act=='desa_hapus'){
                $db->query("DELETE FROM tb_desa WHERE id_desa='$_GET[id_desa]'");
        header("location:tampilan_depan.php?m=desa");
    } 

    /* Kecamatan */
        if($mod=='kecamatan_tambah'){
        $id_kecamatan = $_POST['id_kecamatan'];
        $nama_kecamatan = $_POST['nama_kecamatan'];
        
        if(!$id_kecamatan || !$nama_kecamatan)
            print_msg("Field bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM tb_kecamatan WHERE $nama_kecamatan ='$nama_kecamatan'"))
            print_msg("Nama Sudah Terdaftar");
        else{
            $db->query("INSERT INTO tb_kecamatan (id_kecamatan, nama_kecamatan) VALUES ('$id_kecamatan', '$nama_kecamatan')");
            redirect_js("index.php?m=kecamatan");
        }     
    } else if($mod=='kecamatan_ubah'){
        $id_kecamatan = $_POST['id_kecamatan'];
        $nama_kecamatan = $_POST['nama_kecamatan'];
        
        if(!$id_kecamatan || !$nama_kecamatan)
            print_msg("Field bertanda * tidak boleh kosong!");
        elseif($db->get_results("SELECT * FROM tb_kecamatan WHERE nama_kecamatan = '$nama_kecamatan' AND id_kecamatan<>'$_GET[id_kecamatan]'"))
            print_msg("Kecamatan sudah terdaftar!");
        else{
            $db->query("UPDATE tb_kecamatan SET nama_kecamatan='$nama_kecamatan' WHERE id_kecamatan='$id_kecamatan'");
            redirect_js("tampilan_depan.php?m=kecamatan");
        }    
    } else if ($act=='kecamatan_hapus'){
                $db->query("DELETE FROM tb_kecamatan WHERE id_kecamatan='$_GET[id_kecamatan]'");
        header("location:tampilan_depan.php?m=kecamatan");
    } 