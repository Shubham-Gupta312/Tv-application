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

    public function deleteProduct($id)
    {
        // Assuming your primary key field is 'id'
        return $this->where('id', $id)->delete();
    }

    public function editProduct($id)
    {
        return $this->find($id);
    }

    public function updateProduct($id, $data)
    {
        return $this->update($id, $data);
    }

    public function countProduct(){
        $query = $this->db->query('SELECT COUNT(*) as total FROM products');
        $result = $query->getRowArray();
        return $result['total'];
    }
}