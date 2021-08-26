<?php namespace App\Models;

use CodeIgniter\Model;

class DepartamentosModel extends Model {
   protected $table      = 'departamentos';
    protected $primaryKey = 'id_depa';

    protected $useAutoIncrement = true;


    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nombre'];

    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;  
}