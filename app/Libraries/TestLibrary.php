<?php
namespace App\Libraries;
use App\Models\UsersModel;
use CodeIgniter\HTTP\URI;

class TestLibrary {
    public $db;
    public $users;
    public $email;
    public $uri;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->email = \Config\Services::email();
        $this->users = new UsersModel();
        $this->uri = new URI(current_url());
        helper('form'); //We can directly load helper in our custom library method.
    }
    public function getData()
    {
        $query = $this->db->query('select id,name,email,password from users');
        $result = $query->getResult();
        return $result;
        // return $this->db->query('Select * from users')->getResultArray();
        // return $this->users->findAll();
        // return $this->uri->getHost();
    }

    public function displayData()
    {
        return 'Display Data';
    }
}