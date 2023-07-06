<?php
namespace App\Controllers;

class TestHelpers extends BaseController 
{
    public function index()
    {
        helper(['form', 'html', 'cookie', 'array', 'Test']); //url is not required to load here. url is auto loaded by the system.
        echo getRandom([10,20,30,40,50,60]);
        echo randomString();
        // echo form_open();
        // echo form_input("username", 'Anmol Prashar'); //This will create a input field and the name of the field set to username and the value is set to Anmol Prashar
        // echo base_url();
        // echo current_url();
        
    }
}