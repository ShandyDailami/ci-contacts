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
        return view('contact/list', $data);
    }

    public function addPage()
    {
        return view('contact/add', ['title' => 'Add']);
    }

    public function add()
    {
        helper('form');

        if (
            $this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Name cannot be empty',
                    ],
                ],
                'phone' => [
                    'rules' => 'required|min_length[11]|max_length[11]',
                    'errors' => [
                        'required' => 'Phone cannot be empty',
                        'min_length[11]' => 'Phone must be 11 characters long.',
                        'max_length[11]' => 'Phone cannot be up to 11 characters long.',
                    ],
                ],
                'email' => [
                    'rules' => 'required|valid_email|is_unique[contacts.email]',
                    'errors' => [
                        'required' => 'Email cannot be empty',
                        'valid_email' => 'Please enter a valid email address.',
                        'is_unique[contacts.email]' => 'This email is already registered. Please use a different email or log in instead.'
                    ]
                ],
            ])
        ) {
            $model = new Contact();
            $model->save([
                'name' => $this->request->getPost('name'),
                'phone' => $this->request->getPost('phone'),
                'email' => $this->request->getPost('email'),
            ]);

            return redirect()->to('/')->with('message', 'Contact successfully saved');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function editPage($id)
    {
        $model = new Contact();
        $data = [
            'title' => 'Edit',
            'contact' => $model->find($id),
        ];

        return view('contact/edit', $data);
    }

    public function update($id)
    {
        helper('form');
        $model = new Contact();
        $contact = $model->find($id);
        $model->update($id, [
            'name' => $this->request->getPost('name'),
            'phone' => $this->request->getPost('phone'),
            'email' => $email = $this->request->getPost('email'),
        ]);
        $emailRules = 'required|valid_email';
        if ($email !== $contact['email']) {
            $emailRules .= '|is_unique[contacts.email]';
        }

        if (
            $this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Name cannot be empty',
                    ],
                ],
                'phone' => [
                    'rules' => 'required|min_length[11]|max_length[11]',
                    'errors' => [
                        'required' => 'Phone cannot be empty',
                        'min_length[11]' => 'Phone must be 11 characters long.',
                        'max_length[11]' => 'Phone cannot be up to 11 characters long.',
                    ],
                ],
                'email' => [
                    'rules' => $emailRules,
                    'errors' => [
                        'required' => 'Email cannot be empty',
                        'valid_email' => 'Please enter a valid email address.',
                        'is_unique[contacts.email]' => 'This email is already registered. Please use a different email or log in instead.'
                    ]
                ],
            ])
        ) {
            return redirect()->to('/')->with('message', 'Contact Successfully Updated');
        } else {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }
    }

    public function delete($id)
    {
        $model = new Contact();
        $contact = $model->find($id);
        if (!$contact) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Contact Not Found');
        }
        $model->delete($id);
        return redirect()->to('/')->with('message', 'Contact successfully deleted');
    }
}
