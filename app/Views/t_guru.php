

<main role="main" class="main-content">

    <div class="pagetitle">
      <h1>Tambah Guru</h1>
      </nav>
    </div><!-- End Page Title -->

    <div class="row">
                <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">Tambah Guru</strong>
                    </div>
                   
                      <form action="<?= base_url('home/aksi_t_guru')?>" method="POST">
                         <div class="card-body">
                        <div class="form-group">
                          <label for="inputAddress">Nama Guru</label>
                          <input type="text" class="form-control" id="inputAddress5" name="namaguru" placeholder="Isi Nama Guru">
                        </div>
                        <div class="form-group">
                          <label for="inputAddress">Mata Pelajaran</label>
                          <input type="text" class="form-control" id="inputAddress5" name="mapel" placeholder="Isi Mata Pelajaran">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div> <!-- /. card-body -->
                  </div> <!-- /. card -->
                </div> <!-- /. col -->
              </div> <!-- /. end-section -->


        

