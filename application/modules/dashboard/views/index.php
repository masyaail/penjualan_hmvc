<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Dashboard</h1>
				</div>
        <div>
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
  
	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
    <a href="<?= base_url('penjualan/create');?>" class="btn btn-block btn-primary">Tambah</a>
    <br>
    <form action="<?php echo site_url('dashboard/filter_date'); ?>" method="get">
        <div class="form-group">
            <label>Tanggal Mulai</label>
            <input type="date" name="start_date" class="form-control">
        </div>
        <div class="form-group">
            <label>Tanggal Selesai</label>
            <input type="date" name="end_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    <br>
    <form action="<?php echo site_url('dashboard/sort'); ?>" method="post">
        <div class="form-group">
            <select name="column" class="form-control">
                <option value="nama_barang">Nama Barang</option>
                <option value="tanggal_transaksi">Tanggal Transaksi</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Urutkan</button>
    </form>
    <table class="table">
      <thead>
          <tr>
          <th>No</th>
          <th>Nama Barang</th>
          <th>Stok</th>
          <th>Jumlah Terjual</th>
          <th>Tanggal Transaksi</th>
          <th>Jenis Barang</th>
          <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
          <?php 
          $no = 1;
          foreach ($penjualan as $data) : ?>
          <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $data['nama_barang']; ?></td>
              <td><?php echo $data['stok']; ?></td>
              <td><?php echo $data['jumlah_terjual']; ?></td>
              <td><?php echo $data['tanggal_transaksi']; ?></td>
              <td><?php echo $data['jenis_barang']; ?></td>
              <td>
                  <a href="<?php echo base_url('penjualan/edit/' . $data['id']); ?>" class="btn btn-warning">Edit</a>
                  <a href="<?php echo base_url('penjualan/delete/' . $data['id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
              </td>
          </tr>
              <?php endforeach; ?>
      </tbody>
    </table>
		</div>
	</div>
      <!-- Modal -->
  </div>
      <!-- /.Modal -->
	<!-- /.content -->
</div>
