<!DOCTYPE html>
<html>
<head>
	<title><?php foreach ($siswa as $row):?> <?php echo ($f['r'] == $row['student_nis']) ? $row['student_full_name'] : '' ?><?php endforeach; ?></title>
</head>

<style type="text/css">
@page {
	margin-top: 0.5cm;
	/*margin-bottom: 0.1em;*/
	margin-left: 1cm;
	margin-right: 1cm;
	margin-bottom: 0.1cm;
}
.name-school{
	font-size: 15pt;
	font-weight: bold;
	padding-bottom: -15px;
}

.unit{
    font-weight: bold;
	font-size: 8pt;
	margin-bottom: -10px;
}

.alamat{
	font-size: 8pt;
	margin-bottom: -10px;
}
.detail{
	font-size: 10pt;
	font-weight: bold;
	padding-top: -15px;
	padding-bottom: -12px;
}
body {
	font-family: sans-serif;
}
table {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: none;
	/*border-color: #666666;*/
	border-collapse: collapse;
	width: 100%;
}

th {
	padding-bottom: 8px;
	padding-top: 8px;
	border-color: #666666;
	background-color: #dedede;
	/*border-bottom: solid;*/
	text-align: left;
}

td {
	text-align: left;
	border-color: #666666;
	background-color: #ffffff;
}

hr {
	border: none;
	height: 1px;
	/* Set the hr color */
	color: #333; /* old IE */
	background-color: #333; /* Modern Browsers */
}
.container {
	position: relative;
}

.topright {
	position: absolute;
	top: 0;
	right: 0;
	font-size: 18px;
	border-width: thin;
	padding: 5px;
}
.topright2 {
	position: absolute;
	top: 30px;
	right: 50px;
	font-size: 18px;
	border: 1px solid;
	padding: 5px;
	color: red;
}
</style>
<body>

	<div class="container">
		<div class="topright">
		    Buku Tahfidz<br>
		<?php
    $num = count($unit);
	if($num > 1){ ?>
        <font size=12px>
        Unit Pesantren : 
      <?php foreach ($siswa as $row): ?>
        <?php echo $row['majors_short_name'].'<br>' ?>
      <?php endforeach; ?></font>
      <?php } ?>
       <img style="width:100.5pt;height:15pt;z-index:6;" src="<?php echo 'media/barcode_tahfidz/'.'TAHFIDZ'.$row['student_nis'].'.png' ?>" alt="Image_4_0" /><br>
       <font size="8px"><?php echo 'TAHFIDZ'.$row['student_nis']; ?></font>
      </div>
	</div>
	<table>
	    <tr>
	        <td width="6%">
	            <img src="<?php echo 'uploads/school/' . logo() ?>" style="height: 50px;">
	        </td>
	        <td>
            	<p class="name-school"><?php echo $setting_school['setting_value'] ?></p>
            	
                	<?php 
                	$num = count($unit);
                	if($num > 1){
            	echo '<p class="unit">';
                	foreach($unit as $row){
                	    $data  = $row['majors_short_name'];
                	    $Pecah = explode( " ", $data );
                        for ( $i = 0; $i < count( $Pecah ); $i++ ) {
                            echo $Pecah[$i] . " ";
                        } 
                      }
                  echo '</p>';
                  
                    } ?>
                  <p class="alamat"><?php echo $setting_address['setting_value'] ?><?php echo ' Telp. '.$setting_phone['setting_value'] ?></p>
        	</td>
	    </tr>
	</table>
		<hr>
		<table style="padding-top: -5px; padding-bottom: 5px">
			<tbody>
				<tr>
					<td style="width: 100px;">NIS</td>
					<td style="width: 5px;">:</td>
					<?php foreach ($siswa as $row): ?>
					<td style="width: 150px;"><?php echo $row['student_nis']?></td>
				<?php endforeach ?>
					<td style="width: 100px;">Kelas</td>
					<td style="width: 5px;">:</td>
					<?php foreach ($siswa as $row): ?>
					<td style="width: 150px;"><?php echo $row['class_name']?></td>
					<?php endforeach ?>
				</tr>
				<tr>
					<td style="width: 100px;">Nama</td>
					<td style="width: 5px;">:</td>
					<?php foreach ($siswa as $row): ?>
					<td style="width: 150px;"><?php echo $row['student_full_name']?></td>
					<?php endforeach ?>
					<td style="width: 130px;">Tahun Ajaran</td>
					<td style="width: 5px;">:</td>
					<td style="width: 131px;"><?php foreach ($period as $row):?> <?php echo ($f['n'] == $row['period_id']) ? $row['period_start'].'/'.$row['period_end'] : '' ?><?php endforeach; ?></td>
				</tr>
			</tbody>
		</table>
		<hr>

		<table style="border-style: solid;">
			<tr>
				<th style="border-top: 1px solid; border-bottom: 1px solid;">No.</th>
				<th style="border-top: 1px solid; border-bottom: 1px solid;">Tanggal</th>
				<th style="border-top: 1px solid; border-bottom: 1px solid;">Jumlah Hafalan Baru</th>
				<th style="border-top: 1px solid; border-bottom: 1px solid;" align="center">Murojaah</th>
				<th style="border-top: 1px solid; border-bottom: 1px solid;" align="center">Ziyadah</th>
			</tr>
			<?php
				$i =1;
				foreach ($tahfidz as $row) :
				 ?>
			<tr>
				<td style="border-bottom: 1px solid;padding-top: 10px; padding-bottom: 10px;"><?php echo $i ?></td>
				<td style="border-bottom: 1px solid;"><?php echo pretty_date($row['tahfidz_date'], 'd F Y', false) ?></td>
				<td style="border-bottom: 1px solid;"><?php echo $row['tahfidz_new'] . ' Halaman' ?></td>
				<td style="border-bottom: 1px solid; text-align: left;"><?php echo $row['tahfidz_murojaah'] ?></td>
				<td style="border-bottom: 1px solid; text-align: left;"><?php echo $row['tahfidz_ziyadah'] ?></td>
			</tr>
			<?php 
				$i++;
				endforeach ?>
			<tr>
				<td colspan="2" style="background-color: #dedede; font-weight:bold; border-bottom: 1px solid;">Total Hafalan</td>
				<td style="background-color: #dedede;font-weight:bold;border-bottom: 1px solid;">
				    <?php    
						foreach ($tahfidzSum as $row){
						    echo $row['tahfidzSum'] . ' Halaman';
						}
					?>
				</td>
				<td colspan="3" style="background-color: #dedede;font-weight:bold;border-bottom: 1px solid;"></td>
			</tr>
		</table>
		<br>
		
		

		

	</body>
	</html>