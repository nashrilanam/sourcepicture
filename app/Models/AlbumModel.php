<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumModel extends Model
{
    protected $table = 'foto';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_album';
    protected $allowedFields = ['nama_album', 'deskripsi', 'tanggal_dibuat', 'id_user'];

    public function getAlbum($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_album' => $id])->first();
    }
}
