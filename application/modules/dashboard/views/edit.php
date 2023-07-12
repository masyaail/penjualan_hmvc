<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Tambahkan Data Baru</h1>
				</div>
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
        <form method="post" action="<?php echo site_url('dashboard/update/'.$penjualan['id']); ?>">
            <div class="form-group">
                <label for="nama_barang">Nama Barang:</label>
                <input type="text" class="form-control" name="nama_barang" value="<?php echo $penjualan['nama_barang']; ?>" required>
            </div>
            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="text" class="form-control" name="stok" value="<?php echo $penjualan['stok']; ?>" required>
            </div>
            <div class="form-group">
                <label for="jumlah_terjual">Jumlah Terjual:</label>
                <input type="text" class="form-control" name="jumlah_terjual" value="<?php echo $penjualan['jumlah_terjual']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal_transaksi">Tanggal Transaksi:</label>
                <input type="date" class="form-control" name="tanggal_transaksi" value="<?php echo $penjualan['tanggal_transaksi']; ?>" required>
            </div>
            <div class="form-group">
                <label for="jenis_barang">Jenis Barang:</label>
                <input type="text" class="form-control" name="jenis_barang" value="<?php echo $penjualan['jenis_barang']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

		</div>
	</div>
	<!-- /.content -->
</div>