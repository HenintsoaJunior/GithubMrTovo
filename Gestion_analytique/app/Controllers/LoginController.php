<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\Type_voituresModel;
use CodeIgniter\Controller;

class LoginController extends BaseController
{
    public function loginPage(){
        return view('login');
    }

    public function login()
    {
        $session = session();
        $model = new LoginModel();

        $nom = $this->request->getVar('nom');
        $password = $this->request->getVar('password');

        $admin = $model->authenticate($nom, $password);
        if ($admin) {
            $session->set([
                'id_admin' => $admin['id_admin'],
                'nom' => $admin['nom'],
                'status' => $admin['status'],
                'logged_in' => TRUE
            ]);
            return json_encode(array('success' => true, 'message' => 'Connexion réussie', 'redirect_url' => base_url('/dashboardAdmin')));
        } else {
            
            return json_encode(array('success' => false, 'message' => 'Identifiants incorrects', 'errors' => 'Identifiants incorrects'));
        }
    }

    public function logout()
    {
        session()->destroy();
        
        return redirect()->to('/');
    }

    
}
