<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'iduser';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['iduser', 'lastname', 'firstname', 'birthDate', 'adress', 'postCode', 'phoneNumber', 'id_service'];

}