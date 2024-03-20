<main role="main" class="main-content">
    <div class="col-md-12 my-6">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Profile</h5>
                <div class="row mt-5 align-items-center">
                    <div class="col-md-3 text-center mb-5">
                        <?php
                            $foto_profil = ($darren->foto) ? base_url('img/' . $darren->foto) : base_url('img/user.png');
                        ?>
                        <img src="<?= $foto_profil ?>" class="rounded-circle" style="width: 200px; height: 200px;" alt="Foto Profile"><br><br>
                        <form action="<?= base_url('home/editfoto')?>" method="post" enctype="multipart/form-data">
                            <label for="foto" class="btn btn-primary px-3">Pilih Foto Profil Baru</label><br>
                            <input class="file-input" type="file" id="foto" name="foto" accept="image/*" style="display: none;">
                            <span id="file-name"></span> 
                            <br>
                            <button id="saveButton" class="btn btn-primary px-3" style="height: 40px; display: none;">Save</button>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <div class="form-row">
                            <div class="form-group col-md-6 offset-md-4"> 
                                <label for="firstname">Username</label>
                                <input type="text" id="firstname" class="form-control" name="username" value="<?= $darren->username ?>"  readonly>
                            </div>
                            <div class="form-group col-md-6 offset-md-4"> 
                                <label for="lastname">Status</label>
                                <input type="text" id="lastname" class="form-control" value="<?= $darren->level ?>" readonly>
                            </div>
                            <!-- Letakkan tombol Log Out di sini -->
                            <div class="form-group col-md-6 offset-md-4">
                                <a href="<?= base_url('home/logout') ?>" class="btn btn-danger">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
