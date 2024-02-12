<?php

namespace App\Models;

use CodeIgniter\Model;

class BannerModel extends Model
{
    // ...
    protected $table = 'banner';
    protected $primaryKey = 'id';
    protected $protectFields = [];

    public function getStatusById($bannerId)
    {
        // Assume 'status' is the column in your table that stores the status
        $result = $this->select('status')->find($bannerId);

        return $result ? $result['status'] : null;
    }

    public function updateStatus($bannerId, $newStatus)
    {
        // Update the status in the database
        return $this->set(['status' => $newStatus])->where('id', $bannerId)->update();
    }

    public function deleteBanner($id)
    {
        // Assuming your primary key field is 'id'
        return $this->where('id', $id)->delete();
    }

    public function updateBanner($id, $data)
    {
        return $this->update($id, $data);
    }

    public function countBanner()
    {
        $query = $this->db->query('SELECT COUNT(*) total from banner');
        $result = $query->getRowArray();
        return $result['total'];
    }
}