<?php

class mic{
    public $name;
    private $price;
    public $color;
    public $brand;


// public function __construct($name2)
// {
//     print("Hello Construct");
//     print($name2);
// }

public function __call($name, $arguments)
{
    print("$name <br>");
    print_r($arguments);
}

public function setname($light){
    print($light);
    print($this->light);

}

private function getprice(){
    return $this->price;
}

private function setprice($price){
     $this->price = $price;
}

public function getpriceproxy(){
    return $this->getprice();
}
public function setpriceproxy($price){
    return $this->setprice($price);
}



}
?>