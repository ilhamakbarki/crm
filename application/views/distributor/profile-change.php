<div class="row">
	<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="box box-success">
			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive img-circle" src="<?=base_url('assets/profile/').'/'.'avatar.png'?>" alt="User profile picture">
				<h3 class="profile-username text-center"><?="Nama Session Login"?></h3>
				<ul class="list-group list-group-unbordered">
					<form id="form-profile" method="POST" action="">
						<li class="list-group-item">
							<label>Nama</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-address-card"></i>
								</div>
								<input type="text" name="nama" id="nama" class="form-control" value="" required="required" pattern="Nama" title="Nama" placeholder="Nama">
							</div>
						</li>
						<li class="list-group-item">
							<label>Alamat</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-address-card-o"></i>
								</div>
								<input type="text" name="alamat" id="alamat" class="form-control" value="" required="required" pattern="Alamat" title="Alamat" placeholder="Alamat">
							</div>
						</li>
						<li class="list-group-item">
							<label>Email</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-envelope"></i>
								</div>
								<input type="email" name="email" id="email" class="form-control" value="" required="required" pattern="Email" title="Email" placeholder="Email">
							</div>
						</li>
						<li class="list-group-item">
							<label>No. Telp</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-phone"></i>
								</div>
								<input type="number" name="telp" id="telp" class="form-control" value="" required="required" pattern="Telp" title="Telp" placeholder="Telp">
							</li>
						</div>
					</form>
				</ul>
				<a no-href class="btn btn-success btn-block"><b>Ganti</b></a>
			</div>
		</div>
	</div>
</div>