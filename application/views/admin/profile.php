<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="box box-primary">
			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive img-circle" src="<?=base_url('assets/profile/').'/'.'avatar.png'?>" alt="User profile picture">
				<h3 class="profile-username text-center" id="nama"><?=$this->session->userdata('nama')?></h3>
				<ul class="list-group list-group-unbordered">
					<li class="list-group-item">
						<b>Alamat</b> <p class="pull-right" id="alamat">Address</p>
					</li>
					<li class="list-group-item">
						<b>Email</b> <p  class="pull-right" id="email">Email</p>
					</li>
					<li class="list-group-item">
						<b>No Telp</b> <p class="pull-right" id="telp">Phone</p>
					</li>
				</ul>
				<a href="<?=base_url('admin/profile/change')?>" class="btn btn-primary btn-block"><b>Ganti</b></a>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="box box-danger">
			<div class="box-body box-profile">
				<h3 class="profile-username text-center">Ganti Password	</h3>
				<ul class="list-group list-group-unbordered">
					<form id="form-profile" method="POST">
						<li class="list-group-item">
							<label>Password Baru</label>
							<div class="input-group" id="pwdold-group">
								<div class="input-group-addon">
									<i class="fa fa-lock"></i>
								</div>
								<input type="password" name="pwdold" id="pwdold" class="form-control" value="" required="required" pattern="Password Baru" title="Password Baru" placeholder="Password Baru">
								<input type="hidden" name="m" value="changePassword">
								<input type="hidden" name="platfrom" value="web">
								<input type="hidden" name="uid" value="<?=$uid_user?>">
								<input type="hidden" name="level" value="<?=$level?>">
							</div>
						</li>
						<li class="list-group-item">
							<label>Konfirmasi Password Baru</label>
							<div class="input-group" id="pwdnew-group">
								<div class="input-group-addon">
									<i class="fa fa-lock"></i>
								</div>
								<input type="password" name="pwdnew" id="pwdnew" class="form-control" value="" required="required" pattern="Konfirmasi Password Baru" title="Konfirmasi Password Baru" placeholder="Konfirmasi Password Baru">
							</div>
						</li>
						<li class="list-group-item">
							<label>Password Lama</label>
							<div class="input-group" id="cpwdnew-group">
								<div class="input-group-addon">
									<i class="fa fa-lock"></i>
								</div>
								<input type="password" name="cpwdnew" id="cpwdnew" class="form-control" value="" required="required" pattern="Password Lama" title="Password Lama" placeholder="Password Lama">
							</div>
						</li>
					</form>
				</ul>
				<a no-href id="ganti-password" class="btn btn-danger btn-block"><b>Ganti Password</b></a>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</div>
<script type="text/javascript" src="<?=base_url('assets/js/global.js')?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		load("<?=$uid?>", "<?=$level?>");

		$('#ganti-password').click(function(event) {
			event.preventDefault();
			ganti();
		});

		$('.form-control').keyup(function(event) {
			if(event.keyCode==13){
				event.preventDefault();
				ganti();
			}
		});
	});

	function valid() {
		var result=true;
		$('.form-control').each(function(index, el) {
			if($(this).prop('required') && $(this).val()==""){
				$(this).focus();
				var temp = $(this).parent();
				temp.addClass('has-error');
				result = false;
				return false;
			}else{
				var temp = $(this).parent();
				temp.removeClass('has-error');
			}
		});
		return result;
	}

	function ganti(){
		if(!valid()){
			return;
		}
		var data = new FormData(document.getElementById('form-profile'));
		ajaxCallForm(base_url('api/v1/profile'),data, function (argument) {
			var json = $.parseJSON(argument);
			if(json.code==204){
				if(!$.isEmptyObject(json.data.errors)){
					var errors = json.data.errors;
					if(!$.isEmptyObject(errors.pwdold)){
						$('#pwdold-group').addClass('has-error');
						$('#pwdold-group').focus();
					}else{
						$('#pwdold-group').removeClass('has-error');
					}
					if(!$.isEmptyObject(errors.pwdnew)){
						$('#pwdnew-group').addClass('has-error');
						$('#pwdnew-group').focus();
					}else{
						$('#pwdnew-group').removeClass('has-error');
					}
					if(!$.isEmptyObject(errors.cpwdnew)){
						$('#cpwdnew-group').addClass('has-error');
						$('#cpwdnew-group').focus();
					}else{
						$('#cpwdnew-group').removeClass('has-error');
					}
				}
			}else{
				$('.input-group').removeClass('has-error');
				$('.form-control').val("");
				alert("Sukses silahkan login kembali");
				window.location.href="<?=base_url('Logout')?>";
			}
		});
		
	}

	function load(uid, level) {
		var data = {
			"uid":uid,
			"level":level,
			"platfrom":"web",
			"m":"getProfile"
		};
		ajaxCall(base_url('api/v1/profile'), data, function (data) {
			var json = JSON.parse(data);
			if(json.code==200){
				var data = json.data;
				$('#nama').html(data.nama);
				$('#alamat').html(data.alamat);
				$('#email').html(data.email);
				$('#telp').html(data.telp);
			}else{
				alert("ERROR LOAD");
			}
		});
	}
</script>