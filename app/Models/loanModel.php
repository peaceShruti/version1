<?php

namespace App\Models;

use CodeIgniter\Model;

class loanModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['title', 'created_at', 'updated_at', 'deleted_at'];
}