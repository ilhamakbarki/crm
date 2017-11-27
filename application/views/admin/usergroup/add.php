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
            <input type="text" name="nama" id="nama" class="form-control" required="required" title="Username" placeholder="Username">
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
    $('#loading-template').loading();
    var json = JSON.stringify({
      "m":"add",
      "platfrom":"web",
      "nama":$('#nama').val()
    });
    ajaxCallJson(base_url('/api/v1/usergroup'), json, function(data) {
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