<?php

namespace App\Http\Controllers;

use App\Service\Service;
use App\Service\ServiceClass;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
public function issuepayment(ServiceClass $ser){
    $ser->add(50);
    dd($ser);
}
public function showpayment(ServiceClass $ser){
    dd($ser);
}
}
