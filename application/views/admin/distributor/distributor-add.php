<div class="row">
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3">
    <div class="box box-primary">
      <div class="box-body">
        <form id="form-add">
          <label>Nama Distributor</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-user"></i>
            </div>
            <input type="text" name="nama" id="nama" class="form-control" required="required" title="Nama Distributor" placeholder="Nama Distributor">
            <input type="hidden" name="m" id="m"  required="required" value="add">
            <input type="hidden" name="platfrom" id="platfrom"  required="required" value="web">
          </div>
          <br>
          <label>Nama PT</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-address-card"></i>
            </div>
            <input type="text" name="pt" id="pt" class="form-control" required="required" title="Nama PT" placeholder="Nama PT">
          </div>
          <br>
          <label>Alamat</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-address-card-o"></i>
            </div>
            <input type="text" name="alamat" id="alamat" class="form-control" required="required" title="Alamat" placeholder="Alamat Distributor">
          </div>
          <br>
          <label>Email</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-envelope"></i>
            </div>
            <input type="email" name="email" id="email" class="form-control" required="required" title="Email" placeholder="Email Distributor">
          </div>
          <br>
          <label>No. Telp</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-phone"></i>
            </div>
            <input type="number" name="telp" id="telp" class="form-control" required="required" title="No. Telp" placeholder="No. Telp Distributor">
          </div>
          <br>
          <div class="form-group">
            <label>Username</label>
            <select id="id_u" name="id_u" class="form-control selectize" style="width: 100%;"></select>
          </div>
          <label>Level Distributor</label>
          <select name="grup" id="grup" class="form-control" required="required">
            <?php foreach ($level as $l) {?>
            <option value="<?=$l->uid?>"><?=$l->nama?></option>
            <?php } ?>
          </select>
          <br>
          <center>
            <a type="button" id="tambah" class="btn btn-primary">Tambah</a>
            <a href="<?=base_url('admin/distributor')?>" type="button" class="btn btn-danger">Batal</a>
          </center>
        </form>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="<?=base_url('assets/selectize/css/selectize.bootstrap3.css')?>">
<script type="text/javascript" src="<?=base_url('assets/js/global.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/selectize/js/standalone/selectize.min.js')?>"></script>
<script type="text/javascript">
  var selectize;
  $(document).ready(function() {
    $('#tambah').click(function(event) {
      event.preventDefault();
      tambah();
    });

    $('.form-control').keyup(function(event) {
      event.preventDefault();
      if(event.keyCode==13){
        tambah();
      }
    });

    var temp = $('.selectize').selectize(config_server_selectize());
    selectize = temp[0].selectize;
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

  function tambah() {
    if(!valid()){
      return;
    }
    var data = new FormData(document.getElementById('form-add'));
    var grup = $('#grup').val();
    ajaxCallForm(base_url('api/v1/distributor'), data, function (data) {
      var response = JSON.parse(data);
      if(response.code==200){
        alert("Sukses input data");
        $('.form-control').val("");
        selectize.clear();
        selectize.clearOptions();
        $('#grup').val(grup);  
      }else{
        alert(response.message);
      }
    });
  }

  function config_server_selectize(){
    var config = {
      'create':false,
      'placeholder':"Username",
      'sortField':'text',
      load:function(query, callback) {
        var url = base_url("admin/distributor/list_selectize");
        var data = {'key':query};
        ajaxCallSelectize(url, data, callback);
      }
    };
    return config;
  }
</script>