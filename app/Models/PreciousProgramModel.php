<?php

namespace App\Models;

use CodeIgniter\Model;

class PreciousProgramModel extends Model
{
    // ...
    protected $table = 'precious_program';
    protected $primaryKey = 'id';
    protected $protectFields = [];
}