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

    public function index(): string
    {

        $user =

            // ambil data foto
            $data = [
                'foto' => $this->FotoModel->findAll()
            ];

        return view('user/beranda', $data);
    }
}
