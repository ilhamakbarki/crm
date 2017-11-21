<div class="row">
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3">
    <div class="box box-primary">
      <div class="box-body">
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
          <p style="color: gray; font-size: 14px;">Password default <i><b>kusumaagro</b></i></p>
          <br>
          <label>Konfirmasi Password</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-lock"></i>
            </div>
            <input type="password" name="cpwd" id="cpwd" class="form-control" title="Konfirmasi Password" placeholder="Konfirmasi Password">
          </div>
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
<script type="text/javascript" src="<?=base_url('assets/js/global.js')?>"></script>
<script type="text/javascript">
  $(document).ready(function() {
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
    if($('#pwd').val()!=$('#cpwd').val()){
      $('#cpwd').focus();
      var parent = $('#cpwd').parent();
      parent.addClass('has-error');
      return;
    }else{
      var parent = $('#cpwd').parent();
      parent.removeClass('has-error');
    }
    $('#loading-template').loading();
    var pwd = $('#pwd').val();
    var cpwd = $('#cpwd').val();
    if(pwd==""&&cpwd==""){
      pwd = "kusumaagro";
      cpwd = "kusumaagro";
    }
    var json = JSON.stringify({
      "m":"add",
      "platfrom":"web",
      "user":$('#nama').val(),
      "pwd":pwd,
      "cpwd":cpwd,
      "level":$('#level').val()
    });
    ajaxCallJson(base_url('/api/v1/user'), json, function (data) {
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
</script>