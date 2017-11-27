<div class="row">
	<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-sm-offset-3 col-xs-5 col-sm-5 col-md-5 col-lg-5">
		<div class="box box-primary">
			<div class="box-body">
				<label>Grup Distirbutor / Supplier</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-sitemap"></i>
					</div>
					<select name="level" id="level" class="form-control" required="required">
						<?php foreach ($grup as $g) { ?>
						<option value="<?=$g->uid?>"><?=$g->nama?></option>
						<?php } ?>
					</select>
				</div>
				<br>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-file-o"></i>
					</div>
					<label></label>
					<select name="jenis" id="jenis" class="form-control" required="required">
						<option value="excel">Excel</option>
					</select>
				</div>
				<br>
				<center>
					<a type="button" class="btn btn-primary" id="cetak"><i class="fa fa-print"></i> Cetak</a>
				</center>
			</div>
		</div>
	</div>	
</div>
<script type="text/javascript" src="<?=base_url('assets/js/global.js')?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#cetak').click(function(event) {
			event.preventDefault();
			cetak();
		});
	});

	function cetak() {
		if($('#jenis').val()=="excel"){
			var data = {"level":$('#level').val()};
			open("POST", base_url("admin/cetak/excel"), data, "_blank");
		}else{
			var data = {"level":$('#level').val()};
			open("POST", base_url("admin/cetak/spreadsheet"), data, "_blank");
		}
	}
</script>