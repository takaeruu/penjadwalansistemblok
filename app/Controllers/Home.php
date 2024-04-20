<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_office;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use TCPDF;

class Home extends BaseController
{
	public function dashboard()
	{	
		if(session()->get('id')>0){
		$model = new M_office();
		$where=array('id_user'=>session()->get('id'));

		echo view ('header');
		echo view ('menu');
		echo view ('dashboard');
		echo view('footer');
	
		}else{
		return redirect()->to('home/login');
		}
	}
		public function login()

	{
		echo view ('header');
		echo view('login');
		
	}
	public function aksi_login()
{
    $od = $this->request->getPost('username');
    $tgl = $this->request->getPost('password');

    $where = array(
        'username' => $od,
        'password' => $tgl,
    );

    $model = new M_office();
    $check = $model->getWhere('user', $where);

    if ($check > 0) {
        session()->set('username', $check->username);
        session()->set('id', $check->id_user);
        session()->set('level', $check->level);
        return redirect()->to('home/dashboard');
    } else {
        return redirect()->to('home/login');
    }
}

		public function logout()

	{
		session()->destroy();
		return redirect()->to('home/login');
	}
	public function profile()
	{
		$model = new M_office;
		$where=array('id_user'=>session()->get('id'));
		 $data['darren'] = $model->getwhere('user',$where);
		
		echo view ('header');
		echo view ('menu');
		echo view('profile',$data);
		echo view('footer');
	}
	public function editfoto()
{
    $model = new M_office();
    $userData = $model->getById(session()->get('id'));

    if ($this->request->getFile('foto')) {

        $file = $this->request->getFile('foto');
        $newFileName = $file->getRandomName(); 
        $file->move(ROOTPATH . 'public/img', $newFileName);

        if ($userData->foto && file_exists(ROOTPATH . 'public/img/' . $userData->foto)) {
    unlink(ROOTPATH . 'public/img/' . $userData->foto);
}
        $userId = ['id_user' => session()->get('id')];
        $userData = ['foto' => $newFileName];
        $model->edit('user', $userData, $userId);
    }


    return redirect()->to('home/profile');
}
	public function guru()
	{
		$model = new M_office;
		$where=array('id_user'=>session()->get('id'));
		$data['yoga'] = $model->tampil('guru');
		
		echo view ('header');
		echo view ('menu');
		echo view('guru',$data);
		echo view('footer');
	}
	public function tambah_guru()
	{
		
		$model = new M_office;
		$data['yoga'] = $model->tampil('guru');
	
		echo view ('header');
		echo view ('menu');
		echo view('t_guru', $data);
		echo view('footer');
		
	}
	public function aksi_t_guru()
	{
		
		$yoga = $this -> request ->getPost('namaguru');
	
		$cahya = $this -> request ->getPost('mapel');
		
		$darren=array(
			'nama_guru'=>$yoga,
			'nama_mapel'=>$cahya,
			
			
		);

		$model=new M_office;
		$model->tambah('guru',$darren);
		return redirect()->to('home/guru');
		
	}
	public function edit_guru($id)
{
    $model = new M_office();
    $where = array('id_guru' => $id);

    $data['satu']=$model->getWhere('guru',$where);

    echo view('header');
    echo view('menu');
    echo view('e_guru', $data);
    echo view('footer');
}

	public function aksi_e_guru()
	{
		if(session()->get('id')>0){
		$model = new M_office();
		$yoga = $this -> request ->getPost('namaguru');
		$cahya = $this -> request ->getPost('mapel');
		$id = $this -> request ->getPost('id');

		$where = array('id_guru'=>$id);

		$isi = array(

			'nama_guru'=>$yoga,
			'nama_mapel'=>$cahya,
			
		);
		
		$model->edit('guru', $isi, $where);

		return redirect()->to('home/guru');
		}else{
		return redirect()->to('home/login');
		}

	}
	public function hapus_guru($id){
	if(session()->get('id')>0){
		$model = new M_office();
		$where = array('id_guru'=>$id);
		$model->hapus('guru',$where);
		
		return redirect()->to('home/guru');
		}else{
		return redirect()->to('home/login');
		}
	}
	
