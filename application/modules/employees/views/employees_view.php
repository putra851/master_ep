<script type="text/javascript" src="<?php echo media_url('js/jquery-migrate-3.0.0.min.js') ?>"></script>
<?php $id = $this->uri->segment('4')?>
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

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-md-6">
				<div class="box box-success">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-12 col-sm-12 col-xs-12 pull-left">
							<br>
							<div class="row">
								<div class="col-md-2">
									<?php if (!empty($employee['employee_photo'])) { ?>
									<img src="<?php echo upload_url('employee/'.$employee['employee_photo']) ?>" class="img-responsive avatar">
									<?php } else { ?>
									<img src="<?php echo media_url('img/user.png') ?>" class="img-responsive avatar">
									<?php } ?>
								</div>
								<div class="col-md-10">
									<table class="table table-hover">
										<tbody>
											<tr>
												<td>NIY Pegawai</td>
												<td>:</td>
												<td><?php echo $employee['employee_nip'] ?></td>
											</tr>
											<tr>
												<td>Nama lengkap</td>
												<td>:</td>
												<td><?php echo $employee['employee_name'] ?></td>
											</tr>
											<tr>
												<td>Jenis Kelamin</td>
												<td>:</td>
												<td><?php echo ($employee['employee_gender']=='L')? 'Laki-laki' : 'Perempuan' ?></td>
											</tr>
											<tr>
												<td>Tempat, Tanggal Lahir</td>
												<td>:</td>
												<td><?php echo $employee['employee_born_place'].', '. pretty_date($employee['employee_born_date'],'d F Y',false) ?></td>
											</tr>
											<tr>
												<td>Pendidikan Terakhir</td>
												<td>:</td>
												<td><?php echo $employee['employee_strata'] ?></td>
											</tr>
											<tr>
												<td>Alamat</td>
												<td>:</td>
												<td><?php echo $employee['employee_address'] ?></td>
											</tr>
											</tr>
											<tr>
												<td>Unit Sekolah</td>
												<td>:</td>
												<td><?php echo ($employee['position_majors_id'] != '99')?$employee['majors_short_name']:'Lainnya'; ?></td>
											</tr>
											<tr>
												<td>Jabatan</td>
												<td>:</td>
												<td><?php echo $employee['position_name'] ?></td>
											</tr>
											<tr>
												<td>Status Kepegawaian</td>
												<td>:</td>
												<td><?php if ($employee['employee_category'] == '1') {
													echo 'Magang';
												} else if ($employee['employee_category'] == '2') {
													echo 'Kontrak';
												} else if ($employee['employee_category'] == '3'){
													echo 'GTT / PTT';
												} else if ($employee['employee_category'] == '4'){
													echo 'GTY / PTY';
												} else if ($employee['employee_category'] == '5'){
													echo 'GTYP / PTYP';
												} else {
													echo '-';
												} ?></td>
											</tr>
											<tr>
												<td>No. Handphone</td>
												<td>:</td>
												<td><?php echo $employee['employee_phone'] ?></td>
											</tr>
											<tr>
												<td>Email</td>
												<td>:</td>
												<td><?php echo $employee['employee_email'] ?></td>
											</tr>
											<tr>
												<td>Masa Kerja</td>
												<td>:</td>
												<td>
												    <?php
												    $start = date_create($employee['employee_start']);
												    if($employee['employee_end']!='0000-00-00'){
												        $end = date_create($employee['employee_end']); }
												    else{
												        $end = date_create();
												    }
												    
												    $interval = date_diff($start, $end);
												    echo $interval->y.' tahun '.$interval->m.' bulan '.$interval->d.' hari ';
												    ?>
												</td>
											</tr>
											<tr>
												<td>Status</td>
												<td>:</td>
												<td>
												<?php 
												if
												($employee['employee_status']=='1')
												{
												    echo 'Aktif';
												}
												else{
												    echo 'Tidak Aktif';
												}
												?>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="col-md-6">
									<a href="<?php echo site_url('manage/employees') ?>" class="btn btn-sm btn-default">
										<i class="fa fa-arrow-circle-o-left"></i> Kembali
									</a>
									<a href="<?php echo site_url('manage/employees/edit/' . $employee['employee_id']) ?>" class="btn btn-sm btn-success">
										<i class="fa fa-edit"></i> Edit
									</a>
									<a href="#delModal<?php echo $employee['employee_id']; ?>" data-toggle="modal" class="btn btn-sm btn-danger"><i class="fa fa-trash" data-toggle="tooltip" title="Hapus"></i> Hapus</a>
								</div>
								<div class="pull-right">
									<a href="<?php echo site_url('manage/employees/printEmployees/' . $employee['employee_id']) ?>" class="btn btn-sm" target="_blank" title="Cetak PDF"><i class="fa fa-print"></i> Cetak PDF</a>
								</div>
							</div>
							<!-- /.box-body -->
						</div>
					</div>
				</div>
				<!-- /.row -->
				<div class="modal modal-default fade" id="delModal<?php echo $employee['employee_id']; ?>">
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
									<?php echo form_open('manage/employees/delete/' . $employee['employee_id']); ?>
									<input type="hidden" name="employee_id" value="<?php echo $employee['employee_id']; ?>">
									<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
									<button type="submit" class="btn btn-danger"><span class="fa fa-check"></span> Hapus</button>
									<?php echo form_close(); ?>
								</div>
							</div>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					</div>
                    </div>
                    
            <div class="col-md-6">
				<div class="box box-success">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-12 col-sm-12 col-xs-12">
					    <h3>Riwayat Pendidikan</h3>
					    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addEducation<?php echo $id; ?>"><i class="fa fa-plus"></i> Tambah</button>
							<table class="table table-bordered table-hover">
							    <thead>
							        <tr>
    							        <th>No</th>
    							        <th>Thn Masuk</th>
    							        <th>Thn Lulus</th>
    							        <th>Sekolah/Universitas</th>
    							        <th>Lokasi</th>
    							        <th>Aksi</th>
							        </tr>
							    </thead>
							    <tbody>
						        <?php 
						            $no = 1;
						            foreach($education as $row){
						        ?>
							        <tr>
    							        <td>
    							            <?php echo $no++ ?>
    							        </td>
    							        <td>
    							            <?php echo $row['education_start'] ?>
    							        </td>
    							        <td>
    							            <?php echo $row['education_end'] ?>
    							        </td>
    							        <td>
    							            <?php echo $row['education_name'] ?>
    							        </td>
    							        <td>
    							            <?php echo $row['education_location'] ?>
    							        </td>
    							        <td>
											<a href="#uplEdu<?php echo $row['education_id']; ?>" data-toggle="modal" class="btn btn-xs btn-info"><i class="fa fa-upload" data-toggle="tooltip" title="Upload"></i></a>
											<a href="#dwlEdu<?php echo $row['education_id']; ?>" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-download" data-toggle="tooltip" title="Download"></i></a>
    							            <a href="#delEdu<?php echo $row['education_id']; ?>" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
    							        </td>
                                    </tr>
									<!-- /.Delete Education -->
									<div class="modal modal-default fade" id="delEdu<?php echo $row['education_id']; ?>">
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
													<?php echo form_open('manage/employees/delete_education/' . $row['education_id']); ?>
													<input type="hidden" name="employee_id" value="<?php echo $row['education_employee_id']; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
													<button type="submit" class="btn btn-danger"><span class="fa fa-check"></span> Hapus</button>
													<?php echo form_close(); ?>
												</div>
											</div>
										</div>
									</div>
									<!-- /.download education -->
									<div class="modal modal-default fade" id="dwlEdu<?php echo $row['education_id']; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span></button>
														<h3 class="modal-title"><span class="fa fa-download"></span> Dokumen Preview</h3>
												</div>
												<div class="modal-body">
													 
													<a href="#" class="thumbnail">
														<?php if (isset($row) AND $row['education_photo'] != NULL) { 
															$p=  $row['education_photo']; 
															$explode = explode(".", $p);
															$ext = $explode[1];
															if ($ext=='jpg'){
																?><img src="<?php echo upload_url('education/' . $row['education_photo']) ?>" class="img-responsive avatar"><?php
															}else if($ext=='png'){
																?><img src="<?php echo upload_url('education/' . $row['education_photo']) ?>" class="img-responsive avatar"><?php
															}else{
																?><iframe src="<?php echo upload_url('education/' . $row['education_photo']) ?>" width="100%" height="400px"></iframe>
																<a src="<?php echo upload_url('education/' . $row['education_photo']) ?>"></a><?php
															}?>
														<?php } else { ?>
														<img id="target" alt="Choose image to upload">
														<?php } ?>
													</a>
												</div>
												<div class="modal-footer">
													<?php echo form_open('manage/employees/download_education/' . $row['education_id']); ?>
													<input type="hidden" name="employee_id" value="<?php echo $row['education_employee_id']; ?>">
													<input type="hidden" name="education_id" value="<?php echo $row['education_id']; ?>">
													<input type="hidden" name="education_photo" value="<?php echo $row['education_photo']; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
													<button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Download</button>
													<?php echo form_close(); ?>
												</div>
											</div>
										</div>
									</div>
									<!-- Upload Education -->
									<div class="modal fade" id="uplEdu<?php echo $row['education_id']; ?>" role="dialog">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Upload File Riwayat Pendidikan</h4>
												</div>
												<?php echo form_open_multipart('manage/employees/upload_education', array('method'=>'post')); ?>
												<div class="modal-body">
													<input type="hidden" class="form-control" required="" name="education_id" value="<?php echo $row['education_id']; ?>">
													<input type="hidden" class="form-control" required="" name="employee_id" value="<?php echo $row['education_employee_id']; ?>">
													<div id="p_scents_education">
														<div class="row">
														<div class="col-md-3">
															<label>Tahun Masuk/Lulus : <?php echo $row['education_start']; ?>/<?php echo $row['education_end']; ?></label>
															<br>
															<label>Sekolah/Universitas : <?php echo $row['education_name']; ?></label>
															<br>
															<label>Lokasi : <?php echo $row['education_location']; ?></label>
														</div>
														
														</div>
													</div>
													<a href="#" class="thumbnail">
														<?php if (isset($row) AND $row['education_photo'] != NULL) { 
															$p=  $row['education_photo']; 
															$explode = explode(".", $p);
															$ext = $explode[1];
															if ($ext=='jpg'){
																?><img src="<?php echo upload_url('education/' . $row['education_photo']) ?>" class="img-responsive avatar"><?php
															}else if($ext=='png'){
																?><img src="<?php echo upload_url('education/' . $row['education_photo']) ?>" class="img-responsive avatar"><?php
															}else{
																?><iframe src="<?php echo upload_url('education/' . $row['education_photo']) ?>" width="100%" height="400px"></iframe>
																<a src="<?php echo upload_url('education/' . $row['education_photo']) ?>"></a><?php
															}?>
														<?php } else { ?>
														<img id="target" alt="Choose image to upload">
														<?php } ?>
													</a>
													<br>
													<input type='file' id="education_photo" name="education_photo">
													*Silahkan Upload ulang jika file perlu di update
													<br>
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-success">Upload</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
												<?php echo form_close(); ?>
											</div>
										</div>
									</div>
                                <?php
						            }
                                ?>
							    </tbody>
							</table>
						</div>
				    </div>
				</div>
		    </div>
		    <div class="col-md-6">
				<div class="box box-success">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-12 col-sm-12 col-xs-12">
					    <h3>Riwayat Seminar & Pelatihan</h3>
					    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addWorkshop<?php echo $id; ?>"><i class="fa fa-plus"></i> Tambah</button>
							<table class="table table-bordered table-hover">
							    <thead>
							        <tr>
    							        <th>No</th>
    							        <th>Mulai</th>
    							        <th>Selesai</th>
    							        <th>Penyelenggara</th>
    							        <th>Lokasi</th>
    							        <th>Aksi</th>
    							    </tr>
							    </thead>
							    <tbody>
							    <?php 
						            $no = 1;
						            foreach($workshop as $row){
						        ?>
							        <tr>
    							        <td>
    							            <?php echo $no++ ?>
    							        </td>
    							        <td>
    							            <?php echo pretty_date($row['workshop_start'],"d-m-Y",FALSE) ?>
    							        </td>
    							        <td>
    							            <?php echo pretty_date($row['workshop_end'],"d-m-Y",FALSE) ?>
    							        </td>
    							        <td>
    							            <?php echo $row['workshop_organizer'] ?>
    							        </td>
    							        <td>
    							            <?php echo $row['workshop_location'] ?>
    							        </td>
    							        <td>
											<a href="#uplWork<?php echo $row['workshop_id']; ?>" data-toggle="modal" class="btn btn-xs btn-info"><i class="fa fa-upload" data-toggle="tooltip" title="Upload"></i></a>
											<a href="#dwlWork<?php echo $row['workshop_id']; ?>" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-download" data-toggle="tooltip" title="Download"></i></a>
    							            <a href="#delWork<?php echo $row['workshop_id']; ?>" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
    							        </td>
                                    </tr>
									<!-- --------Delete workshop---------- -->
                                    <div class="modal modal-default fade" id="delWork<?php echo $row['workshop_id']; ?>">
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
															<?php echo form_open('manage/employees/delete_workshop/' . $row['workshop_id']); ?>
															<input type="hidden" name="employee_id" value="<?php echo $row['workshop_employee_id']; ?>">
															<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
															<button type="submit" class="btn btn-danger"><span class="fa fa-check"></span> Hapus</button>
															<?php echo form_close(); ?>
														</div>
													</div>
													<!-- /.modal-content -->
											</div>
												<!-- /.modal-dialog -->
									</div>
									<!-- /.download workshop -->
									<div class="modal modal-default fade" id="dwlWork<?php echo $row['workshop_id']; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span></button>
														<h3 class="modal-title"><span class="fa fa-download"></span> Dokumen Preview</h3>
												</div>
												<div class="modal-body">
												<a href="#" class="thumbnail">
														<?php if (isset($row) AND $row['workshop_id'] != NULL) { 
															$p=  $row['workshop_photo']; 
															$explode = explode(".", $p);
															$ext = $explode[1];
															if ($ext=='jpg'){
																?><img src="<?php echo upload_url('workshop/' . $row['workshop_photo']) ?>" class="img-responsive avatar"><?php
															}else if($ext=='png'){
																?><img src="<?php echo upload_url('workshop/' . $row['workshop_photo']) ?>" class="img-responsive avatar"><?php
															}else{
																?><iframe src="<?php echo upload_url('workshop/' . $row['workshop_photo']) ?>" width="100%" height="400px"></iframe>
																<a src="<?php echo upload_url('workshop/' . $row['workshop_photo']) ?>"></a><?php
															}?>
														<?php } else { ?>
														<img id="target" alt="Choose image to upload">
														<?php } ?>
													</a>
												</div>
												<div class="modal-footer">
													<?php echo form_open('manage/employees/download_workshop/' . $row['workshop_id']); ?>
													<input type="hidden" name="employee_id" value="<?php echo $row['workshop_employee_id']; ?>">
													<input type="hidden" name="workshop_id" value="<?php echo $row['workshop_id']; ?>">
													<input type="hidden" name="workshop_photo" value="<?php echo $row['workshop_photo']; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
													<button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Download</button>
													<?php echo form_close(); ?>
												</div>
											</div>
										</div>
									</div>
									<!-- Upload workshop -->
									<div class="modal fade" id="uplWork<?php echo $row['workshop_id']; ?>" role="dialog">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Upload File Riwayat Pendidikan</h4>
												</div>
												<?php echo form_open_multipart('manage/employees/upload_workshop', array('method'=>'post')); ?>
												<div class="modal-body">
													<input type="hidden" class="form-control" required="" name="workshop_id" value="<?php echo $row['workshop_id']; ?>">
													<input type="hidden" class="form-control" required="" name="employee_id" value="<?php echo $row['workshop_employee_id']; ?>">
													<div id="p_scents_workshop">
														<div class="row">
														<div class="col-md-3">
															<label>Tanggal Workshop : <?php echo $row['workshop_start']; ?> Sampai <?php echo $row['workshop_end']; ?></label>
															<br>
															<label>Penyelenggara : <?php echo $row['workshop_organizer']; ?></label>
															<br>
															<label>Lokasi : <?php echo $row['workshop_location']; ?></label>
														</div>
														
														</div>
													</div>
													<a href="#" class="thumbnail">
														<?php if (isset($row) AND $row['workshop_photo'] != NULL) {  
															$p=  $row['workshop_photo']; 
															$explode = explode(".", $p);
															$ext = $explode[1];
															if ($ext=='jpg'){
																?><img src="<?php echo upload_url('workshop/' . $row['workshop_photo']) ?>" class="img-responsive avatar"><?php
															}else if($ext=='png'){
																?><img src="<?php echo upload_url('workshop/' . $row['workshop_photo']) ?>" class="img-responsive avatar"><?php
															}else{
																?><iframe src="<?php echo upload_url('workshop/' . $row['workshop_photo']) ?>" width="100%" height="400px"></iframe>
																<a src="<?php echo upload_url('workshop/' . $row['workshop_photo']) ?>"></a><?php
															}?>
														<?php } else { ?>
														<img id="target" alt="Choose image to upload">
														<?php } ?>
													</a>
													<br>
													<input type='file' id="workshop_photo" name="workshop_photo">
													*Silahkan Upload ulang jika file perlu di update
													<br>
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-success">Upload</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
												<?php echo form_close(); ?>
											</div>
										</div>
									</div>
                                <?php
						            }
                                ?>
							    </tbody>
							</table>
						</div>
					   </div>
				</div>
            </div>
        </div>
	</section>
	
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-md-6">
				<div class="box box-success">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-12 col-sm-12 col-xs-12">
					    <h3>Data Keluarga</h3>
					    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addFamily<?php echo $id; ?>"><i class="fa fa-plus"></i> Tambah</button>
							<table class="table table-bordered table-hover">
							    <thead>
							        <tr>
    							        <th>No</th>
    							        <th>Nama</th>
    							        <th>Hubungan</th>
    							        <th>Aksi</th>
							        </tr>
							    </thead>
							    <tbody>
							    <?php 
						            $no = 1;
						            foreach($family as $row){
						        ?>
							        <tr>
    							        <td>
    							            <?php echo $no++ ?>
    							        </td>
    							        <td>
    							            <?php echo $row['fam_name'] ?>
    							        </td>
    							        <td>
    							            <?php 
    							                if($row['fam_desc'] == '1'){
    							                    echo 'Istri';
    							                } else if($row['fam_desc'] == '2'){
    							                    echo 'Suami';
    							                    
    							                } else if($row['fam_desc'] == '3'){
    							                    echo 'Anak';
    							                } else if($row['fam_desc'] == '4'){
    							                    echo 'Ayah';
    							                    
    							                } else if($row['fam_desc'] == '5'){
    							                    echo 'Ibu';
    							                } else {
    							                    echo 'Lainnya';
    							                }
    							            ?>
    							        </td>
    							        <td>
											<a href="#delFam<?php echo $row['fam_id']; ?>" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
    							        </td>
                                    </tr>
									<!-- ---------Delete data keluarga------->
                                    <div class="modal modal-default fade" id="delFam<?php echo $row['fam_id']; ?>">
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
													<?php echo form_open('manage/employees/delete_family/' . $row['fam_id']); ?>
													<input type="hidden" name="employee_id" value="<?php echo $row['fam_employee_id']; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
													<button type="submit" class="btn btn-danger"><span class="fa fa-check"></span> Hapus</button>
													<?php echo form_close(); ?>
												</div>
											</div>
											<!-- /.modal-content -->
										</div>
										<!-- /.modal-dialog -->
									</div>
									
                                <?php
						            }
                                ?>
							    </tbody>
							</table>
						</div>
					   </div>
				</div>
		    </div>
		    <div class="col-md-6">
				<div class="box box-success">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-12 col-sm-12 col-xs-12">
					    <h3>Riwayat Jabatan</h3>
					    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addPosition<?php echo $id; ?>"><i class="fa fa-plus"></i> Tambah</button>
							<table class="table table-bordered table-hover">
							    <thead>
							        <tr>
    							        <th>No</th>
    							        <th>Tahun Mulai</th>
    							        <th>Tahun Selesai</th>
    							        <th>Keterangan</th>
    							        <th>Aksi</th>
    							    </tr>
							    </thead>
							    <tbody>
							    <?php 
						            $no = 1;
						            foreach($position as $row){
						        ?>
							        <tr>
    							        <td>
    							            <?php echo $no++ ?>
    							        </td>
    							        <td>
    							            <?php echo pretty_date($row['poshistory_start'],"d-m-Y",FALSE) ?>
    							        </td>
    							        <td>
    							            <?php echo pretty_date($row['poshistory_end'],"d-m-Y",FALSE) ?>
    							        </td>
    							        <td>
    							            <?php echo $row['poshistory_desc'] ?>
    							        </td>
    							        <td>
											<a href="#uplPosition<?php echo $row['poshistory_id']; ?>" data-toggle="modal" class="btn btn-xs btn-info"><i class="fa fa-upload" data-toggle="tooltip" title="Upload"></i></a>
											<a href="#dwlPosition<?php echo $row['poshistory_id']; ?>" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-download" data-toggle="tooltip" title="Download"></i></a>
    							            <a href="#delPosition<?php echo $row['poshistory_id']; ?>" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
    							        </td>
                                    </tr>
									<!-- Delete poshistory-->
                                    <div class="modal modal-default fade" id="delPosition<?php echo $row['poshistory_id']; ?>">
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
														<?php echo form_open('manage/employees/delete_position/' . $row['poshistory_id']); ?>
														<input type="hidden" name="employee_id" value="<?php echo $row['poshistory_employee_id']; ?>">
														<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
														<button type="submit" class="btn btn-danger"><span class="fa fa-check"></span> Hapus</button>
														<?php echo form_close(); ?>
													</div>
												</div>
												<!-- /.modal-content -->
										</div>
										<!-- /.modal-dialog -->
									</div>
									<!-- /.download poshistory -->
									<div class="modal modal-default fade" id="dwlPosition<?php echo $row['poshistory_id']; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span></button>
														<h3 class="modal-title"><span class="fa fa-download"></span>Download Dokumen</h3>
												</div>
												<div class="modal-body">
												<a href="#" class="thumbnail">
														<?php if (isset($row) AND $row['poshistory_photo'] != NULL) {  
															$p=  $row['poshistory_photo']; 
															$explode = explode(".", $p);
															$ext = $explode[1];
															if ($ext=='jpg'){
																?><img src="<?php echo upload_url('poshistory/' . $row['poshistory_photo']) ?>" class="img-responsive avatar"><?php
															}else if($ext=='png'){
																?><img src="<?php echo upload_url('poshistory/' . $row['poshistory_photo']) ?>" class="img-responsive avatar"><?php
															}else{
																?><iframe src="<?php echo upload_url('poshistory/' . $row['poshistory_photo']) ?>" width="100%" height="400px"></iframe>
																<a src="<?php echo upload_url('poshistory/' . $row['poshistory_photo']) ?>"></a><?php
															}?>
														<?php } else { ?>
														<img id="target" alt="Choose image to upload">
														<?php } ?>
													</a>
												</div>
												<div class="modal-footer">
													<?php echo form_open('manage/employees/download_poshistory/' . $row['poshistory_id']); ?>
													<input type="hidden" name="employee_id" value="<?php echo $row['poshistory_employee_id']; ?>">
													<input type="hidden" name="poshistory_id" value="<?php echo $row['poshistory_id']; ?>">
													<input type="hidden" name="poshistory_photo" value="<?php echo $row['poshistory_photo']; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
													<button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Download</button>
													<?php echo form_close(); ?>
												</div>
											</div>
										</div>
									</div>
									<!-- Upload poshistory -->
									<div class="modal fade" id="uplPosition<?php echo $row['poshistory_id']; ?>" role="dialog">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Upload File Riwayat Pendidikan</h4>
												</div>
												<?php echo form_open_multipart('manage/employees/upload_poshistory', array('method'=>'post')); ?>
												<div class="modal-body">
													<input type="hidden" class="form-control" required="" name="poshistory_id" value="<?php echo $row['poshistory_id']; ?>">
													<input type="hidden" class="form-control" required="" name="employee_id" value="<?php echo $row['poshistory_employee_id']; ?>">
													<div id="p_scents_poshistory">
														<div class="row">
														<div class="col-md-3">
															<label>Tanggal position : <?php echo $row['poshistory_start']; ?> Sampai <?php echo $row['poshistory_end']; ?></label>
															<br>
															<label>Keterangan : <?php echo $row['poshistory_desc']; ?></label>
														</div>
														</div>
													</div>
													<a href="#" class="thumbnail">
														<?php if (isset($row) AND $row['poshistory_photo'] != NULL) {  
															$p=  $row['poshistory_photo']; 
															$explode = explode(".", $p);
															$ext = $explode[1];
															if ($ext=='jpg'){
																?><img src="<?php echo upload_url('poshistory/' . $row['poshistory_photo']) ?>" class="img-responsive avatar"><?php
															}else if($ext=='png'){
																?><img src="<?php echo upload_url('poshistory/' . $row['poshistory_photo']) ?>" class="img-responsive avatar"><?php
															}else{
																?><iframe src="<?php echo upload_url('poshistory/' . $row['poshistory_photo']) ?>" width="100%" height="400px"></iframe>
																<a src="<?php echo upload_url('poshistory/' . $row['poshistory_photo']) ?>"></a><?php
															}?>
														<?php } else { ?>
														<img id="target" alt="Choose image to upload">
														<?php } ?>
													</a>
													<br>
													<input type='file' id="poshistory_photo" name="poshistory_photo">
													*Silahkan Upload ulang jika file perlu di update
													<br>
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-success">Upload</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
												<?php echo form_close(); ?>
											</div>
										</div>
									</div>
                                <?php
						            }
                                ?>
							    </tbody>
							</table>
						</div>
					   </div>
				</div>
		    </div>
        </div>
	</section>
	
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-md-6">
				<div class="box box-success">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-12 col-sm-12 col-xs-12">
					    <h3>Riwayat Mengajar</h3>
					    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addTeaching<?php echo $id; ?>"><i class="fa fa-plus"></i> Tambah</button>
							<table class="table table-bordered table-hover">
							    <thead>
							        <tr>
    							        <th>No</th>
    							        <th>Tahun Mulai</th>
    							        <th>Tahun Selesai</th>
    							        <th>Mata Pelajaran</th>
    							        <th>Keterangan</th>
    							        <th>Aksi</th>
    							    </tr>
							    </thead>
							    <tbody>
							    <?php 
						            $no = 1;
						            foreach($teaching as $row){
						        ?>
							        <tr>
    							        <td>
    							            <?php echo $no++ ?>
    							        </td>
    							        <td>
    							            <?php echo pretty_date($row['teaching_start'],"d-m-Y",FALSE) ?>
    							        </td>
    							        <td>
    							            <?php echo pretty_date($row['teaching_end'],"d-m-Y",FALSE) ?>
    							        </td>
    							        <td>
    							            <?php echo $row['teaching_lesson'] ?>
    							        </td>
    							        <td>
    							            <?php echo $row['teaching_desc'] ?>
    							        </td>
    							        <td>
											<a href="#uplTeaching<?php echo $row['teaching_id']; ?>" data-toggle="modal" class="btn btn-xs btn-info"><i class="fa fa-upload" data-toggle="tooltip" title="Upload"></i></a>
											<a href="#dwlTeaching<?php echo $row['teaching_id']; ?>" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-download" data-toggle="tooltip" title="Download"></i></a>
    							            <a href="#delTeaching<?php echo $row['teaching_id']; ?>" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
    							        </td>
                                    </tr>
									<!----Delete teaching---->
                                    <div class="modal modal-default fade" id="delTeaching<?php echo $row['teaching_id']; ?>">
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
															<?php echo form_open('manage/employees/delete_teaching/' . $row['teaching_id']); ?>
															<input type="hidden" name="employee_id" value="<?php echo $row['teaching_employee_id']; ?>">
															<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
															<button type="submit" class="btn btn-danger"><span class="fa fa-check"></span> Hapus</button>
															<?php echo form_close(); ?>
														</div>
													</div>
													<!-- /.modal-content -->
											</div>
												<!-- /.modal-dialog -->
									</div>
									<!-- /.download Teaching -->
									<div class="modal modal-default fade" id="dwlTeaching<?php echo $row['teaching_id']; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span></button>
														<h3 class="modal-title"><span class="fa fa-download"></span> Preview Dokumen</h3>
												</div>
												<div class="modal-body">
												<a href="#" class="thumbnail">
														<?php if (isset($row) AND $row['teaching_photo'] != NULL) {  
															$p=  $row['teaching_photo']; 
															$explode = explode(".", $p);
															$ext = $explode[1];
															if ($ext=='jpg'){
																?><img src="<?php echo upload_url('teaching/' . $row['teaching_photo']) ?>" class="img-responsive avatar"><?php
															}else if($ext=='png'){
																?><img src="<?php echo upload_url('teaching/' . $row['teaching_photo']) ?>" class="img-responsive avatar"><?php
															}else{
																?><iframe src="<?php echo upload_url('teaching/' . $row['teaching_photo']) ?>" width="100%" height="400px"></iframe>
																<a src="<?php echo upload_url('teaching/' . $row['teaching_photo']) ?>"></a><?php
															}?>
														<?php } else { ?>
														<img id="target" alt="Choose image to upload">
														<?php } ?>
													</a>
												</div>
												<div class="modal-footer">
													<?php echo form_open('manage/employees/download_teaching/' . $row['teaching_id']); ?>
													<input type="hidden" name="employee_id" value="<?php echo $row['teaching_employee_id']; ?>">
													<input type="hidden" name="teaching_id" value="<?php echo $row['teaching_id']; ?>">
													<input type="hidden" name="teaching_photo" value="<?php echo $row['teaching_photo']; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
													<button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Download</button>
													<?php echo form_close(); ?>
												</div>
											</div>
										</div>
									</div>
									<!-- Upload Teaching -->
									<div class="modal fade" id="uplTeaching<?php echo $row['teaching_id']; ?>" role="dialog">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Upload File Riwayat Pendidikan</h4>
												</div>
												<?php echo form_open_multipart('manage/employees/upload_teaching', array('method'=>'post')); ?>
												<div class="modal-body">
													<input type="hidden" class="form-control" required="" name="teaching_id" value="<?php echo $row['teaching_id']; ?>">
													<input type="hidden" class="form-control" required="" name="employee_id" value="<?php echo $row['teaching_employee_id']; ?>">
													<div id="p_scents_teaching">
														<div class="row">
														<div class="col-md-3">
															<label>Tahun Mengajar : <?php echo $row['teaching_start']; ?> Sampai <?php echo $row['teaching_end']; ?></label>
															<br>
															<label> Mata Pelajaran : <?php echo $row['teaching_lesson']; ?></label>
															<br>
															<label>Keterangan : <?php echo $row['teaching_desc']; ?></label>
														</div>
														
														</div>
													</div>
													<a href="#" class="thumbnail">
														<?php if (isset($row) AND $row['teaching_photo'] != NULL) {  
															$p=  $row['teaching_photo']; 
															$explode = explode(".", $p);
															$ext = $explode[1];
															if ($ext=='jpg'){
																?><img src="<?php echo upload_url('teaching/' . $row['teaching_photo']) ?>" class="img-responsive avatar"><?php
															}else if($ext=='png'){
																?><img src="<?php echo upload_url('teaching/' . $row['teaching_photo']) ?>" class="img-responsive avatar"><?php
															}else{
																?><iframe src="<?php echo upload_url('teaching/' . $row['teaching_photo']) ?>" width="100%" height="400px"></iframe>
																<a src="<?php echo upload_url('teaching/' . $row['teaching_photo']) ?>"></a><?php
															}?>
														<?php } else { ?>
														<img id="target" alt="Choose image to upload">
														<?php } ?>
													</a>
													<br>
													<input type='file' id="teaching_photo" name="teaching_photo">
													*Silahkan Upload ulang jika file perlu di update
													<br>
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-success">Upload</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
												<?php echo form_close(); ?>
											</div>
										</div>
									</div>
                                <?php
						            }
                                ?>
							    </tbody>
							</table>
						</div>
					   </div>
				</div>
		    </div>
		    <div class="col-md-6">
				<div class="box box-success">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-12 col-sm-12 col-xs-12">
					    <h3>Penghargaan</h3>
					    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addAchievement<?php echo $id; ?>"><i class="fa fa-plus"></i> Tambah</button>
							<table class="table table-bordered table-hover">
							    <thead>
							        <tr>
    							        <th>No</th>
    							        <th>Tahun</th>
    							        <th>Keterangan</th>
    							        <th>Aksi</th>
    							    </tr>
							    </thead>
							    <tbody><?php 
						            $no = 1;
						            foreach($achievement as $row){
						        ?>
							        <tr>
    							        <td>
    							            <?php echo $no++ ?>
    							        </td>
    							        <td>
    							            <?php echo $row['achievement_year'] ?>
    							        </td>
    							        <td>
    							            <?php echo $row['achievement_name'] ?>
    							        </td>
    							        <td>
											<a href="#uplAchievement<?php echo $row['achievement_id']; ?>" data-toggle="modal" class="btn btn-xs btn-info"><i class="fa fa-upload" data-toggle="tooltip" title="Upload"></i></a>
											<a href="#dwlAchievement<?php echo $row['achievement_id']; ?>" data-toggle="modal" class="btn btn-xs btn-success"><i class="fa fa-download" data-toggle="tooltip" title="Download"></i></a>
    							            <a href="#delAchievement<?php echo $row['achievement_id']; ?>" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
    							        </td>
                                    </tr>
									<!-- Delete achievement-->
                                    <div class="modal modal-default fade" id="delAchievement<?php echo $row['achievement_id']; ?>">
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
															<?php echo form_open('manage/employees/delete_achievement/' . $row['achievement_id']); ?>
															<input type="hidden" name="employee_id" value="<?php echo $row['achievement_employee_id']; ?>">
															<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
															<button type="submit" class="btn btn-danger"><span class="fa fa-check"></span> Hapus</button>
															<?php echo form_close(); ?>
														</div>
													</div>
													<!-- /.modal-content -->
											</div>
												<!-- /.modal-dialog -->
									</div>
									<!-- /.download achievement -->
									<div class="modal modal-default fade" id="dwlAchievement<?php echo $row['achievement_id']; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span></button>
														<h3 class="modal-title"><span class="fa fa-download"></span> Dokumen Preview</h3>
												</div>
												<div class="modal-body">
												<a href="#" class="thumbnail">
														<?php if (isset($row) AND $row['achievement_photo'] != NULL) {   
															$p=  $row['achievement_photo']; 
															$explode = explode(".", $p);
															$ext = $explode[1];
															if ($ext=='jpg'){
																?><img src="<?php echo upload_url('achievement/' . $row['achievement_photo']) ?>" class="img-responsive avatar"><?php
															}else if($ext=='png'){
																?><img src="<?php echo upload_url('achievement/' . $row['achievement_photo']) ?>" class="img-responsive avatar"><?php
															}else{
																?><iframe src="<?php echo upload_url('achievement/' . $row['achievement_photo']) ?>" width="100%" height="400px"></iframe>
																<a src="<?php echo upload_url('achievement/' . $row['achievement_photo']) ?>"></a><?php
															}?>
														<?php } else { ?>
														<img id="target" alt="Choose image to upload">
														<?php } ?>
													</a>
												</div>
												<div class="modal-footer">
													<?php echo form_open('manage/employees/download_achievement/' . $row['achievement_id']); ?>
													<input type="hidden" name="employee_id" value="<?php echo $row['achievement_employee_id']; ?>">
													<input type="hidden" name="achievement_id" value="<?php echo $row['achievement_id']; ?>">
													<input type="hidden" name="achievement_photo" value="<?php echo $row['achievement_photo']; ?>">
													<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
													<button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Download</button>
													<?php echo form_close(); ?>
												</div>
											</div>
										</div>
									</div>
									<!-- Upload achievement -->
									<div class="modal modal-default fade" id="uplAchievement<?php echo $row['achievement_id']; ?>" role="dialog">
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Upload File Riwayat Pendidikan</h4>
												</div>
												<?php echo form_open_multipart('manage/employees/upload_achievement', array('method'=>'post')); ?>
												<div class="modal-body">
													<input type="hidden" class="form-control" required="" name="achievement_id" value="<?php echo $row['achievement_id']; ?>">
													<input type="hidden" class="form-control" required="" name="employee_id" value="<?php echo $row['achievement_employee_id']; ?>">
													<div id="p_scents_achievement">
														<div class="row">
														<div class="col-md-3">
															<label>Penghargaan Tahun : <?php echo $row['achievement_year']; ?> </label>
															<br>
															<label>Nama Penghargaan : <?php echo $row['achievement_name']; ?></label>
														</div>
														
														</div>
													</div>
													<a href="#" class="thumbnail">
														<?php if (isset($row) AND $row['achievement_photo'] != NULL) {    
															$p=  $row['achievement_photo']; 
															$explode = explode(".", $p);
															$ext = $explode[1];
															if ($ext=='jpg'){
																?><img src="<?php echo upload_url('achievement/' . $row['achievement_photo']) ?>" class="img-responsive avatar"><?php
															}else if($ext=='png'){
																?><img src="<?php echo upload_url('achievement/' . $row['achievement_photo']) ?>" class="img-responsive avatar"><?php
															}else{
																?><iframe src="<?php echo upload_url('achievement/' . $row['achievement_photo']) ?>" width="100%" height="400px"></iframe>
																<a src="<?php echo upload_url('achievement/' . $row['achievement_photo']) ?>"></a><?php
															}?>
														<?php } else { ?>
														<img id="target" alt="Choose image to upload">
														<?php } ?>
													</a>
													<br>
													<input type='file' id="achievement_photo" name="achievement_photo">
													*Silahkan Upload ulang jika file perlu di update
													<br>
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-success">Upload</button>
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
												<?php echo form_close(); ?>
											</div>
										</div>
									</div>
                                <?php
						            }
                                ?>
							    </tbody>
							</table>
						</div>
					   </div>
				</div>
		    </div>
        </div>
	</section>
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="col-md-12 col-sm-12 col-xs-12">
					    <h3>Riwayat Status Kepegawaian</h3>
					    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#addStahistory<?php echo $id; ?>"><i class="fa fa-plus"></i> Tambah</button>
							<table class="table table-bordered table-hover">
							    <thead>
							        <tr>
    							        <th>No</th>
    							        <th>Tahun Mulai</th>
    							        <th>Tahun Selesai</th>
    							        <th>Golongan</th>
    							        <th>Status Kepegawaian</th>
    							        <th>Keterangan</th>
    							        <th>Aksi</th>
    							    </tr>
							    </thead>
							    <tbody>
							    <?php 
						            $no = 1;
						            foreach($stahistory as $row){
						        ?>
							        <tr>
    							        <td>
    							            <?php echo $no++ ?>
    							        </td>
    							        <td>
    							            <?php echo pretty_date($row['stahistory_start'],"d-m-Y",FALSE) ?>
    							        </td>
    							        <td>
    							            <?php echo pretty_date($row['stahistory_end'],"d-m-Y",FALSE) ?>
    							        </td>
    							        <td>
    							            <?php echo $row['stahistory_name'] ?>
    							        </td>
    							        <td>
    							            <?php echo $row['stahistory_emp'] ?>
    							        </td>
    							        <td>
    							            <?php echo $row['stahistory_desc'] ?>
    							        </td>
    							        <td>
											
    							            <a href="#delstahistory<?php echo $row['stahistory_id']; ?>" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
    							        </td>
                                    </tr>
									<!----Delete status history---->
                                    <div class="modal modal-default fade" id="delstahistory<?php echo $row['stahistory_id']; ?>">
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
															<?php echo form_open('manage/employees/delete_stahistory/' . $row['stahistory_id']); ?>
															<input type="hidden" name="employee_id" value="<?php echo $row['stahistory_employee_id']; ?>">
															<button type="button" class="btn btn-default pull-left" data-dismiss="modal"><span class="fa fa-close"></span> Batal</button>
															<button type="submit" class="btn btn-danger"><span class="fa fa-check"></span> Hapus</button>
															<?php echo form_close(); ?>
														</div>
													</div>
													<!-- /.modal-content -->
											</div>
												<!-- /.modal-dialog -->
									</div>
									
                                <?php
						            }
                                ?>
							    </tbody>
							</table>
						</div>
					   </div>
				</div>
		    </div>
        </div>
	</section>
