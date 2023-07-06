<?php
namespace App\Controllers;

class Blog extends BaseController {
    public function index()
    {
        $data = [
            "page_title" => "CodeIgniter4",
            "page_heading" => "CodeIgniter4 View",
            "subjects" => ["HTML","CSS","Bootstrap","JavaScript","PHP","SQL","AJAX","Jquery","Framework"],
        ];
        echo view("myviews", $data);
    }
}