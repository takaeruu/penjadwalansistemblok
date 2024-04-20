

<main role="main" class="main-content">

    <div class="pagetitle">
      <h1>Tambah Jadwal</h1>
      </nav>
    </div><!-- End Page Title -->

    <div class="row">
                <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">Tambah Jadwal</strong>
                    </div>
                   
                      <form action="<?= base_url('home/aksi_t_jadwal')?>" method="POST">
                         <div class="card-body">
                          <div class="form-group">
                          <label for="inputMapel">Kelas</label>
                          <select class="form-control" name="kelas">
                            <option value="">Pilih</option>
                            <?php foreach ($yoga1 as $key): ?>
    
                        <option value="<?= $key->id_kelas ?>"><?= $key->nama_kelas ?></option>
                        <?php endforeach ; ?>
                </select>
                        </div>
                         <div class="form-group">
                          <label for="inputMapel">Blok</label>
                          <select class="form-control" name="blok">
                            <option value="">Pilih</option>
                            <?php foreach ($yoga2 as $key): ?>
    
                        <option value="<?= $key->id_blok ?>"><?= $key->id_blok?></option>
                        <?php endforeach ; ?>
                </select>
                        </div>
                        <div class="form-group">
                          <label for="inputMapel">Bulan</label>
                          <select class="form-control" name="bulan">
                            <option value="">Pilih</option>
                            <?php foreach ($yogas as $key): ?>
    
                        <option value="<?= $key->id_bulan ?>"><?= $key->nama_bulan?></option>
                        <?php endforeach ; ?>
                </select>
                        </div>
                        
                        <div class="form-group">
                          <label for="inputAddress">Sesi</label>
                            <select class="form-control" name="sesi" required>
                          <option value="">Pilih</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                         <option value="5">5</option>
                         <option value="ISTIRAHAT">ISTIRAHAT</option>

                </select>
                        </div>
                        <div class="form-group">
                          <label for="inputMapel">Nama Guru dan Mapel</label>
                          <select class="form-control" name="guru">
                            <option value="">Pilih</option>
                            <?php foreach ($yoga4 as $key): ?>
    
                        <option value="<?= $key->id_guru ?>"><?= $key->nama_mapel ?>--<?= $key->nama_guru ?></option>
                        <?php endforeach ; ?>
                </select>
                        </div>
                         <div class="form-group">
                          <label for="inputAddress">Jam Mulai</label>
                           <input class="form-control" id="example-time" type="time" name="jammulai">
                        </div>
                          <div class="form-group">
                          <label for="inputAddress">Jam Selesai</label>
                           <input class="form-control" id="example-time" type="time" name="jamselesai">
                        </div>
                       
                   
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div> <!-- /. card-body -->
                  </div> <!-- /. card -->
                </div> <!-- /. col -->
              </div> <!-- /. end-section -->


        

