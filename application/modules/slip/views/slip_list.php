<?php
if (isset($gaji)&&isset($anak)&&isset($istri)) {
    
    $inputAccountValue          = $gaji['akun_account_id'];
	$inputNipValue              = $gaji['employee_nip'];
	$inputNameValue             = $gaji['employee_name'];
	$inputMajorsValue           = $gaji['majors_short_name'];
	$inputPositionValue         = $gaji['position_name'];
	$inputPokokValue            = $gaji['premier_pokok'];
	$inputFungsionalValue       = $gaji['premier_fungsional'];
	$inputTambahanValue         = $gaji['premier_tambahan'];
	$inputTransportValue        = $gaji['sekunder_transport'];
	$inputHrValue               = $gaji['sekunder_hr'];
	$inputPenyesuaianValue      = $gaji['sekunder_penyesuaian'];
	$inputKepalaKeluargaValue   = $gaji['sekunder_kepala_keluarga'];
	$inputPiketValue            = $gaji['sekunder_piket'];
	$inputKurlebValue           = $gaji['sekunder_kurleb'];
	$inputKoreksiValue          = $gaji['sekunder_koreksi'];
	$inputTunjLainValue         = $gaji['sekunder_lain'];
	$inputAbsenValue            = $gaji['potongan_absen'];
	$inputInfakValue            = $gaji['potongan_infak'];
	$inputBmtValue              = $gaji['potongan_bmt'];
	$inputKoperasiValue         = $gaji['potongan_koperasi'];
	$inputQurbanValue           = $gaji['potongan_qurban'];
	$inputPotonganLainValue     = $gaji['potongan_lain'];
	$inputSppAnakValue          = $gaji['potongan_spp_anak'];
	
} else {
    
    $inputAccountValue          = set_value('akun_account_id');
	$inputNipValue              = set_value('employee_nip');
	$inputNameValue             = set_value('employee_name');
	$inputMajorsValue           = set_value('majors_short_name');
	$inputPositionValue         = set_value('position_name');
	$inputPokokValue            = set_value('premier_pokok');
	$inputFungsionalValue       = set_value('premier_fungsional');
	$inputTambahanValue         = set_value('premier_tambahan');
	$inputTransportValue        = set_value('sekunder_transport');
	$inputHrValue               = set_value('sekunder_hr');
	$inputPenyesuaianValue      = set_value('sekunder_penyesuaian');
	$inputKepalaKeluargaValue   = set_value('sekunder_kepala_keluarga');
	$inputPiketValue            = set_value('sekunder_piket');
	$inputKurlebValue           = set_value('sekunder_kurleb');
	$inputKoreksiValue          = set_value('sekunder_koreksi');
	$inputTunjLainValue         = set_value('sekunder_lain');
	$inputAbsenValue            = set_value('potongan_absen');
	$inputInfakValue            = set_value('potongan_infak');
	$inputBmtValue              = set_value('potongan_bmt');
	$inputKoperasiValue         = set_value('potongan_koperasi');
	$inputQurbanValue           = set_value('potongan_qurban');
	$inputPotonganLainValue     = set_value('potongan_lain');
	$inputSppAnakValue          = set_value('potongan_spp_anak');
}
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo isset($title) ? '' . $title : null; ?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('manage') ?>"><i class="fa fa-th"></i> Home</a></li>
			<li class="active"><?php echo isset($title) ? '' . $title : null; ?></li>
		</ol>
	</section>
	<section class="content">
		<div class="row"> 
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Filter Data Penggajian Pegawai</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						<?php echo form_open(current_url(), array('class' => 'form-horizontal', 'method' => 'get')) ?>
						<div class="form-group">
						    <label for="" class="col-sm-2 control-label">Tahun Ajaran</label>
							<div class="col-sm-2">
								<select class="form-control" name="n" id="th_ajar">
									<?php foreach ($period as $row): ?>
										<option <?php if (isset($f['n']) AND $f['n'] == $row['period_id']) {
										    echo 'selected';
										} else if (empty($f['n']) AND $periodActive['period_id'] == $row['period_id']) {
										    echo 'selected';
										} else {
										    echo '';
										} ?> value="<?php echo $row['period_id'] ?>"><?php echo $row['period_start'].'/'.$row['period_end'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<label for="" class="col-sm-1 control-label">Bulan</label>
							<div class="col-sm-2">
								<select class="form-control" name="d" id="bulan">
									<?php foreach ($bulan as $row): ?>
										<option <?php echo (isset($f['d']) AND $f['d'] == $row['month_id']) ? 'selected' : '' ?> value="<?php echo $row['month_id'] ?>"><?php echo $row['month_name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<label for="" class="col-sm-1 control-label">NIP</label>
							<div class="col-sm-4">
								<div class="input-group">
									<input type="text" class="form-control" autofocus name="r" id="employee_nip" <?php echo (isset($f['r'])) ? 'placeholder="'.$f['r'].'" value="'.$f['r'].'"' : 'placeholder="NIP Pegawai"' ?> required>
									<span class="input-group-btn">
										<button class="btn btn-success" type="submit">Cari</button>
									</span>
									<span class="input-group-btn">
									</span>
									<span class="input-group-btn">
									</span>
                					<span class="input-group-btn">
                					    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#dataPegawai"><b>Data Pegawai</b></button>
                					</span>
								</div>
							</div>
						</div>
					</form>
				</div><!-- /.box-body -->
			</div><!-- /.box -->

			<?php if ($f) { ?>

				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Informasi Pegawai</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-9">
							<table class="table table-striped">
								<tbody>
									<tr>
										<td width="200">Tahun Ajaran</td><td width="4">:</td>
										<?php foreach ($period as $row): ?>
											<?php echo (isset($f['n']) AND $f['n'] == $row['period_id']) ? 
											'<td><strong>'.$row['period_start'].'/'.$row['period_end'].'<strong></td>' : '' ?> 
										<?php endforeach; ?>
									</tr>
									<tr>
										<td>NIP</td>
										<td>:</td>
										<?php foreach ($employee as $row): ?>
											<?php echo (isset($f['n']) AND $f['r'] == $row['employee_nip']) ? 
											'<td>'.$row['employee_nip'].'</td>' : '' ?> 
										<?php endforeach; ?>
									</tr>
									<tr>
										<td>Nama Pegawai</td>
										<td>:</td>
										<?php foreach ($employee as $row): ?>
											<?php echo (isset($f['n']) AND $f['r'] == $row['employee_nip']) ? 
											'<td>'.$row['employee_name'].'</td>' : '' ?> 
										<?php endforeach; ?>
									</tr>
									<tr>
										<td>Unit Sekolah</td>
										<td>:</td>
										<?php foreach ($employee as $row): ?>
											<?php echo (isset($f['n']) AND $f['r'] == $row['employee_nip']) ?  
											'<td>'.$row['majors_name'].' ('.$row['majors_short_name'].')</td>' : '' ?> 
										<?php endforeach; ?>
									</tr>
									<tr>
										<td>Jabatan</td>
										<td>:</td>
										<?php foreach ($employee as $row): ?>
											<?php echo (isset($f['n']) AND $f['r'] == $row['employee_nip']) ? 
											'<td>'.$row['position_name'].'</td>' : '' ?> 
										<?php endforeach; ?>
									</tr>
									<tr>
										<td>Pendidikan Terakhir</td>
										<td>:</td>
										<?php foreach ($employee as $row): ?>
											<?php echo (isset($f['n']) AND $f['r'] == $row['employee_nip']) ? 
											'<td>'.$row['employee_strata'].'</td>' : '' ?> 
										<?php endforeach; ?>
									</tr>
									<tr>
										<td>Status Kepegawaian</td>
										<td>:</td>
										<?php foreach ($employee as $row){ ?>
											<?php if(isset($f['n']) AND $f['r'] == $row['employee_nip']) { 
											        if($row['employee_category']== 1){ 
											            echo '<td> Tetap </td>';
											         } else if($row['employee_category']== 2){
											            echo '<td> Tidak Tetap </td>';
											         } else{ echo '<td></td>'; 
											             
											         }
											     } else {
											     '<td></td>';
											     } ?> 
										<?php }; ?>
									</tr>
									<tr>
										<td>Masa Kerja</td>
										<td>:</td>
										<td>
										<?php foreach ($employee as $row): ?>
											<?php if(isset($f['n']) AND $f['r'] == $row['employee_nip']){
											$start = date_create($row['employee_start']);
												    if($row['employee_end']!='0000-00-00'){
												        $end = date_create($row['employee_end']);
												    }
												    else{
												        $end = date_create();
												    }
												        $interval = date_diff($start, $end);
												        echo $interval->y.' tahun';
												    } else {
												        echo '';
												    } ?> 
										<?php endforeach; ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="col-md-3">
							<?php foreach ($employee as $row): ?>
								<?php if (isset($f['n']) AND $f['r'] == $row['employee_nip']) { ?> 
									<?php if (!empty($row['employee_photo'])) { ?>
										<img src="<?php echo upload_url('employee/'.$row['employee_photo']) ?>" class="img-thumbnail img-responsive">
									<?php } else { ?>
										<img src="<?php echo media_url('img/user.png') ?>" class="img-thumbnail img-responsive">
									<?php } 
								} ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>

				<div class="row">

					<div class="col-md-12">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">History Penggajian</h3>
											<a href="" class="btn btn-info btn-xs"><i class="fa fa-refresh"></i> Refresh</a>
							</div><!-- /.box-header -->
							
							<div class="box-body table-responsive">
							    <div class="over">
								<table class="table table-responsive table-bordered" style="white-space: nowrap;">
								    <tr class="info">
										<th>No. Referensi</th>
										<th>Tanggal</th>
										<th>Bulan</th>
										<th>Dibayar Via</th>
										<th>Gaji</th>
										<th>Status</th>
										<th>Gaji Bersih</th>
										<th>Tunjangan</th>
										<th>Potongan</th>
										<th>Diterima</th>
										<th>Aksi</th>
									</tr>
									<?php 
									    foreach($history as $row){ 
									    if($row['gaji_month_id']<7){
                                            $tahun = $row['period_start'];   
									    } else {
									        $tahun = $row['period_end'];
									    }
									?>
									<tr>
									    <td><?php echo $row['kredit_kas_noref'] ?></td>
									    <td><?php echo pretty_date($row['gaji_tanggal'],'d/m/Y',FALSE) ?></td>
									    <td><?php echo $row['month_name'].' '.$tahun ?></td>
									    <td><?php echo $row['account_description'] ?></td>
									    <td>Rp <?php echo number_format($row['gaji_utama'],0,",",".") ?></td>
									    <td><?php echo $row['gaji_status'] ?>%</td>
									    <td>Rp <?php echo number_format($row['gaji_utama'] * $row['gaji_status'] / 100,0,",",".") ?></td>
									    <td>Rp <?php echo number_format($row['gaji_tunjangan'],0,",",".") ?></td>
									    <td>Rp <?php echo number_format($row['gaji_potongan'],0,",",".") ?></td>
									    <td>Rp <?php echo number_format($row['gaji_jumlah'],0,",",".") ?></td>
									    <td><a href="#delModal<?php echo $row['gaji_id']; ?>" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" title="Hapus Slip"></i></a>
									    <a href="<?php echo site_url('manage/slip/print_slip/' . $row['gaji_id']) ?>" class="btn btn-success btn-xs" title="Cetak Slip" target="_blank"><i class="fa fa-print"></i></a>
									    </td>
									</tr>
									
										<div class="modal modal-default fade" id="delModal<?php echo $row['gaji_id']; ?>">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span></button>
															<h3 class="modal-title"><span class="fa fa-warning"></span> Konfirmasi penghapusan</h3>
														</div>
														<div class="modal-body">
															<p>Apakah anda yakin akan menghapus data ini?</p>
														</div>
														<div class="modal-footer">
															<?php echo form_open('manage/slip/delete_history/' . $row['gaji_id']); ?>
															<input type="hidden" name="delNoref" value="<?php echo $row['kredit_kas_noref']; ?>">
                    										<input type="hidden" name="delPeriod" value="<?php echo $row['gaji_period_id']; ?>">
                    										<input type="hidden" name="delMonth" value="<?php echo $row['gaji_month_id']; ?>">
                    										<input type="hidden" name="delNIP" value="<?php echo $f['r']; ?>">
															<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
															<button type="submit" class="btn btn-danger"><span class="fa fa-check"></span> Hapus</button>
															<?php echo form_close(); ?>
														</div>
													</div>
													<!-- /.modal-content -->
												</div>
												<!-- /.modal-dialog -->
											</div>
									<?php } ?>
								</table>
							    </div>
						    </div>
						</div>
					</div>

				</div>



				<!-- List Tagihan Bulanan --> 
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Kelola Penggajian</h3>
					</div><!-- /.box-header -->
					<form action="<?php echo site_url('manage/slip/add_slip') ?>" method="post" target="_blank">
                					
					<div class="box-body">
					    
					    <div class="row">
                    		<div class="col-md-3">
                    		    <label>No. Referensi</label>
                    			<input required="" name="kas_noref" id="kas_noref" class="form-control" value="<?php echo $noref ?>" readonly="">
                    		</div>
    					    <div class="col-md-3">
                    		    <label>Pembayaran Gaji Via *</label>
                    			<select required="" name="kas_account_id" id="kas_account_id" class="form-control">
                    			    <option value="">-- Pilih Akun Kas --</option>
                    			    <?php
                    			    foreach($dataKas as $row){
                    			    ?>
                                		<option value="<?php echo $row['account_id'] ?>" <?php echo($dataKasActive['account_id']==$row['account_id']) ? 'selected' : '' ?> > 
                                		<?php echo $row['account_code'].' - '.$row['account_description'];
                                		?>
                                		 </option>
                                	<?php	 
                        			 }
                    			    ?>
                    			</select>
                    		</div>
                    		<div class="col-md-3">
                    			<input type="hidden" name="kas_majors_id" id="kas_majors_id" class="form-control" value="<?php echo $majorsID ?>" readonly="">
                    			<?php if(isset($f['n'])){ ?>
					            <input type="hidden" name="kas_period" value="<?php echo $f['n']?>">
					            <?php } ?>
                    		</div>
				        </div>
                	    <br><br>
					    
					    <div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_1" data-toggle="tab">Gaji</a></li>
								<li><a href="#tab_2" data-toggle="tab">Tunjangan</a></li>
								<li><a href="#tab_3" data-toggle="tab">Potongan</a></li>
								<li><a href="#tab_4" data-toggle="tab">Cetak Slip</a></li>
							</ul>
							<div class="tab-content">
							    
								<div class="tab-pane active" id="tab_1">
								    
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						    <label>Gaji Pokok <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                					    </div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                					        <input name="premier_pokok" id="premier_pokok" type="text" class="form-control" value="<?php echo $inputPokokValue ?>" readonly="" placeholder="Gaji Pokok">
                					    </div>
                					    </div>
                					</div>
								    
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						    <label>Fungsional <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                					    </div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                					        <input name="premier_fungsional" id="premier_fungsional" type="text" class="form-control" value="<?php echo $inputFungsionalValue ?>" readonly="" placeholder="Fungsional">
                					    </div>
                					    </div>
                					</div>
                
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						<label>Tugas Tambahan <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                						<input name="premier_tambahan" id="premier_tambahan" type="text" class="form-control" value="<?php echo $inputTambahanValue ?>" placeholder="Tugas Tambahan" onkeyup="change_data()">
                						</div>
                					    </div>
                					</div>
                					<hr>
                					<?php
                					    $sumPokok = $inputPokokValue + $inputFungsionalValue + $inputTambahanValue;
                					?>
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						<label>GAJI</label>
                						</div>
                					    <div class="col-md-1"><label>=</label></div>
                					    <div class="col-md-2">
                						<input name="subtotal_pokok" id="subtotal_pokok" type="text" class="form-control" value="<?php echo $sumPokok ?>" readonly="">
                						</div>
                					    </div>
                					</div>
                					
								</div>
								
								<div class="tab-pane" id="tab_2">
								    
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						    <label>Transport <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                					    </div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                					        <input name="sekunder_transport" id="sekunder_transport" type="text" class="form-control" value="<?php echo $inputTransportValue ?>" placeholder="Transport" onkeyup="change_data()">
                					    </div>
                					    </div>
                					</div>
								    
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						    <label>Induk <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                					    </div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                					        <input name="induk" id="induk" type="text" class="form-control" value="0" placeholder="Induk">
                					    </div>
                					    </div>
                					</div>
								    
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						    <label>Non Induk <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                					    </div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                					        <input name="non_induk" id="non_induk" type="text" class="form-control" value="0" placeholder="Non Induk">
                					    </div>
                					    </div>
                					</div>
								    
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						    <label>Standart <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                					    </div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                					        <input name="standart" id="standart" type="text" class="form-control" value="0" placeholder="Standart">
                					    </div>
                					    </div>
                					</div>
								    
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						    <label>Lebih/Kurang Jam <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                					    </div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                					        <input name="jam" id="jam" type="text" class="form-control" value="0" placeholder="Lebih/Kurang Jam">
                					    </div>
                					    </div>
                					</div>
								    
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						    <label>HR Lebih / Kurang Jam <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                					    </div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                					        <input name="sekunder_hr" id="sekunder_hr" type="text" class="form-control" value="<?php echo $inputHrValue ?>" placeholder="HR Lebih / Kurang Jam" onkeyup="change_data()">
                					    </div>
                					    </div>
                					</div>
                
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						<label>Penyesuian Gaji <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                						<input name="sekunder_penyesuaian" id="sekunder_penyesuaian" type="text" class="form-control" value="<?php echo $inputPenyesuaianValue ?>" placeholder="Penyesuian Gaji" onkeyup="change_data()">
                						</div>
                					    </div>
                					</div>
                
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						<label>Tunjangan Kepala Kel.  <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                						<input name="sekunder_kepala_keluarga" id="sekunder_kepala_keluarga" type="text" class="form-control" value="<?php echo $inputKepalaKeluargaValue ?>" placeholder="Tunjangan Kepala Kel. " onkeyup="change_data()">
                						</div>
                					    </div>
                					</div>
                
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						<label>Piket <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                						<input name="sekunder_piket" id="sekunder_piket" type="text" class="form-control" value="<?php echo $inputPiketValue ?>" placeholder="Piket" onkeyup="change_data()">
                						</div>
                					    </div>
                					</div>
                
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						<label>Kurleb <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                						<input name="sekunder_kurleb" id="sekunder_kurleb" type="text" class="form-control" value="<?php echo $inputKurlebValue ?>" placeholder="Kurleb" onkeyup="change_data()">
                						</div>
                					    </div>
                					</div>
                
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						<label>Koreksi <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                						<input name="sekunder_koreksi" id="sekunder_koreksi" type="text" class="form-control" value="<?php echo $inputKoreksiValue ?>" placeholder="Koreksi" onkeyup="change_data()">
                						</div>
                					    </div>
                					</div>
                
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						<label>Lain-lain <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                						<input name="sekunder_lain" id="sekunder_lain" type="text" class="form-control" value="<?php echo $inputTunjLainValue ?>" placeholder="Lain-lain" onkeyup="change_data()">
                						</div>
                					    </div>
                					</div>
                					<hr>
                					<?php
                					    $sumSekunder = $inputPokokValue + $inputHrValue + $inputPenyesuaianValue + $inputKepalaKeluargaValue + $inputPiketValue + $inputKurlebValue + $inputKoreksiValue + $inputTunjLainValue;
                					?>
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						<label>TUNJANGAN</label>
                						</div>
                					    <div class="col-md-1"><label>=</label></div>
                					    <div class="col-md-2">
                						<input name="subtotal_tunjangan" id="subtotal_tunjangan" type="text" class="form-control" value="<?php echo $sumSekunder ?>" readonly="">
                						</div>
                					    </div>
                					</div>
                					
								</div>
								
								<div class="tab-pane" id="tab_3">
								    
								    <div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						<label>Absen <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                						<input name="potongan_absen" id="potongan_absen" type="text" class="form-control" value="<?php echo $inputAbsenValue ?>" required="" placeholder="Absen" onkeyup="change_data()">
                						</div>
                					    </div>
                					</div>
                
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						<label>Infak <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                						<input name="potongan_infak" id="potongan_infak" type="text" class="form-control" value="<?php echo $inputInfakValue ?>" required="" placeholder="Infak" onkeyup="change_data()">
                						</div>
                					    </div>
                					</div>
								    
								    <div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						<label>BMT <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                						<input name="potongan_bmt" id="potongan_bmt" type="text" class="form-control" value="<?php echo $inputBmtValue ?>" required="" placeholder="BMT" onkeyup="change_data()">
                						</div>
                					    </div>
                					</div>
                
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						<label>Koperasi <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                						<input name="potongan_koperasi" id="potongan_koperasi" type="text" class="form-control" value="<?php echo $inputKoperasiValue ?>" required="" placeholder="Koperasi" onkeyup="change_data()">
                						</div>
                					    </div>
                					</div>
                
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						<label>Qurban <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                						<input name="potongan_qurban" id="potongan_qurban" type="text" class="form-control" value="<?php echo $inputQurbanValue ?>" required="" placeholder="Qurban" onkeyup="change_data()">
                						</div>
                					    </div>
                					</div>
                
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						<label>Lain-lain <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                						<input name="potongan_lain" id="potongan_lain" type="text" class="form-control" value="<?php echo $inputPotonganLainValue ?>" required="" placeholder="Lain-lain" onkeyup="change_data()">
                						</div>
                					    </div>
                					</div>
                
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						<label>SPP Anak <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-2">
                						<input name="potongan_spp_anak" id="potongan_spp_anak" type="text" class="form-control" value="<?php echo $inputSppAnakValue ?>" required="" placeholder="SPP Anak" onkeyup="change_data()">
                						</div>
                					    </div>
                					</div>
                					
                					<hr>
								    <?php
                					    $sumPotongan= $inputAbsenValue+$inputInfakValue+$inputBmtValue+$inputKoperasiValue+$inputQurbanValue+$inputSppAnakValue+$inputPotonganLainValue;
                					?>
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						<label>TOTAL POTONGAN</label>
                						</div>
                					    <div class="col-md-1"><label>=</label></div>
                					    <div class="col-md-2">
                						<input name="subtotal_potongan" id="subtotal_potongan" type="text" class="form-control" value="<?php echo $sumPotongan?>" readonly="">
                						</div>
                					    </div>
                					</div>
                					
								</div>
								
								<div class="tab-pane" id="tab_4">
								    
								    <div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                					        <label>Pokok Gaji</label>
                					    </div>
                					    <div class="col-md-1"><label>=</label></div>
                					    <div class="col-md-2">
                						<input name="utama" id="utama" type="text" class="form-control" value="<?php echo $sumPokok ?>" readonly="">
                					    </div>
                					    </div>
                					</div>
								    
								    <div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                					        <label>Status</label>
                					    </div>
                					    <div class="col-md-1"><label>=</label></div>
                					    <div class="col-md-2">
                						<input name="status" id="status" type="text" class="form-control" value="100" onkeyup="change_data()">
                					    </div>
                					    </div>
                					</div>
								    
								    <div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                					        <label>Gaji</label>
                					    </div>
                					    <div class="col-md-1"><label>=</label></div>
                					    <div class="col-md-2">
                						<input name="gaji" id="gaji" type="text" class="form-control" value="<?php echo $sumPokok ?>" readonly="">
                					    </div>
                					    </div>
                					</div>
								    
								    <div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                					        <label>Tunjangan</label>
                					    </div>
                					    <div class="col-md-1"><label>=</label></div>
                					    <div class="col-md-2">
                						<input name="tunjangan" id="tunjangan" type="text" class="form-control" value="<?php echo $sumPokok ?>" readonly="">
                					    </div>
                					    </div>
                					</div>
                					
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2"><label>Potongan</label></div>
                					    <div class="col-md-1"><label>=</label></div>
                					    <div class="col-md-2">
                						<input name="potongan" id="potongan" type="text" class="form-control" value="<?php echo $sumPotongan?>" readonly="">
                					    </div>
                					    </div>
                					</div>
								    <hr>
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						<label>GAJI DITERIMA</label>
                						</div>
                					    <div class="col-md-1"><label>=</label></div>
                					    <div class="col-md-2">
                						<input name="jumlah_gaji" id="jumlah_gaji" type="text" class="form-control" value="<?php echo $sumPokok-$sumPotongan?>" readonly="">
                						</div>
                					    </div>
                					</div>
                					
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-2">
                						</div>
                					    <div class="col-md-1"></div>
                					    <div class="col-md-2">
                            	        <button type="submit" class="btn btn-block btn-success">Cetak Slip Gaji</button>
                						</div>
                					    </div>
                					</div>
							    </div>
							</div>
						</div>
    					<?php if (isset($gaji)) { ?>
    						<input type="hidden" name="employee_id" value="<?php echo $gaji['employee_id']; ?>">
    						<input type="hidden" name="gaji_account_id" value="<?php echo $gaji['akun_account_id']; ?>">
    						<input type="hidden" name="premier_id" value="<?php echo $gaji['premier_id']; ?>">
    						<input type="hidden" name="sekunder_id" value="<?php echo $gaji['sekunder_id']; ?>">
    						<input type="hidden" name="potongan_id" value="<?php echo $gaji['potongan_id']; ?>">
    					<?php } ?>
    					    <input type="hidden" name="period_id" value="<?php echo $f['n'] ?>">
							<input type="hidden" name="month_id" value="<?php echo $f['d'] ?>">
    
						<p class="text-muted">*) Kolom wajib diisi.</p>
					</div>
					</form>
				</div>
				<?php } ?>
			</section>
		</div>
		
		<div class="modal fade" id="dataPegawai" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Cari Data Pegawai</h4>
				</div>
				<div class="modal-body">
    <?php $dataPegawai = $this->Employees_model->get(array('status'=>'1'));
      
      echo '
            <div class="box-body table-responsive">
							<table id="dtable" class="table table-hover">
							    <thead>
								<tr>
									<th>No</th>
									<th>NIP</th>
									<th>Nama</th>
									<th>Unit Sekolah</th>
									<th>Jabatan</th>
									<th>Aksi</th>
								</tr>
								</thead>
								<tbody>';
									if (!empty($dataPegawai)) {
										$i = 1;
										foreach ($dataPegawai as $row):
						               echo '<tr>
												<td>'.
												$i
												.'</td>
												<td>'.
												$row['employee_nip']
												.'</td>
												<td>'.
												$row['employee_name']
												.'</td>
												<td>'.
												$row['majors_short_name']
												.'</td>
												<td>'.
												$row['position_name']
												.'</td>';
										echo '<td align="center">';
                                        echo '<button type="button" data-dismiss="modal" class="btn btn-primary btn-xs" onclick="ambil_data(';
                                        echo "'".$row['employee_nip']."'";
                                        echo ')">Pilih</button>';
                                        echo '</td>';
										echo '</tr>';
											$i++;
										endforeach;
									} else {
									echo '<tr id="row">
											<td colspan="8" align="center">Data Kosong</td>
										</tr>';
									    }
							echo	'</tbody>
								</table>
							</div>
      '; ?>
    				<div class="modal-footer">
    					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
    				</div>
    			</div>
    		</div>
    	</div>
	</div>
	
<script>
    
    function ambil_data(nip){
        var nip      = nip;
        var bulan    = $("#bulan").val();
        var tahun    = $("#th_ajar").val();
        
        window.location.href = '<?php echo base_url()?>manage/slip?n='+tahun+'&d='+bulan+'&r='+nip;
        
      }
    
    function get_kelas(){
	    var id_majors    = $("#majors_id").val();
	    
        $.ajax({ 
            url: '<?php echo base_url();?>manage/payout/get_kelas',
            type: 'POST', 
            data: {
                    'id_majors': id_majors,
            },    
            success: function(msg) {
                    $("#div_kelas").html(msg);
            },
			error: function(msg){
					alert('msg');
			}
            
        });
	}
	
	function get_student(){
	    var id_majors       = $("#majors_id").val();
	    var id_kelas        = $("#class_id").val();
	    var student_name    = $("#student_name").val();
	    
        $.ajax({ 
            url: '<?php echo base_url();?>manage/payout/get_student',
            type: 'POST', 
            data: {
                    'id_majors'   : id_majors,
                    'id_kelas'    : id_kelas,
                    'student_name': student_name,
            },    
            success: function(msg) {
                    $("#div_data").html(msg);
            },
			error: function(msg){
					alert('msg');
			}
            
        });
	}
</script>

<script type="text/javascript">

function change_data(){
    
    //pokok
    
    var gaji_pokok       = $('#premier_pokok').val();
    var fungsional       = $('#premier_fungsional').val();
    var tambahan         = $('#premier_tambahan').val();
    var status         = $('#status').val();
    
    if(gaji_pokok == ''){
        gaji_pokok = '0';
    }
    
    if(fungsional  == ''){
        fungsional = '0';
    }
    
    if(tambahan  == ''){
        tambahan = '0';
    }
    
    if(status == ''){
        status = '0';
    }
    
    var subpokok = parseFloat(gaji_pokok) + parseFloat(fungsional) + parseFloat(tambahan);
    
    if(isNaN(subpokok)){
        subpokok = '0';
    }
    
    $("#subtotal_pokok").val(subpokok);
    $("#utama").val(subpokok);
    
    var gaji = subpokok * status / 100;
    
    if(isNaN(gaji)){
        gaji = '0';
    }
    
    $("#gaji").val(gaji);
    
    //tunjangan
    
    var transport               = $('#sekunder_transport').val();
    var hr                      = $('#sekunder_hr').val();
    var penyesuaian             = $('#sekunder_penyesuaian').val();
    var kepala_keluarga         = $('#sekunder_kepala_keluarga').val();
    var piket                   = $('#sekunder_piket').val();
    var kurleb                  = $('#sekunder_kurleb').val();
    var koreksi                 = $('#sekunder_koreksi').val();
    var tunj_lain               = $('#sekunder_lain').val();
    
    if(transport == ''){
        transport = '0';
    }
    
    if(hr  == ''){
        hr = '0';
    }
    
    if(penyesuaian  == ''){
        penyesuaian = '0';
    }
    
    if(kepala_keluarga == ''){
        kepala_keluarga = '0';
    }
    
    if(piket  == ''){
        piket = '0';
    }
    
    if(kurleb  == ''){
        kurleb = '0';
    }
    
    if(koreksi  == ''){
        koreksi = '0';
    }
    
    if(tunj_lain  == ''){
        tunj_lain = '0';
    }
    
    var subtunjangan = parseFloat(transport) + parseFloat(hr) + parseFloat(penyesuaian) + parseFloat(kepala_keluarga) + parseFloat(piket) + parseFloat(kurleb) + parseFloat(koreksi) + parseFloat(tunj_lain);
    
    if(isNaN(subtunjangan)){
        subtunjangan = '0';
    }
    
    $("#subtotal_tunjangan").val(subtunjangan);
    $("#tunjangan").val(subtunjangan);
    
    //potongan
    
    var absen       = $('#potongan_absen').val();
    var infak       = $('#potongan_infak').val();
    var bmt         = $('#potongan_bmt').val();
    var koperasi    = $('#potongan_koperasi').val();
    var qurban      = $('#potongan_qurban').val();
    var spp_anak    = $('#potongan_spp_anak').val();
    var lain        = $('#potongan_lain').val();
    
    if(absen == ''){
        absen = '0';
    }
    
    if(infak  == ''){
        infak = '0';
    }
    
    if(bmt  == ''){
        bmt = '0';
    }
    
    if(koperasi  == ''){
        koperasi = '0';
    }
    
    if(qurban == ''){
        qurban = '0';
    }
    
    if(spp_anak  == ''){
        spp_anak = '0';
    }
    
    if(lain  == ''){
        lain = '0';
    }
    
    var subpotongan = parseFloat(absen) + parseFloat(infak) + parseFloat(bmt) + parseFloat(koperasi) + parseFloat(qurban) + parseFloat(spp_anak) + parseFloat(lain);
    
    if(isNaN(subpotongan)){
        subpotongan = '0';
    }
    
    $("#subtotal_potongan").val(subpotongan);
    $("#potongan").val(subpotongan);
    
    var total = parseFloat(gaji) + parseFloat(subtunjangan) - parseFloat(subpotongan);
    
    if(isNaN(total)){
        total = '0';
    }
    
    $("#jumlah_gaji").val(total);
    
    
}

function startCalculate(){
    interval=setInterval("Calculate()",10);
}

function Calculate() {
	var numberHarga = $('#harga').val(); // a string
	numberHarga = numberHarga.replace(/\D/g, '');
	numberHarga = parseFloat(numberHarga, 10);

	var numberBayar = $('#bayar').val(); // a string
	numberBayar = numberBayar.replace(/\D/g, '');
	numberBayar = parseFloat(numberBayar, 10);

	var total = numberBayar - numberHarga;
	$('#kembalian').val(total);
}

function stopCalc(){
	clearInterval(interval);
}
</script>

<script>
$(document).ready(function() {
	$("#selectall").change(function() {
		$(".checkbox").prop('checked', $(this).prop("checked"));
	});
});
</script>

<script type="text/javascript">
(function(a){
	a.createModal=function(b){
		defaults={
			title:"",message:"Your Message Goes Here!",closeButton:true,scrollable:false
		};
		var b=a.extend({},defaults,b);
		var c=(b.scrollable===true)?'style="max-height: 420px;overflow-y: auto;"':"";
		html='<div class="modal fade" id="myModal">';
		html+='<div class="modal-dialog">';
		html+='<div class="modal-content">';
		html+='<div class="modal-header">';
		html+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>';
		if(b.title.length>0){
			html+='<h4 class="modal-title">'+b.title+"</h4>"
		}
		html+="</div>";
		html+='<div class="modal-body" '+c+">";
		html+=b.message;
		html+="</div>";
		html+='<div class="modal-footer">';
		if(b.closeButton===true){
			html+='<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'
		}
		html+="</div>";
		html+="</div>";
		html+="</div>";
		html+="</div>";a("body").prepend(html);a("#myModal").modal().on("hidden.bs.modal",function(){
			a(this).remove()})}})(jQuery);

/*
* Here is how you use it
*/
$(function(){    
	$('.view-cicilan').on('click',function(){
		var link = $(this).attr('href');      
		var iframe = '<object type="text/html" data="'+link+'" width="100%" height="350">No Support</object>'
		$.createModal({
			title:'Lihat Pembayaran/Ciiclan',
			message: iframe,
			closeButton:true,
			scrollable:false
		});
		return false;        
	});    
});
</script>
<style>
    div.over {
        width: 1083px;
        height: 165px;
        overflow: scroll;
    }
    
    div.extended {
        width: 1500px;
        height: 200px;
        overflow: scroll;
    }
</style>