</div>

<!-- Modal -->
<!-- Education -->
<div class="modal fade" id="addEducation<?php echo $id ?>" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Riwayat Pendidikan</h4>
			</div>
			<?php echo form_open('manage/employees/add_education', array('method'=>'post')); ?>
			<div class="modal-body">
			    <input type="hidden" class="form-control" required="" name="employee_id" value="<?php echo $id ?>">
				<div id="p_scents_education">
				    <div class="row">
					<div class="col-md-3">
						<label>Tahun Masuk *</label>
						<input type="text" class="form-control" required="" name="thn_masuk[]" class="form-control" placeholder="Contoh : 2010">
					</div>
					<div class="col-md-3">
						<label>Tahun Lulus *</label>
						<input type="text" class="form-control" required="" name="thn_lulus[]" class="form-control" placeholder="Contoh : 2014">
					</div>
					<div class="col-md-3">
						<label>Sekolah/Universitas *</label>
						<input type="text" class="form-control" required="" name="sekolah[]" class="form-control" placeholder="Sekolah/Universitas">
					</div>
					<div class="col-md-3">
						<label>Lokasi *</label>
						<input type="text" required="" name="lokasi[]" class="form-control" placeholder="Contoh : Jakarta">
					</div>
					</div>
				</div>
				<h6 ><a href="#" class="btn btn-xs btn-success" id="addScnt_education"><i class="fa fa-plus"></i><b> Tambah Baris</b></a></h6>
				<span>*) Wajib Diisi</span>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Simpan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<!-- Workshop -->
