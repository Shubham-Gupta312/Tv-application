<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class APIController extends BaseController
{
    use ResponseTrait;
    public function home_api()
    {
        try {
            $highlightedModel = new \App\Models\HighlightedProgramModel();
            $highlightData = $highlightedModel->where('status', 1)->findAll();
    
            $preciousModel = new \App\Models\PreciousProgramModel();
            $preciousData = $preciousModel->where('status', 1)->findAll();
    
            $productModel = new \App\Models\ProductModel();
            $productData = $productModel->where('status', 1)->findAll();
    
            $bannerModel = new \App\Models\BannerModel();
            $bannerData = $bannerModel->where('status', 1)->findAll();

            $baseURl = "http://localhost/basava_tv/public/assets/uploads/banner/";
            foreach ($bannerData as &$bannerItem) {
                // Concatenate base URL with the image name
                $bannerItem['banner_img'] = $baseURl . $bannerItem['banner_img'];
            }
            $mergedData = [
                'videos' => $highlightData,
                'precious' => $preciousData,
                'products' => $productData,
                'banners' => $bannerData
            ];

            $output = [
                'status' => 'true',
                'message' => 'Home Data Retrieved Successfully',
                'data' => $mergedData
            ];
        } catch (\Exception $e) {
            $output = [
                'status' => 'false',
                'message' => $e->getMessage(),
                'data' => []
            ];
        }

        return $this->response->setJSON($output);

    }

    public function all_program()
    {
        try {
            $highlightedModel = new \App\Models\HighlightedProgramModel();
            $highlightData = $highlightedModel->where('status', 1)->findAll();

            $preciousModel = new \App\Models\PreciousProgramModel();
            $preciousData = $preciousModel->where('status', 1)->findAll();

            $highlightData = array_map(function ($item) {
                $item['id'] = 'highlight_' . $item['id'];
                return $item;
            }, $highlightData);

            $preciousData = array_map(function ($item) {
                $item['id'] = 'precious_' . $item['id'];
                return $item;
            }, $preciousData);

            $mergedData = array_merge($highlightData, $preciousData);

            $output = [
                'status' => 'true',
                'message' => 'All Program Data Retrieved Successfully',
                'data' => $mergedData
            ];
        } catch (\Exception $e) {
            $output = [
                'status' => 'false',
                'message' => $e->getMessage(),
                'data' => []
            ];
        }

        return $this->response->setJSON($output);
    }
    public function fetch_data()
    {
        $fetchData = new \App\Models\HighlightedProgramModel();
        $videoData = $fetchData->where('status', 1)->findAll();
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

    public function fetch_precious()
    {
        $fetchData = new \App\Models\PreciousProgramModel();
        $videoData = $fetchData->where('status', 1)->findAll();

        // Filter video data based on status being 1
        $filteredVideoData = [];
        foreach ($videoData as $video) {
            if ($video['status'] == 1) {
                $filteredVideoData[] = $video;
            }
        }

        if (!empty($filteredVideoData)) {
            $output = [
                'status' => 'true',
                'message' => 'Video Data',
                'data' => $filteredVideoData
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

    public function retrive_product()
    {
        $fetchData = new \App\Models\ProductModel();
        $products = $fetchData->where('status', 1)->findAll();

        $baseURl = "http://localhost/basava_tv/public/assets/uploads/";
        foreach ($products as &$productItem) {
            // Concatenate base URL with the image name
            $productItem['prod_img'] = $baseURl . $productItem['prod_img'];
        }

        if (!empty($products)) {
            $output = [
                'status' => 'true',
                'message' => 'Product Data',
                'data' => $products
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

    public function retrive_banner()
    {
        $fetchData = new \App\Models\BannerModel;
        $banner = $fetchData->where('status', 1)->findAll();

        $baseURl = "http://localhost/basava_tv/public/assets/uploads/banner/";
        foreach ($banner as &$bannerItem) {
            // Concatenate base URL with the image name
            $bannerItem['banner_img'] = $baseURl . $bannerItem['banner_img'];
        }

        if (!empty($banner)) {
            $output = [
                'status' => 'true',
                'message' => 'Banner Data',
                'data' => $banner
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

    public function enquiry_product()
    {
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $phone = $this->request->getVar('phone');
        $address = $this->request->getVar('address');
        $productId = $this->request->getVar('product_id');
        $productName = $this->request->getVar('product_name');

        // Check if product id is empty
        if (empty($productId)) {
            return $this->respond([
                'status' => 'error',
                'message' => 'Product ID is empty'
            ]);
        }

        // Load model
        $model = new \App\Models\EnquiryModel();

        // Save data to database
        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'product_id' => $productId,
            'product_name' => $productName
        ];

        $enquiryData = $model->insert($data);

        // Send response
        return $this->respondCreated([
            'status' => 'success',
            'message' => 'Data inserted successfully',
        ]);
    }

}