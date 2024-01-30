<?php

namespace App\Controllers;

class Homecontroller extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function basavatv(){
        return view('admin/admin_cms');
    }
}
