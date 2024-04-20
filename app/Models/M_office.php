<?php

namespace App\Models;

use CodeIgniter\Model;

class M_office extends Model
{
	public function tampil($yoga){
     return $this->db->table($yoga)  
     				 ->get()
          			 ->getResult();   

	}
    public function join($tabel1, $tabel2, $on){
     return $this->db->table($tabel1)  
                     ->join($tabel2,$on,'left')
                     ->get()
                     ->getResult();   

    }
     public function join1($tabel1, $tabel2, $on){
     return $this->db->table($tabel1)  
                     ->join($tabel2,$on,'inner')
                     ->get()
                     ->getResult();   

    }
    public function joinWhere($tabel1, $tabel2, $on, $where){
     return $this->db->table($tabel1, $where)  
                     ->join($tabel2,$on,'left')
                     ->get()
                     ->getRow();   

    }
    public function joinWherer($tabel1, $tabel2, $on, $where){
     return $this->db->table($tabel1)  
                     ->join($tabel2,$on,'left')
                     ->getWhere($where)
                     ->getRow();   

    }
	public function tambah($table,$isi){
		return $this->db->table($table)
						->insert($isi);
	}
    public function upload($file){
		 $imageName = $file->getName();
         $file->move(ROOTPATH . 'public/img', $imageName);
	}
	public function hapus($table,$where){
        return $this->db->table($table)
                        ->delete($where);
    }
    public function edit($tabel,$isi,$where){
        return $this->db->table($tabel)
                        ->update($isi,$where);
    }
    public function updatee($tabel,$isi){
        return $this->db->table($tabel)
                        ->update($isi);
    }
    public function getWhere($tabel,$where){
        return $this->db->table($tabel)
                        ->getwhere($where)
                        ->getRow();
    }
    public function getWhereWithJoin($tabel1, $tabel2, $onCondition, $where){
   return $this->db->table($tabel1)
       ->join($tabel2, $onCondition)
       ->getWhere($where)
       ->getRow();
   }
   public function join4tbl($tabel1, $tabel2, $tabel3, $tabel4, $on1, $on2, $on3){
   return $this->db->table($tabel1)
                  ->join($tabel2, $on1, 'inner')
                  ->join($tabel3, $on2, 'inner')
                  ->join($tabel4, $on3, 'inner')
                  ->get()
                  ->getResult();     

  }
 
   public function getById($id)
{
    return $this->db->table('user')
                    ->where('id_user', $id)
                    ->get()
                    ->getRow();
}

  public function getWhereWithJoin1($tabel1, $tabel2, $tabel3, $tabel4, $onCondition1, $onCondition2, $onCondition3, $where){
   return $this->db->table($tabel1)
       ->join($tabel2, $onCondition1)
       ->join($tabel3, $onCondition2)
       ->join($tabel4, $onCondition3)
       ->getWhere($where)
       ->getRow();
}
 

   public function tampiljadwal($kelasId, $blokId, $bulanId)
{
    return $this->db->table('jadwal')
        ->where('id_kelas', $kelasId)
        ->where('id_blok', $blokId)
        ->where('id_bulan', $bulanId)
        ->get()
        ->getResult();
}

 protected $table = 'jadwal';

   public function getJadwal($id_kelas, $id_blok, $id_bulan) 
{
    return $this->db->table('jadwal')
        ->select('jadwal.sesi, COALESCE(guru.nama_mapel, "Istirahat") as nama_mapel, jadwal.jam_mulai, jadwal.jam_selesai, COALESCE(guru.nama_guru, "-") as nama_guru')
        ->join('guru', 'guru.id_guru = jadwal.id_Guru', 'left')
        ->where('jadwal.id_kelas', $id_kelas)
        ->where('jadwal.id_blok', $id_blok)
        ->where('jadwal.id_bulan', $id_bulan)
        ->get()
        ->getResult();
}
public function getJadwalByKelasBlok($kelasId, $blokId, $bulanId) 
{
    return $this->db->table->select('jadwal.sesi, COALESCE(guru.nama_mapel, "Istirahat") as nama_mapel, jadwal.jam_mulai, jadwal.jam_selesai, COALESCE(guru.nama_guru, "-") as nama_guru')
        ->from('jadwal')
        ->join('guru', 'guru.id_guru = jadwal.id_guru', 'left')
        ->where('jadwal.id_kelas', $kelasId)
        ->where('jadwal.id_blok', $blokId)
        ->where('jadwal.id_bulan', $bulanId)
        ->get()
        ->result();
}


    
  public function hapus_jadwal($id_kelas, $id_blok)
{
    return $this->db->table('jadwal')
        ->where('id_kelas', $id_kelas)
        ->where('id_blok', $id_blok)
        ->delete();
}
public function isMapelExistInClassAndSesi($guruId, $sesi, $kelasId)
{
    $query = $this->db->table('jadwal')
        ->where('id_guru', $guruId)
        ->where('sesi', $sesi)
        ->where('id_kelas', $kelasId)
        ->countAllResults();

    return $query > 0;
}


public function isScheduleConflict($guruId, $sesi, $kelasId, $jamMulai, $jamSelesai)
{
    $query = $this->db->table('jadwal')
        ->where('id_guru', $guruId)
        ->where('sesi', $sesi)
        ->where('id_kelas', $kelasId)
        ->where('((jam_mulai < "' . $jamSelesai . '" AND jam_selesai > "' . $jamMulai . '") OR (jam_mulai < "' . $jamSelesai . '" AND jam_selesai > "' . $jamMulai . '"))')
        ->countAllResults();

    return $query > 0;
}
public function cari($kelas, $blok, $bulan)
{
    $query = "SELECT jadwal.sesi, COALESCE(guru.nama_mapel, 'Istirahat') as nama_mapel, jadwal.jam_mulai, jadwal.jam_selesai, COALESCE(guru.nama_guru, '-') as nama_guru 
              FROM jadwal 
              JOIN guru ON jadwal.id_guru = guru.id_guru 
              JOIN kelas ON jadwal.id_kelas = kelas.id_kelas 
              JOIN blok ON jadwal.id_blok = blok.id_blok 
              JOIN bulan ON jadwal.id_bulan = bulan.id_bulan 
              WHERE jadwal.id_kelas = ?
                AND jadwal.id_blok = ? 
                AND jadwal.id_bulan = ?";

    return $this->db->query($query, [$kelas, $blok, $bulan])->getResult();
   
    
}
}