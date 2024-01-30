<?php

namespace App\Controllers;

use \App\Libraries\Hash;

class AuthController extends BaseController
{
    public function register()
    {
        if ($this->request->getMethod() == 'get') {
            return view('auth/register');
        } else if ($this->request->getMethod() == 'post') {
            // implement validation and submit the data 
            $validation = $this->validate([
                // validation rules
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Your Name is required',
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Your Email is required',
                        'valid_email' => 'You must enter a valid email'
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[5]|max_length[10]',
                    'errors' => [
                        'required' => 'Password is required',
                        'min_length' => 'Password must have atleast 5 characters in length',
                        'max_length' => 'Password must not have more that 10 characters in length',
                    ]
                ],
                'confirmPassword' => [
                    'rules' => 'required|min_length[5]|max_length[10]|matches[password]',
                    'errors' => [
                        'required' => 'Confirm Password is required',
                        'min_length' => 'Password must have atleast 5 characters in length',
                        'max_length' => 'Password must not have more that 10 characters in length',
                        'matches' => 'Your password should be match with entered Password'
                    ]
                ],
            ]);

            // check validation condition
            if (!$validation) {
                $validation = \Config\Services::validation();
                $errors = $validation->getErrors();
                $message = ['status' => 'error', 'data' => 'Validate form', 'errors' => $errors];
                return $this->response->setJSON($message);
                // echo json_encode(['status' => 'error', 'data' => 'Validate form', 'errors' => $errors]);
            } else {
                // echo "form submit";
                $name = $this->request->getPost('name');
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                $value = [
                    'name' => $name,
                    'email' => $email,
                    'password' => Hash::pass_enc($password),
                    // 'password' => $password,
                ];

                // calling model to submit data to database
                $registerModel = new \App\Models\RegisterModel();
                $query = $registerModel->insert($value);

                if (!$query) {
                    $message = ['status' => 'error', 'message' => 'Something went Wrong!'];
                    return $this->response->setJSON($message);
                } else {
                    $message = ['status' => 'success', 'message' => 'Data Added Successfully!'];
                    return $this->response->setJSON($message);
                }

                // echo json_encode(['status' => 'success', 'data' => 'Data Inserted Successfully', 'errors' => []]);
            }
        }
    }

    public function login()
    {
        if ($this->request->getMethod() == 'get') {
            return view('auth/login');
        } else if ($this->request->getMethod() == 'post') {
            // performing validation
            $validation = $this->validate([
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                            'required' => 'Your Email is required',
                            'valid_email' => 'You must enter a valid email'
                        ]
                ],
                'password' => [
                    'rules' => 'required|min_length[5]|max_length[10]',
                    'errors' => [
                            'required' => 'Password is required',
                            'min_length' => 'Password must have atleast 5 characters in length',
                            'max_length' => 'Password must not have more that 10 characters in length',
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
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                // fetching databse to check user
                $loginModel = new \App\Models\RegisterModel();
                $user_data = $loginModel->where('email', $email)->first();
                $check_password = Hash::pass_verify($password, $user_data['password']);

                if (!$check_password) {
                    $message = ['status' => 'error', 'message' => 'You Entered wrong password!'];
                    return $this->response->setJSON($message);
                } else {
                    if (!is_null($user_data)) {
                        $session_data = [
                            'id' => $user_data['id'],
                            'name' => $user_data['name'],
                            'email' => $user_data['email'],
                            'loggedin' => 'loggedin'
                        ];
                        // filter data from database according to roles and send the user to their destination page 
                        session()->set($session_data);
                    }
                    $message = ['status' => 'success', 'message' => 'Logged in Successfully!'];
                    return $this->response->setJSON($message);
                }
            }
        }
    }

    public function logout()
    {
        session_unset();
        session()->destroy();
        return redirect()->to(base_url());
    }
}
