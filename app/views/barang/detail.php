                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Barang</h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row" style="width: 10%">Kode Barang</th>
                                        <td style="width: 1%">:</td>
                                        <td><?= $data['barang']['kode_barang']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama</th>
                                        <td>:</td>
                                        <td><?= $data['barang']['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Merk</th>
                                        <td>:</td>
                                        <td><?= $data['barang']['merk']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Model</th>
                                        <td>:</td>
                                        <td><?= $data['barang']['model']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jumlah</th>
                                        <td>:</td>
                                        <td><?= $data['barang']['jumlah']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Stok</th>
                                        <td>:</td>
                                        <td><?= $data['barang']['stok']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Gambar</th>
                                        <td>:</td>
                                        <td><img src="<?= BASEURL; ?>/img/barang/<?= $data['barang']['gambar']; ?>" alt="" width="150px"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a href="<?= BASEURL; ?>/Barang" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>