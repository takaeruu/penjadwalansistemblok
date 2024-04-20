<main role="main" class="main-content">
    <div class="col-md-12 my-6">
        <div class="card shadow">
            <div class="card-body">
                <a class="nav-link text-Headings my-2" href="<?= base_url('home/printpdf') ?>">
                    <span class="fe fe-plus"></span>
                </a>
                <form action="<?= base_url('home/printpdf') ?>" method="post" enctype="multipart/form-data">      
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>SESI</th>
                                <th>NAMA GURU</th>
                                <th>MATA PELAJARAN</th>
                                <th>JAM MULAI PELAJARAN</th>
                                <th>JAM SELESAI PELAJARAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($yoga as $key): ?>
                                <tr>
                                    <td><?= $key->sesi ?></td>
                                    <td><?= $key->nama_guru ?></td>
                                    <td><?= $key->nama_mapel ?></td>
                                    <td><?= $key->jam_mulai ?></td>
                                    <td><?= $key->jam_selesai ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </form> <!-- Tutup form disini -->
            </div>
        </div>
    </div>
</main>
