<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    // ...
    protected $table = 'admin_data';
    protected $primaryKey = 'id';
    protected $protectFields = [];
}