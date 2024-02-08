<?php

namespace App\Controllers;

class ProductController extends BaseController
{
    public function product()
    {
        return view('admin/product');
    }


    public function add_product()
    {
        $validation = $this->validate([
            // validation rules
            'prod_id' => [
                'rules' => 'required|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Product ID is required',
                    'alpha_numeric_punct' => 'Product Id field may contain only alphanumeric characters, spaces, and ~ ! # $ % & * - _ + = | : . characters.',
                ]
            ],
            'prod_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Product Name is required',
                ]
            ],
            'prod_price' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Product price is required',
                ]
            ],
            'prod_img' => [
                'rules' => 'uploaded[prod_img]|max_size[prod_img,1024]|mime_in[prod_img,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Product Image is required.',
                    'max_size' => 'Maximum file size allowed is 1 MB.',
                    'mime_in' => 'Only png, jpg, jpeg formats are allowed for the Product Image.',
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
            $prodId = $this->request->getPost('prod_id');
            $prodName = $this->request->getPost('prod_name');
            $prodPrice = $this->request->getPost('prod_price');
            $prodDesc = $this->request->getPost('prod_desc');
            $prodImg = $this->request->getFile('prod_img'); // Use getFile to get the uploaded file instance

            if ($prodImg->isValid() && !$prodImg->hasMoved()) {
                $newProdName = $prodImg->getRandomName();
                $prodImg->move("../public/assets/uploads", $newProdName);
                $value = [
                    'prod_id' => $prodId,
                    'prod_name' => $prodName,
                    'prod_price' => $prodPrice,
                    'prod_desc' => $prodDesc,
                    'prod_img' => $newProdName,
                ];
                // calling model to submit data to the database
                $addProduct = new \App\Models\ProductModel();
                $query = $addProduct->insert($value);

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

    public function fetch_product()
    {
        try {
            $fetchData = new \App\Models\ProductModel();

            $draw = $_GET['draw'];
            $start = $_GET['start'];
            $length = $_GET['length'];

            // Fetch products
            $data['products'] = $fetchData->findAll($length, $start);
            $totalRecords = $fetchData->countAll();
            $associativeArray = [];

            foreach ($data['products'] as $row) {
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
                    1 => $row['prod_id'],
                    2 => $row['prod_name'],
                    3 => '<img src="' . ASSET_URL . 'public/assets/uploads/' . $row['prod_img'] . '"height="100px" width="100px">',
                    4 => $row['prod_price'],    
                    5 => $row['prod_desc'],
                    6 => '<button class="btn ' . $buttonCSSClass . ' active" id="active"><i class="' . $iconClass . '"></i></button>
                        <button class="btn btn-danger delete" id="delete"><i class="bi bi-trash3"></i></button>
                        <button class="btn btn-warning update" id="update" data-bs-toggle="modal"
                        data-bs-target="#updateModal"><i class="bi bi-pencil-square"></i></button>',
                );
            }

            if (empty($data['products'])) {
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
            log_message('error', 'Error in fetch_product: ' . $e->getMessage());

            return $this->response->setJSON(['error' => 'Internal Server Error']);
        }
    }


    public function setActiveStatus()
    {
        try {
            $productModel = new \App\Models\ProductModel();
            $id = $this->request->getPost('id');

            // Fetch the current status from the database
            $currentStatus = $productModel->getStatusById($id);

            // Toggle the status (assuming 0 is inactive and 1 is active)
            $newStatus = ($currentStatus == 0) ? 1 : 0;
            // echo $newStatus;

            // Update the status in the database
            $updateResult = $productModel->updateStatus($id, $newStatus);

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

    public function product_delete()
    {
        try {
            $deleteProduct = new \App\Models\ProductModel();

            $id = $this->request->getPost('id');
            // Perform the delete operation
            $deleted = $deleteProduct->delete($id);

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

    public function edit_product()
    {
        try {
            $editProduct = new \App\Models\ProductModel();
            $id = $this->request->getPost('id');
            // Fetch the product data for editing
            $productData = $editProduct->editProduct($id);

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

    public function update_data()
    {
        try {
            $updateProduct = new \App\Models\ProductModel();
            $id = $this->request->getPost('id');

            $productImg = $this->request->getFile('prod_img');
            $data = [
                'prod_id' => $this->request->getPost('prod_id'),
                'prod_name' => $this->request->getPost('prod_name'),
                'prod_price' => $this->request->getPost('prod_price'),
                'prod_desc' => $this->request->getPost('prod_desc'),
            ];
            // Check if a new product image was uploaded
            if ($productImg->isValid() && !$productImg->hasMoved()) {
                // Define upload directory and filename
                $newName = $productImg->getRandomName();
                $uploadPath = '../public/assets/uploads'; // Your upload directory
                $productImg->move($uploadPath, $newName);
                
                // Add the path to the image in the data array
                $data['prod_img'] = $newName;
            }
            // print_r($data);
            $updated = $updateProduct->updateProduct($id, $data);
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

    public function enquiry_data()
    {
        return view('admin/enquiry_products');
    }

}