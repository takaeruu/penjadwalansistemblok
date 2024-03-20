<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_office;

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

        // Memanggil model untuk mendapatkan data jadwal
        $model = new M_office();
	
        $data = $model->getJadwal($id_kelas, $id_blok);

		

        // Mengembalikan data dalam format JSON
        return $this->response->setJSON($data);
    }

    
	public function tampil_kelas($id) {
        $this->load->model('M_office');
        $data['kelas'] = $this->M_office->getKelasById($id);

        // Load view dan kirimkan data
        $this->load->view('tampil_kelas', $data);
    }
	

    public function index() {
        // Tambahkan logika algoritma genetika di sini
        $kelasId = $this->input->post('kelas_id');
        $blokId = $this->input->post('blok_id');

        // Panggil model untuk mendapatkan jadwal
        $this->load->model('M_office');
        $jadwal = $this->M_office->getJadwalByKelasBlok($kelasId, $blokId);

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

	
	}

