<?php namespace App\Models;

use CodeIgniter\Model;

class PuntosModel extends Model {
    protected $table      = 'punto_nivel';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;


    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['Nivel', 'puntos', 'valor'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}