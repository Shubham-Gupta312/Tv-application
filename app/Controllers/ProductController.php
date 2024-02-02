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
            $prodName = $this->request->getPost('prod_name');
            $prodPrice = $this->request->getPost('prod_price');
            $prodDesc = $this->request->getPost('prod_desc');
            $prodImg = $this->request->getFile('prod_img'); // Use getFile to get the uploaded file instance

            if ($prodImg->isValid() && !$prodImg->hasMoved()) {
                $newProdName = $prodImg->getRandomName();
                $prodImg->move("../public/assets/uploads", $newProdName);
                $value = [
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
                $associativeArray[] = array(
                    0 => $row['id'],
                    1 => $row['prod_name'],
                    2 => $row['prod_price'],
                    3 => $row['prod_desc'],
                    // 4 => $row['prod_img'],
                    4 => '<img src="' . ASSET_URL . 'public/assets/uploads/' . $row['prod_img'] . '"height="100px" width="100px">',
                    5 => '<button class="btn btn-info">Active</button>
                        <button class="btn btn-danger">Delete</button>
                        <button class="btn btn-warning">Update</button>',
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


    public function enquiry_data()
    {
        return view('admin/enquiry_products');
    }
}