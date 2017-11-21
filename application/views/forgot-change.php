<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Halaman Login</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?=base_url('assets/lte/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/lte/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/lte/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/lte/dist/css/AdminLTE.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?=base_url()?>/assets/lte/plugins/iCheck/square/blue.css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<center><img src="<?=base_url('assets/img/kusuma.png')?>" width="120"></center>
		<div class="login-logo">
			<a><b>Ganti</b> Password</a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg">Distributor Kusuma Agrowisata</p>
			<form id="form-forget" method="post">
				<label>Password Baru</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-lock"></i>
					</div>
					<input type="hidden" name="uid" id="uid" class="form-control" value="<?=$uid?>" required="required">
					<input type="hidden" name="m" id="m" class="form-control" value="change" required="required">
					<input type="hidden" name="platfrom" id="platfrom" class="form-control" value="web" required="required">
					<input type="hidden" name="token" id="token" class="form-control" value="<?=$token?>" required="required">
					<input type="password" name="pwd" id="pwd" class="form-control" value="" required="required" pattern="Password" title="Password" placeholder="Password">
				</div>
				<br>
				<label>Konfirmasi Password Baru</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-lock"></i>
					</div>
					<input type="password" name="cpwd" id="cpwd" class="form-control" value="" required="required" pattern="Konfirmasi Password" title="Konfirmasi Password" placeholder="Konfirmasi Password">
				</div>
				<br>
				<div class="row">
					<!-- /.col -->
					<div class="col-xs-12">
						<a id="ganti" class="btn btn-primary btn-block btn-flat">Ganti Password</a>
						<p id ="status"></p>
					</div>
					<!-- /.col -->
				</div>
			</form>
		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery 3 -->
	<script src="<?=base_url()?>assets/lte/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?=base_url()?>assets/lte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="<?=base_url()?>assets/lte/plugins/iCheck/icheck.min.js"></script>

	<!-- Globaljs-->
	<script type="text/javascript">var url="<?=base_url()?>";</script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/global.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.form-control').keyup(function(event) {
				if(event.keyCode==13){
					event.preventDefault();
					ganti();	
				}
			});

			$('#ganti').click(function(event) {
				event.preventDefault();
				ganti();
			});
		});

		function ganti() {
			if(!valid()){
				return;
			}
			var data = new FormData(document.getElementById('form-forget'));
			ajaxCallForm(base_url('api/v1/forgot'), data, function (data) {
				var response = $.parseJSON(data);
				if(response.code==200){
					alert("SUKSES GANTI PASSWORD");
					window.location.href="<?=base_url('login')?>";
					$('#status').html("");
				}else{
					$('#status').html("ERROR");
				}
			});
		}

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
	</script>
</body>
</html>
