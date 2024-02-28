<?php

namespace App\Models;

use CodeIgniter\Model;

class LikeModel extends Model
{
    protected $table      = 'like';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_like';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_foto', 'id_user', 'tanggal_like'];

    public function getGaleri($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_foto' => $id])->first();
    }

    public function likeFoto($id_foto, $id_user)
    {
        $data = [
            'id_foto' => $id_foto,
            'id_user' => $id_user
        ];

        return $this->insert($data);
    }

    public function unlikeFoto($id_foto, $id_user)
    {
        return $this->where(['id_foto' => $id_foto, 'id_user' => $id_user])->delete();
    }
}
