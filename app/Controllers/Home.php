<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view("index");
    }

    public function about()
    {
        return view("about");
    }

    public function contact()
    {
        return view("contact");
    }

    public function training()
    {
        return view("training");
    }

    public function online()
    {
        return view("online");
    }

    public function galary()
    {
        return view("galary");
    }
}
