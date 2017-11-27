<div class="row">
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3">
    <div class="box box-primary">
      <div class="box-body">
        <form>
          <label>Nama</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-address-card"></i>
            </div>
            <input type="text" name="nama" id="nama" class="form-control" required="required" title="Nama Admin" placeholder="Nama Admin">
          </div>
          <br>
          <label>Alamat</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-address-card"></i>
            </div>
            <input type="text" name="alamat" id="alamat" class="form-control" required="required" title="Alamat" placeholder="Alamat">
          </div>
          <br>
          <label>Email</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-address-card"></i>
            </div>
            <input type="text" name="email" id="email" class="form-control" required="required" title="Email" placeholder="Email">
          </div>
          <br>
          <label>Telp</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-address-card"></i>
            </div>
            <input type="number" name="telp" id="telp" class="form-control" required="required" title="Telp" placeholder="Telp">
          </div>
          <br>
          <label>Username</label>
          <select name="id_u" id="id_u" class="form-control"></select>
          <br>
          <center>
            <a type="button" id="save" class="btn btn-primary">Tambah</a>
            <a href="javascript:history.back()" type="button" class="btn btn-danger">Batal</a>
          </center>
        </form>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="<?=base_url('assets/selectize/css/selectize.bootstrap3.css')?>">
<script type="text/javascript" src="<?=base_url('assets/selectize/js/standalone/selectize.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/global.js')?>"></script>
<script type="text/javascript">
  var selectize;
  $(document).ready(function() {

    var temp = $('#id_u').selectize(config_server_selectize());
    selectize = temp[0].selectize;
    $('#save').click(function(event) {
      event.preventDefault();
      add();
    });

    $('.form-control').keyup(function(event) {
      if(event.keyCode==13){
       event.preventDefault();
       add();
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

  function add() {
    if(!valid()){
      return;
    }
    var json = JSON.stringify({
      "m":"add",
      "platfrom":"web",
      "nama":$('#nama').val(),
      "alamat":$('#alamat').val(),
      "email":$('#email').val(),
      "telp":$('#telp').val(),
      "id_u":$('#id_u').val()
    });
    ajaxCallJson(base_url('/api/v1/admin'), json, function (data) {
      $('#loading-template').loading("stop");
      json = JSON.parse(data);
      if(json.code==200){
        $('.form-control').val("");
        $('#nama').focus();
        alert("Sukses Input Data");
      }else{
        alert("Error Perbaiki Data");
      }
    });
  }

  function config_server_selectize(){
    var config = {
      'create':false,
      'placeholder':"Username",
      'sortField':'text',
      load:function(query, callback) {
        var url = base_url("admin/admin/list_selectize_admin");
        var data = {'key':query};
        ajaxCallSelectize(url, data, callback);
      }
    };
    return config;
  }
</script>