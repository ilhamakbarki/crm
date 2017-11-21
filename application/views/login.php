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
			<a href="<?=base_url('login')?>"><b>Selamat</b>Datang</a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg">Distributor Kusuma Agrowisata</p>
			<form action="<?=base_url('login/auth')?>" id="form-login" method="post">
				<div class="form-group has-feedback">
					<input type="text" name="usr" id="usr" class="form-control" required="required" placeholder="Username atau Email">
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
					<p id ="status-usr" style="color: red;"></p>
				</div>
				<div class="form-group has-feedback">
					<input type="password" name="pwd" id="pwd" class="form-control" required="required" placeholder="Password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					<p id ="status-pwd" style="color: red;"></p>
				</div>
				<div class="row">
					<!-- /.col -->
					<div class="col-xs-12">
						<a id="masuk" class="btn btn-primary btn-block btn-flat">Masuk</a>
						<p id ="status" style="color: red;"></p>
					</div>
					<!-- /.col -->
				</div>
			</form>

			<a href="<?=base_url('forgot')?>">Lupa Password</a><br>
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
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%'  
			});

			$('#masuk').click(function(event) {
				event.preventDefault();
				login_auth();
			});

			$('input').on('keyup', function(event) {
				event.preventDefault();
				if(event.keyCode==13){
					login_auth();
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

		function login_auth() {
			if(!valid()){
				return;
			}
			var data = new FormData(document.getElementById("form-login"));
			ajaxCallForm(base_url("login/auth"),data, function(data) {
				var response = $.parseJSON(data);
				if(response.code==200){
					window.location.reload();
				}else{
					if(!$.isEmptyObject(response.data.usr)){
						$('#status-usr').html(response.data.usr);
					}else{
						$('#status-usr').html("");
					}
					if(!$.isEmptyObject(response.data.pwd)){
						$('#status-pwd').html(response.data.pwd);
					}else{
						$('#status-pwd').html("");
					}
					if(!$.isEmptyObject(response.data.status)){
						$('#status').html(response.data.status);
					}else{
						$('#status').html("");
					}
				}
			});			
		}
	</script>
</body>
</html>
