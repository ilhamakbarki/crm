<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3">
		<div class="box box-danger">
			<div class="box-body">
				<p>Apakah anda yakin untuk menghapus user level <b><?=$user?></b> dari sistem ?</p>
				<center>
					<a type="button" id="delete" class="btn btn-danger">Hapus</a>
					<a href="javascript:history.back()" type="button" class="btn btn-success">Batal</a>
				</center>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?=base_url('assets/js/global.js')?>"></script>
<script type="text/javascript">
	var uid=null;
	$(document).ready(function() {
		uid = "<?=$user?>";
		$('#delete').click(function(event) {
			event.preventDefault();
			del();
		});
	});

	function del() {
		$('body').loading();
		var json = JSON.stringify({
			"m":"del",
			"platfrom":"web",
			"uid":uid
		});
		ajaxCallJson(base_url('api/v1/usergroup'), json, function (data) {
			$('body').loading('stop');
			json = JSON.parse(data);
			if(json.code==200){
				alert("SUKSES Hapus");
				javascript:history.back();
			}else{
				alert("ERROR");
			}
		});
	}
</script>