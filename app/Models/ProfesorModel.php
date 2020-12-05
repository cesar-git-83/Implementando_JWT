<?php namespace App\Models;

use CodeIgniter\Model;

class ProfesorModel extends Model
{
    protected $table            ='profesor';
    protected $primaryKey       ='id';

    protected $returnType       ='array';

    protected $allowedFields    = ['nombre','apellido', 'profesion', 'telefono','dui'];
    protected $useTimestamps    = true;
    protected $createdFields    = 'create_at';
    protected $updatedFields    = 'update_at';
    protected $validationRules  = [
        'nombre'      => 'required|alpha_space|min_length[3]|max_leght[75]',
        'apellido'    => 'required|alpha_space|min_length[3]|max_leght[75]',
        'profesion'   => 'required|alpha_space|min_length[3]|max_leght[3]',
        'telefono'    => 'required|alpha_numeric_space|min_length[9]|max_leght[9]',
        'dui'         => 'required|alpha_numeric_space|min_length[10]|max_leght[10]',
    ];   
    
    protected $skipValidation = false;

}