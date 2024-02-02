<?php

namespace App\Controllers;

class APIController extends BaseController
{
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

    public function retrive_product()
    {
        $fetchData = new \App\Models\ProductModel();
        $products = $fetchData->findAll();
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
        $banner = $fetchData->findAll();
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
}