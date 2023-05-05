<?php

namespace App\Controller;

class HomeController
{
    public function displayHome(): void
    {
        require_once('src/View/home.php');
    }
}
