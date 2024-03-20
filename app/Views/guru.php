 <main role="main" class="main-content">
<div class="col-md-12 my-6">
                  <div class="card shadow">
                    <div class="card-body">
                      <h5 class="card-title">Guru</h5>
                    <a class="nav-link text-Headings my-2" href="<?= base_url('home/tambah_guru') ?>">
              <span class="fe fe-plus"></span>
            </a>
                      
                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Guru</th>
                            <th>NIS</th>
                            <th>Mata Pelajaran</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
              <?php
              $no = 1;
              foreach ($yoga as $key) {
              ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $key->nama_guru ?></td>
                  <td><?= $key->nis ?></td>
                  <td><?= $key->nama_mapel ?></td>
                  <td>
			

			 <a class="nav-link text-Headings my-2" href="<?= base_url('home/edit_guru/'.$key->id_guru) ?>">
              <span class="fe fe-edit"></span>
			 <a class="nav-link text-Headings my-2" href="<?= base_url('home/hapus_guru/'.$key->id_guru) ?>">
              <span class="fe fe-x "></span>
		</td>
                </tr>
              <?php } ?>
            </tbody>
                      </table>
                    </div>
                  </div>
                </div>
</main> <!-- Striped rows -->