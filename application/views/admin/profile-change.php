<div class="row">
	<div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="box box-primary">
			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive img-circle" src="<?=base_url('assets/profile/').'/'.'avatar.png'?>" alt="User profile picture">
				<h3 class="profile-username text-center" id="session"><?="Session Login"?></h3>
				<ul class="list-group list-group-unbordered">
					<form id="form-profile" method="POST">
						<li class="list-group-item">
							<label>Nama</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-address-card"></i>
								</div>
								<input type="hidden" name="m" id="m" value="edit" class="form-control" required="required">
								<input type="hidden" name="uid" id="uid" value="<?=$uid?>" class="form-control" required="required">
								<input type="hidden" name="level" id="level" class="form-control" value="<?=$level?>" required="required">
								<input type="hidden" name="platfrom" id="platfrom" class="form-control" value="web" required="required">
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
				<a no-href id="change" class="btn btn-primary btn-block"><b>Ganti</b></a>
				<a href="javascript:history.back()" class="btn btn-danger btn-block"><b>Batal</b></a>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?=base_url('assets/js/global.js')?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		load("<?=$uid?>","<?=$level?>");
		
		$('#change').click(function(event) {
			event.preventDefault();
			change();
		});

		$('.form-control').keyup(function(event) {
			if(event.keyCode==13){
				event.preventDefault();
				change();
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

	function change() {
		if(!valid()){
			return;
		}
		var data = new FormData(document.getElementById('form-profile'));
		ajaxCallForm(base_url('api/v1/profile'), data, function (data) {
			var json = JSON.parse(data);
			if(json.code==200){
				alert("Sukses");
				load("<?=$uid?>","<?=$level?>");
			}else{
				alert("ERROR");
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
				$('#nama').val(data.nama);
				$('#alamat').val(data.alamat);
				$('#email').val(data.email);
				$('#telp').val(data.telp);
				$('#uid').val(data.uid);
				$('#session').html(data.nama);
			}else{
				alert("ERROR LOAD");
			}
		});
	}
</script>