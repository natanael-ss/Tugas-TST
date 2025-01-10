<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'testing',  // isi username
                'email'    => 'testing@example.com',  // isi email
                'password' => password_hash('password123', PASSWORD_DEFAULT), // isi password
                'role'     => 'student'  // isi role ('student' atau 'admin')
            ],
            // Tambahkan data user lain jika perlu dengan format yang sama
        ];

        $this->db->table('users')->insertBatch($data);
    }
}