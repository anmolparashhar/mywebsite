<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\RegisterModel;

class Register extends BaseController
{
    public $registerModel;
    public $session;
    public $email;
    public function __construct()
    {
        helper('form');
        helper('date');
        $this->registerModel = new RegisterModel();
        $this->session = \Config\Services::session();
        $this->email = \Config\Services::email();
    }
    public function index()
    {
        $data = [];
        $data['validation'] = null;
        $data['page_session'] = $this->session;
        if($this->request->getmethod() == 'post')
        {
            $rules = [
                'username'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'Your full name is required'
                    ]
                ],
                'email'=>[
                    'rules'=>'required|valid_email|is_unique[users.email]',
                    'errors'=>[
                        'required'=>'Email is required',
                        'valid_email'=>'You must enter a valid email address',
                        'is_unique'=>'Email already exists',
                    ]
                ],
                'password'=>[
                    'rules'=>'required|min_length[5]|max_length[12]',
                    'errors'=>[
                        'required'=>'Password is required',
                        'min_length'=>'Password must have atleast 5 characters',
                        'max_length'=>'Password must not have characters more than 12 digit'
                    ]
                ],
                'cpassword'=>[
                    'rules'=>'required|min_length[5]|max_length[12]|matches[password]',
                    'errors'=>[
                        'required'=>'Confirm password is required',
                        'min_length'=>'Confirm Password must have atleast 5 characters',
                        'max_length'=>'Confirm Password must not have characters more than 12 digit',
                        'matches'=>'Confirm password not matches with the password'
                    ]
                ],
                'mobile'=>[
                    'rules'=>'required|exact_length[10]|numeric',
                    'errors'=>[
                        'required'=>'Mobile is required',
                        'exact_length[10]'=>'The mobile field must be exactly 10 characters in length',
                        'numeric'=>'The mobile field must contain only numbers',
                    ]
                ],
            ];
            if($this->validate($rules))
            {

                $uniid = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz' . time()));
                $userdata = [
                    'username' => $this->request->getVar('username', FILTER_SANITIZE_STRING),
                    'email' => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'mobile' => $this->request->GetVar('mobile'),
                    'uniid' => $uniid,
                    'activation_date' => date("Y-m-d h:i:s")
                ];
                if($this->registerModel->createUser($userdata))
                {
                    $to = $this->request->getVar('email');
                    $subject = 'Account Activation Link - ICT';
                    $message = 'Hi '.$this->request->getVar('username', FILTER_SANITIZE_STRING)."<br><br>
                    Thanks, Your account created successfully. We want to make sure that we got your email right.
                    Please activate your email by clicking the link below:<br><br>"
                    . "<a href='". base_url()."register/activate/".$uniid."' target='_blank'>Activate Now</a><br><br>Thanks<br>ICT";

                    $this->email->setTo($to);
                    $this->email->setFrom('www.google.com', 'ICT');
                    $this->email->setSubject($subject);
                    $this->email->setMessage($message);
                    $filepath = 'assets/images/1.png';
                    $this->email->attach($filepath);
                    if($this->email->send())
                    {
                        $this->session->setTempdata('success', 'Account Created Successfully. Please activate your account.', 5);
                        return redirect()->to(current_url());
                    }
                    else
                    {
                        $this->session->setTempdata('error', 'Sorry! unable to send activation link. Contact Admin.', 5);
                        return redirect()->to(current_url());
                        // $data = $this->email->printDebugger(['headers']);
                        // print_r($data);
                    }

                }
                else
                {
                    $this->session->setTempdata('error', 'Sorry! unable to create an account, Try again.', 5);
                    return redirect()->to(current_url());
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }
        return view("register", $data);
    }

    public function activate($uniid=null)
    {
        $data = [];
        if(!empty($uniid))
        {
            $userdata = $this->registerModel->verifyUniid($uniid);
            if($userdata)
            {
                if($this->verifyExpiryTime($userdata->activation_date))
                {  
                    if($userdata->status == 'inactive')
                    {
                        $status = $this->registerModel->updateStatus($uniid);
                        if($status == true)
                        {
                            $data['success'] = 'Account Activated Successfully';
                        }
                    }
                    else
                    {
                        $data['success'] = 'Your account is already activated.';
                    }
                }
                else
                {
                    $data['error'] = 'Sorry! Activation link was expired.';
                }

            }
            else
            {
                $data['error'] = 'Sorry! We are unable to find your account.';
            }
        }
        else
        {
            $data['error'] = 'Sorry! Unable to process your request. Please try again.';
        }
        return view("activation_email", $data);
    }

    public function verifyExpiryTime($regTime)
    {
        $currTime = now();
        $regTime = strtotime($regTime);
        $diffTime = (int)$currTime - (int)$regTime;
        if($diffTime < 3600)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}