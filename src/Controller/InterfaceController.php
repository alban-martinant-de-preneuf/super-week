<?php 

namespace App\Controller;
use Faker;

interface InterfaceController
{
    public function getAll() : void;

    public function delAll() : void;
    
    public function createItems(Faker\Generator $faker) : void;

    public function getInfos(int $id);
} 