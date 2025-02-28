<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Contact;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");


class ContactApi extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $model = new Contact();
        $contact = $model->findAll();

        return $this->respond($contact, 200);
    }
}
