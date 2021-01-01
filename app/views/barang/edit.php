                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Barang</h6>
                        </div>
                        <div class="card-body">
                        <form action="<?= BASEURL; ?>/Barang/update" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id" value="<?= $data['barang']['id']; ?>">
                            <input type="hidden" name="gambarLama" id="gambarLama" value="<?= $data['barang']['gambar']; ?>">
                            <div class="form-group">
                                <label for="labelKodeBarang">Kode Barang</label>
                                <input type="text" class="form-control" name="kode_barang" id="kode_barang" value="<?= $data['barang']['kode_barang']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="labelNama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $data['barang']['nama']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="labelMerk">Merk</label>
                                <input type="text" class="form-control" name="merk" id="merk" value="<?= $data['barang']['merk']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="labelModel">Model</label>
                                <input type="text" class="form-control" name="model" id="model" value="<?= $data['barang']['model']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="labelJumlah">Jumlah</label>
                                <input type="number" class="form-control" name="jumlah" id="Jumlah" value="<?= $data['barang']['jumlah']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="labelStok">Stok</label>
                                <input type="number" class="form-control" name="stok" id="stok" value="<?= $data['barang']['stok']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="labelGambar">Gambar</label>
                                <input type="file" class="form-control" name="gambar" id="gambar">
                                <small class="form-text text-muted">*Untuk gambar. Jika tidak ingin diganti gambar tidak perlu di upload</small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="<?= BASEURL; ?>/Barang" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Perbarui</button>
                            </div>
                        </div>
                        </form>
                    </div>