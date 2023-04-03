<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPresensi extends Model
{
    public function cekPresensi()
    {
        return $this->db->table('tbl_presensi')
        ->where('id_karyawan', session()->get('id_karyawan'))
        ->where('tgl_presensi', date('Y-m-d'))
        ->get()->getRowArray();
    }

    public function dataKantor()
    {
        return $this->db->table('tbl_setting')
        ->where('id_setting', 1)->get()->getRowArray();
    }

    public function insertPresensiIn($data)
    {
        $this->db->table('tbl_presensi')->insert($data);
    }
}
