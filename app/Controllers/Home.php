<?php

namespace App\Controllers;

use App\Models\FotoModel;

class Home extends BaseController
{

    protected $FotoModel;

    public function __construct()
    {
        $this->FotoModel = new FotoModel();
    }

    public function index(): string
    {
        // ambil data foto
        $data = [
            'foto' => $this->FotoModel->findAll()
        ];

        return view('user/beranda', $data);
    }

}
