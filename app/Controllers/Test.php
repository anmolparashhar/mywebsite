<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Test extends BaseController {
    public $parser;
    public function __construct() {
        $this->parser = \Config\Services::parser();
    }
    public function index() {
        $data = [
            'page_title' => 'My Blog Title',
            'page_heading' => 'My Blog Heading',
            'subjects_list' => [
                ['subject' => 'HTML', 'abbr' => 'Hyper Text Markup Language'],
                ['subject' => 'CSS', 'abbr' => 'Cascading Style Sheets'],
                ['subject' => 'JSON', 'abbr' => 'JavaScript Object Notation'],
                ['subject' => 'AJAX', 'abbr' => 'Asynchronous Javascript and XML'],
                ['subject' => 'PHP', 'abbr' => 'Hypertext Preprocessor'],
            ],
            'status' => true,
        ];
        //echo view ("testview");
        // $parser->setData($data);
        // return $parser->render("testview");
        // or we can also write the above two lines
        return $this->parser->setData($data)->render("testview");
    }

    public function viewFilters()
    {
        $data = [
            'page_title' => 'My Blog Title',
            'page_heading' => 'My Blog Heading',
            'date' => '16-09-1995',
            'price' => '500',
            'rain' => '70.25485',
            'mobile' => '9857725123'
        ];
        return $this->parser->setData($data)->render("filterview");
    }
}