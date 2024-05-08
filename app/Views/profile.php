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
                            <!-- Tombol Log Out ditempatkan di sini -->
                            <div class="form-group col-md-12 offset-md-4">
                            <button class="Btn" onclick="window.location.href='<?= base_url('home/logout') ?>'">
    <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
    <div class="text">Logout</div>
</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    document.getElementById('foto').onchange = function() {
        var fileName = this.value.split('\\').pop();
        document.getElementById('file-name').innerText = 'File : ' + fileName;
    };

    document.getElementById("foto").addEventListener("change", function() {
        var fileName = this.value.split('\\').pop();
        document.getElementById('file-name').textContent = fileName;
        document.getElementById('saveButton').style.display = 'inline-block';
    });
</script>
