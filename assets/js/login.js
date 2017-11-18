$(function () {
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

function login_auth() {
	if($('#uid').val()==""||$('#pwd').val()==""){
		$('#status').html("Semua form dibutuhkan!!!");
		$('#status').css('color', 'red');
		return;
	}
	$('#status').html("");

}
