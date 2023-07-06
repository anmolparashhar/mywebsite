<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsersModel;
use CodeIgniter\Database\Query;

class Auth extends BaseController
{
    
    protected $helpers = ['url', 'form', 'Form_helper'];


    public function index()
    {
        return view ('auth/login');
    }

    public function register()
    {
        return view ('auth/register');
    }
    
    public function create()
    {
        //Validation
        $validation = $this->validate([
            'name'=>[
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
        ]);

        if (!$validation) {
            return redirect()->to('register')->with('validation', $this->validator)->withInput();
        } else {
            //Register user into db
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            
            $values = [
                'name'=>$name,
                'email'=>$email,
                'password'=>$password,   
            ];
            $usersModel = new UsersModel();
            $query = $usersModel->insert($values);
            if(!$query){
                return redirect()->back()->with('fail', 'Something went wrong');
            } else {
                return redirect()->to('register')->with('success', 'You are registered successfully');
            }
        }
    }
}