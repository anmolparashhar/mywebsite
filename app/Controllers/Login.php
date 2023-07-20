<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\LoginModel;

class Login extends BaseController
{
    public $loginModel;
    public $session;
    public function __construct()
    {
        helper('form');
        $this->loginModel = new LoginModel();
        $this->session = session();
    }

    public function index()
    {
        $data = [];
        $data['validation'] = null;
        if($this->request->getMethod() == 'post')
        {
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[6]|max_length[30]',
            ]; 
            if($this->validate($rules))
            {
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
                $userdata = $this->loginModel->verifyEmail($email);
                if($userdata)
                {
                    if(password_verify($password, $userdata['password']))
                    {
                        if($userdata['status'] == 'active')
                        {
                            $loginInfo = [
                                'uniid' => $userdata['uniid'],
                                'agent' => $this->getUserAgentInfo(),
                                'ip' => $this->request->getIPAddress(),
                                'login_time' => date('Y-m-d h:i:s'),
                            ];
                            $activity_id = $this->loginModel->saveLoginInfo($loginInfo); 
                            if($activity_id)
                            {
                                $this->session->set('logged_info', $activity_id);
                            }
                            $this->session->set('logged_user', $userdata['uniid']);
                            return redirect()->to(base_url().'dashboard');
                        }
                        else
                        {
                            $this->session->setTempdata('error', 'Please activate your account or Contact Admin.', 5);
                            return redirect()->to(current_url());
                        }
                    }
                    else
                    {
                        $this->session->setTempdata('error', 'Sorry! Wrong Password Entered.', 5);
                        return redirect()->to(current_url());
                    }
                }
                else
                {
                    $this->session->setTempdata('error', 'Sorry! Email does not exists.', 5);
                    return redirect()->to(current_url());
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }
        return view("login",$data);
    }

    public function getUserAgentInfo()
    {
        $agent = $this->request->getUserAgent();
        if ($agent->isBrowser()) {
            $currentAgent = $agent->getBrowser();
        } elseif ($agent->isRobot()) {
            $currentAgent = $this->agent->robot();
        } elseif ($agent->isMobile()) {
            $currentAgent = $agent->getMobile();
        } else {
            $currentAgent = 'Unidentified User Agent';
        }
        return $currentAgent;
    }
}