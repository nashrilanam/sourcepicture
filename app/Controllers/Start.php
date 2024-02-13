<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FotoModel;


class Start extends Controller
{

    protected $FotoModel;

    public function __construct()
    {
        $this->FotoModel = new FotoModel();
    }

    public function index()
    {
        return view('home/start');
    }

    public function register()
    {
        return view('home/register');
    }

    public function login()
    {
        return view('home/login');
    }

    public function profile()
    {
        return view('user/profile');
    }


    public function upload(): string
    {
        return view('user/upload');
    }

    public function editprofile()
    {
        return view('user/editprofile');
    }

    public function save()
    {
        // ambil gambar
        $fileDokumen = $this->request->getFile('foto');
        $newName = $fileDokumen->getRandomName();
        $fileDokumen->move('foto_storage', $newName);

        $this->FotoModel->save([
            'judul_foto' => $this->request->getVar('judul'),
            'deskripsi_foto' => $this->request->getVar('deskripsi'),
            'tanggal_unggahan' => date('Y-m-d'),
            'lokasi_file' => $newName,
            'id_album' => '1',
            'id_user' => session()->get('id_user')
        ]);

        return redirect()->to('/home');
    }

    public function post(): string
    {
        return view('user/post');
    }
}
