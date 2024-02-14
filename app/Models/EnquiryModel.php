<?php

namespace App\Models;

use CodeIgniter\Model;

class EnquiryModel extends Model
{
    // ...
    protected $table = 'enquiry_product';
    protected $primaryKey = 'id';
    protected $protectFields = [];

    public function countEnqProducts()
    {
        $query = $this->db->query('SELECT COUNT(*) total from enquiry_product');
        $result = $query->getRowArray();
        return $result['total'];
    }
}