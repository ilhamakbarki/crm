<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3">
		<div class="box box-danger">
			<div class="box-body">
				<p>Apakah anda yakin untuk menghapus barang <b><?=$item?></b> dari sistem ?</p>
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
	$(document).ready(function() {
		$('#delete').click(function(event) {
			event.preventDefault();
			var data = JSON.stringify({
				"m":"del",
				"platfrom":"web",
				"uid":<?=$item?>
			});
			ajaxCallJson(base_url('/api/v1/item'),data,function (data) {
				var json = JSON.parse(data);
				if(json.code==200){
					alert("Sukses Hapus Barang");
					javascript:history.back();
				}else{
					alert("SOMETHING ERROR!!!");
				}
			});
		});
	});
</script>