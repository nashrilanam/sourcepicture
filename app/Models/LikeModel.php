<?php

namespace App\Models;

use CodeIgniter\Model;

class LikeModel extends Model
{
    protected $table      = 'likefoto';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_like';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_foto', 'id_user', 'tanggal_like'];

    public function hasUserLikedPost($iduser, $idfoto)
    {
        return $this->where(['id_user' => $iduser, 'id_foto' => $idfoto])->countAllResults() > 0;
    }

    public function getLikeByPost($id)
    {
        return $this->where(['id_foto' => $id])->findAll();
    }
}
