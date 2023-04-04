<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPresensi;

class Presensi extends BaseController
{
    public function __construct()
    {
        $this->ModelPresensi = new ModelPresensi();
    }

    public function index()
    {
        $presensi = $this->ModelPresensi->cekPresensi();
        if ($presensi == null) {
            //buka absen masuk
            $data = [
                'judul' => 'Absen Masuk',
                'menu' => 'presensi',
                'page' => 'presensi/v_absen_masuk',
                'kantor' => $this->ModelPresensi->dataKantor(),
            ];
            return view('v_template_front', $data);
        } else {
            if ($presensi['lokasi_out'] == null or $presensi['foto_out'] == null) {
                //absen keluar
                $data = [
                    'judul' => 'Absen Keluar',
                    'menu' => 'presensi',
                    'page' => 'presensi/v_absen_keluar',
                    'kantor' => $this->ModelPresensi->dataKantor(),
                ];
                return view('v_template_front', $data);
            } else {
                //tidak bisa ambil absen
                $data = [
                    'judul' => 'Sudah Absen',
                    'menu' => 'presensi',
                    'page' => 'presensi/v_sudah_absen',
                ];
                return view('v_template_front', $data);
            }
            
        }
        
    }

    public function insertPresensiIn()
    {
        $foto = $this->request->getPost('image');
        $id_karyawan = session()->get('id_karyawan');
        $lokasi = $this->request->getPost('lokasi');
        //conver foto ke file
        $folder_path = 'foto/';
        $format_name_file = $id_karyawan."-".date('Y-m-d')."-".date('His');
        $image_parts = explode(";base64", $foto);
        $image_base64 = base64_decode($image_parts[1]);
        $file_name = $format_name_file.".png";
        $file = $folder_path.$file_name;

        $data = [
            'id_karyawan' => $id_karyawan,
            'tgl_presensi' => date('Y-m-d'),
            'jam_in' => date('H:i:s'),
            'lokasi_in' => $lokasi,
            'foto_in' => $file_name,
        ];
        $this->ModelPresensi->insertPresensiIn($data);
        file_put_contents($file, $image_base64);
    }

    public function insertPresensiOut()
    {
        //mengambil id presensi
        $presensi = $this->ModelPresensi->cekPresensi();
        $id_presensi = $presensi['id_presensi'];

        $foto = $this->request->getPost('image');
        $id_karyawan = session()->get('id_karyawan');
        $lokasi = $this->request->getPost('lokasi');
        //conver foto ke file
        $folder_path = 'foto/';
        $format_name_file = $id_karyawan."-".date('Y-m-d')."-".date('His');
        $image_parts = explode(";base64", $foto);
        $image_base64 = base64_decode($image_parts[1]);
        $file_name = $format_name_file.".png";
        $file = $folder_path.$file_name;

        $data = [
            'id_presensi' => $id_presensi,
            'jam_out' => date('H:i:s'),
            'lokasi_out' => $lokasi,
            'foto_out' => $file_name,
        ];
        $this->ModelPresensi->insertPresensiOut($data);
        file_put_contents($file, $image_base64);
    }
}
