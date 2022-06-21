<?php 
namespace App\Http;
class Test{
    public $name;

  public function __construct($name)
    {
        $this->name = $name;
    }
    public function changename($name){
       echo "Name before " . $this->name;
       $this->name = $name;
       echo "Name after " . $this->name;
    }
}
?>
