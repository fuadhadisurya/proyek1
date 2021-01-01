<div class="card shadow">
    <div class="card-body">
        <form action="<?= BASEURL; ?>/Transaksi/update" method="post">
            <input type="hidden" name="id" id="id" value="<?= $data['transaksi']['id'] ?>">
            <div class="form-group">
                <label for="pemohon">Pemohon</label>
                <input type="text" class="form-control" name="pemohon" id="pemohon" value="<?= $data['transaksi']['pemohon'] ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="unitKerja">Unit Kerja</label>
                <input type="text" class="form-control" name="unitKerja" id="unitKerja" value="<?= $data['transaksi']['unit_kerja'] ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="namaKegiatan">Nama Kegiatan</label>
                <input type="text" class="form-control" name="namaKegiatan" id="namaKegiatan" value="<?= $data['transaksi']['nama_kegiatan'] ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="hari">Hari</label>
                <select class="form-control mr-3" name="hari" id="hari" required readonly>
                    <option value="">Pilih hari</option>
                    <option value="Senin" <?php if($data['transaksi']['hari'] == 'Senin'){echo("selected");}?>>Senin</option>
                    <option value="Selasa" <?php if($data['transaksi']['hari'] == 'Selasa'){echo("selected");}?>>Selasa</option>
                    <option value="Rabu" <?php if($data['transaksi']['hari'] == 'Rabu'){echo("selected");}?>>Rabu</option>
                    <option value="Kamis" <?php if($data['transaksi']['hari'] == 'Kamis'){echo("selected");}?>>Kamis</option>
                    <option value="Jum'at" <?php if($data['transaksi']['hari'] == "Jum'at"){echo("selected");}?>>Jum'at</option>
                    <option value="Sabtu" <?php if($data['transaksi']['hari'] == 'Sabtu'){echo("selected");}?>>Sabtu</option>
                    <option value="Minggu" <?php if($data['transaksi']['hari'] == 'Minggu'){echo("selected");}?>>Minggu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= $data['transaksi']['tanggal'] ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="pukul">Pukul</label>
                <input type="text" class="form-control" name="pukul" id="pukul" value="<?= $data['transaksi']['pukul'] ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="penanggungJawab">Penanggung Jawab</label>
                <input type="text" class="form-control" name="penanggungJawab" id="penanggungJawab" value="<?= $data['transaksi']['penanggung_jawab'] ?>" required readonly>
            </div>
            <div class="form-group">
                <label for="noHp">No. HP</label>
                <input type="number" class="form-control" name="noHp" id="noHp" value="<?= $data['transaksi']['no_hp'] ?>" required readonly>
            </div>
            <?php foreach($data['barang'] as $transaksi){?>
                <div class="form-group">
                    <div class="row control-group after-add-more">
                        <div class="col-md-2">
                            <label for="kodeBarang" class="mr-2">Kode Barang : </label>
                            <input type="text" name="kodeBarang[]" id="kodeBarang" class="form-control mr-3" value="<?= $transaksi['kode_barang'] ?>" readonly required>
                        </div>
                        <div class="col-md-1">
                            <label for="jumlah" class="mr-2">Jumlah : </label>
                            <input type="number" name="jumlah[]" id="jumlah" class="form-control mr-3" value="<?= $transaksi['jumlah'] ?>"" readonly required>
                        </div>
                        <div class="col-md-2">
                            <label for="satuan" class="mr-2">Satuan : </label>
                            <select class="form-control mr-3" name="satuan[]" id="satuan" required readonly>
                                <option value="">Pilih satuan</option>
                                <option value="Item" <?php if($transaksi['satuan'] == 'Item'){echo("selected");}?>>Item</option>
                                <option value="Pcs" <?php if($transaksi['satuan'] == 'Pcs'){echo("selected");}?>>Pcs</option>
                                <option value="Item" <?php if($transaksi['satuan'] == 'Item'){echo("selected");}?>>Item</option>
                                <option value="Set" <?php if($transaksi['satuan'] == 'Set'){echo("selected");}?>>Set</option>
                                <option value="Unit" <?php if($transaksi['satuan'] == 'Unit'){echo("selected");}?>>Unit</option>
                                <option value="Box" <?php if($transaksi['satuan'] == 'Box'){echo("selected");}?>>Box</option>
                                <!-- <option value="Ruangan">Ruangan</option> -->
                            </select>
                        </div>
                        <div class="col-md-7">
                            <label for="keterangan" class="mr-2">Keterangan : </label>
                            <input type="text" name="keterangan[]" id="keterangan" class="form-control mr-3" value="<?= $transaksi['keterangan'] ?>">
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control mr-3" name="status" id="status" required>
                    <option value="Dipinjam" <?php if($data['transaksi']['status'] == 'Dipinjam'){echo("selected");}?>>Dipinjam</option>
                    <option value="Selesai" <?php if($data['transaksi']['status'] == 'Selesai'){echo("selected");}?>>Selesai</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
            <div class="form-group">
                <a href="<?= BASEURL ?>/Transaksi/dataAktif" class="btn btn-secondary btn-block">Batal</a>
            </div>
        </form>

    </div>
</div>