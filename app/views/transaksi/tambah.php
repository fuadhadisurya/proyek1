<?php Flasher::alert(); ?>
<div class="card shadow">
    <div class="card-body">
        <form action="<?= BASEURL; ?>/Transaksi/prosesTambah" method="post">
            <div class="form-group">
                <label for="pemohon">Pemohon</label>
                <input type="text" class="form-control" name="pemohon" id="pemohon" required>
            </div>
            <div class="form-group">
                <label for="unitKerja">Unit Kerja</label>
                <input type="text" class="form-control" name="unitKerja" id="unitKerja" required>
            </div>
            <div class="form-group">
                <label for="namaKegiatan">Nama Kegiatan</label>
                <input type="text" class="form-control" name="namaKegiatan" id="namaKegiatan" required>
            </div>
            <div class="form-group">
                <label for="hari">Hari</label>
                <select class="form-control mr-3" name="hari" id="hari" required>
                    <option value="">Pilih hari</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jum'at">Jum'at</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" required>
            </div>
            <div class="form-group">
                <label for="pukul">Pukul</label>
                <input type="text" class="form-control" name="pukul" id="pukul" required>
            </div>
            <div class="form-group">
                <label for="penanggungJawab">Penanggung Jawab</label>
                <input type="text" class="form-control" name="penanggungJawab" id="penanggungJawab" required>
            </div>
            <div class="form-group">
                <label for="noHp">No. HP</label>
                <input type="number" class="form-control" name="noHp" id="noHp" required>
            </div>
            <div class="form-group">
                <div class="row control-group after-add-more">
                    <div class="col-md-2">
                        <label for="kodeBarang" class="mr-2">Kode Barang : </label>
                        <input type="text" name="kodeBarang[]" id="kodeBarang" class="form-control mr-3" required>
                    </div>
                    <div class="col-md-1">
                        <label for="jumlah" class="mr-2">Jumlah : </label>
                        <input type="number" name="jumlah[]" id="jumlah" class="form-control mr-3" required>
                    </div>
                    <div class="col-md-2">
                        <label for="satuan" class="mr-2">Satuan : </label>
                        <select class="form-control mr-3" name="satuan[]" id="satuan" required>
                            <option value="">Pilih satuan</option>
                            <option value="Item">Item</option>
                            <option value="Pcs">Pcs</option>
                            <option value="Set">Set</option>
                            <option value="Unit">Unit</option>
                            <option value="Box">Box</option>
                            <!-- <option value="Ruangan">Ruangan</option> -->
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="keterangan" class="mr-2">Keterangan : </label>
                        <input type="text" name="keterangan[]" id="keterangan" class="form-control mr-3">
                    </div>
                    <div class="col-md-1">
                        <label for="" class="mr-2"></label>
                        <div class=""> 
                            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </form>

    </div>
</div>

<!-- Copy Fields -->
<div class="copy invisible">
    <div class="control-group row" style="margin-top:10px">
        <div class="col-md-2">
            <label for="kodeBarang" class="mr-2">Kode Barang : </label>
            <input type="text" name="kodeBarang[]" id="kodeBarang" class="form-control mr-3" required>
        </div>
        <div class="col-md-1">
            <label for="jumlah" class="mr-2">Jumlah : </label>
            <input type="number" name="jumlah[]" id="jumlah" class="form-control mr-3" required>
        </div>
        <div class="col-md-2">
            <label for="satuan" class="mr-2">Satuan : </label>
            <select class="form-control mr-3" name="satuan[]" id="satuan" required>
                <option value="">Pilih satuan</option>
                <option value="Item">Item</option>
                <option value="Pcs">Pcs</option>
                <option value="Set">Set</option>
                <option value="Unit">Unit</option>
                <option value="Box">Box</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="keterangan" class="mr-2">Keterangan : </label>
            <input type="text" name="keterangan[]" id="keterangan" class="form-control mr-3">
        </div>
        <div class="col-md-1">
            <label for="" class="mr-2"></label>
            <div class="">  
                <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus</button>
            </div>
        </div>
    </div>
</div>