<div class="modal fade" id="addWorkshop<?php echo $id ?>" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Riwayat Seminar & Pelatihan</h4>
			</div>
			<?php echo form_open('manage/employees/add_workshop', array('method'=>'post')); ?>
			<div class="modal-body">
			    <input type="hidden" class="form-control" required="" name="employee_id" value="<?php echo $id ?>">
				<div id="p_scents_workshop">
				    <div class="row">
					<div class="col-md-3">
						<label>Tanggal Mulai *</label>
							<input class="form-control" required="" type="date" name="start_date[]" placeholder="YYYY/MM/DD">
					</div>
					<div class="col-md-3">
						<label>Tanggal Selesai *</label>
							<input class="form-control" required="" type="date" name="end_date[]" placeholder="Tanggal Selesai">
					</div>
					<div class="col-md-3">
						<label>Penyelenggara *</label>
						<input type="text" class="form-control" required="" name="penyelenggara[]" class="form-control" placeholder="Penyelenggara Workshop">
					</div>
					<div class="col-md-3">
						<label>Lokasi *</label>
						<input type="text" required="" name="lokasi[]" class="form-control" placeholder="Contoh : Jakarta">
					</div>
					</div>
				</div>
				<h6 ><a href="#" class="btn btn-xs btn-success" id="addScnt_workshop"><i class="fa fa-plus"></i><b> Tambah Baris</b></a></h6>
				<span>*) Wajib Diisi</span>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Simpan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<!-- Family Data -->
