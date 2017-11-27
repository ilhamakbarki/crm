<div class="row">
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3">
    <div class="box box-primary">
      <div class="box-body">
        <form>
          <div class="form-group">
            <label>Distributor</label>
            <select class="form-control" id="distributor" style="width: 100%;"></select>
          </div>
          <label>Nama Dsitributor</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-user"></i>
            </div>
            <input type="text" name="nama" id="nama" class="form-control" required="required" title="Nama Distributor" placeholder="Nama Distributor">
          </div>
          <br>
          <label>Nama PT</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-user"></i>
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
            <input type="text" name="telp" id="telp" class="form-control" required="required" title="No. Telp" placeholder="No. Telp Distributor">
          </div>
          <br>
          <label>Username</label>
          <select name="user" id="user" class="form-control" required="required"></select>
          <br>
          <label>Level Distributor</label>
          <select name="level" id="level" class="form-control" required="required">
            <?php foreach ($level as $l) { ?>
            <option id="L<?=$l->uid?>" value="<?=$l->uid?>"><?=$l->nama?></option>
            <?php } ?>
          </select>
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
 var distributor;
 var username;
 var uid=null;
 var grup=null;
 var id_u=null;

 $(document).ready(function() {
  var temp = $('#distributor').selectize(config_server_selectize());
  distributor = temp[0].selectize;

  var temp = $('#user').selectize(config_server_user());
  username = temp[0].selectize;

  if("<?=$distributor?>"!=""){
    uid = "<?=$distributor?>";
    load(uid);
  }

  $('#distributor').change(function(event) {
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
  var json = {
    "m" :"edit",
    "platfrom" : "web",
    "uid" : uid,
    "nama" : $('#nama').val(),
    "pt" : $('#pt').val(),
    "alamat" : $('#alamat').val(),
    "email" : $('#email').val(),
    "telp" : $('#telp').val(),
    "grup" : $('#level').val(),
    "id_u" : id_u
  };

  $('body').loading();
  ajaxCall(base_url('api/v1/distributor'),json,function(data) {
    console.log(data);
    $('body').loading("stop");
    json = JSON.parse(data);
    if(json.code==200){
      $('.form-control').val("");
      uid = null;
      distributor.clear();
      distributor.clearOptions();
      username.clear();
      username.clearOptions();
      alert("Sukses update data");
    }else{
      alert("ERROR");
    }
  });
}

function load(t) {
  var json = {
    "m":"getDistributor",
    "platfrom":"web",
    "uid":t
  };
  ajaxCall(base_url('api/v1/distributor'), json, function(data) {
    json = JSON.parse(data);
    if(json.code==200){
      var data = json.data;
      $('#nama').val(data.nama);
      $('#pt').val(data.pt);
      $('#alamat').val(data.alamat);
      $('#email').val(data.email);
      $('#telp').val(data.telp);
      id_u = data.id_u;
      grup = data.grup;
      $('#L'+data.grup).prop('selected', 'selected');
      uid = data.uid;
    }else{
      alert("ERROR LOAD!!!");
    }
  });
}

function config_server_selectize(){
  var config = {
    'create':false,
    'placeholder':"Distributor",
    'sortField':'text',
    load:function(query, callback) {
      var url = base_url("admin/distributor/list_selectize_distributor");
      var data = {'key':query};
      ajaxCallSelectize(url, data, callback);
    },
    onChange:function(data) {
      grup=data;
    }
  };
  return config;
}

function config_server_user(){
  var config = {
    'create':false,
    'placeholder':"Username",
    'sortField':'text',
    load:function(query, callback) {
      var url = base_url("admin/distributor/list_selectize");
      var data = {'key':query};
      ajaxCallSelectize(url, data, callback);
    },
    onChange:function(data) {
      id_u=data;
    }
  };
  return config;
}
</script>