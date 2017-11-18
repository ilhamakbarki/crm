<div class="row">
	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Detail Pembelian Barang</h3>
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
								<th>Nama Barang</th>
								<th>Jumlah</th>
								<th>Harga</th>
								<th>Sub Total</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Barang 1</td>
								<td>10</td>
								<td align="right">Rp. 200.000</td>
								<td align="right">Rp. 2.000.000</td>
								<td><a type="button" class="btn btn-danger">Hapus</a></td>
							</tr>
							<tr>
								<td>Barang 2</td>
								<td>2</td>
								<td align="right">Rp. 250.000</td>
								<td align="right">Rp. 500.000</td>
								<td><a type="button" class="btn btn-danger">Hapus</a></td>
							</tr>
							<tr>
								<td colspan="3"><b>Total</b></td>
								<td colspan="2" align="right">Rp. 2.500.000</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Tambah Barang</h3>
			</div>
			<div class="box-body">
				<label>Nama Barang</label>
				<select name="nama" id="nama" class="form-control" required="required">
					<?php for ($i=1; $i < 6; $i++) { ?>
					<option value="">Barang <?=$i?></option>
					<?php } ?>
				</select>
				<br>
				<label>Jumlah</label>
				<div class="input-group">
					<div class="input-group-addon">
					<i class="fa fa-archive"></i>
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