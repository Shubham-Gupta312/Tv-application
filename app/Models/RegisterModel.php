<?php

namespace App\Models;

use CodeIgniter\Model;

class RegisterModel extends Model
{
    // ...
    protected $table = 'admin_data';
    protected $primaryKey = 'id';
    protected $protectFields = [];
}