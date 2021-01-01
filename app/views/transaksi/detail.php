<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row" style="width: 15%">Pemohon</th>
                                        <td style="width: 1%">:</td>
                                        <td><?= $data['transaksi']['pemohon']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Unit Kerja</th>
                                        <td>:</td>
                                        <td><?= $data['transaksi']['unit_kerja']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nama Kegiatan</th>
                                        <td>:</td>
                                        <td><?= $data['transaksi']['nama_kegiatan']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Hari</th>
                                        <td>:</td>
                                        <td><?= $data['transaksi']['hari']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tanggal</th>
                                        <td>:</td>
                                        <td><?= $data['transaksi']['tanggal']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pukul</th>
                                        <td>:</td>
                                        <td><?= $data['transaksi']['pukul']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Penanggung Jawab</th>
                                        <td>:</td>
                                        <td><?= $data['transaksi']['penanggung_jawab']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">No. HP</th>
                                        <td>:</td>
                                        <td><?= $data['transaksi']['no_hp']; ?></td>
                                    </tr>
                                    <?php $i = 0; foreach($data['barang'] as $transaksi){ $i++ ?>
                                    <tr>
                                        <th scope="row">Data Barang <?= $i ?></th>
                                        <td>:</td>
                                        <td style="width: 20%">Kode Barang : <?= $transaksi['kode_barang']; ?>
                                        <td style="width: 10%">Jumlah : <?= $transaksi['jumlah']; ?></td>
                                        <td style="width: 15%">Satuan : <?= $transaksi['satuan']; ?></td>
                                        <td>Keterangan :<?= $transaksi['keterangan']; ?></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <th scope="row">Tanggal Pinjam</th>
                                        <td>:</td>
                                        <td><?= $data['transaksi']['tanggal_pinjam']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tanggal Kembali</th>
                                        <td>:</td>
                                        <td><?= $data['transaksi']['tanggal_kembali']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Status</th>
                                        <td>:</td>
                                        <td>
                                            <?php if($data['transaksi']['status'] == 'Dipinjam') { ?>
                                                <span class="badge badge-pill badge-secondary"><?= $data['transaksi']['status']; ?></span>
                                            <?php } else { ?>
                                                <span class="badge badge-pill badge-success"><?= $data['transaksi']['status']; ?></span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <?php if ($data['transaksi']['status'] == 'Dipinjam') { ?>
                                <a href="<?= BASEURL; ?>/Transaksi/dataAktif" class="btn btn-secondary">Kembali</a>
                            <?php } else { ?>
                                <a href="<?= BASEURL; ?>/Transaksi" class="btn btn-secondary">Kembali</a>
                            <?php } ?>
                        </div>
                    </div>