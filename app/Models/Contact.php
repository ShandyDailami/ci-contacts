<?php

namespace App\Models;

use CodeIgniter\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $allowedFields = [
        'name',
        'email',
        'phone',
    ];
}
