<?php namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table            ='usuario';
    protected $primaryKey       ='id';

    protected $returnType       ='array';

    protected $allowedFields    = ['nombre','username', 'password', 'rol_id'];
    protected $useTimestamps    = true;
    protected $createdFields    = 'created_at';
    protected $updatedFields    = 'updated_at';
    protected $validationRules  = [
        'nombre'      => 'required|alpha_space|min_length[3]|max_leght[75]',
        'username'    => 'required|min_length[5]|max_leght[10]',
        'password'   => 'required|max_leght[10]',
        'rol_id'    => 'required|integer|is_valid_usuario'
    ];   
    
    protected $skipValidation = false;

}