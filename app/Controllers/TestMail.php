<?php
namespace App\Controllers;

class TestMail extends BaseController
{
    public function index()
    {
        $to = '95prashar@gmail.com';
        $subject = 'Account Activation';
        $message = 'Hi Anmol,<br><br>Your account has created successfully. Please click the below link to activate your account. <br>' 
                    . '<a href="'.base_url().'testmail/verify" target="_blank">Activate Now</a><br><br>Thanks<br>';

        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setFrom('www.youtube.com', 'Info');
        $email->setBCC('anmolparashhar@gmail.com');
        $email->setCC('anmolparashhar9@gmail.com');
        $email->setSubject($subject);
        $email->setMessage($message);
        $filepath = 'assets/images/1.png';
        $email->attach($filepath);
        if($email->send())
        {
            echo "Account Created Successfully. Please activate your accounnt.";
        }
        else
        {
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }

    public function verify()
    {
        echo "Account Verified Successfully";
    }
}