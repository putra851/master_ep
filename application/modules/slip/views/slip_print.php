<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Slip Gaji</title>
	<?php
	
    $this->load->helper(array('terbilang'));
    
	    if($print['month_id']>0 && $print['month_id']<7){
	        $tahun = $print['period_start'];
	    }
	    else if($print['month_id']>6 && $print['month_id']<13){
	        $tahun = $print['period_end'];
	    } else {
	        $tahun = '?';
	    }
	    
	    if($print['employee_start']!='0000-00-00'){
	        $start = date_create($print['employee_start']);
	    }
	    else{
	        $start = date_create();
	    }
	    
	    if($print['employee_end']!='0000-00-00'){
	        $end = date_create($print['employee_end']);
	    }
	    else{
	        $end = date_create();
	    }
        $interval = date_diff($start, $end);
        if($interval->y == '0'){
            $masa = '-';     
        } else {
            $masa = $interval->y.' tahun'; 
        }   
	?>
</head>
<body>
    <table  style='border-bottom: 1px solid black; padding-bottom: 10px; width: 70mm;'>
        	<tr valign='middle'>
        		<td style='width: 40mm;' valign='middle'>
        			<div style='font-weight: bold; padding-bottom: 5px; font-size: 8pt;'><?php echo $setting_school['setting_value'] ?>
        			</div>
        			<span style='font-size: 5pt;'><?php echo $setting_address['setting_value'] ?>, Telp. 
        	<?php echo $setting_phone['setting_value'] ?></span>
        		</td>
        		<td style='width: 5mm;' valign='middle'>
        		</td>
        		<td style='width: 25mm;' valign='middle'>
        			<div style='font-weight: bold; padding-bottom: 5px; font-size: 8pt; text-align:center'><b>SLIP GAJI</b>
        			</div>
        			<span><div style='font-size: 8pt; text-align:center'>
                  <?php
                    $tanggal = date_create($print['gaji_tanggal']);
                    $dformat = date_format($tanggal,'dmYHis');
                  ?>
                   <img style="width:100.56pt;height:10pt;z-index:6;" src="<?php echo 'media/barcode_fee/'.$print['kredit_kas_noref'].'.png' ?>" alt="Image_4_0" /><br>
                   <font size="6px"><?php echo $dformat.$print['employee_nip']; ?></font>
        			</div></span>
        		</td>
        	</tr>
        </table>
		<br>
		<table style='border-bottom: 1px solid black; width: 70mm;'>
		    <tr>
			    <td style='width: 10mm; font-size: 8pt; text-align: left;' valign='middle'>Unit</td>
			    <td style='width: 5mm; font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='width: 60mm; font-size: 8pt; text-align: left;' valign='middle'><?php echo $print['majors_short_name']; ?></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Nama</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'><?php echo $print['employee_name']; ?></td>
			</tr>
			<tr>
			    
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Jabatan</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'><?php echo $print['position_name']; ?></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Bulan</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'><?php echo strtoupper($print['month_name']).' '.$tahun; ?></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='centeer'>Masa Kerja</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'><?php echo $masa; ?></td>
			</tr>
		</table>
		<table cellpadding='0'  cellspacing='0' style='width: 175mm;'>
			<tr> 
			    <td style='width: 20mm; font-size: 8pt; text-align: left;' valign='middle'><br></td>
			    <td style='width: 4mm; font-size: 8pt; text-align: center;' valign='middle'><br></td>
			    <td style='width: 10mm; font-size: 8pt; text-align: center;' valign='middle'><br></td>
			    <td style='width: 15mm; font-size: 8pt; text-align: center;' valign='middle'><br></td>
			    <td style='width: 5mm; font-size: 8pt; text-align: center;' valign='middle'><br></td>
			    <td style='width: 17mm; font-size: 8pt; text-align: right; ' valign='middle'><br></td>
				<td style='width: 8mm; font-size: 8pt; text-align: center;' valign='middle'><br></td>		
			    <td style='width: 15mm; font-size: 8pt; text-align: center;' valign='middle'><br></td>
			    <td style='width: 20mm; font-size: 8pt; text-align: left;' valign='middle'><br></td>
			    <td style='width: 10mm; font-size: 8pt; text-align: left;' valign='middle'><br></td>
			    <td style='width: 4mm; font-size: 8pt; text-align: center;' valign='middle'><br></td>
			    <td style='width: 5mm; font-size: 8pt; text-align: center;' valign='middle'><br></td>
			    <td style='width: 17mm; font-size: 8pt; text-align: right;' valign='middle'><br></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left; width: 20%' valign='middle'>Gaji Pokok</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?> </td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>Rp</td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['subsatu_pokok'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td colspan='4' style='font-size: 8pt; text-align: left;' valign='middle'><b></b> </td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><b></b></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'><b></b></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Fungsional</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>Rp</td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['subsatu_fungsional'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'> </td>
			    <td colspan='3' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Tugas Tambahan</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>Rp</td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['subsatu_tambahan'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'> </td>
			    <td colspan='3' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Status</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo $print['gaji_status']; ?>%</td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'> </td>
			    <td colspan='3' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'><hr></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'>+</td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'> </td>
			    <td colspan='3' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>Rp</td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['gaji_utama'] * $print['gaji_status'] / 100 ,0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'> </td>
			    <td colspan='3' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Transport</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>Rp</td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['subdua_transport'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Induk</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['gaji_induk'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Non Induk</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['gaji_non_induk'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Standart</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['gaji_standart'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Lebih/Kurang Jam</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['gaji_jam'],0,',','.') ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>HR Lebih / Kurang Jam</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>Rp</td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['subdua_hr'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Penyesuian Gaji</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>Rp</td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['subdua_penyesuaian'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Tunjangan Kepala Kel.</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>Rp</td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['subdua_kepala_keluarga'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Piket</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>Rp</td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['subdua_piket'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Kurleb</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>Rp</td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['subdua_kurleb'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Koreksi Bln Lalu</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>Rp</td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['subdua_koreksi'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Lain-Lain</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>Rp</td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['subdua_lain'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'><hr></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'>+</td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'> </td>
			    <td colspan='3' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>Rp</td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format(($print['gaji_utama'] * $print['gaji_status'] / 100) + $print['gaji_tunjangan'] ,0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'> </td>
			    <td colspan='3' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Potongan</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Absen</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>Rp</td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['subtiga_absen'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Infak</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>Rp</td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['subtiga_infak'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>BMT</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>Rp</td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['subtiga_bmt'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Koperasi</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>Rp</td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['subtiga_koperasi'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Qurban</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>Rp</td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['subtiga_qurban'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>Lain-Lain</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>Rp</td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['subtiga_lain'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'>SPP Aank</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>:</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>Rp</td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><?php echo number_format($print['subtiga_spp_anak'],0,',','.'); ?></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo ''; ?></td>
			    <td colspan='2' style='font-size: 8pt; text-align: left;' valign='middle'><hr></td>
				<td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'> </td>
			    <td colspan='3' style='font-size: 8pt; text-align: left;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right;' valign='middle'></td>
			</tr>
			
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'><b>Jumlah Diterima</b></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo '' ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo '' ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><b>Rp</b></td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'><b><?php echo number_format($print['gaji_jumlah'],0,',','.'); ?></b></td>
				<td style='font-size: 8pt; text-align: center; ' valign='middle'></td>
			    <td colspan='3' style='font-size: 8pt; text-align: left; ' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center; ' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center; ' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: right; ' valign='middle'></td>
			</tr>
			<tr>
			    <td>
			        <br>
			    </td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: left;' valign='middle'><b>Terbilang : </b></td>
			    <td colspan='12' style='font-size: 8pt; text-align: left;' valign='middle'><?php echo wordwrap(number_to_words($print['gaji_jumlah']), 50, "<br>\n"); ?></td>
			</tr>
		</table>
		<br>
		<table  style='width: 75mm;'>
			<tr>
			    <td style='width: 1mm; font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='width: 20mm; font-size: 8pt; text-align: center;' valign='middle'>Bendahara</td>
			    <td style='width: 22mm; font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='width: 20mm; font-size: 8pt; text-align: center;' valign='middle'><?php echo $setting_city['setting_value'].'  '.$print['month_name'].' '.$tahun; ?></td>
			    <td style='width: 1mm; font-size: 8pt; text-align: center;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>diterima oleh</td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><br><br><br><br><br></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>
			    </td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			</tr>
			<tr>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'>
			    <?php echo $setting_nama_bendahara['setting_value']; ?>
			    </td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'><?php echo $print['employee_name']; ?></td>
			    <td style='font-size: 8pt; text-align: center;' valign='middle'></td>
			</tr>
			<tr>
			</tr>
		</table>
</body>
</html>