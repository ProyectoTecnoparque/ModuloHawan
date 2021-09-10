<?php namespace App\Models;

use CodeIgniter\Model;

class HistorialModel extends Model {
    protected $table      = 'point_acum';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['usuario_id', 'puntos_sum', 'puntos_rest' ,'id_nivel'];

    protected $useTimestamps = false;
    protected $createdField  = 'fecha_insert';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}

