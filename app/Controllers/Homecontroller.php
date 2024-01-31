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
        $fetchData = new \App\Models\HighlightedProgramModel();
        $videoData = $fetchData->findAll();
        
        // $draw = $_POST['draw'];
        // $start = $_POST['start'];
        // $length = $_POST['length'];
        // $data['videInfo'] = $fetchData->findAll($length, $start);
        // $associativeArray = [];

        // foreach ($data['videoInfo'] as $data) {
        //     $associativeArray[] = array(
        //         0 => $data['id'],
        //         1 => $data['video_title'],
        //         2 => $data['video_url']
        //     );
        // }

        // $output = array(
        //     'draw' => intval($draw),
        //     'recordsTotal' => $fetchData->countAll(),
        //     'recordsFiltered' => $fetchData->countAll(),
        //     'data' => $associativeArray
        // );

        // echo json_encode($output);
        if(!empty($videoData)){
            $output = [
                'status' => 'true',
                'message' => 'Video Data',
                'data' => $videoData 
            ];
        }else{
            $output = [
                'status' => 'false',
                'message' => 'No Data found',
                'data' => []
            ];
        }

        return $this->response->setJSON($output);
        
    }
}
