<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    // ...
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $protectFields = [];

    public function getStatusById($productId)
    {
        // Assume 'status' is the column in your table that stores the status
        $result = $this->select('status')->find($productId);

        return $result ? $result['status'] : null;
    }

    public function updateStatus($productId, $newStatus)
    {
        // Update the status in the database
        return $this->set(['status' => $newStatus])->where('id', $productId)->update();
    }
}