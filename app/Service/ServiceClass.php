<?php

namespace App\Service;

class ServiceClass{

    private $id;
    private $price;

    public function __construct($price,$id)
    {
        $this->id = $id;
        $this->price = $price;
    }
    public function add($price){
        $this->price += $price;
    }

}
