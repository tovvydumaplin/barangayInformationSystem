<?php
namespace App\Controllers;
use App\Models\UserModel; 
class AuthController extends BaseController
{
    public function login()
    {
        return view('index'); 
    }
    // public function processLogin()
    // {
    //     $session = session();
    //     $model = new UserModel();

    //     $username = $this->request->getPost('username');
    //     $password = $this->request->getPost('password');

    //     $user = $model->where('username', $username)->first();

    //     if ($user) {
    //         if ($password === $user['password']) { // Directly comparing plain text passwords
    //             $sessionData = [
    //                 'account_id' => $user['account_id'],
    //                 'username' => $user['username'],
    //                 'role' => $user['role'],
    //                 'token' => $user['token'],
    //                 'logged_in' => true 
    //             ];
    //             $session->set($sessionData);
    //             return redirect()->to('admin/dashboard');
    //         } else {
    //             $session->setFlashdata('error', 'Invalid Password');
    //             return redirect()->to('/');
    //         }
    //     } else {
    //         $session->setFlashdata('error', 'Username not found');
    //         return redirect()->to('/');
    //     }
    // }

    // WITH HASH
    public function processLogin()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username',$username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $sessionData = [
                    'account_id'    => $user['account_id'],
                    'username'      => $user['username'],
                    'role'          => $user['role'],
                    'token'         => $user['token'],
                    'image'         => $user['image'],
                    'firstname'     => $user['firstname'],
                    'lastname'      => $user['lastname'],
                    'middlename'    => $user['middlename'], 
                    'suffix'        => $user['suffix'],     
                    'logged_in'     => true 
                ];
                $session->set($sessionData);
                return redirect()->to('admin/dashboard');
            } else {
                $session->setFlashdata('error', 'Invalid Password');
                return redirect()->to('/');
            }
        } else {
                $session->setFlashdata('error','Username not found');
                return redirect()->to('/');
            }
    }
    
    public function logout() 
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
