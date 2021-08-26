<?php namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model {
    protected $table      = 'usuario';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;


    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['email', 'password', 'documento', 'nombres', 'apellidos', 'tipo_usuario', 'direccion', 'genero','departamento', 'estado' , 'puntos'];

    protected $useTimestamps = false;
    protected $createdField  = 'fecha_insert';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}