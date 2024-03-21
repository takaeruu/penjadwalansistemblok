

<main role="main" class="main-content">

    <div class="pagetitle">
      <h1>Edit Guru</h1>
      </nav>
    </div><!-- End Page Title -->

    <div class="row">
                <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">Edit Guru</strong>
                    </div>
                   
                      <form action="<?= base_url('home/aksi_e_guru')?>" method="POST">
                         <div class="card-body">
                        <div class="form-group">
                          <label for="inputAddress">Edit Nama Guru</label>
                          <input type="text" class="form-control" id="inputAddress5" name="namaguru" value="<?= $satu->nama_guru ?>">

                        </div>
                        <div class="form-group">
                          <label for="inputAddress">Edit Mata Pelajaran</label>
                          <input type="text" class="form-control" id="inputAddress5" name="mapel" value ="<?= $satu->nama_mapel ?>">
                        </div>
                        
                         <input type="hidden" name="id" value="<?= $satu->id_guru ?>">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div> <!-- /. card-body -->
                  </div> <!-- /. card -->
                </div> <!-- /. col -->
              </div> <!-- /. end-section -->


        

