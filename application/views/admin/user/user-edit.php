<div class="row">
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3">
    <div class="box box-primary">
      <div class="box-body">
        <div class="form-group">
          <label>Username</label>
          <select class="form-control selectize" style="width: 100%;"></select>
        </div>
        <form>
          <label>Username</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-address-card"></i>
            </div>
            <input type="text" name="nama" id="nama" class="form-control" required="required" title="Username" placeholder="Username">
          </div>
          <br>
          <label>Password</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-lock"></i>
            </div>
            <input type="password" name="pwd" id="pwd" class="form-control" title="Password" placeholder="Password">
          </div>
          <p style="color: gray; font-size: 14px;">Password tidak berubah</i></p>
          <br>
          <label>Level Akun</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-sitemap"></i>
            </div>
            <select name="level" id="level" class="form-control">
              <?php foreach ($level as $level) { ?>
              <option value="<?=$level->uid?>"><?=$level->nama?></option>
              <?php } ?>
            </select>
          </div>
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
  var uid=null;
  $(document).ready(function() {
    var temp = $('.selectize').selectize(config_server_selectize());
    selectize = temp[0].selectize;

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
    $('body').loading();
    var json = JSON.stringify({
      "m":"edit",
      "platfrom":"web",
      "uid":uid,
      "nama":$('#nama').val(),
      "persentasi_jual":$('#percent').val()
    });
    ajaxCallJson(base_url('api/v1/level'),json,function(data) {
      $('body').loading("stop");
      json = JSON.parse(data);
      if(json.code==200){
        $('.form-control').val("");
        uid = null;
        selectize.clear();
        selectize.clearOptions();
        alert("Sukses update data");
      }else{
        alert("ERROR");
      }
    });
  }

  function load(t) {
    var json = JSON.stringify({
      "m":"getLevel",
      "platfrom":"web",
      "uid":t
    });
    ajaxCallJson(base_url('api/v1/user'),json,function(data) {
      json = JSON.parse(data);
      if(json.code==200){
        var data = json.data;
        $('#nama').val(data.nama);
        $('#percent').val(data.persentasi_jual);
        uid = data.uid;
      }else{
        alert("ERROR LOAD!!!");
      }
    });
  }

  function config_server_selectize(){
    var config = {
      'create':false,
      'placeholder':"Username",
      'sortField':'text',
      load:function(query, callback) {
        var url = base_url("admin/user/list_selectize");
        var data = {'key':query};
        ajaxCallSelectize(url, data, callback);
      }
    };
    return config;
  }
</script>