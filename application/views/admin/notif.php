<div class="row">
	<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="box box-primary">
			<div class="box-body">
				<label>Pilihan</label>
				<select name="pilihan" id="pilihan" class="form-control" required="required">
					<option value="1">Update Harga</option>
				</select>
				<br>
				<div class="pull-right">
					<button type="button" id="kirim" class="btn btn-success">Kirim Notifikasi</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?=base_url('assets/js/global.js')?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#kirim').click(function(event) {
			event.preventDefault();
			kirim();
		});
	});

	function kirim() {
		var data = {
			""
		};

		ajaxCallJson(base_url(''));
	}
</script>