<div class="modal fade" id="addFamily<?php echo $id ?>" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Data Keluarga</h4>
			</div>
			<?php echo form_open('manage/employees/add_family', array('method'=>'post')); ?>
			<div class="modal-body">
			    <input type="hidden" class="form-control" required="" name="employee_id" value="<?php echo $id ?>">
				<div id="p_scents_family">
				    <div class="row">
					<div class="col-md-6">
						<label>Nama Anggota Keluarga *</label>
							<input class="form-control" required="" type="text" name="fam_name[]" placeholder="Masukkan Nama Anggota Kelurga">
					</div>
					<div class="col-md-4">
						<label>Hubungan *</label>
							<select class="form-control" required="" name="fam_desc[]">
							    <option value="">-Pilih Hubungan-</option>
							    <option value="1">Istri</option>
							    <option value="2">Suami</option>
							    <option value="3">Anak</option>
							    <option value="4">Ayah</option>
							    <option value="5">Ibu</option>
							    <option value="6">Lainnya</option>
						    </select>
					</div>
					</div>
				</div>
				<h6 ><a href="#" class="btn btn-xs btn-success" id="addScnt_family"><i class="fa fa-plus"></i><b> Tambah Baris</b></a></h6>
				<span>*) Wajib Diisi</span>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Simpan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<!-- Position History -->
