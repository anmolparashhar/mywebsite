<?php
namespace App\Controllers;

class FormValidation extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function index()
    {
        $data = [];
        $data['validation'] = null;
        //This is inbuild error message:
        /*$rules = [
            'username' => 'required',
            'email' => 'required|valid_email',
            'mobile' => 'required|numeric|exact_length[10]',
        ];*/

        //To write custom error message:
        $rules = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username Required',
                ],
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email required'

                ],
            ],
            'mobile' => [
                'rules' => 'required|numeric|exact_length[10]',
                'errors' => [
                    'required' => 'Mobile required',
                    'numeric' => 'Mobile {value} should be numbers',

                ],
            ],
        ];
        //The request object is available on our BaseController class.
        if($this->request->getMethod() == 'post') // getMethod() will return POST.
        {
            if($this->validate($rules))
            {
                echo "Ready to Save";
            }
            else
            {
                $data['validation'] = $this->validator; //->This validator is the object. It is going to define the rules in the frontend.
            }
        }
        //$this->validate($rules); //The validate method is available in BaseController. Therefore, we do not need to load library to validate.
        
        return view ("myform", $data);
    }
}