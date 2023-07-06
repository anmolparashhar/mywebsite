<?php

namespace App\Controllers;
use App\Models\ContactModel;
class Contact extends BaseController
{
    public $contactmodel;
    public function __construct()
    {
        helper('form');
        $this->contactmodel = new ContactModel();
    }

    public function index()
    {
        $data=[];
        $data['validation'] = null;
        // $session = session();
        $session = \CodeIgniter\Config\Services::session();
        $rules = [
            'uname' => 'required|min_length[3]|max_length[30]',
            'email' => 'required|valid_email',
            'mobile' => 'required|exact_length[10]|numeric',
            'msg' => 'required',
        ];
        if($this->request->getMethod() == 'post')
        {
            if($this->validate($rules))
            {
                $cdata = [
                    'name' => $this->request->getVar('uname', FILTER_SANITIZE_STRING),
                    'email' => $this->request->getVar('email', FILTER_SANITIZE_STRING),
                    'mobile' => $this->request->getVar('mobile', FILTER_SANITIZE_STRING),
                    'message' => $this->request->getVar('msg', FILTER_SANITIZE_STRING),
                ];
                $status = $this->contactmodel->saveData($cdata);
                if($status)
                {
                    $session->setTempdata('success', 'Thanks for contacting us! We will reach you soon.',3);
                    return redirect()->to(current_url());
                }
                else
                {
                    $session->setTempdata('error', 'Sorry! Try Again.',3);
                    return redirect()->to(current_url());
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }
        
        return view("contact", $data);
    }
}