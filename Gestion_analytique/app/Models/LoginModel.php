<?php

namespace App\Models;
use CodeIgniter\Model;

class LoginModel extends Model {
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['nom', 'password','status'];

    public function authenticate($username, $password)
    {
        $user = $this->where('nom', $username)->first();

        if ($user && isset($user['password']) && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
    
}