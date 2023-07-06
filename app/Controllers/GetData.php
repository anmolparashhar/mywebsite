<?php
namespace App\Controllers;
use App\Models\UsersModel;

class GetData extends BaseController 
{
    public function index()
    {
        $userModel = new UsersModel();
        $data['subjects'] = $userModel->getData();
        return view('show_data', $data);
    }

    public function usersList()
    {
        $userModel = new UsersModel();
        $data['users'] = $userModel->getusersList();
        return view("userlist", $data);
    }

} 