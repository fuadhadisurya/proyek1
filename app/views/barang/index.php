                    <?php Flasher::alert(); ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
                        </div>
                        <div class="card-body">
                        <!-- Button modal tambah -->
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahBarang">
                            <i class="fas fa-plus"></i> Tambah Barang
                        </button>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="barang" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Kode Barang</th>
                                            <th>Nama</th>
                                            <th>Merk</th>
                                            <th>Model</th>
                                            <th>Jumlah</th>
                                            <th>Stok</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($data['barang'] as $barang): ?>
                                        <tr>
                                            <td><?= $barang['kode_barang']; ?></td>
                                            <td><?= $barang['nama']; ?></td>
                                            <td><?= $barang['merk']; ?></td>
                                            <td><?= $barang['model']; ?></td>
                                            <td><?= $barang['jumlah']; ?></td>
                                            <td><?= $barang['stok']; ?></td>
                                            <td><img src="<?= BASEURL; ?>/img/barang/<?= $barang['gambar']; ?>" alt="" width="150px"></td>
                                            <td>
                                                <a class="btn btn-info" href="<?= BASEURL; ?>/Barang/Detail/<?= $barang['id']; ?>" role="button"><i class="fas fa-info-circle"></i></a>
                                                <a class="btn btn-warning" href="<?= BASEURL; ?>/Barang/Edit/<?= $barang['id']; ?>" role="button"><i class="fas fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-barang<?= $barang['id']; ?>">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

<!-- Modal tambah barang -->
<div class="modal fade" id="tambahBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="labelTambahBarang">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/Barang/tambah" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="labelKodeBarang">Kode Barang</label>
                <input type="text" class="form-control" name="kodeBarang" id="kodeBarang" required>
            </div>
            <div class="form-group">
                <label for="labelNama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" required>
            </div>
            <div class="form-group">
                <label for="labelMerk">Merk</label>
                <input type="text" class="form-control" name="merk" id="merk" required>
            </div>
            <div class="form-group">
                <label for="labelModel">Model</label>
                <input type="text" class="form-control" name="model" id="model" required>
            </div>
            <div class="form-group">
                <label for="labelJumlah">Jumlah</label>
                <input type="number" class="form-control" name="jumlah" id="Jumlah" required>
            </div>
            <div class="form-group">
                <label for="labelStok">Stok</label>
                <input type="number" class="form-control" name="stok" id="stok" required>
            </div>
            <div class="form-group">
                <label for="labelGambar">Gambar</label>
                <input type="file" class="form-control" name="gambar" id="gambar" required>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<?php foreach($data['barang'] as $barang): ?>
    <div class="modal fade" id="delete-barang<?= $barang['id']; ?>" tabindex="-1" aria-labelledby="confirmation-delete" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmation-delete">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus data barang <?= $barang['kode_barang']; ?>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <a class="btn btn-danger" href="<?= BASEURL; ?>/Barang/Hapus/<?= $barang['id']; ?>" role="button">Ya</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
