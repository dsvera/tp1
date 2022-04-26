<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['lastname', 'firstname', 'birthDate', 'adress', 'postCode', 'phoneNumber', 'id_service'];

}