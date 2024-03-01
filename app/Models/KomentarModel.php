<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table = 'komentar';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_komentar';
    protected $allowedFields = ['id_user', 'id_foto', 'isi_komentar', 'tanggal_komentar'];

    public function getKomentar($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_komentar' => $id])->first();
        
    }
}
