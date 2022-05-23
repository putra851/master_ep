<?php

include('fungsi/date.php');

$db_host    ='localhost';
$db_user    ='epesantr_semua';
$db_pass    ='5[RB*SpX,X0)p#mXn2';
$db_name    ='epesantr_baitulizzah';
$koneksi    = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

date_default_timezone_set('Asia/Jakarta');

function GetValue($tablename, $column, $where) {
    global $koneksi;
    $sql = "SELECT $column FROM $tablename WHERE $where";
    $result_get_value = mysqli_query($koneksi,$sql);
    $row_get_value = mysqli_fetch_row($result_get_value);
    return $row_get_value[0];
}
 
// Path to move uploaded files
//$target_path = "http://mobile.epesantren.co.id/uploads/";
$target_path = "absensi/";
 
// array for final json respone
$response = array();
 
// getting server ip address
$server_ip = gethostbyname(gethostname());
 
// final file url that is being uploaded
$file_upload_url = $target_path;

    $id_pegawai = isset($_REQUEST['id_pegawai']) ? $_REQUEST['id_pegawai'] : '';
    $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : '';
// 	$lokasi = isset($_REQUEST['lokasi']) ? $_REQUEST['lokasi'] : '';
    $longi = isset($_REQUEST['longi']) ? $_REQUEST['longi'] : '';
    $lati = isset($_REQUEST['lati']) ? $_REQUEST['lati'] : '';
    $image = isset($_REQUEST['image']) ? $_REQUEST['image'] : '';
    $keterangan = isset($_REQUEST['keterangan']) ? $_REQUEST['keterangan'] : '';
 
    $response['longi'] = $longi;
    $response['lati'] = $lati;
    // $response['lokasi'] = $lokasi;
    $response['type'] = $type;
    $response['keterangan'] = $keterangan;
    $response['id_pegawai'] = $id_pegawai;
    $response['image'] = $image;
	$status = "SUKSES_UPLOAD";
	
