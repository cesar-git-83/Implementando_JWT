<?php namespace App\Models;

use CodeIgniter\Model;

class EstudianteModel extends Model
{
    protected $table            ='estudiante';
    protected $primaryKey       ='id';

    protected $returnType       ='array';

    protected $allowedFields    = ['nombre','apellido','dui','genero','carnet','grado_id'];
    protected $useTimestamps    = true;
    protected $createdFields    = 'create_at';
    protected $updatedFields    = 'update_at';
    protected $validationRules  = [
        'nombre'        => 'required|alpha_space|min_length[3]|max_leght[75]',
        'apellido'      => 'required|alpha_space|min_length[3]|max_leght[75]',
        'dui'           => 'required|alpha_numeric_space|min_length[10]|max_leght[10]',
        'genero'        => 'required|alpha_space|min_length[1]|max_leght[1]',
        'carnet'        => 'required|alpha_numeric_space|min_length[9]|max_leght[9]',
        'grado_id'      => 'required|integer|is_valid_grado',
    ];   
    protected $skipValidation = false;

}