	public function jadwal()
	{
		
		$model = new M_office;
		$where=array('id_user'=>session()->get('id'));
		$data['yoga'] = $model->tampil('jadwal');
		echo view ('header');
		echo view ('menu');
		echo view('jadwal',$data);
		echo view('footer');
		
		}
	public function tambah_jadwal()
	{
		if(session()->get('id')>0){
		$model = new M_office;
		$where = array('id_jadwal' => $id);
		$data['yoga1'] = $model->tampil('kelas');
		$data['yoga2'] = $model->tampil('blok');
		$data['yoga4'] = $model->tampil('guru');
        $data['yogas'] = $model->tampil('bulan');
        

		echo view ('header');
		echo view ('menu');
		echo view('t_jadwal', $data);
		echo view('footer');
		}else{
		return redirect()->to('home/login');
		}
		
	}
	 public function aksi_t_jadwal()
{
    if (session()->get('id') > 0) {
        $kelasId = $this->request->getPost('kelas');
        $blokId = $this->request->getPost('blok');
        $bulanId = $this->request->getPost('bulan');
        $sesi = $this->request->getPost('sesi');
        $guruId = $this->request->getPost('guru');
        $jamMulai = $this->request->getPost('jammulai');
        $jamSelesai = $this->request->getPost('jamselesai');

        // Memuat model M_office
        $model = new M_office();

        $isMapelExist = $model->isMapelExistInClassAndSesi($guruId, $sesi, $kelasId);
        if ($isMapelExist) {
            return redirect()->to('home/tambah_jadwal')->with('error', 'Mapel sudah ada di kelas dan sesi tersebut.');
        }

        $isScheduleConflict = $model->isScheduleConflict($guruId, $sesi, $kelasId, $jamMulai, $jamSelesai);
        if ($isScheduleConflict) {
            return redirect()->to('home/tambah_jadwal')->with('error', 'Jadwal guru dan mapel bentrok di kelas dan sesi tersebut.');
        }

        $data = [
            'id_kelas' => $kelasId,
            'id_blok' => $blokId,
            'id_bulan' => $bulanId,
            'sesi' => $sesi,
            'id_guru' => $guruId,
            'jam_mulai' => $jamMulai,
            'jam_selesai' => $jamSelesai,
        ];

        $model->tambah('jadwal', $data);
        return redirect()->to('home/tambah_jadwal')->with('success', 'Jadwal berhasil ditambahkan.');
    } else {
        return redirect()->to('home/login');
    }
}
	 public function tampil_jadwal()
{
    $model = new M_office(); 
    $where = array('id_user' => session()->get('id'));
  $data['yoga'] = $model->tampil('kelas');
  $data['darren'] = $model->tampil('blok');
  $data['epan'] = $model->tampil('bulan');


    echo view('header');
    echo view('menu');
    echo view('tampil_jadwal', $data);
    echo view('footer');
}
	
public function getData()
    {
        // Mendapatkan data yang dikirimkan melalui permintaan POST
        $id_kelas = $this->request->getPost('id_kelas');
        $id_blok = $this->request->getPost('id_blok');
		$id_bulan = $this->request->getPost('id_bulan');
        // Memanggil model untuk mendapatkan data jadwal
        $model = new M_office();
	
        $data = $model->getJadwal($id_kelas, $id_blok, $id_bulan);

		

        // Mengembalikan data dalam format JSON
        return $this->response->setJSON($data);
    }

    
	public function tampil_kelas($id) {
        $this->load->model('M_office');
        $data['kelas'] = $this->M_office->getKelasById($id);

        // Load view dan kirimkan data
        $this->load->view('tampil_kelas', $data);
    }

	public function tampil_bulan($id) {
        $this->load->model('M_office');
        $data['bulan'] = $this->M_office->getKelasById($id);

        // Load view dan kirimkan data
        $this->load->view('tampil_kelas', $data);
    }
	

    public function index() {
        // Tambahkan logika algoritma genetika di sini
        $kelasId = $this->input->post('kelas_id');
        $blokId = $this->input->post('blok_id');
		$bulanId = $this->input->post('bulan_id');

        // Panggil model untuk mendapatkan jadwal
        $this->load->model('M_office');
        $jadwal = $this->M_office->getJadwalByKelasBlok($kelasId, $blokId, $bulanId);
		 $data = $this->M_office->getSomeData();

        // Kirim data jadwal ke view
        $data['jadwal'] = $jadwal;
        $this->load->view('jadwal_view', $data);
    }

  public function hapus_jadwal() {
    $id_kelas = $this->request->getPost('id_kelas');
    $id_blok = $this->request->getPost('id_blok');

    // Pastikan model M_office sudah di-load di controller
    $model = new M_office();

    // Gunakan model untuk operasi database
    $result = $model->hapus_jadwal($id_kelas, $id_blok);

    // Cetak respons ke client sebagai JSON
    header('Content-Type: application/json');

    if ($result) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }

    // Optional: return redirect()->to('home/tampil_jadwal');
}

