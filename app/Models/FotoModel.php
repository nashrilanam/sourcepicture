<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoModel extends Model
{
    protected $table = 'foto';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_foto';
    protected $allowedFields = ['judul_foto', 'deskripsi_foto', 'tanggal_unggahan', 'lokasi_file'];

    public function getFoto($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_user' => $id])->first();
    }

    public function getFotoByKeyword($keyword)
    {
        return $this->like('judul_foto', $keyword)->orLike('deskripsi_foto', $keyword)->findAll();
    }
}