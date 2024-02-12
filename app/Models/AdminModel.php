<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    // ...
    protected $table = 'admin_data';
    protected $primaryKey = 'id';
    protected $protectFields = [];

    public function countAdmin()
    {
        $query = $this->db->query('SELECT COUNT(*) total from admin_data');
        $result = $query->getRowArray();
        return $result['total'];
    }
}