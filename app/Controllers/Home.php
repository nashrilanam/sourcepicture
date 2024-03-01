<?php

namespace App\Controllers;

use App\Models\FotoModel;
use App\Models\AuthModel;
use App\Models\LikeModel;
use App\Models\MixModel;
use App\Models\AlbumModel;


class Home extends BaseController
{

    protected $FotoModel;
    protected $AuthModel;
    protected $LikeModel;
    protected $MixModel;
    protected $AlbumModel;


    public function __construct()
    {
        $this->FotoModel = new FotoModel();
        $this->AuthModel = new AuthModel();
        $this->LikeModel = new LikeModel();
        $this->MixModel = new MixModel();
        $this->AlbumModel = new AlbumModel();
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

    public function search(): string
    {
        $keyword = $this->request->getVar('keyword');
        $foto = $this->FotoModel->getFotoByKeyword($keyword);

        $data = [
            'foto' => $foto,
            'keyword' => $keyword
        ];

        return view('user/berandasearch', $data);
    }

    public function like($id)
    {
        $iduser = session('id_user');
        $this->LikeModel->save([
            'id_foto' => $id,
            'id_user' => $iduser,
            'tanggal_like' => date('Y-m-d'),
        ]);
        return redirect()->back();
    }

    public function unlike($id)
    {
        $iduser = session('id_user');
        $this->LikeModel->where('id_foto', $id)->where('id_user', $iduser)->delete();
        return redirect()->back();
    }

    public function tambahalbum($fotoid, $idalbum)
    {
        if ($idalbum == 0) {
            return redirect()->back();
        }
        $this->MixModel->save([
            'id_foto' => $fotoid,
            'id_album' => $idalbum,
        ]);
        return redirect()->back();
    }

    public function submitalbum($albumname)
    {
        $iduser = session('id_user');

        $this->AlbumModel->save([
            "nama_album" => $albumname,
            'tanggal_dibuat' => date('Y-m-d'),
            'id_user' => $iduser
        ]);

        return redirect()->back();
    }

    public function hapusalbum($idalbum)
    {
        $this->AlbumModel->where('id_album', $idalbum)->delete();
        $this->MixModel->where('id_album', $idalbum)->delete();
        return redirect()->back();
    }

    public function editalbum($idalbum, $albumname)
    {
        $this->AlbumModel->save([
            "id_album" => $idalbum,
            "nama_album" => $albumname,
        ]);
        return redirect()->back();
    }

    public function hapusdarialbum($idalbum, $idfoto)
    {
        $this->MixModel->where('id_album', $idalbum)->where('id_foto', $idfoto)->delete();
        return redirect()->back();
    }

    public function bukaalbum($id)
    {
        $album = $this->AlbumModel->where(['id_album' => $id])->find();
        $fotoalbum = $this->MixModel->where('id_album', $id)->findAll();
        $foto = [];
        foreach ($fotoalbum as $a) {
            $foto[] = $this->FotoModel->where('id_foto', $a['id_foto'])->findAll();
        }
       


        $data = [
            'album' => $album,
            'foto' => $foto,
        ];
        

        return view('user/viewalbum',$data);
    }
}
