<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<!-- Default box -->
<div class="box box-primary">
  <div class="box-body">
    <a href="<?=base_url('admin/distributor/add')?>" type="button" class="btn btn-primary">Tambah</a>
    <br><br>
    <div class="table-responsive">  
      <table class="data-table table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nama PT</th>
            <th>Email</th>
            <th>No. Telp</th>
            <th>Level</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $level=array("Silver","Premium","Gold","Platinum"); for ($i=1; $i <=20 ; $i++) {?>
          <tr>
            <td><?=$i?></td>
            <td>Distributor <?=rand(100,999)?></td>
            <td>PT <?=$i?></td>
            <td>distributor<?=$i?>@domain.com</td>
            <td>087<?=rand(100000000,999999999)?></td>
            <td><?=$level[rand(0,3)]?></td>
            <td>
              <a href="<?=base_url('admin/distributor/edit/')."D".$i?>" class="btn btn-default">Edit</a>
              <a href="<?=base_url('admin/distributor/delete/')."D".$i?>" class="btn btn-danger">Delete</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- DataTables -->
<script src="<?=base_url()?>assets/lte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/js/admin/distributor/distributor-list.js')?>"></script>
