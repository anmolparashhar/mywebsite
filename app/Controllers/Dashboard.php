<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\DashboardModel;

class Dashboard extends BaseController
{
    public $dashboardModel;
    public function __construct()
    {
        $this->dashboardModel = new DashboardModel(); 
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."login");
        }
        $uniid = session()->get('logged_user');
        $data['userdata'] = $this->dashboardModel->getLoggedUserData($uniid);
        return view('dashboard', $data);
    }

    public function logout()
    {
        if(session()->has('logged_info')) {
            $activity_id = session()->get('logged_info');
            $this->dashboardModel->updateLogoutTime($activity_id);
        }
        session()->remove('logged_user');
        session()->destroy();
        return redirect()->to(base_url()."login");
    }

    public function loginActivity()
    {
        $data['userdata'] = $this->dashboardModel->getLoggedUserData(session()->get('logged_user'));
        $data['login_info'] = $this->dashboardModel->getLoggedUserInfo(session()->get('logged_user'));
        return view("login_activity", $data);
    }
}