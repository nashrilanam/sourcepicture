<?php

namespace App\Models;

use CodeIgniter\Model;

class LikeModel extends Model
{
    protected $table = 'like';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_like';
    protected $allowedFields = ['id_foto', 'id_user', 'tanggal_like',];

    public function getGaleri($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_like' => $id])->first();
    }
}
