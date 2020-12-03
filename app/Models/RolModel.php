<?php namespace App\Models;

use CodeIgniter\Model;

class RolModel extends Model
{
    protected $table            ='rol';
    protected $primaryKey       ='id';

    protected $returnType       ='array';

    protected $allowedFields    = ['nombre'];
    protected $useTimestamps    = true;
    protected $createdFields    = 'created_at';
    protected $updatedFields    = 'updated_at';
    protected $validationRules  = [
        'nombre'      => 'required|alpha_space|min_length[25]|max_leght[45]'
    ];   
    
    protected $skipValidation = false;

}