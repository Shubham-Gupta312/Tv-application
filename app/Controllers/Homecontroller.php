<?php

namespace App\Controllers;

class Homecontroller extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function basavatv()
    {
        return view('admin/admin_cms');
    }

    public function highlighted_program()
    {
        return view('admin/highlighted_program');
    }

    public function add_highlighted()
    {
        $validation = $this->validate([
            // validation rules
            'video_title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Video Title is required',
                ]
            ],
            'video_url' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Youtube Video URL is required',
                ]
            ],
        ]);

        //  check condition
        if (!$validation) {
            $validation = \Config\Services::validation();
            $errors = $validation->getErrors();
            $message = ['status' => 'error', 'data' => 'Validate form', 'errors' => $errors];
            return $this->response->setJSON($message);
        } else {
            // echo "form submit";
            $videoTitle = $this->request->getPost('video_title');
            $videoUrl = $this->request->getPost('video_url');

            $value = [
                'video_title' => $videoTitle,
                'video_url' => $videoUrl,
            ];

            // // calling model to submit data to database
            $addProgram = new \App\Models\HighlightedProgramModel();
            $query = $addProgram->insert($value);

            if (!$query) {
                $message = ['status' => 'error', 'message' => 'Something went Wrong!'];
                return $this->response->setJSON($message);
            } else {
                $message = ['status' => 'success', 'message' => 'Data Added Successfully!'];
                return $this->response->setJSON($message);
            }
        }
    }

    // App API
    public function fetch_data()
    {
        $fetchData = new \App\Models\HighlightedProgramModel();
        $videoData = $fetchData->findAll();
        if (!empty($videoData)) {
            $output = [
                'status' => 'true',
                'message' => 'Video Data',
                'data' => $videoData
            ];
        } else {
            $output = [
                'status' => 'false',
                'message' => 'No Data found',
                'data' => []
            ];
        }

        return $this->response->setJSON($output);

    }
    public function retrive_data()
    {
        // error_log("Request received");
        $fetchData = new \App\Models\HighlightedProgramModel();

        $draw = $_GET['draw'];
        $start = $_GET['start'];
        $length = $_GET['length'];
        $data['videoInfo'] = $fetchData->findAll($length, $start);
        $totalRecords = $fetchData->countAll();
        $associativeArray = [];

        foreach ($data['videoInfo'] as $row) {
            $associativeArray[] = array(
                0 => $row['id'],
                1 => $row['video_title'],
                2 => $row['video_url'],
                3 => '<button class="btn btn-info">Active</button>
                    <button class="btn btn-danger">Delete</button>
                    <button class="btn btn-warning">Update</button>'
                ,
            );
        }

        if (empty($data['videoInfo'])) {
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

    public function precious_program()
    {
        return view('admin/precious_program');
    }

    public function add_precious()
    {
        $validation = $this->validate([
            // validation rules
            'video_title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Video Title is required',
                ]
            ],
            'video_url' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Youtube Video URL is required',
                ]
            ],
        ]);

        //  check condition
        if (!$validation) {
            $validation = \Config\Services::validation();
            $errors = $validation->getErrors();
            $message = ['status' => 'error', 'data' => 'Validate form', 'errors' => $errors];
            return $this->response->setJSON($message);
        } else {
            // echo "form submit";
            $videoTitle = $this->request->getPost('video_title');
            $videoUrl = $this->request->getPost('video_url');

            $value = [
                'video_title' => $videoTitle,
                'video_url' => $videoUrl,
            ];

            // // calling model to submit data to database
            $addProgram = new \App\Models\PreciousProgramModel();
            $query = $addProgram->insert($value);

            if (!$query) {
                $message = ['status' => 'error', 'message' => 'Something went Wrong!'];
                return $this->response->setJSON($message);
            } else {
                $message = ['status' => 'success', 'message' => 'Data Added Successfully!'];
                return $this->response->setJSON($message);
            }
        }
    }

    public function precious()
    {
        // error_log("Request received");
        $fetchData = new \App\Models\PreciousProgramModel();

        $draw = $_GET['draw'];
        $start = $_GET['start'];
        $length = $_GET['length'];
        $data['videoInfo'] = $fetchData->findAll($length, $start);
        $totalRecords = $fetchData->countAll();
        $associativeArray = [];

        foreach ($data['videoInfo'] as $row) {
            $associativeArray[] = array(
                0 => $row['id'],
                1 => $row['video_title'],
                2 => $row['video_url'],
                3 => '<button class="btn btn-info">Active</button>
                    <button class="btn btn-danger">Delete</button>
                    <button class="btn btn-warning">Update</button>'
                ,
            );
        }

        if (empty($data['videoInfo'])) {
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

    // app API
    public function fetch_precious()
    {
        $fetchData = new \App\Models\PreciousProgramModel();
        $videoData = $fetchData->findAll();
        if (!empty($videoData)) {
            $output = [
                'status' => 'true',
                'message' => 'Video Data',
                'data' => $videoData
            ];
        } else {
            $output = [
                'status' => 'false',
                'message' => 'No Data found',
                'data' => []
            ];
        }

        return $this->response->setJSON($output);
    }

    public function admin()
    {
        return view('admin/admin_data');
    }

    public function banners()
    {
        return view('admin/banners');
    }
}