// tulis data ke database dulu
    $sql = "select employee.employee_id, employee_nip, employee_name, employee_password, employee_email, 
        employee_gender, employee_phone, employee_address, employee_born_place, employee_born_date, 
        employee_photo, employee_status, employee_strata, employee.employee_majors_id, employee_position_id, 
        employee_start, employee_end, employee_category, employee_input_date, employee_last_update,
        ".$db_name.".get_status_absen(status_absen_temp,status_absen) validasi,employee.jarak_radius,
        employee.area_absen,'PEGAWAI' as employee_role_id_name,
        (select position_name from ".$db_name.".position where position_id=employee.employee_position_id) 
        employee_position_id
        from ".$db_name.".employee where employee_id='$id_pegawai'";
        
    // $response['sql'] = $sql;
    // echo json_encode($response);
        
    $rs = mysqli_query($koneksi,$sql);
    
    $num = mysqli_num_rows($rs);
    if($num != 0) 
    {

        $row = mysqli_fetch_array($rs);

        $idp=$row["employee_id"];

        if(strtoupper($row['validasi'])=="UNLOCK"){
            $v='N';
        }elseif(strtoupper($row['validasi'])=="LOCK"){
            $v='Y';
        }else{
            $v=$row['validasi'];
        }
    }
    
    $response['validasi'] = $v;
    echo json_encode($response);
    
    //Cek dan input db
    
    if($v=='Y'){
        $response['validasi'] = $v;
        // $tabel = $koneksi->query ("SHOW TABLES LIKE 'data_waktu'");
        $exists = "select 1 from ".$database."data_waktu";
        $tabel = mysqli_query($koneksi,$exists);
        if($tabel !== FALSE){

    // tulis data ke database dulu

            $majors_id = GetValue("".$database."employee","employee_majors_id","employee_id='$id_pegawai'");
            
            $date_pretty = pretty_date(date("Y-m-d"),  'l',  FALSE);
            
            $hadir = "SELECT data_waktu_masuk, data_waktu_pulang 
                      FROM ".$database."data_waktu 
                      JOIN ".$database."day ON data_waktu.data_waktu_day_id = day.day_id 
                      JOIN ".$database."majors ON data_waktu.data_waktu_majors_id = majors.majors_id 
                      WHERE day_name = '$date_pretty' AND majors_id = '$majors_id'";
                      
            $result1 = mysqli_query($koneksi,$hadir);
            while($row = mysqli_fetch_assoc($result1)){
                $masuk = $row['data_waktu_masuk'];
                $pulang = $row['data_waktu_pulang'];
            }
            
            $result = mysqli_query($koneksi, "SHOW COLUMNS FROM data_absensi LIKE 'statushadir'");
            $result_exists = (mysqli_num_rows($result))?TRUE:FALSE;
            
            $area_absen = GetValue("".$database."employee","area_absen","employee_id='$id_pegawai'");
            $lokasi = GetValue("area_absensi","nama_area","id_area='$area_absen'");

            $created_date   = date("Y-m-d H:i:s");   
            $bulan          = date("Y-m");
            $date           = date("Y-m-d");
            $time           = date("H:i:s");
            $jam_masuk      = $masuk;
            $jam_pulang     = $pulang;
            $status_absen   = $type;
            
            if ($status_absen=='DATANG'){

            //Datang
            if($time <= $jam_masuk) {
                $status_hadir = 'Tepat Waktu';
            }else{
                $status_hadir = 'Terlambat';
            }
            }else if ($status_absen=='PULANG'){
            
            //Pulang
            if($time < $jam_pulang){
                $status_hadir =  'Pulang Awal';
            }else{
                $status_hadir =  'Pulang';
            }
                
            } else {
                $status_hadir ='Tidak Masuk';
            }

            // $file_path = $img;
            // if ($status == "GAGAL_UPLOAD3") $file_path = null;
            
            $file_path = $file_upload_url . $id_pegawai."_".basename($_FILES['image']['name']);
            if ($status == "GAGAL_UPLOAD3") $file_path = "../uploads/absensi/no_image.jpg";

            $id_pegawai     = $id_pegawai;  
            $jenis_absen    = $type;  
            $foto           = $file_path;  
            $catatan_absen  = $keterangan;  
            $remark         = $status;  
            $lokasi_absen   = $lokasi;
            $kehadiran      = $status_hadir;
            
            $result = mysqli_query($koneksi, "SHOW COLUMNS FROM data_absensi LIKE 'statushadir'");
            $exists = (mysqli_num_rows($result))?TRUE:FALSE;

            $area_absen = GetValue("".$database."employee","area_absen","employee_id='$id_pegawai'");
            
            // $lokasi_absen = GetValue("area_absensi","nama_area","id_area='$area_absen'");

            $koneksi->query("delete from ".$database."data_absensi where id_pegawai='$id_pegawai' and tanggal='$date' and (jenis_absen='SAKIT' or jenis_absen='IJIN' or jenis_absen='CUTI')");

            $koneksi->query("SET foreign_key_checks = 0");

            $sql = "insert into ".$database."data_absensi set 
                    id_pegawai = '$id_pegawai', 
                    area_absen = '$area_absen', 
                    bulan = '$bulan', 
                    tanggal = '$date', 
                    time = '$time', 
                    jenis_absen = '$jenis_absen',
                    statushadir = '$kehadiran', 
                    longi = '$longi', 
                    lati = '$lati', 
                    foto = '$foto', 
                    catatan_absen = '$catatan_absen', 
                    lokasi = '$lokasi_absen', 
                    remark = '$remark', 
                    created_by = '$created_by',
                    created_date = '$created_date'";
            $rs = mysqli_query($koneksi,$sql);
            $koneksi->query("SET foreign_key_checks = 1");
            $response["sql"]        =$rs;
            $response["area_absen"] =$area_absen;
            // $response["kehadiran"]  =$kehadiran;
        
        // Echo final json response to client
        echo json_encode($response);
            
        }else if ($v=='N'){

            // tulis data ke database dulu
            $created_date   = date("Y-m-d H:i:s");   
            $bulan          = date("Y-m");
            $date           = date("Y-m-d");
            $time           = date("H:i:s");
            // $file_path = $img;
            // if ($status == "GAGAL_UPLOAD3") $file_path = null;
            
            $file_path = $file_upload_url . $id_pegawai."_".basename($_FILES['image']['name']);
            if ($status == "GAGAL_UPLOAD3") $file_path = "../uploads/absensi/no_image.jpg";

            $id_pegawai = $id_pegawai;  
            $jenis_absen = $type;  
            $foto = $file_path;  
            $catatan_absen = $keterangan;  
            $remark = $status;  
            $lokasi_absen = $lokasi;

            $area_absen = GetValue("".$database."employee","area_absen","employee_id='$id_pegawai'");
            
            // $lokasi_absen = GetValue("area_absensi","nama_area","id_area='$area_absen'");

            $koneksi->query("delete from ".$database."data_absensi where id_pegawai='$id_pegawai' and tanggal='$date' and (jenis_absen='SAKIT' or jenis_absen='IJIN' or jenis_absen='CUTI')");
            
            $koneksi->query("SET foreign_key_checks = 0");
            
            $sql = "insert into ".$database."data_absensi set 
                    id_pegawai = '$id_pegawai', 
                    area_absen = '$area_absen', 
                    bulan = '$bulan', 
                    tanggal = '$date', 
                    time = '$time', 
                    jenis_absen = '$jenis_absen', 
                    longi = '$longi', 
                    lati = '$lati', 
                    foto = '$foto', 
                    catatan_absen = '$catatan_absen', 
                    lokasi = '$lokasi_absen', 
                    remark = '$remark', 
                    created_by = '$created_by',
                    created_date = '$created_date'";
            $rs = mysqli_query($koneksi,$sql);
            $koneksi->query("SET foreign_key_checks = 1");
            $response["sql"]=$rs;
            $response["area_absen"]=$area_absen;
        
        // Echo final json response to client
        echo json_encode($response);
            
        }

    }else{
        // tulis data ke database dulu
        $created_date   = date("Y-m-d H:i:s");   
        $bulan          = date("Y-m");
        $date           = date("Y-m-d");
        $time           = date("H:i:s");
        $file_path = $img;
        if ($status == "GAGAL_UPLOAD3") $file_path = null;
        
        $file_path = $file_upload_url . $id_pegawai."_".basename($_FILES['image']['name']);
        if ($status == "GAGAL_UPLOAD3") $file_path = "../uploads/absensi/no_image.jpg";

        $id_pegawai = $id_pegawai;  
        $jenis_absen = $type;  
        $foto = $file_path;  
        $catatan_absen = $keterangan;  
        $remark = $status;  
        $lokasi_absen = $lokasi;

        $area_absen = GetValue("".$database."employee","area_absen","employee_id='$id_pegawai'");
        
        // $lokasi_absen = GetValue("area_absensi","nama_area","id_area='$area_absen'");

        $koneksi->query("delete from ".$database."data_absensi where id_pegawai='$id_pegawai' and tanggal='$date' and (jenis_absen='SAKIT' or jenis_absen='IJIN' or jenis_absen='CUTI')");
        
        $koneksi->query("SET foreign_key_checks = 0");

        $sql = "insert into ".$database."data_absensi set 
                id_pegawai = '$id_pegawai', 
                area_absen = '$area_absen', 
                bulan = '$bulan', 
                tanggal = '$date', 
                time = '$time', 
                jenis_absen = '$jenis_absen', 
                longi = '$longi', 
                lati = '$lati', 
                foto = '$foto', 
                catatan_absen = '$catatan_absen', 
                lokasi = '$lokasi_absen', 
                remark = '$remark', 
                created_by = '$created_by',
                created_date = '$created_date'";
        $rs = mysqli_query($koneksi,$sql);
        $koneksi->query("SET foreign_key_checks = 1");
        $response["sql"]=$rs;
        $response["area_absen"]=$area_absen;
    
    // Echo final json response to client
    echo json_encode($response);
    }
?>