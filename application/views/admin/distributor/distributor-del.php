<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3">
		<div class="box box-danger">
			<div class="box-body">
				<p>Apakah anda yakin untuk menghapus distributor <b><?=$distributor?></b> dari sistem ?</p>
				<center>
					<a type="button" id="hapus" data-uid="<?=$distributor?>" class="btn btn-danger">Hapus</a>
					<a href="javascript:history.back()" type="button" class="btn btn-success">Batal</a>
				</center>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?=base_url('assets/js/global.js')?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#hapus').click(function(event) {
			event.preventDefault();
			hapus($(this).data("uid"));
		});
	});

	function hapus(uid) {
		var json = {
			"m" : "del",
			"platfrom" : "web",
			"uid" : uid
		};
		ajaxCall(base_url('api/v1/distributor'), json, function (data) {
			var json = $.parseJSON(data);
			if(json.code==200){
				alert("SUKSES Hapus");
				javascript:history.back();
			}else{
				alert(json.message);
			}
		});
	}
</script>