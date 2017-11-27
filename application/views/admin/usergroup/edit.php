<div class="row">
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3">
    <div class="box box-primary">
      <div class="box-body">
        <div class="form-group">
          <label>Pengguna</label>
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
    var data = {
      "m":"edit",
      "platfrom":"web",
      "uid":uid,
      "nama":$('#nama').val()
    };
    var json = JSON.stringify(data);
    $('body').loading();
    ajaxCallJson(base_url('api/v1/usergroup'),json,function(data) {
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
      "m":"getUsergroup",
      "platfrom":"web",
      "uid":t
    });
    ajaxCallJson(base_url('api/v1/usergroup'),json,function(data) {
      json = JSON.parse(data);
      if(json.code==200){
        var data = json.data;
        $('#nama').val(data.nama);
        uid = data.uid;
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
        var url = base_url("admin/usergroup/list_selectize");
        var data = {'key':query};
        ajaxCallSelectize(url, data, callback);
      }
    };
    return config;
  }
</script>