<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHome extends Model
{
    public function dataKaryawan()
    {
        return $this->db->table('tbl_karyawan')
        ->join('tbl_jabatan', 'tbl_jabatan.id_jabatan=tbl_karyawan.id_jabatan', 'LEFT')
        ->where('id_karyawan', session()->get('id_karyawan'))->get()->getRowArray();
    }
}
