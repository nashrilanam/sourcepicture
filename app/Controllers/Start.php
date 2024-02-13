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
            'deskripsi_foto' => $this->request->getVar('desk'),
            'id_user' => '1',
            'id_album' => '1',
            'lokasi_file' => $newName,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/home');
    }
}
