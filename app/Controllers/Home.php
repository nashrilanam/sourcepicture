<?php

namespace App\Controllers;

use App\Models\FotoModel;
use App\Models\AuthModel;

class Home extends BaseController
{

    protected $FotoModel;
    protected $AuthModel;

    public function __construct()
    {
        $this->FotoModel = new FotoModel();
        $this->AuthModel = new AuthModel();
    }

    public function index()
    {
        // Ambil data foto
        $data = [
            'foto' => $this->FotoModel->findAll(),
            'foto_beranda' => $this->AuthModel->find(session('user_id')) // Ganti 'user_id' sesuai dengan nama kolom yang sesuai
        ];

        // var_dump($data['foto_beranda']);
        // die;

        return view('user/beranda', $data);
    }
}
