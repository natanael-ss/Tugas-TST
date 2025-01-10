<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UsersModel;

class AuthController extends ResourceController
{

    public function landing()
    {
        return view('landing_page');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function showLoginForm()
    {
        return view('login');
    }  

    // Register method
    public function register()
    {
        $input = $this->request->getJSON(true) ?? $this->request->getPost();

        // Validasi input
        if (!isset($input['username']) || !isset($input['email']) || !isset($input['password']) || !isset($input['role'])) {
            return $this->failValidationError('All fields are required.');
        }

        $hashedPassword = password_hash($input['password'], PASSWORD_BCRYPT);
        // Simpan ke database
        $userModel = new UsersModel();
        $data = [
            'username' => $input['username'],
            'email'    => $input['email'],
            'password' => $hashedPassword, // Password belum di hash
            'role'     => $input['role']
        ];

        if ($userModel->insert($data)) {
            return $this->respondCreated(['message' => 'User registered successfully']);
        } else {
            return $this->fail('Failed to register user');
        }
    }

    // Login method
    public function login()
    {
        $input = $this->request->getJSON(true) ?? $this->request->getPost();
    
        // Validasi input
        if (!isset($input['email']) || !isset($input['password'])) {
            return $this->failValidationError('Email and password are required.');
        }
    
        // Cari user berdasarkan email
        $userModel = new UsersModel();
        $user = $userModel->where('email', $input['email'])->first();
    
        if ($user && password_verify($input['password'], $user['password'])) {
            // Simpan informasi login ke session
            session()->set([
                'isLoggedIn' => true,
                'userId'     => $user['id'],
                'username'   => $user['username'],
                'role'       => $user['role']
            ]);
    
            return $this->respond(['message' => 'Login successful', 'user' => $user]);
        } else {
            return $this->failUnauthorized('Invalid email or password');
        }
    }

    public function latihan()
    {
        return view('latihan');
    }
}
