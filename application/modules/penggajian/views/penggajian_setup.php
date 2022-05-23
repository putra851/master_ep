<?php

if (isset($employee)) {
    $inputAccountValue          = $employee['akun_account_id'];
	$inputNipValue              = $employee['employee_nip'];
	$inputNameValue             = $employee['employee_name'];
	$inputMajorsValue           = $employee['majors_short_name'];
	$inputPositionValue         = $employee['position_name'];
	$inputPokokValue            = $employee['premier_pokok'];
	$inputFungsionalValue       = $employee['premier_fungsional'];
	$inputTambahanValue         = $employee['premier_tambahan'];
	$inputTransportValue        = $employee['sekunder_transport'];
	$inputHrValue               = $employee['sekunder_hr'];
	$inputPenyesuaianValue      = $employee['sekunder_penyesuaian'];
	$inputKepalaKeluargaValue   = $employee['sekunder_kepala_keluarga'];
	$inputPiketValue            = $employee['sekunder_piket'];
	$inputKurlebValue           = $employee['sekunder_kurleb'];
	$inputKoreksiValue          = $employee['sekunder_koreksi'];
	$inputTunjLainValue         = $employee['sekunder_lain'];
	$inputAbsenValue            = $employee['potongan_absen'];
	$inputInfakValue            = $employee['potongan_infak'];
	$inputBmtValue              = $employee['potongan_bmt'];
	$inputKoperasiValue         = $employee['potongan_koperasi'];
	$inputQurbanValue           = $employee['potongan_qurban'];
	$inputPotonganLainValue     = $employee['potongan_lain'];
	$inputSppAnakValue          = $employee['potongan_spp_anak'];
	
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
			<li><a href="<?php echo site_url('manage/penggajian') ?>">Manage Penggajian</a></li>
			<li class="active"><?php echo isset($title) ? '' . $title : null; ?></li>
		</ol>
	</section>

	<!-- Main content -->
	<!-- Main content -->
	<section class="content">
	    <div class="row">
			<div class="col-md-9">
    	        <div class="box">
				<table class="table">
    	               <tr>
    	                   <td width="200">Unit</td>
    	                   <td width="4">:</td>
    	                   <td><?php echo $inputMajorsValue ?></td>
    	               </tr>
    	               <tr>
    	                   <td>NIP</td>
    	                   <td>:</td>
    	                   <td><?php echo $inputNipValue ?></td>
    	               </tr>
    	               <tr>
    	                   <td>Nama</td>
    	                   <td>:</td>
    	                   <td><?php echo $inputNameValue ?></td>
    	               </tr>
    	               <tr>
    	                   <td>Jabatan</td>
    	                   <td>:</td>
    	                   <td><?php echo $inputPositionValue ?></td>
    	               </tr>
    	           </table>
    	        </div>
	        </div>
	    </div>
		<?php echo form_open_multipart(current_url()); ?>
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-md-9">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
					    		    
					    <div class="form-group">
    					    <div class="row">
    					    <div class="col-md-3">
    						<label>Akun Gaji<small data-toggle="tooltip" title="Wajib diisi">*</small></label>
    						</div>
    					    <div class="col-md-1"><label> = </label></div>
    					    <div class="col-md-4">
    					    <select required="" name="gaji_account_id" class="form-control">
        							    <option value="">-Pilih Kode Akun-</option>
        							    <?php foreach($account as $row){?>
        							        <option value="<?php echo $row['account_id']; ?>" <?php echo ($inputAccountValue == $row['account_id']) ? 'selected' : '' ?>><?php echo $row['account_code'].' - '.$row['account_description'] ?></option>
        							    <?php } ?>
        					</select>
    					    </div>
    					    <div class="col-md-1">
    					    </div>
    					    </div>
    					</div>
    					
					    <div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_1" data-toggle="tab">Gaji</a></li>
								<li><a href="#tab_2" data-toggle="tab">Tunjangan</a></li>
								<li><a href="#tab_3" data-toggle="tab">Potongan</a></li>
							</ul>
							<div class="tab-content">
							    
								<div class="tab-pane active" id="tab_1">
								    
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-3">
                						    <label>Gaji Pokok <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                					    </div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-4">
                					        <input name="premier_pokok" type="text" class="form-control" value="<?php echo $inputPokokValue ?>" required="" placeholder="Gaji Pokok">
                					    </div>
                					    </div>
                					</div>
                
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-3">
                						<label>Fungsional <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-4">
                						<input name="premier_fungsional" type="text" class="form-control" value="<?php echo $inputFungsionalValue ?>" required="" placeholder="Fungsional">
                						</div>
                					    </div>
                					</div>
                
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-3">
                						<label>Tugas Tambahan <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-4">
                						<input name="premier_tambahan" type="text" class="form-control" value="<?php echo $inputTambahanValue ?>" required="" placeholder="Tugas Tambahan">
                						</div>
                					    </div>
                					</div>
                					
								</div>
								
								<div class="tab-pane" id="tab_2">
								    
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-3">
                						    <label>Transport <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                					    </div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-4">
                					        <input name="sekunder_transport" type="text" class="form-control" value="<?php echo $inputTransportValue ?>" required="" placeholder="Transport">
                					    </div>
                					    </div>
                					</div>
								    
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-3">
                						    <label>HR Lebih / Kurang Jam <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                					    </div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-4">
                					        <input name="sekunder_hr" type="text" class="form-control" value="<?php echo $inputHrValue ?>" required="" placeholder="HR Lebih / Kurang Jam">
                					    </div>
                					    </div>
                					</div>
								    
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-3">
                						    <label>Penyesuian Gaji <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                					    </div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-4">
                					        <input name="sekunder_penyesuaian" type="text" class="form-control" value="<?php echo $inputPenyesuaianValue ?>" required="" placeholder="Penyesuian Gaji">
                					    </div>
                					    </div>
                					</div>
								    
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-3">
                						    <label>Tunj. Kepala Kel.<small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                					    </div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-4">
                					        <input name="sekunder_kepala_keluarga" type="text" class="form-control" value="<?php echo $inputKepalaKeluargaValue ?>" required="" placeholder="Tunj. Kepala Kel.">
                					    </div>
                					    </div>
                					</div>
								    
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-3">
                						    <label>Piket <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                					    </div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-4">
                					        <input name="sekunder_piket" type="text" class="form-control" value="<?php echo $inputPiketValue ?>" required="" placeholder="Piket">
                					    </div>
                					    </div>
                					</div>
								    
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-3">
                						    <label>Kurleb <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                					    </div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-4">
                					        <input name="sekunder_kurleb" type="text" class="form-control" value="<?php echo $inputKurlebValue ?>" required="" placeholder="Kurleb">
                					    </div>
                					    </div>
                					</div>
								    
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-3">
                						    <label>Kurleb <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                					    </div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-4">
                					        <input name="sekunder_kurleb" type="text" class="form-control" value="<?php echo $inputKurlebValue ?>" required="" placeholder="Kurleb">
                					    </div>
                					    </div>
                					</div>
								    
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-3">
                						    <label>Koreksi Bulan Lalu <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                					    </div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-4">
                					        <input name="sekunder_koreksi" type="text" class="form-control" value="<?php echo $inputKoreksiValue ?>" required="" placeholder="Koreksi Bulan Lalu">
                					    </div>
                					    </div>
                					</div>
								    
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-3">
                						    <label>Lain-lain <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                					    </div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-4">
                					        <input name="sekunder_lain" type="text" class="form-control" value="<?php echo $inputTunjLainValue ?>" required="" placeholder="Lain-lain">
                					    </div>
                					    </div>
                					</div>
                					
								</div>
								
								<div class="tab-pane" id="tab_3">
								    
								    <div class="form-group">
                					    <div class="row">
                					    <div class="col-md-3">
                						<label>Absen <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-4">
                						<input name="potongan_absen" type="text" class="form-control" value="<?php echo $inputAbsenValue ?>" required="" placeholder="Absen">
                						</div>
                					    </div>
                					</div>
                
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-3">
                						<label>Infak <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-4">
                						<input name="potongan_infak" type="text" class="form-control" value="<?php echo $inputInfakValue ?>" required="" placeholder="Infak">
                						</div>
                					    </div>
                					</div>
								    
								    <div class="form-group">
                					    <div class="row">
                					    <div class="col-md-3">
                						<label>BMT <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-4">
                						<input name="potongan_bmt" type="text" class="form-control" value="<?php echo $inputBmtValue ?>" required="" placeholder="BMT">
                						</div>
                					    </div>
                					</div>
                
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-3">
                						<label>Koperasi <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-4">
                						<input name="potongan_koperasi" type="text" class="form-control" value="<?php echo $inputKoperasiValue ?>" required="" placeholder="Koperasi">
                						</div>
                					    </div>
                					</div>
                
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-3">
                						<label>Qurban <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-4">
                						<input name="potongan_qurban" type="text" class="form-control" value="<?php echo $inputQurbanValue ?>" required="" placeholder="Qurban">
                						</div>
                					    </div>
                					</div>
                
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-3">
                						<label>Lain-lain <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-4">
                						<input name="potongan_lain" type="text" class="form-control" value="<?php echo $inputPotonganLainValue ?>" required="" placeholder="Lain-lain">
                						</div>
                					    </div>
                					</div>
                
                					<div class="form-group">
                					    <div class="row">
                					    <div class="col-md-3">
                						<label>SPP Anak <small data-toggle="tooltip" title="Wajib diisi">*</small></label>
                						</div>
                					    <div class="col-md-1"><label> = </label></div>
                					    <div class="col-md-4">
                						<input name="potongan_spp_anak" type="text" class="form-control" value="<?php echo $inputSppAnakValue ?>" required="" placeholder="SPP Anak">
                						</div>
                					    </div>
                					</div>
								    
								</div>
							</div>
						</div>
    					<?php if (isset($employee)) { ?>
    						<input type="hidden" name="employee_id" value="<?php echo $employee['employee_id']; ?>">
    					<?php } ?>
    
						<p class="text-muted">*) Kolom wajib diisi.</p>
                	    <button type="submit" class="btn btn-md btn-success">Simpan</button>
                	    <a href="<?php echo site_url('manage/penggajian')?>" type="button" class="btn btn-md btn-info">Kembali</a>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</div>
		<?php echo form_close(); ?>
		<!-- /.row -->
	</section>
</div>

<script>

	function getId(id) {
		$('#studentId').val(id)
	}
</script>