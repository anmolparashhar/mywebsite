<?php
namespace App\Models;
use \CodeIgniter\Model;

class LoginModel extends Model
{
    function verifyEmail($email)
    {
        $builder = $this->db->table('user_login');
        $builder->select("uniid,status,username,password");
        $builder->where('email', $email);
        $result = $builder->get();
        if(count($result->getResultArray())==1)
        {
            return $result->getRowArray();
        }
        else
        {
            return false;
        }
    }

    public function saveLoginInfo($data)
    {
        $builder = $this->db->table('login_activity');
        $builder->insert($data);
        if($this->db->affectedRows()==1)
        {
            return $this->db->insertID();
        }
        else
        {
            return false;
        }
    }
}
