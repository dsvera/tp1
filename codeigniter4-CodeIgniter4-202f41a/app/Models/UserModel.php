<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['id', 'lastname', 'firstname', 'birthDate', 'adress', 'postCode', 'phoneNumber', 'id_service'];

}