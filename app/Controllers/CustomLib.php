<?php
namespace App\Controllers;
use \CodeIgniter\View\Table;
use App\Libraries\TestLibrary;
class CustomLib extends BaseController 
{
    public $tl;
    public function __construct() 
    {
        $this->tl = new TestLibrary();
    }
    public function index()
    {
        // return $this->tl->getData() ."-". $this->tl->displayData();
        $data['users'] = $this->tl->getData();
        return view("userslib",$data);
        // print_r($data);
    }
}