<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FotoModel;
use App\Models\AuthModel;
use App\Models\KomentarModel;
use App\Models\LikeModel;
use App\Models\AlbumModel;


class Start extends BaseController
{

    protected $FotoModel;
    protected $AuthModel;
    protected $KomentarModel;
    protected $LikeModel;
    protected $AlbumModel;
    protected $session;

    public function __construct()
    {
        $this->FotoModel = new FotoModel();
        $this->AuthModel = new AuthModel();
        $this->KomentarModel = new KomentarModel();
        $this->KomentarModel = new LikeModel();
        $this->KomentarModel = new AlbumModel();
        $this->session = session();
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
        $user = session()->get('id_user');
        $userprofile = $this->AuthModel->where('id_user', $user)->first();
        $data = [
            'user' => $userprofile
        ];
        return view('user/profile', $data);
    }


    public function upload(): string
    {
        return view('user/upload');
    }

    public function editprofile()
    {
        return view('user/editprofile');
    }

    public function album($id)
    {
        $album = $this->AlbumModel->where(['id_user' => $id])->findAll();
        $data = [
            'album' => $album
        ];
        return view('user/album');
    }

    public function liked($id)
    {
        $like = $this->LikeModel->where(['id_user' => $id])->findAll();
        $foto = [];
        foreach ($like as $l) {
            $foto[] = $this->FotoModel->find($l['id_foto']);
        }
        $foto = array_reverse($foto);

        $data = [
            'foto' => $foto
        ];
        return view('user/liked',$data);
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

    public function post($id)
    {
        $db = \Config\Database::connect(); // Mendapatkan objek database
        $sql = "SELECT * FROM komentar JOIN user ON komentar.id_user = user.id_user";
        $query = $db->query($sql);
        $komentar = $query->getResult();
        $komentar = json_decode(json_encode($komentar), true);
        $komentar = array_filter($komentar, function ($var) use ($id) {
            return ($var['id_foto'] == $id);
        });

        $iduser = session('id_user');
        $like = $this->LikeModel->getLikeByPost($id);
        $jumlahlike = count($like);
        $liked = $this->LikeModel->hasUserLikedPost($iduser, $id);
        $album = $this->AlbumModel->where(['id_user' => $iduser])->findAll();

        $data = [
            'foto' => $this->FotoModel->find($id),
            'komentar' => $komentar,
            'terlike' => $liked,
            'totallike' => $jumlahlike,
            'album' => $album,
        ];
        return view('user/post', $data);

    }
    

    public function editprofilesave()
    {
        // ambil gambar
        $fileDokumen = $this->request->getFile('foto');
        $newName = $fileDokumen->getRandomName();
        $fileDokumen->move('foto_storage', $newName);

        $data = [
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat'),
            'foto' => $newName
        ];

        $this->AuthModel->save([
            'id_user' => session()->get('id_user'),
            'nama_lengkap' => $data['nama'],
            'username' => $data['username'],
            'email' => $data['email'],
            'alamat' => $data['alamat'],
            'password' => session()->get('password'),
            'foto' => $data['foto']
        ]);



        session()->set([
            'id_user' => session()->get('id_user'),
            'username' => $data['username'],
            'email' => $data['email'],
            'alamat' => $data['alamat'],
            'foto' => $data['foto'],
            'logged_in' => TRUE
        ]);

        return redirect()->to('/home');
    }
    

    public function komentarsave($id)
    {

        // ambil id_user dari session
        $id_user = $this->session->get('id_user');
        // ambil komentar dari session
        $isi_komentar = $this->request->getPost('isi_komentar');
        // simpan data
        $data = [
            'id_foto' => $id,
            'id_user' => $id_user,
            'isi_komentar' => $isi_komentar
        ];

        $this->KomentarModel->insert($data);

        return redirect()->back();
    }
}
