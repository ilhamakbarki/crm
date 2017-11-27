<div class="row">
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3">
    <div class="box box-primary">
      <div class="box-body">
        <div class="form-group">
          <label>Admin</label>
          <select class="form-control selectize" style="width: 100%;"></select>
        </div>
        <form>
          <label>Nama</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-address-card"></i>
            </div>
            <input type="text" name="nama" id="nama" class="form-control" required="required" title="Username" placeholder="Username">
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
            <a type="button" id="save" class="btn btn-primary">Simpan</a>
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
  var selectize_username;
  var uid=null;
  var id_u=null;
  $(document).ready(function() {
    var temp = $('.selectize').selectize(config_server_selectize());
    selectize = temp[0].selectize;

    var temp = $('#id_u').selectize(config_server_selectize_username());
    selectize_username = temp[0].selectize;

    if("<?=$id?>"!=""){
      uid = "<?=$id?>";
      load(uid);
    }

    $('.selectize').change(function(event) {
      if($(this).val()!="" && $(this).val()!=uid){
        uid = $(this).val();
        load(uid);
      }
    });

    $('#save').click(function(event) {
      save();
    });

    $('.form-control').keyup(function(event) {
      if(event.keyCode==13){
        save();
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

  function save() {
    if(!valid()||uid==null){
      return;
    }
    var data = {
      "m":"edit",
      "platfrom":"web",
      "uid":uid,
      "nama":$('#nama').val(),
      "alamat":$('#alamat').val(),
      "email":$('#email').val(),
      "telp":$('#telp').val(),
      "id_u":id_u
    };
    var json = JSON.stringify(data);
    $('body').loading();
    ajaxCallJson(base_url('api/v1/admin'),json,function(data) {
      $('body').loading("stop");
      json = JSON.parse(data);
      if(json.code==200){
        $('.form-control').val("");
        uid = null;
        id_u = null;
        selectize.clear();
        selectize.clearOptions();
        selectize_username.clear();
        selectize_username.clearOptions();
        alert("Sukses update data");
      }else{
        alert("ERROR");
      }
    });
  }
  function load(t) {
    var json = JSON.stringify({
      "m":"getAdmin",
      "platfrom":"web",
      "uid":t
    });
    ajaxCallJson(base_url('api/v1/admin'),json,function(data) {
      json = JSON.parse(data);
      if(json.code==200){
        var data = json.data;
        $('#nama').val(data.nama);
        $('#alamat').val(data.alamat);
        $('#email').val(data.email);
        $('#telp').val(data.telp);
        uid = data.uid;
        id_u = data.id_u;
      }else{
        alert("ERROR LOAD!!!");
      }
    });
  }

  function config_server_selectize(){
    var config = {
      'create':false,
      'placeholder':"User Level",
      'sortField':'text',
      load:function(query, callback) {
        var url = base_url("admin/admin/list_selectize");
        var data = {'key':query};
        ajaxCallSelectize(url, data, callback);
      }
    };
    return config;
  }

  function config_server_selectize_username() {
    var config = {
      'create':false,
      'placeholder':"User Level",
      'sortField':'text',
      load:function(query, callback) {
        var url = base_url("admin/admin/list_selectize_admin");
        var data = {'key':query};
        ajaxCallSelectize(url, data, callback);
      },onChange:function (data) {
        id_u=data;
      }
    };
    return config;
  }
</script>