<?php

namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model
{
 protected $table = 'users';
 protected $primaryKey = 'id';
 protected $allowedFields = ['name', 'email', 'password'];   

    public function getData()
    {
        $subjects = [
            ['subject' => 'HTML', 'abbr' => 'Hyper Text Markup Language'],
            ['subject' => 'CSS', 'abbr' => 'Cascading Style Sheets'],
            ['subject' => 'JSON', 'abbr' => 'JavaScript Object Notation'],
            ['subject' => 'AJAX', 'abbr' => 'Asynchronous Javascript and XML'],
            ['subject' => 'PHP', 'abbr' => 'Hypertext Preprocessor'],
        ];
        return $subjects;
    }

    public function getUsersList()
    {
        $db = db_connect();
        $query = $db->query('select id,name,email,password from users');
        $result = $query->getResult();
        if (count($result) > 0)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }


}