<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Contact;
use CodeIgniter\HTTP\ResponseInterface;

class Contacts extends BaseController
{
    public function index()
    {
        $model = new Contact();
        $data = [
            'contacts' => $model->findAll(),
            'title' => 'List'
        ];
        return view('contact/index', $data);
    }
}
