<main role="main" class="main-content">
    <div class="pagetitle">
        <h1>Tampil Jadwal</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">Tampil Jadwal</strong>
                </div>
          <form action="<?= base_url('home/exel') ?>" method="post" enctype="multipart/form-data">

                <div class="card-body">
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" name="kelas" id="kelas">
                            <option value="">Pilih</option>
                            <?php foreach ($yoga as $key): ?>
                                <option value="<?= $key->id_kelas ?>"><?= $key->nama_kelas ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="blok">Blok</label>
                        <select class="form-control" name="blok" id="blok">
                            <option value="">Pilih</option>
                            <?php foreach ($darren as $key): ?>
                                <option value="<?= $key->id_blok ?>"><?= $key->id_blok ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bulan">Bulan</label>
                        <select class="form-control" name="bulan" id="bulan">
                            <option value="">Pilih</option>
                            <?php foreach ($epan as $key): ?>
                                <option value="<?= $key->id_bulan ?>"><?= $key->nama_bulan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" style="background-color: green; color: white;">Exel</button>

                    <button type="submit" formaction="<?= base_url('home/printpdf') ?>" style="background-color: red; color: white;">Pdf</button>

                    <button type="submit" formaction="<?= base_url('home/wprint') ?>">window print</button>

                </div>
                </form>
            </div>
        </div>
    </div>
<?php if (session()->get('level') == "Waka") : ?>
    <div class="row mt-3">
        <div class="col-md-12">
            <a href="#" class="btn btn-danger btn-sm" id="btnDelete" data-href="<?= base_url('home/hapus_jadwal') ?>">Delete Selected Jadwal</a>

        </div>
    </div>
 <?php endif; ?>
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <table class="table align-items-center table-flush" id="table"
                data-url="<?php echo base_url('admin/getData?tabel=jadwal') ?>" data-toggle="table"
                data-pagination="true" data-page-size="20" data-page-list="[10, 25, 50, 100, ALL]"
                data-search="true" data-row-style="rowStyle">
                <thead>
                    <tr>
                        <th data-field="sesi" class="font-14">Sesi</th>
                        <th data-field="nama_guru" class="font-14">Nama Guru</th>
                        <th data-field="mapel" class="font-14">Mata Pelajaran</th>
                        <th data-field="jam_mulai" class="font-14">Jam Mulai</th>
                        <th data-field="jam_selesai" class="font-14">Jam Selesai</th>

                    </tr>
                </thead>
                <!-- Data jadwal akan dimuat di sini menggunakan AJAX -->
                <tbody id="jadwalBody">
                </tbody>
            </table>
        </div>
    </div>
</main>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
    $('#kelas, #blok, #bulan').change(function(){
        var id_kelas = $('#kelas').val();
        var id_blok = $('#blok').val();
        var id_bulan = $('#bulan').val();
        
        if(id_kelas != '' && id_blok != '' && id_bulan != '') {
            $.ajax({
                url: '<?=base_url('home/getData')?>',
                type: 'POST',
                data: {id_kelas: id_kelas, id_blok: id_blok, id_bulan: id_bulan},
                dataType: 'json',
                success: function(response){
                    // Bersihkan tabel sebelum menambahkan data baru
                    $('#jadwalBody').empty();
                    
                    // Tambahkan data jadwal ke dalam tabel
                    $.each(response, function(index, jadwal){
                        $('#jadwalBody').append('<tr><td>' +  jadwal.sesi + '</td><td>' + jadwal.nama_guru + '</td><td>' + jadwal.nama_mapel + '</td><td>' + jadwal.jam_mulai + '</td><td>' + jadwal.jam_selesai + '</td><td>');
                    });
                }
            });
        }
    });

    // Memanggil perubahan secara otomatis saat halaman dimuat untuk pertama kali
    $('#kelas, #blok, #bulan').trigger('change');
});

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#btnDelete').click(function() {
    var id_kelas = $('#kelas').val();
    var id_blok = $('#blok').val();

    if (id_kelas !== '' && id_blok !== '') {
        if (confirm('Apakah Anda yakin ingin menghapus semua jadwal untuk kelas ' + id_kelas + ' dan blok ' + id_blok + '?')) {
            var deleteUrl = $('#btnDelete').data('href');  // Ambil URL dari data-href
            $.ajax({
                url: deleteUrl,
                type: 'POST',
                data: {id_kelas: id_kelas, id_blok: id_blok},
                dataType: 'json',  // Harapkan respons dalam format JSON
                success: function(response) {
                    if (response.success) {
                        alert('Jadwal berhasil dihapus.');
                        window.location.reload();
                    } else {
                        alert('Gagal menghapus jadwal.');
                    }
                }
            });
        }
    } else {
        alert('Pilih kelas dan blok terlebih dahulu.');
    }
});


</script>