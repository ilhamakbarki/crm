<div class="box box-primary">
  <div class="box-body">
    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <form method="POST" id="form-barang">
          <label>Nama Barang</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-shopping-bag"></i>
            </div>
            <input type="text" name="nama" id="nama" class="form-control" required="required" title="Nama Barang" placeholder="Nama Barang">
          </div>
          <br>
          <label>Kode Barang</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-key"></i>
            </div>
            <input type="text" name="kode" id="kode" class="form-control" required="required" title="Kode Barang" placeholder="Kode Barang">
          </div>
          <br>
          <label>Satuan Barang</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-object-group"></i>
            </div>
            <input type="text" name="satuan" id="satuan" class="form-control" required="required" title="Satuan Barang" placeholder="Satuan Barang">
          </div>
          <br>
          <label>Stok Barang</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-archive"></i>
            </div>
            <input type="number" name="stok" id="stok" class="form-control" required="required" title="Stok Barang" placeholder="Stok Barang">
          </div>
          <br>
        </form>
        <br>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="box-body">
          <div class="table-responsive">            
            <form>
             <label>Harga Beli Barang</label>
             <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-shopping-cart"></i>
              </div>
              <input type="number" name="beli" id="beli" class="form-control" required="required" title="Harga Beli" placeholder="Harga Beli">
            </div>
            <br>
            <label>Harga Jual Barang Sesuai Level</label>
            <table class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Level</th>
                  <th>Jual</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($d_grup as $grup) { ?>
                <tr>
                  <td><?=$i?></td>
                  <td><?=$grup->nama?></td>
                  <td>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i><?=$grup->persentasi_jual?>%</i>
                      </div>
                      <input type="number" data-persen="<?=$grup->persentasi_jual?>" data-name="<?=$grup->uid?>" data-id="<?=$grup->uid?>" class="form-control level-harga" title="Silver">
                    </div>
                  </td>
                </tr>
                <?php $i++;} ?>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <center>
        <a type="button" id="save" class="btn btn-primary">Simpan</a>
        <a href="javascript:history.back()" type="button" class="btn btn-danger">Batal</a>
      </center>
    </div>
  </div>
</div>
</div>
<script type="text/javascript" src="<?=base_url('assets/js/global.js')?>"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#save').click(function(event) {
      event.preventDefault();
      kirim();
    });

    $('.form-control').keyup(function(event) {
      if(event.keyCode==13){
        event.preventDefault();
        kirim();
      }
    });

    $('#beli').change(function(event) {
      hitungHarga($(this).val());
    });

    $('#beli').keyup(function(event) {
      hitungHarga($(this).val());
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

    function kirim() {
      if(!valid()){
        return;
      }
      $('body').loading();
      var temp = {};
      temp["m"]="add";
      temp["platfrom"]="web";
      temp["kode"]=$('#kode').val();
      temp["nama"]=$('#nama').val();
      temp["satuan"]=$('#satuan').val();
      temp["stok"]=$('#stok').val();
      temp["beli"]=$('#beli').val();
      $('.level-harga').each(function(index, el) {
        temp["K"+$(this).data("id")]=$(this).val();
      });
      var json = JSON.stringify(temp);      
      ajaxCallJson(base_url('api/v1/item'),json, callback_kirim);
    }

    function callback_kirim(data) {
      $('body').loading('stop');
      var json = JSON.parse(data);
      if(json.code==200){
        $('.form-control').val("");
        alert("Sukses Input Data");
      }else{
        alert("Error Perbaiki Data");
      }
    }

    function hitungHarga(event) {
      var beli = parseInt(event);
      if(beli<=0){
        $('#beli').val("");
        return;
      }
      $('.level-harga').each(function(index, el) {
        var hasil = parseInt(beli*$(this).data("persen")/100);
        $(this).val(hasil+beli);
      });
    } 
  });  
</script>