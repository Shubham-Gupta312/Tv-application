<?php

namespace App\Models;

use CodeIgniter\Model;

class PreciousProgramModel extends Model
{
    // ...
    protected $table = 'precious_program';
    protected $primaryKey = 'id';
    protected $protectFields = [];

    public function getStatusById($programId)
    {
        // Assume 'status' is the column in your table that stores the status
        $result = $this->select('status')->find($programId);

        return $result ? $result['status'] : null;
    }

    public function updateStatus($programId, $newStatus)
    {
        // Update the status in the database
        return $this->set(['status' => $newStatus])->where('id', $programId)->update();
    }

    public function deleteProduct($id)
    {
        // Assuming your primary key field is 'id'
        return $this->where('id', $id)->delete();
    }

    public function updateProgram($id, $data)
    {
        return $this->update($id, $data);
    }

    public function countPrecious()
    {
        $query = $this->db->query('SELECT COUNT(*) total from precious_program');
        $result = $query->getRowArray();
        return $result['total'];
    }
}