<div class="modal fade" id="addPosition<?php echo $id ?>" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Riwayat Jabatan</h4>
			</div>
			<?php echo form_open('manage/employees/add_position', array('method'=>'post')); ?>
			<div class="modal-body">
			    <input type="hidden" class="form-control" required="" name="employee_id" value="<?php echo $id ?>">
				<div id="p_scents_position">
				    <div class="row">
					<div class="col-md-4">
						<label>Tahun Mulai *</label>
							<input class="form-control" required="" type="date" name="position_start[]" placeholder="Masukkan Tahun Mulai">
					</div>
					<div class="col-md-4">
						<label>Tahun Selesai *</label>
							<input class="form-control" required="" type="date" name="position_end[]" placeholder="Masukkan Tahun Selesai">
					</div>
					<div class="col-md-4">
						<label>Keterangan *</label>
							<input class="form-control" required="" type="text" name="position_desc[]" placeholder="Masukkan Keterangan">
					</div>
					</div>
				</div>
				<h6 ><a href="#" class="btn btn-xs btn-success" id="addScnt_position"><i class="fa fa-plus"></i><b> Tambah Baris</b></a></h6>
				<span>*) Wajib Diisi</span>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Simpan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<!-- Teaching History -->
<div class="modal fade" id="addTeaching<?php echo $id ?>" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Riwayat Mengajar</h4>
			</div>
			<?php echo form_open('manage/employees/add_teaching', array('method'=>'post')); ?>
			<div class="modal-body">
			    <input type="hidden" class="form-control" required="" name="employee_id" value="<?php echo $id ?>">
				<div id="p_scents_teaching">
				    <div class="row">
					<div class="col-md-3">
						<label>Tahun Mulai *</label>
							<input class="form-control" required="" type="date" name="teaching_start[]" placeholder="Masukkan Tahun Mulai">
					</div>
					<div class="col-md-3">
						<label>Tahun Selesai *</label>
							<input class="form-control" required="" type="date" name="teaching_end[]" placeholder="Masukkan Tahun Selesai">
					</div>
					<div class="col-md-3">
						<label>Mata Pelajaran *</label>
							<input class="form-control" required="" type="text" name="teaching_lesson[]" placeholder="Masukkan Mata Pelajaran">
					</div>
					<div class="col-md-3">
						<label>Keterangan *</label>
							<input class="form-control" required="" type="text" name="teaching_desc[]" placeholder="Masukkan Keterangan">
					</div>
					</div>
				</div>
				<h6 ><a href="#" class="btn btn-xs btn-success" id="addScnt_teaching"><i class="fa fa-plus"></i><b> Tambah Baris</b></a></h6>
				<span>*) Wajib Diisi</span>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Simpan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<!-- Achievement Data -->
