<?php

namespace App\Models;

use CodeIgniter\Model;

class MixModel extends Model
{
    protected $table      = 'mix';
    protected $useAutoIncrement = true;
    protected $primaryKey = 'id_mix';
    protected $allowedFields = ['id_album','id_foto'];

}