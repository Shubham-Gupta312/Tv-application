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
                3 => '<button class="btn btn-info"><i class="bi bi-check-lg"></i></button>
                    <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                    <button class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>'
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
                3 => '<button class="btn btn-info"><i class="bi bi-check-lg"></i></button>
                    <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                    <button class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>'
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


    public function admin()
    {
        return view('admin/admin_data');
    }

    public function admin_info()
    {
        try {
            $fetchAdmin = new \App\Models\AdminModel();

            $draw = $_GET['draw'];
            $start = $_GET['start'];
            $length = $_GET['length'];

            // Fetch banners
            $data['banner'] = $fetchAdmin->findAll($length, $start);
            $totalRecords = $fetchAdmin->countAll();
            $associativeArray = [];

            foreach ($data['banner'] as $row) {
                $associativeArray[] = array(
                    0 => $row['id'],
                    1 => $row['name'],
                    2 => $row['email'],
                );
            }

            if (empty($data['banner'])) {
                $output = array(
                    "draw" => intval($draw),
                    "recordsTotal" => 0,
                    "recordsFiltered" => 0,
                    "data" => [],
                );
            } else {
                $output = array(
                    "draw" => intval($draw),
                    "recordsTotal" => $totalRecords,
                    "recordsFiltered" => $totalRecords,
                    "data" => $associativeArray,
                );
            }

            return $this->response->setJSON($output);
        } catch (\Exception $e) {
            // Log the caught exception
            log_message('error', 'Error in fetch_banner: ' . $e->getMessage());

            // Return an error response
            return $this->response->setJSON(['error' => 'Internal Server Error']);
        }
    }

    public function banners()
    {
        return view('admin/banners');
    }
    public function add_banner()
    {
        $validation = $this->validate([
            // validation rules
            'banner_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Banner Name is required',
                ]
            ],
            'banner_img' => [
                'rules' => 'uploaded[banner_img]|max_size[banner_img,1024]|mime_in[banner_img,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Product Image is required.',
                    'max_size' => 'Maximum file size allowed is 1 MB.',
                    'mime_in' => 'Only png, jpg, jpeg formats are allowed for the Banner Image.',
                ]
            ],
        ]);

        // check validation
        if (!$validation) {
            $validation = \Config\Services::validation();
            $errors = $validation->getErrors();
            $message = ['status' => 'error', 'data' => 'Validate form', 'errors' => $errors];
            return $this->response->setJSON($message);
        } else {
            $bannerName = $this->request->getPost('banner_name');
            $bannerImg = $this->request->getFile('banner_img'); // Use getFile to get the uploaded file instance

            if ($bannerImg->isValid() && !$bannerImg->hasMoved()) {
                $newProdName = $bannerImg->getRandomName();
                $bannerImg->move("../public/assets/uploads/banner", $newProdName);
                $value = [
                    'banner_name' => $bannerName,
                    'banner_img' => $newProdName,
                ];
                // calling model to submit data to the database
                $addBanner = new \App\Models\BannerModel();
                $query = $addBanner->insert($value);

                if (!$query) {
                    $message = ['status' => 'error', 'message' => 'Something went wrong!'];
                    return $this->response->setJSON($message);
                } else {
                    $message = ['status' => 'success', 'message' => 'Data added successfully!'];
                    return $this->response->setJSON($message);
                }
            } else {
                $message = ['status' => 'error', 'message' => 'Invalid image file'];
                return $this->response->setJSON($message);
            }
        }
    }

    public function fetch_banner()
    {
        try {
            $fetchBanner = new \App\Models\BannerModel();

            $draw = $_GET['draw'];
            $start = $_GET['start'];
            $length = $_GET['length'];

            // Fetch banners
            $data['banner'] = $fetchBanner->findAll($length, $start);
            $totalRecords = $fetchBanner->countAll();
            $associativeArray = [];

            foreach ($data['banner'] as $row) {
                $associativeArray[] = array(
                    0 => $row['id'],
                    1 => $row['banner_name'],
                    2 => '<img src="' . ASSET_URL . 'public/assets/uploads/banner/' . $row['banner_img'] . '" height="100px" width="200px">',
                    3 => '<button class="btn btn-info"><i class="bi bi-check-lg"></i></button>
                    <button class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                    <button class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>',
                );
            }

            if (empty($data['banner'])) {
                $output = array(
                    "draw" => intval($draw),
                    "recordsTotal" => 0,
                    "recordsFiltered" => 0,
                    "data" => [],
                );
            } else {
                $output = array(
                    "draw" => intval($draw),
                    "recordsTotal" => $totalRecords,
                    "recordsFiltered" => $totalRecords,
                    "data" => $associativeArray,
                );
            }

            return $this->response->setJSON($output);
        } catch (\Exception $e) {
            // Log the caught exception
            log_message('error', 'Error in fetch_banner: ' . $e->getMessage());

            // Return an error response
            return $this->response->setJSON(['error' => 'Internal Server Error']);
        }
    }

}
