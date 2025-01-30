<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Contacts extends Seeder
{
    public function run()
    {
        $contacts_data = [
            [
                'name' => 'shandy',
                'phone' => '08123456478',
                'email' => 'shandy@gmail.com'
            ],
            [
                'name' => 'tiara',
                'phone' => '08987675432',
                'email' => 'tiara@gmail.com'
            ]
        ];

        foreach ($contacts_data as $data) {
            $this->db->table('contacts')->insert($data);
        }
    }
}
