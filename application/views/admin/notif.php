<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<div class="row">
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		<div class="box box-primary">
			<div class="box-body">

				<div class="table-responsive">
					<table class="table table-hover table-striped width-full datatable" data-plugin="dataTable">
						<thead>
							<tr>
								<th>No</th>
								<th>Distributor</th>
								<th>PT</th>
								<th>Pilih</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($distributor as $d) { ?>
							<tr>
								<td><?=$no?></td>
								<td><?=$d->nama?></td>
								<td><?=$d->pt?></td>
								<td>
									<div class="checkbox">
										<label>
											<input type="checkbox" class="penerima" data-uid="<?=$d->uid?>">
										</label>
									</div>
								</td>
							</tr>
							<?php $no++;} ?>
						</tbody>
						<tfoot>
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td>
									<div class="checkbox">
										<label>
											<input type="checkbox" id="kirimSemua">
											Pilih Semua
										</label>
									</div>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<div class="box box-primary">
			<div class="box-body">
				<label>Pilihan</label>
				<select name="pilihan" id="pilihan" class="form-control" required="required">
					<option value="1">Update Harga</option>
				</select>
				<br>

				<div >
					<button type="button" id="kirim" class="btn btn-success pull-right">Kirim Notifikasi</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- DataTables -->
<script src="<?=base_url()?>assets/lte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/js/global.js')?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.datatable').DataTable();

		$('#kirim').click(function(event) {
			event.preventDefault();
			kirim();
		});
		
		$('#kirimSemua').click(function(event) {
			pilihSemua();
		});
		
	});
	var all=false;

	function pilihSemua() {
		if(!all){
			$('.penerima').prop('checked', true);
			all = true;
		}else{
			all = false;
			$('.penerima').prop('checked', false);
		}
	}

	function kirim() {
		$('#loading-template').loading();		
		$('.penerima').each(function(index, el) {
			if($(this).is(":checked")){
				var uid = $(this).data("uid");
				var data = JSON.stringify({
					"m":"sendUpdateHarga",
					"platfrom":"web",
					"receipt":uid
				});
				ajaxCallJson(base_url("api/v1/notif"), data, function (data) {
				});
			}
		});
		$('#loading-template').loading("stop");
	}
</script>