
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo isset($title) ? '' . $title : null; ?>
			<small>List</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('manage') ?>"><i class="fa fa-th"></i> Home</a></li>
			<li class="active"><?php echo isset($title) ? '' . $title : null; ?></li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-success">
					<div class="box-header"> <br>
						<div class="row">
							<div class="col-md-2">  
								<div class="form-group">
        						<select required="" name="majors_id" id="majors_id" class="form-control">
        						    <option value="">-- Pilih Unit --</option>
        						    <?php if($this->session->userdata('umajorsid') == '0') { ?>
        						  <option value="all">Semua Unit</option>
        						    <?php } ?>
        						    <?php foreach($majors as $row){?>
        						        <option value="<?php echo $row['majors_id']; ?>" ><?php echo $row['majors_short_name'] ?></option>
        						    <?php } ?>
        						</select>
								</div>
							</div>
							<div class="col-md-2">  
    							<div class="form-group">
            						<select class="form-control" name="periode" id="period_id" required="">
            								<option value="">--Pilih T.A. --</option>
            								<?php foreach ($period as $row): ?>
            								<option value="<?php echo $row['period_id'] ?>"><?php echo $row['period_start'].'/'.$row['period_end'] ?></option>
            							    <?php endforeach; ?>
    							    </select>
							    </div>
							</div>
							<div class="col-md-2">  
    							<div class="form-group">
            						<select class="form-control" name="start" id="start" required="">
            								<option value="">--Dari Bulan--</option>
            								<?php foreach ($month as $row): ?>
            								<option value="<?php echo $row['month_id'] ?>"><?php echo $row['month_name'] ?></option>
            							    <?php endforeach; ?>
    							    </select>
							    </div>
							</div>
							<div class="col-md-2">  
    							<div class="form-group">
            						<select class="form-control" name="end" id="end" required="">
            								<option value="">--Sampai Bulan--</option>
            								<?php foreach ($month as $row): ?>
            								<option value="<?php echo $row['month_id'] ?>"><?php echo $row['month_name'] ?></option>
            							    <?php endforeach; ?>
    							    </select>
							    </div>
							</div>
							<button type="submit" class="btn btn-primary" onclick="cari_data()">Filter</button>
						</div>
						
					</div>
					<div id="div_show_data">
					<div>
				</div>
			</div>

		</div>
	</section>
	<!-- /.content -->
</div>

<script>
    function cari_data(){
        var start          = $("#start").val();
        var end          = $("#end").val();
        var period_id   = $("#period_id").val();
        var majors_id   = $("#majors_id").val();
        //alert(id_jurusan+id_kelas);
        if(start != '' && end != '' && period_id != '' && majors_id != ''){
        $.ajax({ 
            url: '<?php echo base_url();?>manage/neraca/get_neraca',
            type: 'POST', 
            data: {
                    'start'     : start,
                    'end'       : end,
                    'period_id' : period_id,
                    'majors_id' : majors_id,
            },    
            success: function(msg) {
                    $("#div_show_data").html(msg);
            },
			error: function(msg){
					alert('msg');
			}
            
        });
        }
    }
</script>
