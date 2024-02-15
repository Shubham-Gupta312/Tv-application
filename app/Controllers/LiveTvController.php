<?php

namespace App\Controllers;

class LiveTvController extends BaseController
{
    public function livetv()
    {
        return view('admin/livetv');
    }

    public function add_livetv()
    {
        // Validate form input
        $validation = $this->validate([
            'livetv' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Video URL is required',
                ]
            ],
        ]);

        if (!$validation) {
            // If validation fails, return validation errors
            $validation = \Config\Services::validation();
            $errors = $validation->getErrors();
            $message = ['status' => 'error', 'data' => 'Validation error', 'errors' => $errors];
            return $this->response->setJSON($message);
        } else {
            // Get video URL from form input
            $videoURL = $this->request->getPost('livetv');

            // Check if a record already exists in the database
            $livetvModel = new \App\Models\LivetvModel();
            $existingRecord = $livetvModel->first();

            if ($existingRecord) {
                // If a record exists, update the existing URL
                $data = [
                    'livetv_url' => $videoURL
                ];
                $updated = $livetvModel->update($existingRecord['id'], $data);

                if ($updated) {
                    $message = ['status' => 'success', 'message' => 'Live TV URL updated successfully'];
                    return $this->response->setJSON($message);
                } else {
                    $message = ['status' => 'error', 'message' => 'Failed to update Live TV URL'];
                    return $this->response->setJSON($message);
                }
            } else {
                // If no record exists, insert a new URL
                $data = [
                    'livetv_url' => $videoURL
                ];
                $inserted = $livetvModel->insert($data);

                if ($inserted) {
                    $message = ['status' => 'success', 'message' => 'Live TV URL added successfully'];
                    return $this->response->setJSON($message);
                } else {
                    $message = ['status' => 'error', 'message' => 'Failed to add Live TV URL'];
                    return $this->response->setJSON($message);
                }
            }
        }
    }

    public function retrive_livetv()
    {
        $fetchData = new \App\Models\LivetvModel();

        $draw = $_GET['draw'];
        $start = $_GET['start'];
        $length = $_GET['length'];
        $data['livetv'] = $fetchData->findAll($length, $start);
        $totalRecords = $fetchData->countAll();
        $associativeArray = [];

        foreach ($data['livetv'] as $row) {
            $associativeArray[] = array(
                0 => $row['id'],
                1 => $row['livetv_url'],
            );
        }

        if (empty($data['livetv'])) {
            $output = array(
                "draw" => intval($draw),
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        } else {
            $output = array(
                "draw" => intval($draw),
                "recordsTotal" => $totalRecords,
                "recordsFiltered" => $totalRecords,
                "data" => $associativeArray
            );
        }
        // print_r($output);
        return $this->response->setJSON($output);
        // echo json_encode($output);
    }

}