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
						<h3 class="box-title">Filter Data Catatan Santri</h3>
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
							<label for="" class="col-sm-2 control-label">Cari Santri</label>
							<div class="col-sm-4">
								<div class="input-group">
									<input type="text" class="form-control" autofocus name="r" id="student_nis" <?php echo (isset($f['r'])) ? 'value="'.$f['r'].'"' : 'placeholder="NIS Santri"' ?> required>
									<span class="input-group-btn">
										<button class="btn btn-success" type="submit">Cari</button>
									</span>
									<span class="input-group-btn">
									</span>
									<span class="input-group-btn">
									</span>
									<span class="input-group-btn">
									</span>
                					<span class="input-group-btn">
                					    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#dataSantri"><b>Data Santri</b></button>
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
						<h3 class="box-title">Informasi Santri</h3>
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
										<td>NIS</td>
										<td>:</td>
										<?php foreach ($siswa as $row): ?>
											<?php echo (isset($f['n']) AND $f['r'] == $row['student_nis']) ? 
											'<td>'.$row['student_nis'].'</td>' : '' ?> 
										<?php endforeach; ?>
									</tr>
									<tr>
										<td>Nama Santri</td>
										<td>:</td>
										<?php foreach ($siswa as $row): ?>
											<?php echo (isset($f['n']) AND $f['r'] == $row['student_nis']) ? 
											'<td>'.$row['student_full_name'].'</td>' : '' ?> 
										<?php endforeach; ?>
									</tr>
									<tr>
										<td>Unit Sekolah</td>
										<td>:</td>
										<?php foreach ($siswa as $row): ?>
											<?php echo (isset($f['n']) AND $f['r'] == $row['student_nis']) ? 
											'<td>'.$row['majors_short_name'].'</td>' : '' ?> 
										<?php endforeach; ?>
									</tr>
									<tr>
										<td>Kelas</td>
										<td>:</td>
										<?php foreach ($siswa as $row): ?>
											<?php echo (isset($f['n']) AND $f['r'] == $row['student_nis']) ? 
											'<td>'.$row['class_name'].'</td>' : '' ?> 
										<?php endforeach; ?>
									</tr>
									<?php if (majors() == 'senior') { ?>
										<tr>
											<td>Program Keahlian</td>
											<td>:</td>
											<?php foreach ($siswa as $row): ?>
												<?php echo (isset($f['n']) AND $f['r'] == $row['student_nis']) ? 
												'<td>'.$row['majors_name'].'</td>' : '' ?> 
											<?php endforeach; ?>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="col-md-3">
						    <center>
						    <a href="<?php echo base_url() . 'manage/konseling/printBook/?n='.$f['n'].'&r=' . $f['r']; ?>" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-print"></i> Cetak Buku Catatan Santri</a>
						    </center>
							<?php foreach ($siswa as $row): ?>
								<?php if (isset($f['n']) AND $f['r'] == $row['student_nis']) { ?> 
									<?php if (!empty($row['student_img'])) { ?>
										<img src="<?php echo upload_url('student/'.$row['student_img']) ?>" class="img-thumbnail img-responsive">
									<?php } else { ?>
										<img src="<?php echo media_url('img/user.png') ?>" class="img-thumbnail img-responsive">
									<?php } 
								} ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				
				<!-- List Tagihan Bulanan --> 
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Catatan Santri</h3>
					</div><!-- /.box-header -->
					<div class="box-body">
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_1" data-toggle="tab">Kebaikan</a></li>
								<li><a href="#tab_2" data-toggle="tab">Pelanggaran</a></li>
								<li><a href="#tab_3" data-toggle="tab">Rekap Laporan Catatan Santri</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1">
									<div class="box-body">
										<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addTrue"><i class="fa fa-plus"></i> Kebaikan</button>
									</div>
									<div class="box-body table-responsive">
										<table class="table table-bordered" style="white-space: nowrap;">
											<thead>
												<tr class="info">
													<th>No.</th>
													<th>Tanggal</th>
													<th>Kebaikan</th>
													<th>Apresiasi</th>
													<th>Catatan</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$i =1;
												foreach ($true as $row):
												?>
												<tr>
													<td><?php echo $i ?></td>
													<td><?php echo pretty_date($row['konseling_date'], 'd F Y', false) ?></td>
													<td><?php echo $row['konseling_true'] ?></td>
													<td><?php echo $row['konseling_action'] ?></td>
													<td><?php echo $row['konseling_note'] ?></td>
													<td>
												<a href="#delTrue<?php echo $row['konseling_id']; ?>" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
													</td>
												</tr>
		
										<div class="modal modal-default fade" id="delTrue<?php echo $row['konseling_id']; ?>">
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
															<?php echo form_open('manage/konseling/delete/' . $row['konseling_id']); ?>
															
                                					<?php foreach ($period as $p): ?>
                                    					<?php echo (isset($f['n']) AND $f['n'] == $p['period_id']) ? 
                                    					'<input type="hidden" name="period_id" value="'.$p['period_id'].'">' : '' ?> 
                                    				<?php endforeach; ?>
                                					<?php foreach ($siswa as $s): ?>
                                					<?php echo (isset($f['n']) AND $f['r'] == $s['student_nis']) ? 
                                					'<input type="hidden" name="student_nis" value="'.$s['student_nis'].'">' : '' ?> 
                                				    <?php endforeach; ?>
                                				    
                                				    <input type="hidden" name="code" value="<?php echo $row['konseling_id']; ?>">
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
													$i++;
												endforeach; 
											?>				
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane" id="tab_2">
									<div class="box-body">
										<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#addFoul"><i class="fa fa-plus"></i> Pelanggaran</button>
									</div>
									<div class="box-body table-responsive">
										<table class="table table-bordered" style="white-space: nowrap;">
											<thead>
												<tr class="info">
													<th>No.</th>
													<th>Tanggal</th>
													<th>Pelanggaran</th>
													<th>Tindakan</th>
													<th>Catatan</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$i =1;
												foreach ($foul as $row):
												?>
												<tr>
													<td><?php echo $i ?></td>
													<td><?php echo pretty_date($row['konseling_date'], 'd F Y', false) ?></td>
													<td><?php echo $row['konseling_foul'] ?></td>
													<td><?php echo $row['konseling_action'] ?></td>
													<td><?php echo $row['konseling_note'] ?></td>
													<td>
												<a href="#delFoul<?php echo $row['konseling_id']; ?>" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" title="Hapus"></i></a>
													</td>
												</tr>
		
										<div class="modal modal-default fade" id="del_Foul<?php echo $row['konseling_id']; ?>">
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
															<?php echo form_open('manage/konseling/delete/' . $row['konseling_id']); ?>
															
                                					<?php foreach ($period as $p): ?>
                                    					<?php echo (isset($f['n']) AND $f['n'] == $p['period_id']) ? 
                                    					'<input type="hidden" name="period_id" value="'.$p['period_id'].'">' : '' ?> 
                                    				<?php endforeach; ?>
                                					<?php foreach ($siswa as $s): ?>
                                					<?php echo (isset($f['n']) AND $f['r'] == $s['student_nis']) ? 
                                					'<input type="hidden" name="student_nis" value="'.$s['student_nis'].'">' : '' ?> 
                                				    <?php endforeach; ?>
                                				    
                                				    <input type="hidden" name="code" value="<?php echo $row['konseling_id']; ?>">
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
													$i++;
												endforeach; 
											?>				
											</tbody>
										</table>
									</div>
								</div>
								
								<div class="tab-pane" id="tab_3">
									<div class="box-body table-responsive">
										<table class="table table-bordered" style="white-space: nowrap;">
											<thead>
												<tr class="info">
													<th>No.</th>
													<th>NIS</th>
													<th>Nama</th>
													<th>Unit</th>
													<th>Kelas</th>
													<th>Total Poin</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$i =1;
												foreach ($konselingSum as $row):
												?>
												<tr>
													<td><?php echo $i ?></td>
													<td><?php echo $row['student_nis'] ?></td>
													<td><?php echo $row['student_full_name'] ?></td>
													<td><?php echo $row['majors_name'] ?></td>
													<td><?php echo $row['class_name'] ?></td>
													<td><?php echo $row['konselingSum'] . ' Poin' ?></td>
												</tr>
											<?php 
													$i++;
												endforeach; 
											?>				
											</tbody>
										</table>
									</div>
								</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="addTrue" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Kebaikan</h4>
					</div>
					<div class="modal-body">
					    
					<?php echo form_open('manage/konseling/add_true', array('method'=>'post')); ?>
					<?php foreach ($period as $row): ?>
    					<?php echo (isset($f['n']) AND $f['n'] == $row['period_id']) ? 
    					'<input type="hidden" name="true_period_id" value="'.$row['period_id'].'">' : '' ?> 
    				<?php endforeach; ?>
					<?php foreach ($siswa as $row): ?>
					<?php echo (isset($f['n']) AND $f['r'] == $row['student_nis']) ? 
					'<input type="hidden" name="true_student_id" value="'.$row['student_id'].'">
					<input type="hidden" name="true_student_nis" value="'.$row['student_nis'].'">' : '' ?> 
				    <?php endforeach; ?>
					
					<?php if(isset($f['n'])){ ?>
					<input type="hidden" name="true_code" value="1">
					<input type="hidden" name="true_period_id" value="<?php echo $f['n']?>">
					<?php } ?>
					
						<div class="form-group">
							<label>Tanggal</label>
							<div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input class="form-control" required="" type="text" name="true_date" value="<?php echo date("Y-m-d") ?>" placeholder="Tanggal">
							</div>
						</div>
						<div class="form-group">
							<label>Kebaikan</label>
							<input type="text" class="form-control" required="" name="true_val" class="form-control" placeholder="Kebaikan">
						</div>
						<div class="form-group">
							<label>Apresiasi</label>
							<input type="text" class="form-control" required="" name="true_tindakan" class="form-control" placeholder="Apresiasi">
						</div>
						<div class="form-group">
							<label>Catatan</label>
							<input type="text" class="form-control" required="" name="true_note" class="form-control" placeholder="Catatan">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-info">Simpan</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="addFoul" role="dialog">
			<div class="modal-dialog modal-sm">
			<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Pelanggaran</h4>
					</div>
					<div class="modal-body">
					    
					<?php echo form_open('manage/konseling/add_foul', array('method'=>'post')); ?>
					<?php foreach ($period as $row): ?>
    					<?php echo (isset($f['n']) AND $f['n'] == $row['period_id']) ? 
    					'<input type="hidden" name="foul_period_id" value="'.$row['period_id'].'">' : '' ?> 
    				<?php endforeach; ?>
					<?php foreach ($siswa as $row): ?>
					<?php echo (isset($f['n']) AND $f['r'] == $row['student_nis']) ? 
					'<input type="hidden" name="foul_student_id" value="'.$row['student_id'].'">
					<input type="hidden" name="foul_student_nis" value="'.$row['student_nis'].'">' : '' ?> 
				    <?php endforeach; ?>
					
					<?php if(isset($f['n'])){ ?>
					<input type="hidden" name="foul_code" value="2">
					<input type="hidden" name="foul_period_id" value="<?php echo $f['n']?>">
					<?php } ?>
					
						<div class="form-group">
							<label>Tanggal</label>
							<div class="input-group date " data-date="" data-date-format="yyyy-mm-dd">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input class="form-control" required="" type="text" name="foul_date" value="<?php echo date("Y-m-d") ?>" placeholder="Tanggal">
							</div>
						</div>
						<div class="form-group">
							<label>Pelanggaran</label>
							<input type="text" class="form-control" required="" name="foul_val" class="form-control" placeholder="Pelanggaran">
						</div>
						<div class="form-group">
							<label>Tindakan</label>
							<input type="text" class="form-control" required="" name="foul_tindakan" class="form-control" placeholder="Tindakan">
						</div>
						<div class="form-group">
							<label>Catatan</label>
							<input type="text" class="form-control" required="" name="foul_note" class="form-control" placeholder="Catatan">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-info">Simpan</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
		<div class="modal fade" id="dataSantri" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Cari Data Santri</h4>
				</div>
				<div class="modal-body">
    <?php $dataSantri = $this->Student_model->get(array('status'=>'1'));
      
      echo '
            <div class="box-body table-responsive">
							<table id="dtable" class="table table-hover">
							    <thead>
								<tr>
									<th>No</th>
									<th>NIS</th>
									<th>Nama</th>
									<th>Unit Sekolah</th>
									<th>Kelas</th>
									<th>Aksi</th>
								</tr>
								</thead>
								<tbody>';
									if (!empty($dataSantri)) {
										$i = 1;
										foreach ($dataSantri as $row):
						               echo '<tr>
												<td>'.
												$i
												.'</td>
												<td>'.
												$row['student_nis']
												.'</td>
												<td>'.
												$row['student_full_name']
												.'</td>
												<td>'.
												$row['majors_short_name']
												.'</td>
												<td>'.
												$row['class_name']
												.'</td>';
										echo '<td align="center">';
                                        echo '<button type="button" data-dismiss="modal" class="btn btn-primary btn-xs" onclick="ambil_data(';
                                        echo "'".$row['student_nis']."'";
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
    function ambil_data(nis){
            var nisSantri = nis;
            var thAjaran    = $("#th_ajar").val();
            
            window.location.href = '<?php echo base_url();?>manage/konseling?n='+thAjaran+'&r='+nisSantri;
      }
    
    function get_kelas(){
	    var id_majors    = $("#majors_id").val();
	    
        $.ajax({ 
            url: '<?php echo base_url();?>manage/konseling/get_kelas',
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
</script>
<style>
    div.over {
        width: 425px;
        height: 165px;
        overflow: scroll;
    }
    
    div.extended {
        width: 900px;
        height: 200px;
        overflow: scroll;
    }
</style>