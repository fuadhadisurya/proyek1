                    <?php Flasher::alert(); ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="transaksi" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Tanggal Permohonan</th>
                                            <th>Pemohon</th>
                                            <th>Unit Kerja</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Penanggung Jawab</th>
                                            <th>No. Telepon</th>
                                            <th>Tanggal Pelaksaan</th>
                                            <th>Pukul</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($data['transaksi'] as $transaksi): ?>
                                        <tr>
                                            <td><?= $transaksi['tanggal_pinjam']?></td>
                                            <td><?= $transaksi['pemohon']; ?></td>
                                            <td><?= $transaksi['unit_kerja']; ?></td>
                                            <td><?= $transaksi['nama_kegiatan']; ?></td>
                                            <td><?= $transaksi['penanggung_jawab']; ?></td>
                                            <td><?= $transaksi['no_hp']; ?></td>
                                            <td><?= $transaksi['hari']; $transaksi['tanggal']; ?></td>
                                            <td><?= $transaksi['pukul']; ?></td>
                                            <td>
                                                <?php if($transaksi['status'] == 'Dipinjam') { ?>
                                                    <span class="badge badge-pill badge-secondary"><?= $transaksi['status']; ?></span>
                                                <?php } else { ?>
                                                    <span class="badge badge-pill badge-success"><?= $transaksi['status']; ?></span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="<?= BASEURL; ?>/Transaksi/Detail/<?= $transaksi['id']; ?>" role="button"><i class="fas fa-info-circle"></i></a>
                                                <?php if($transaksi['status'] == 'Dipinjam') { ?>
                                                <a class="btn btn-warning" href="<?= BASEURL; ?>/Transaksi/Edit/<?= $transaksi['id']; ?>" role="button"><i class="fas fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-transaksi<?= $transaksi['id']; ?>">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <?php foreach($data['transaksi'] as $transaksi): ?>
                        <div class="modal fade" id="delete-transaksi<?= $transaksi['id']; ?>" tabindex="-1" aria-labelledby="confirmation-delete" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmation-delete">Konfirmasi Hapus</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data transaksi <?= $transaksi['id']; ?>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                        <a class="btn btn-danger" href="<?= BASEURL; ?>/Transaksi/Hapus/<?= $transaksi['id']; ?>" role="button">Ya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
