<?php

namespace App\Controllers;
use App\Models\ModelHome;

class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelHome = new ModelHome();
    }

    public function index()
    {
        $data = [
            'judul' => 'Home',
            'menu' => 'home',
            'page' => 'v_home',
            'karyawan' => $this->ModelHome->dataKaryawan(),
        ];
        return view('v_template_front', $data);
    }

    public function profile()
    {
        $data = [
            'judul' => 'Profile',
            'menu' => 'profile',
            'page' => 'v_profile',
        ];
        return view('v_template_front', $data);
    }
}
