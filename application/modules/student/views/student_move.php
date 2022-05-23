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
		<!-- /.box-header -->
		<div class="row">
			<div class="col-md-9">
				<div class="box">
					<div class="box-body">
						<?php echo form_open(current_url(), array('method' => 'get')) ?>
						<div class="form-group">
							<div class="input-group">
							    <div class="input-group-addon alert-success">Unit</div>
								<select class="form-control" name="m" id="m" onchange="get_kelas()">
									<option value="">-- Pilih Unit Pesantren  --</option>
									<?php foreach ($majors as $row): ?>
										<option <?php echo (isset($f['m']) AND $f['m'] == $row['majors_id']) ? 'selected' : '' ?> value="<?php echo $row['majors_id'] ?>"><?php echo $row['majors_short_name'] ?></option>
									<?php endforeach; ?>
								</select>
								<div class="input-group-addon alert-info">Kamar</div>
								<div id="div_kamar">
								<select class="form-control" name="pr" onchange="this.form.submit()">
									<option value="">-- Pilih Kamar  --</option>
									<?php if(isset($f['m'])){?>
									<?php foreach ($madin as $row): ?>
										<option <?php echo (isset($f['pr']) AND $f['pr'] == $row['madin_id']) ? 'selected' : '' ?> value="<?php echo $row['madin_id'] ?>"><?php echo $row['madin_name'] ?></option>
									<?php endforeach; ?>
									<?php } ?>
								</select>
								</div>
							</div>
						</div>
						<?php echo form_close() ?>
						<form action="<?php echo site_url('manage/student/multiple'); ?>" method="post">
						<input type="hidden" name="action" value="move">
						<input type="hidden" name="madin_id" id="madin_id" value="">
						<table class="table table-hover table-bordered table-responsive">
								<tr>
									<th><input type="checkbox" id="selectall" value="checkbox" name="checkbox"></th> 
									<th>No</th>
									<th>NIS</th>
									<th>Nama</th>
									<th>Kamar</th>
								</tr>
								<tbody>
									<?php if($this->input->get(NULL)) { ?>
										<?php
										if (!empty($student)) {
											$i = 1;
											foreach ($student as $row):
												?>
												<tr style="<?php echo ($row['student_status']==0) ? 'color:#00E640' : '' ?>">
													<td><input type="checkbox" class="<?php echo ($row['student_status']==0) ? NULL : 'checkbox' ?>" <?php echo ($row['student_status']==0) ? 'disabled' : NULL ?> name="msg[]" value="<?php echo $row['student_id']; ?>"></td>
													<td><?php echo $i; ?></td>
													<td><?php echo $row['student_nis']; ?></td>
													<td><?php echo $row['student_full_name']; ?></td>	
													<td><?php echo $row['madin_name']; ?></td>	
	
												</tr>
												<?php
												$i++;
											endforeach;
										} else {
											?>
											<tr id="row">
												<td colspan="5" align="center">Data Kosong</td>
											</tr>
											<?php } ?>
											<?php } else {
											?>
											<tr id="row">
												<td colspan="5" align="center">Data Kosong</td>
											</tr>
											<?php } ?>
										</tbody>
									
								</table>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="panel panel-info">
							<div class="panel-body">
							    <select class="form-control" name="m_id" id="m_id" required="" onchange="get_ke_kamar()">
									<option value="">-- Pilih Unit Pesantren  --</option>
									<?php foreach ($majors as $row): ?>
										<option value="<?php echo $row['majors_id'] ?>"><?php echo $row['majors_short_name'] ?></option>
									<?php endforeach; ?>
								</select>
								<br>
								<div id="ke_kamar">
								<select class="form-control" name="c_id" id="c_id">
    								<option value="">-- Ke Kamar  --</option>
								</select>
								</div>
								<br>
								<button class="btn btn-danger btn-block" type="submit">Proses Pindah Kamar</button>
							</div>
						</div>
					</div>
                    
				</form>
				</div>
			</section>
			<!-- /.content -->
		</div>

		<script>
			$(document).ready(function() {
				$("#selectall").change(function() {
					$(".checkbox").prop('checked', $(this).prop("checked"));
				});
			});
			$(document).ready(function() {
				$("#selectall2").change(function() {
					$(".checkbox").prop('checked', $(this).prop("checked"));
				});
			});
		</script>
		
		<script>
        	function get_kelas(){
        	    var id_majors    = $("#m").val();
                //alert(id_jurusan+id_kelas);
                $.ajax({ 
                    url: '<?php echo base_url();?>manage/student/cari_kamar',
                    type: 'POST', 
                    data: {
                            'id_majors': id_majors,
                    },    
                    success: function(msg) {
                            $("#div_kamar").html(msg);
                    },
        			error: function(msg){
        					alert('msg');
        			}
                    
                });
        	}
        	
        	function get_ke_kamar(){
        	    var id_majors    = $("#m_id").val();
                //alert(id_jurusan+id_kelas);
                $.ajax({ 
                    url: '<?php echo base_url();?>manage/student/cari_ke_kamar',
                    type: 'POST', 
                    data: {
                            'id_majors': id_majors,
                    },    
                    success: function(msg) {
                            $("#ke_kamar").html(msg);
                    },
        			error: function(msg){
        					alert('msg');
        			}
                    
                });
        	}
		</script>
