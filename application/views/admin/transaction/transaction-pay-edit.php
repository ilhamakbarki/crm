<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?=base_url('assets/lte/')?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<div class="row">
	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Detail Pembayaran</h3>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label>Nomor Invoice</label>
					<select class="form-control select2" style="width: 100%;">
						<?php for ($i=1; $i <=5 ; $i++) { ?>
						<option>T<?=rand(1000,9999)?></option>
						<?php } ?>
					</select>
				</div>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Tanggal</th>
								<th>Bank</th>
								<th>Rekening</th>
								<th>Bayar</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php for ($i=1; $i <10 ; $i++) { ?>
							<tr>
								<td><?=$i?></td>
								<td>
									<?php
									$timestamp = mt_rand($i, time());
									echo date("d M Y", $timestamp);
									?>  
								</td>
								<td>BCA</td>
								<td><?=rand(1000000, 9999999)?></td>
								<td align="right">Rp. <?=number_format(rand(200000, 1000000))?></td>
								<td><a type="button" class="btn btn-sm btn-danger">Hapus</a></td>
							</tr>
							<?php } ?>				
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Tambah Pembayaran</h3>
			</div>
			<div class="box-body">
				<label>Tanggal</label>
				<div class="input-group date">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
					<input type="text" name="tgl" class="form-control pull-right" id="datepicker" placeholder="Tanggal" required="required" title="Tanggal">
				</div>
				<br>
				<label>Nama Bank</label>
				<select name="nama" id="nama" class="form-control" required="required">
					<option value="">BCA</option>
					<option value="">BRI</option>
					<option value="">Mandiri</option>
					<option value="">BNI</option>
					<option value="">Jatim</option>
				</select>
				<br>
				<label>No Rekening</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-book"></i>
					</div>
					<input type="text" name="rek" id="rek" class="form-control" placeholder="Rekening" required="required" title="Rekening">
				</div>
				<br>
				<label>Jumlah</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-money"></i>
					</div>
					<input type="number" name="qty" id="qty" class="form-control" placeholder="Jumlah" required="required" title="Jumlah">
				</div>
				<br>
				<div class="pull-right">
					<a type="button" class="btn btn-primary">Tambah</a>
					<a type="button" href="javascript:history.back()" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?=base_url('assets/lte/')?>/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#datepicker').datepicker({
			autoclose: true
		});
	});
</script>