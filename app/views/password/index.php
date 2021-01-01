    <?php Flasher::password(); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ganti Password</h6>
        </div>
        <div class="card-body">
            <form class="user" action="<?= BASEURL; ?>/Password/update" method="post">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="New Password" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" name="confirmPassword"id="exampleRepeatPassword" placeholder="New Repeat Password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Simpan</button>
                <a href="<?= BASEURL; ?>/Dashboard" class="btn btn-secondary btn-user btn-block">
                    Batalkan
                </a>
              </form>
        </div>
    </div>