public function exel(){
    $model = new M_office();

    // Tangkap tanggal mulai dan tanggal selesai dari form
    $kelas = $this->request->getPost('kelas');
    $blok = $this->request->getPost('blok');
    $bulan = $this->request->getPost('bulan');

    // Memanggil model untuk mendapatkan data sesuulani dengan ID pengguna
    $data = $model->cari($kelas, $blok, $bulan);

    // Membuat objek Spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Judul laporan
    $sheet->setCellValue('A1', 'Jadwal Mata Pelajaran');

    // Merge cell untuk judul laporan
    $sheet->mergeCells('A1:E1');

    // Set style untuk judul laporan
    $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);

    // Set style untuk cell judul laporan
    $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    
    // Set header untuk kolom
    $sheet->setCellValue('A2', 'SESI');
    $sheet->setCellValue('B2', 'NAMA GURU');
    $sheet->setCellValue('C2', 'MATA PELAJARAN');
    $sheet->setCellValue('D2', 'JAM MULAI PELAJARAN');
    $sheet->setCellValue('E2', 'JAM SELESAI PELAJARAN');
   
    // Mengatur lebar kolom
    $sheet->getColumnDimension('A')->setWidth(10);
    $sheet->getStyle('A')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

    $sheet->getColumnDimension('B')->setWidth(20);
    $sheet->getColumnDimension('C')->setWidth(25);
    $sheet->getColumnDimension('D')->setWidth(25);
    $sheet->getColumnDimension('E')->setWidth(25);
  

    // Membuat judul tebal
    $sheet->getStyle('A2:E2')->getFont()->setBold(true);

    // Mengisi data ke dalam sheet
    $rowIndex = 3; // Mulai dari baris 3 setelah judul dan header
    foreach ($data as $row) {
        $sheet->setCellValue('A' . $rowIndex, $row->sesi);
        $sheet->setCellValue('B' . $rowIndex, $row->nama_guru);
        $sheet->setCellValue('C' . $rowIndex, $row->nama_mapel);
        $sheet->setCellValue('D' . $rowIndex, $row->jam_mulai);
        $sheet->setCellValue('E' . $rowIndex, $row->jam_selesai);
        $rowIndex++;
    }

    // Menambahkan border
    $lastColumn = $sheet->getHighestColumn();
    $lastRow = $sheet->getHighestRow();
    $styleArray = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ];
    $sheet->getStyle('A2:' . $lastColumn . $lastRow)->applyFromArray($styleArray);

    // Setelah mengisi data, simpan spreadsheet ke dalam file atau kirim ke browser
    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    $filename = 'jadwal.xlsx';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
}
public function printpdf()
{
    $model = new M_office();
// Menggunakan instance $model yang sudah dibuat sebelumnya
$kelas = $this->request->getPost('kelas');
$blok = $this->request->getPost('blok');
$bulan = $this->request->getPost('bulan');

// Memanggil metode cari() menggunakan instance $model
$data['yoga'] = $model->cari($kelas, $blok, $bulan);

// Inisialisasi TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set judul dokumen
$pdf->SetTitle('Jadwal Pelajaran');

// Tambahkan halaman
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 10); // Ukuran font diatur menjadi 10

// Header tabel
$html = '<table border="1">
            <tr>
                <th>SESI</th>
                <th>NAMA GURU</th>
                <th>MATA PELAJARAN</th>
                <th>JAM MULAI PELAJARAN</th>
                <th>JAM SELESAI PELAJARAN</th>
            </tr>';

// Isi data dari database ke dalam tabel PDF
foreach ($data['yoga'] as $key) {
    $html .= '<tr>
                <td style="text-align: center;">' . $key->sesi . '</td> <!-- Konten pada kolom sesi menjadi tengah -->
                <td>' . $key->nama_guru . '</td>
                <td>' . $key->nama_mapel . '</td>
                <td>' . $key->jam_mulai . '</td>
                <td>' . $key->jam_selesai . '</td>
              </tr>';
}

$html .= '</table>';

// Tambahkan konten tabel ke PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output file PDF ke browser
$pdf->Output('Jadwal_Pelajaran.pdf', 'I');
exit();

}
public function wprint (){
    $model = new M_office();

    // Tangkap tanggal mulai dan tanggal selesai dari form
    $kelas = $this->request->getPost('kelas');
    $blok = $this->request->getPost('blok');
    $bulan = $this->request->getPost('bulan');

    // Memanggil model untuk mendapatkan data sesuulani dengan ID pengguna
    $data['yoga'] = $model->cari($kelas, $blok, $bulan);
    echo view("windowsprint", $data);
}

}

