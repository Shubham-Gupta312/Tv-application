<?php

namespace App\Models;

use CodeIgniter\Model;

class EnquiryModel extends Model
{
    // ...
    protected $table = 'enquiry_product';
    protected $primaryKey = 'id';
    protected $protectFields = [];

}