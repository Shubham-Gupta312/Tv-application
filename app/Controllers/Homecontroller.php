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
            $status = $row['status'];
            // Set button CSS class based on the status
            if ($status == 0) {
                $buttonCSSClass = 'btn-danger'; // Set button CSS class to red for status value 0
                $iconClass = 'bi bi-x';
            } elseif ($status == 1) {
                $buttonCSSClass = 'btn-success'; // Set button CSS class to green for status value 1
                $iconClass = 'bi bi-check-lg';
            }
            $associativeArray[] = array(
                0 => $row['id'],
                1 => $row['video_title'],
                2 => $row['video_url'],
                3 => '<button class="btn ' . $buttonCSSClass . ' active" id="active"><i class="' . $iconClass . '"></i></button>
                    <button class="btn btn-danger delete" id="delete"><i class="bi bi-trash3"></i></button>
                    <button class="btn btn-warning update" id="update" data-bs-toggle="modal"
                    data-bs-target="#updateModal"><i class="bi bi-pencil-square"></i></button>',
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

    public function setHighlightActiveStatus()
    {
        try {
            $preciousProgram = new \App\Models\HighlightedProgramModel();
            $id = $this->request->getPost('id');

            // Fetch the current status from the database
            $currentStatus = $preciousProgram->getStatusById($id);

            // Toggle the status (assuming 0 is inactive and 1 is active)
            $newStatus = ($currentStatus == 0) ? 1 : 0;
            // echo $newStatus;

            // Update the status in the database
            $updateResult = $preciousProgram->updateStatus($id, $newStatus);

            if ($updateResult) {
                $response = [
                    'status' => 'success',
                    'oldStatus' => $currentStatus,
                    'newStatus' => $newStatus
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Failed to update product status.'
                ];
            }

            // Send the JSON response back to the client
            return $this->response->setJSON($response);

        } catch (\Exception $e) {
            log_message('error', 'Error in setActiveStatus: ' . $e->getMessage());
            return $this->response->setJSON(['error' => 'Internal Server Error']);
        }
    }

    public function delete_HighlightProgram()
    {
        try {
            $deleteProduct = new \App\Models\HighlightedProgramModel();

            $id = $this->request->getPost('id');
            // Perform the delete operation
            $deleted = $deleteProduct->deleteProduct($id);

            if ($deleted) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Product deleted successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete product']);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error in product_delete: ' . $e->getMessage());
            return $this->response->setJSON(['error' => 'Internal Server Error']);
        }
    }

    public function edit_HighlightProgramData()
    {
        try {
            $editProgram = new \App\Models\HighlightedProgramModel();
            $id = $this->request->getPost('id');
            // Fetch the product data for editing
            $productData = $editProgram->find($id);

            if ($productData) {
                return $this->response->setJSON(['status' => 'success', 'data' => $productData]);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Product not found']);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error in edit_product: ' . $e->getMessage());
            return $this->response->setJSON(['error' => 'Internal Server Error']);
        }
    }

    public function update_HighlightProgramData()
    {
        try {
            $updateProduct = new \App\Models\HighlightedProgramModel();
            $id = $this->request->getPost('id');
            $data = [
                'video_title' => $this->request->getPost('prog_title'),
                'video_url' => $this->request->getPost('prog_url'),
            ];
            // print_r($data);
            $updated = $updateProduct->updateHighlightProgram($id, $data);
            if ($updated) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Product updated successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update product']);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error in update_data: ' . $e->getMessage());
            return $this->response->setJSON(['error' => 'Internal Server Error']);
        }
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
            $status = $row['status'];

            // Set button CSS class based on the status
            if ($status == 0) {
                $buttonCSSClass = 'btn-danger'; // Set button CSS class to red for status value 0
                $iconClass = 'bi bi-x';
            } elseif ($status == 1) {
                $buttonCSSClass = 'btn-success'; // Set button CSS class to green for status value 1
                $iconClass = 'bi bi-check-lg';
            }
            $associativeArray[] = array(
                0 => $row['id'],
                1 => $row['video_title'],
                2 => $row['video_url'],
                3 => '<button class="btn ' . $buttonCSSClass . ' active" id="active"><i class="' . $iconClass . '"></i></button>
                    <button class="btn btn-danger delete" id="delete"><i class="bi bi-trash3"></i></button>
                    <button class="btn btn-warning update" id="update" data-bs-toggle="modal"
                        data-bs-target="#updateModal"><i class="bi bi-pencil-square"></i></button>',
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

    public function setActiveStatus()
    {
        try {
            $preciousProgram = new \App\Models\PreciousProgramModel();
            $id = $this->request->getPost('id');

            // Fetch the current status from the database
            $currentStatus = $preciousProgram->getStatusById($id);

            // Toggle the status (assuming 0 is inactive and 1 is active)
            $newStatus = ($currentStatus == 0) ? 1 : 0;
            // echo $newStatus;

            // Update the status in the database
            $updateResult = $preciousProgram->updateStatus($id, $newStatus);

            if ($updateResult) {
                $response = [
                    'status' => 'success',
                    'oldStatus' => $currentStatus,
                    'newStatus' => $newStatus
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Failed to update product status.'
                ];
            }

            // Send the JSON response back to the client
            return $this->response->setJSON($response);

        } catch (\Exception $e) {
            log_message('error', 'Error in setActiveStatus: ' . $e->getMessage());
            return $this->response->setJSON(['error' => 'Internal Server Error']);
        }
    }

    public function delete_preciousProgram()
    {
        try {
            $deleteProduct = new \App\Models\PreciousProgramModel();

            $id = $this->request->getPost('id');
            // Perform the delete operation
            $deleted = $deleteProduct->deleteProduct($id);

            if ($deleted) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Product deleted successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete product']);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error in product_delete: ' . $e->getMessage());
            return $this->response->setJSON(['error' => 'Internal Server Error']);
        }
    }

    public function edit_preciousProgramData()
    {
        try {
            $editProgram = new \App\Models\PreciousProgramModel();
            $id = $this->request->getPost('id');
            // Fetch the product data for editing
            $productData = $editProgram->find($id);

            if ($productData) {
                return $this->response->setJSON(['status' => 'success', 'data' => $productData]);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Product not found']);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error in edit_product: ' . $e->getMessage());
            return $this->response->setJSON(['error' => 'Internal Server Error']);
        }
    }

    public function update_preciousProgramData()
    {
        try {
            $updateProduct = new \App\Models\PreciousProgramModel();
            $id = $this->request->getPost('id');
            $data = [
                'video_title' => $this->request->getPost('prog_title'),
                'video_url' => $this->request->getPost('prog_url'),
            ];
            // print_r($data);
            $updated = $updateProduct->updateProgram($id, $data);
            if ($updated) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Product updated successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update product']);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error in update_data: ' . $e->getMessage());
            return $this->response->setJSON(['error' => 'Internal Server Error']);
        }
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
                $status = $row['status'];

                // Set button CSS class based on the status
                if ($status == 0) {
                    $buttonCSSClass = 'btn-danger'; // Set button CSS class to red for status value 0
                    $iconClass = 'bi bi-x';
                } elseif ($status == 1) {
                    $buttonCSSClass = 'btn-success'; // Set button CSS class to green for status value 1
                    $iconClass = 'bi bi-check-lg';
                }
                $associativeArray[] = array(
                    0 => $row['id'],
                    1 => $row['banner_name'],
                    2 => '<img src="' . ASSET_URL . 'public/assets/uploads/banner/' . $row['banner_img'] . '" height="100px" width="200px">',
                    3 => '<button class="btn ' . $buttonCSSClass . ' active" id="active"><i class="' . $iconClass . '"></i></button>
                        <button class="btn btn-danger delete" id="delete"><i class="bi bi-trash3"></i></button>
                        <button class="btn btn-warning update" id="update" data-bs-toggle="modal"
                        data-bs-target="#updateModal"><i class="bi bi-pencil-square"></i></button>',
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

    public function setBannerActiveStatus()
    {
        try {
            $preciousProgram = new \App\Models\BannerModel();
            $id = $this->request->getPost('id');

            // Fetch the current status from the database
            $currentStatus = $preciousProgram->getStatusById($id);

            // Toggle the status (assuming 0 is inactive and 1 is active)
            $newStatus = ($currentStatus == 0) ? 1 : 0;
            // echo $newStatus;

            // Update the status in the database
            $updateResult = $preciousProgram->updateStatus($id, $newStatus);

            if ($updateResult) {
                $response = [
                    'status' => 'success',
                    'oldStatus' => $currentStatus,
                    'newStatus' => $newStatus
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Failed to update product status.'
                ];
            }

            // Send the JSON response back to the client
            return $this->response->setJSON($response);

        } catch (\Exception $e) {
            log_message('error', 'Error in setActiveStatus: ' . $e->getMessage());
            return $this->response->setJSON(['error' => 'Internal Server Error']);
        }
    }

    public function delete_Banner()
    {
        try {
            $deleteProduct = new \App\Models\BannerModel();

            $id = $this->request->getPost('id');
            // Perform the delete operation
            $deleted = $deleteProduct->deleteBanner($id);

            if ($deleted) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Product deleted successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete product']);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error in product_delete: ' . $e->getMessage());
            return $this->response->setJSON(['error' => 'Internal Server Error']);
        }
    }

    public function edit_BannerData()
    {
        try {
            $editBanner = new \App\Models\BannerModel();
            $id = $this->request->getPost('id');
            // Fetch the product data for editing
            $productData = $editBanner->find($id);

            if ($productData) {
                return $this->response->setJSON(['status' => 'success', 'data' => $productData]);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Product not found']);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error in edit_product: ' . $e->getMessage());
            return $this->response->setJSON(['error' => 'Internal Server Error']);
        }
    }

    public function update_BannerData()
    {
        try {
            $updateBanner = new \App\Models\BannerModel();
            $id = $this->request->getPost('id');
    
            // Retrieve uploaded banner image
            $bannerImage = $this->request->getFile('banner_img');
    
            $data = [
                'banner_name' => $this->request->getPost('banner_name'),
            ];
    
            // Check if a new banner image was uploaded
            if ($bannerImage->isValid() && !$bannerImage->hasMoved()) {
                // Define upload directory and filename
                $newName = $bannerImage->getRandomName();
                $uploadPath = '../public/assets/uploads/banner'; // Your upload directory
                $bannerImage->move($uploadPath, $newName);
                
                // Add the path to the image in the data array
                $data['banner_img'] = $newName;
            }
    
            $updated = $updateBanner->updateBanner($id, $data);
            if ($updated) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Banner updated successfully']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update banner']);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error in update_BannerData: ' . $e->getMessage());
            return $this->response->setJSON(['error' => 'Internal Server Error']);
        }
    }
    

}
