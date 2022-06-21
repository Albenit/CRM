<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestClass extends Model
{
    use HasFactory;
    public $test;
    public function __construct($test)
    {
        $this->test = $test;
    }
    public function testi(){
        return $this->test;
    }
}
