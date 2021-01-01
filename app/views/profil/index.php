    <?php Flasher::profil(); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
        </div>
        <div class="card-body">
            <form class="user" action="<?= BASEURL; ?>/Profil/update" method="post">
                <div class="form-group">
                    <label for="nama"><b>Nama</b></label>
                    <input type="text" class="form-control form-control-user" name="nama" id="exampleInputName" placeholder="Nama Lengkap" value="<?= $data['user']['nama']; ?>" required>
                </div>  
                <button type="submit" class="btn btn-primary btn-user btn-block">Simpan</button>
                <a href="<?= BASEURL; ?>/Dashboard" class="btn btn-secondary btn-user btn-block">
                    Batalkan
                </a>
            </form>
       </div>
    </div>