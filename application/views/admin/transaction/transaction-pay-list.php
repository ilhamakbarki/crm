<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Detail Pembelian Barang</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
        <br>
        <a href="<?=base_url('admin/transaction/item/').$in?>" type="button" class="btn btn-primary pull-right">Ubah Barang</a>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Sub Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Barang 1</td>
                <td>10</td>
                <td align="right">Rp. 200.000</td>
                <td align="right">Rp. 2.000.000</td>
              </tr>
              <tr>
                <td>Barang 2</td>
                <td>2</td>
                <td align="right">Rp. 250.000</td>
                <td align="right">Rp. 500.000</td>
              </tr>
              <tr>
                <td>Barang 3</td>
                <td>4</td>
                <td align="right">Rp. 100.000</td>
                <td align="right">Rp. 400.000</td>
              </tr>
              <tr>
                <td>Barang 5</td>
                <td>10</td>
                <td align="right">Rp. 20.000</td>
                <td align="right">Rp. 200.000</td>
              </tr>
              <tr>
                <td colspan="3"><b>Total</b></td>
                <td align="right">Rp. 3.100.000</td>
              </tr>
              <tr>
                <td colspan="3"><b>Dibayar</b></td>
                <td align="right">Rp. 2.500.000</td>
              </tr>
              <tr>
                <td colspan="3"><b>Sisa</b></td>
                <td align="right">Rp. 600.000</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" class="pull-right" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
        <h3 class="box-title">Detail Pembayaran</h3>
        <br>
        <a href="<?=base_url('admin/transaction/pay/').$in?>" type="button" class="btn btn-primary pull-right">Ubah Pembayaran</a>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Bank</th>
                <th>Rekening</th>
                <th>Bayar</th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i=1; $i < 20; $i++) { ?>
              <tr>
                <td><?=$i?></td>
                <td>
                  <?php
                  $timestamp = mt_rand($i, time());
                  echo date("d M Y", $timestamp);
                  ?>  
                </td>
                <td>BCA</td>
                <td><?=rand(1000000, 9999999)?></td>
                <td align="right">Rp. <?=number_format(rand(200000, 1000000))?></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <center>
    <a type="button" href="javascript:history.back()" class="btn btn-danger">Batal</a>
    </center>
  </div>
</div>