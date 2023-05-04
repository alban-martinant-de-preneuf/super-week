<?php

namespace App\Controller;

class HomeController
{
    public function displayHome(){
        require_once('src/View/home.php');
    }
}
