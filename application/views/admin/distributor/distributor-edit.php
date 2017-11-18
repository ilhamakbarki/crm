<div class="row">
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3">
    <div class="box box-primary">
      <div class="box-body">
        <form>
          <div class="form-group">
            <label>Distributor</label>
            <select class="form-control select2" style="width: 100%;">
              <?php for ($i=1; $i <=5 ; $i++) { ?>
              <option>D<?=rand(1000,9999)?></option>
              <?php } ?>
            </select>
          </div>
          <label>Nama Dsitributor</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-user"></i>
            </div>
            <input type="text" name="nama" id="nama" class="form-control" required="required" title="Nama Distributor" placeholder="Nama Distributor">
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
          <label>Level Distributor</label>
          <select name="level" id="level" class="form-control" required="required">
            <option value="silver">Silver</option>
            <option value="premium">Premium</option>
            <option value="gold">Gold</option>
            <option value="platinum">Platinum</option>
          </select>
          <br>
          <label>Password Login</label>
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-lock"></i>
            </div>
            <input type="password" name="pwd" id="pwd" class="form-control" required="required" title="Password" placeholder="Password tidak berubah">
          </div>
          <p style="font-style: italic; font-size: 10px; color: gray;">Jika password tidak diisi maka password tidak berubah</p>
          <center>
            <a type="button" class="btn btn-primary">Simpan</a>
            <a href="javascript:history.back()" type="button" class="btn btn-danger">Batal</a>
          </center>
        </form>
      </div>
    </div>
  </div>
</div>