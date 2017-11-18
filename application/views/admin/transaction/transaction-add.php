<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?=base_url('assets/lte/')?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<div class="row">
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3">
    <div class="box box-primary">
      <div class="box-body">
        <form>
          <label>No Invoice</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-users"></i>
            </div>
            <input type="text" name="id" id="id" class="form-control" required="required" title="Nomor Invoice" placeholder="Nomor Invoice">
          </div>
          <br>
          <label>Tanggal</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="date" name="tgl" id="tgl" class="form-control" required="required" title="Tanggal Invoice" placeholder="Tanggal Invoice">
          </div>
          <br>
          <label>Distributor</label>
          <select name="distributor" id="distributor" class="form-control" required="required">
            <?php for ($i=1; $i <=10 ; $i++) { ?>
            <option value="<?=$i?>">D<?=rand(1000,9999)?></option>
            <?php }?>
          </select>
          <br>
          <center>
            <a type="button" class="btn btn-primary">Tambah</a>
            <a href="<?=base_url('admin/transaction')?>" type="button" class="btn btn-danger">Batal</a>
          </center>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="<?=base_url('assets/lte/')?>/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    /*$('#tgl').datepicker({
      autoclose: true
    });*/
  });
</script>