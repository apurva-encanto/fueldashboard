<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin;

class Login extends BaseController
{
    public function __construct()
    {
      

    }
    public function adminLogin(): string
    {
        return view('admin/login.php');
    }

    public function adminLoginValidate()
    {
        $request = service('request');
        $postData = $request->getPost();

        $input = $this->validate([
            'email' => 'required',
            'password' => 'required|min_length[6]'
        ]);
      
        if (!$input) {
            return redirect()->route('admin/login')->withInput()->with('validation', $this->validator);
        } else 
        {
            $session = session();
            $admin = new Admin();
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $data = $admin->where('email', $email)->first();
          
            if ($data) {             
                $pass = $data['password'];
                $authenticatePassword = password_verify($password, $pass);
                if ($authenticatePassword) {
                    $ses_data = [
                        'id' => $data['id'],
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'profile_img' => $data['profile_img'],
                        'isLoggedIn' => TRUE
                    ];
                    $session->set($ses_data);
                    return redirect()->to('/admin/dashboard');

                }else{
                    $session->setFlashdata('err', 'Password is incorrect.');
                    return redirect()->to('/admin/login')->withInput();
                }
            }else{
                $session->setFlashdata('err', 'Email does not exist.');
                return redirect()->to('/admin/login')->withInput();
            }
        }

    }

 

    public function logout()
    {
        $session = session();
        $session->destroy();
        $session->setFlashdata('success', 'Logout Successfully');
        return redirect()->to('/admin/login');
    }

    public function forgotPassword()
    {
        return view('admin/forgot-password.php');
    }
    public function resetLink()
    {
        $admin = new Admin();
        $email = $this->request->getVar('email');

        $data = $admin->where('email', $email)->first();
        if ($data) {

            echo "ok";
        }else{
            session()->setFlashdata('err', 'Email does not exist.');
            return redirect()->back()->withInput();
        }
    }

}
