<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumModel extends Model
{
    protected $table = 'album';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_album';
    protected $allowedFields = ['nama_album', 'deskripsi', 'tanggal_dibuat', 'id_user'];

    public function getAlbumbyID($id = false)
    {
        return $this->where(['id_user' => $id])->findAll();
    }
}