<div class="modal fade" id="addAchievement<?php echo $id ?>" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Data Penghargaan</h4>
			</div>
			<?php echo form_open('manage/employees/add_achievement', array('method'=>'post')); ?>
			<div class="modal-body">
			    <input type="hidden" class="form-control" required="" name="employee_id" value="<?php echo $id ?>">
				<div id="p_scents_achievement">
				    <div class="row">
					<div class="col-md-4">
						<label>Tahun *</label>
							<input class="form-control" required="" type="text" name="achievement_year[]" placeholder="Masukkan Tahun">
					</div>
					<div class="col-md-6">
						<label>Nama Penghargaan *</label>
							<input class="form-control" required="" type="text" name="achievement_name[]" placeholder="Masukkan Nama Penghargaan">
					</div>
					</div>
				</div>
				<h6 ><a href="#" class="btn btn-xs btn-success" id="addScnt_achievement"><i class="fa fa-plus"></i><b> Tambah Baris</b></a></h6>
				<span>*) Wajib Diisi</span>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Simpan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<!-- status history -->
<div class="modal fade" id="addStahistory<?php echo $id ?>" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Tambah Riwayat Status Kepegawaian</h4>
			</div>
			<?php echo form_open('manage/employees/add_stahistory', array('method'=>'post')); ?>
			<div class="modal-body">
				<input type="hidden" class="form-control" required="" name="employee_id" value="<?php echo $id ?>">
				<div id="p_scents_stahistory">
				    <div class="row">
					<div class="col-md-6">
						<label>Tanggal Mulai *</label>
							<input class="form-control" required="" type="date" name="start_date[]" placeholder="YYYY/MM/DD">
					</div>
					<div class="col-md-6">
						<label>Tanggal Selesai *</label>
							<input class="form-control" required="" type="date" name="end_date[]" placeholder="Tanggal Selesai">
					</div>
					<div class="col-md-4">
						<label>Golongan *</label>
						<input type="text" class="form-control" required="" name="stahistory_name[]" class="form-control" placeholder="Golongan">
					</div>
					<div class="col-md-4">
						<label>Status Kepegawaian *</label>
						<input type="text" required="" name="stahistory_emp[]" class="form-control" placeholder="Status Kepegawaian">
					</div>
					<div class="col-md-4">
						<label>Keterangan *</label>
						<input type="text" required="" name="stahistory_desc[]" class="form-control" placeholder="Keterangan">
					</div>
					</div>
				</div>
				<h6 ><a href="#" class="btn btn-xs btn-success" id="addScnt_stahistory"><i class="fa fa-plus"></i><b> Tambah Baris</b></a></h6>
				<hr>
				<span>*) Wajib Diisi</span>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Simpan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<!-- addScents -->
