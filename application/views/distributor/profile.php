<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="box box-success">
			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive img-circle" src="<?=base_url('assets/profile/').'/'.'avatar.png'?>" alt="User profile picture">
				<h3 class="profile-username text-center"><?="Nama Session Login"?></h3>
				<ul class="list-group list-group-unbordered">
					<li class="list-group-item">
						<b>Alamat</b> <p class="pull-right">Alamat nanti</p>
					</li>
					<li class="list-group-item">
						<b>Email</b> <p  class="pull-right">alamat@domain.com</p>
					</li>
					<li class="list-group-item">
						<b>No Telp</b> <p class="pull-right">0877xxxxxxx</p>
					</li>
				</ul>
				<a href="<?=base_url('distributor/profile/change')?>" class="btn btn-success btn-block"><b>Ganti</b></a>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="box box-danger">
			<div class="box-body box-profile">
				<h3 class="profile-username text-center">Ganti Password	</h3>
				<ul class="list-group list-group-unbordered">
					<form id="form-profile" method="POST" action="">
						<li class="list-group-item">
							<label>Password Baru</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-lock"></i>
								</div>
								<input type="password" name="npwd" id="npwd" class="form-control" value="" required="required" pattern="Password Baru" title="Password Baru" placeholder="Password Baru">
							</div>
						</li>
						<li class="list-group-item">
							<label>Konfirmasi Password Baru</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-lock"></i>
								</div>
								<input type="password" name="cnpwd" id="cnpwd" class="form-control" value="" required="required" pattern="Konfirmasi Password Baru" title="Konfirmasi Password Baru" placeholder="Konfirmasi Password Baru">
							</div>
						</li>
						<li class="list-group-item">
							<label>Password Lama</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-lock"></i>
								</div>
								<input type="password" name="opwd" id="opwd" class="form-control" value="" required="required" pattern="Password Lama" title="Password Lama" placeholder="Password Lama">
							</div>
						</li>
					</form>
				</ul>

				<a no-href class="btn btn-danger btn-block"><b>Ganti Password</b></a>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</div>