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
			<a><b>Lupa</b> Password</a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg">Distributor Kusuma Agrowisata</p>
			<div class="form-group has-feedback">
				<input type="text" name="email" id="email" class="form-control" required="required" placeholder="Email">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			<div class="row">
				<!-- /.col -->
				<div class="col-xs-12">
					<a id="kirim" class="btn btn-primary btn-block btn-flat">Kirim</a>
					<p id ="status"></p>
				</div>
				<!-- /.col -->
			</div>			
		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery 3 -->
	<script src="<?=base_url()?>assets/lte/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?=base_url()?>assets/lte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Globaljs-->
	<script type="text/javascript">var url="<?=base_url()?>";</script>
	<script type="text/javascript" src="<?=base_url()?>assets/js/global.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.form-control').keyup(function(event) {
				event.preventDefault();
				if(event.keyCode==13){
					kirim();	
				}
			});

			$('#kirim').click(function(event) {
				event.preventDefault();
				kirim();
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

		function kirim() {
			if(!valid()){
				return;
			}
			var data = JSON.stringify({
				"email":$('#email').val()
			});
			ajaxCallJson(base_url('forgot/sendForgotP'), data, function (data) {
				var response = $.parseJSON(data);
				if(response.code==200){
					alert("Silahkan Check Email");
					$('#status').html("");
				}else{
					$('#status').html("Gagal silahkan coba lagi");
				}
			});
		}
	</script>
</body>
</html>