<script>
	$(function() {
		var scntEdu = $('#p_scents_education');
		var a = $('#p_scents_education .row').size() + 1;
		$("#addScnt_education").click(function() {
			$('<div class="row"><div class="col-md-3"><label>Tahun Masuk *</label><input type="text" class="form-control" required="" name="thn_masuk[]" class="form-control" placeholder="Contoh : 2010"><a href="#" class="btn btn-xs btn-danger remScnt_education">Hapus Baris</a></div><div class="col-md-3"><label>Tahun Lulus *</label><input type="text" class="form-control" required="" name="thn_lulus[]" class="form-control" placeholder="Contoh : 2014"></div><div class="col-md-3"><label>Sekolah/Universitas *</label><input type="text" class="form-control" required="" name="sekolah[]" class="form-control" placeholder="Sekolah/Universitas"></div><div class="col-md-3"><label>Lokasi *</label><input type="text" required="" name="lokasi[]" class="form-control" placeholder="Contoh : Jakarta"></div></div>').appendTo(scntEdu);
			a++;
			return false;
		});

		$(document).on("click", ".remScnt_education", function() {
			if (a > 2) {
				$(this).parents('.row').remove();
				a--;
			}
			return false;
		});
		
		var scntWork = $('#p_scents_workshop');
		var b = $('#p_scents_workshop .row').size() + 1;
		$("#addScnt_workshop").click(function() {
			$('<div class="row"><div class="col-md-3"><label>Tanggal Mulai *</label><input class="form-control" required="" type="date" name="start_date[]" placeholder="Tanggal Mulai"><a href="#" class="btn btn-xs btn-danger remScnt_workshop">Hapus Baris</a></div><div class="col-md-3"><label>Tanggal Selesai *</label><input class="form-control" required="" type="date" name="end_date[]" placeholder="Tanggal Selesai"></div><div class="col-md-3"><label>Penyelenggara *</label><input type="text" class="form-control" required="" name="penyelenggara[]" class="form-control" placeholder="Penyelenggara Workshop"></div><div class="col-md-3"><label>Lokasi *</label><input type="text" required="" name="lokasi[]" class="form-control" placeholder="Contoh : Jakarta"></div></div>').appendTo(scntWork);
			b++;
			return false;
		});

		$(document).on("click", ".remScnt_workshop", function() {
			if (b > 2) {
				$(this).parents('.row').remove();
				b--;
			}
			return false;
		});
		
		var scntFam = $('#p_scents_family');
		var c = $('#p_scents_family .row').size() + 1;
		$("#addScnt_family").click(function() {
			$('<div class="row"><div class="col-md-6"><label>Nama Anggota Keluarga *</label><input class="form-control" required="" type="text" name="fam_name[]" placeholder="Masukkan Nama Anggota Kelurga"><a href="#" class="btn btn-xs btn-danger remScnt_family">Hapus Baris</a></div><div class="col-md-4"><label>Hubungan *</label><select class="form-control" required="" name="fam_desc[]"><option value="">-Pilih Hubungan-</option><option value="1">Istri</option><option value="2">Suami</option><option value="3">Anak</option><option value="4">Ayah</option><option value="5">Ibu</option><option value="6">Lainnya</option></select></div></div>').appendTo(scntFam);
			c++;
			return false;
		});

		$(document).on("click", ".remScnt_family", function() {
			if (c > 2) {
				$(this).parents('.row').remove();
				c--;
			}
			return false;
		});
		
		var scntPos = $('#p_scents_position');
		var d = $('#p_scents_position .row').size() + 1;
		$("#addScnt_position").click(function() {
			$('<div class="row"><div class="col-md-4"><label>Tahun Mulai *</label><input class="form-control" required="" type="date" name="position_start[]" placeholder="Masukkan Tahun Mulai"><a href="#" class="btn btn-xs btn-danger remScnt_position">Hapus Baris</a></div><div class="col-md-4"><label>Tahun Selesai *</label><input class="form-control" required="" type="date" name="position_end[]" placeholder="Masukkan Tahun Selesai"></div><div class="col-md-4"><label>Keterangan *</label><input class="form-control" required="" type="text" name="position_desc[]" placeholder="Masukkan Keterangan"></div></div>').appendTo(scntPos);
			d++;
			return false;
		});

		$(document).on("click", ".remScnt_position", function() {
			if (d > 2) {
				$(this).parents('.row').remove();
				d--;
			}
			return false;
		});
		
		var scntTeach = $('#p_scents_teaching');
		var e = $('#p_scents_teaching .row').size() + 1;
		$("#addScnt_teaching").click(function() {
			$('<div class="row"><div class="col-md-4"><label>Tahun Mulai *</label><input class="form-control" required="" type="date" name="position_start[]" placeholder="Masukkan Tahun Mulai"><a href="#" class="btn btn-xs btn-danger remScnt_teaching">Hapus Baris</a></div><div class="col-md-4"><label>Tahun Selesai *</label><input class="form-control" required="" type="date" name="position_end[]" placeholder="Masukkan Tahun Selesai"></div><div class="col-md-4"><label>Keterangan *</label><input class="form-control" required="" type="text" name="position_desc[]" placeholder="Masukkan Keterangan"></div></div>').appendTo(scntTeach);
			e++;
			return false;
		});

		$(document).on("click", ".remScnt_teaching", function() {
			if (e > 2) {
				$(this).parents('.row').remove();
				e--;
			}
			return false;
		});
		
		var scntAchievement = $('#p_scents_achievement');
		var f = $('#p_scents_achievement .row').size() + 1;
		$("#addScnt_achievement").click(function() {
			$('<div class="row"><div class="col-md-4"><label>Tahun *</label><input class="form-control" required="" type="text" name="achievement_year[]" placeholder="Masukkan Tahun"><a href="#" class="btn btn-xs btn-danger remScnt_achievement">Hapus Baris</a></div><div class="col-md-6"><label>Nama Penghargaan *</label><input class="form-control" required="" type="text" name="achievement_name[]" placeholder="Masukkan Nama Penghargaan"></div></div>').appendTo(scntAchievement);
			f++;
			return false;
		});

		$(document).on("click", ".remScnt_achievement", function() {
			if (f > 2) {
				$(this).parents('.row').remove();
				f--;
			}
			return false;
		});

		var scntStahistory = $('#p_scents_stahistory');
		var g = $('#p_scents_stahistory .row').size() + 1;
		$("#addScnt_stahistory").click(function() {
			$('<hr><div class="row"><div class="col-md-6"><label>Tahun Mulai *</label><input class="form-control" required="" type="date" name="start_date[]" placeholder="Tahun Mulai"></div><div class="col-md-6"><label>Tahun Selesai *</label><input class="form-control" required="" type="date" name="end_date[]" placeholder="Tanggal Selesai"></div><div class="col-md-3"><label>Golongan *</label><input type="text" class="form-control" required="" name="stahistory_gol[]" class="form-control" placeholder="Golongan"><a href="#" class="btn btn-xs btn-danger remScnt_stahistory">Hapus Baris</a></div><div class="col-md-3"><label>Status Golongan *</label><input type="text" required="" name="stahistory_emp[]" class="form-control" placeholder="Status Kepegawaian"></div><div class="col-md-3"><label>Keterangan *</label><input type="text" required="" name="stahistory_desc[]" class="form-control" placeholder="Status Kepegawaian"></div></div>').appendTo(scntStahistory);
			g++;
			return false;
		});

		$(document).on("click", ".remScnt_stahistory", function() {
			if (g > 2) {
				$(this).parents('.row').remove();
				g--;
			}
			return false;
		});
		
	});
</script>