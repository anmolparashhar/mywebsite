<?php
namespace App\Helpers;

function getRandom($arr)
{
    shuffle($arr); 
    return end($arr);
}