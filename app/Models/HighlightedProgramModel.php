<?php

namespace App\Models;

use CodeIgniter\Model;

class HighlightedProgramModel extends Model
{
    // ...
    protected $table = 'highlighted_program';
    protected $primaryKey = 'id';
    protected $protectFields = [];
}