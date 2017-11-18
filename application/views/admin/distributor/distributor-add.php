<div class="row">
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3">
    <div class="box box-primary">
      <div class="box-body">
        <form>
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
            <input type="password" name="pwd" id="pwd" class="form-control" required="required" title="Password" placeholder="Password Distributor">
          </div>
          <p style="font-style: italic; font-size: 10px; color: gray;">Password Default <b>Kusuma_123</b></p>
          <center>
            <a type="button" class="btn btn-primary">Tambah</a>
            <a href="<?=base_url('admin/distributor')?>" type="button" class="btn btn-danger">Batal</a>
          </center>
        </form>
      </div>
    </div>
  </div>
</div>