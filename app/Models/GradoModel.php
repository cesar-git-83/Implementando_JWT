<?php namespace App\Models;

use CodeIgniter\Model;

class GradoModel extends Model
{
    protected $table            ='grado';
    protected $primaryKey       ='id';

    protected $returnType       ='array';

    protected $allowedFields    = ['grado','seccion','profesor_id'];
    protected $useTimestamps    = true;
    protected $createdFields    = 'create_at';
    protected $updatedFields    = 'update_at';
    protected $validationRules  = [
        'grado'        => 'required|alpha_space|min_length[3]|max_leght[60]',
        'seccion'      => 'required|alpha_space|min_length[2]|max_leght[2]',
        'profesor_id'  => 'required|integer|is_valid_profesor',
    ];   
    protected $skipValidation = false;

}