<?php
include_once 'model/Model.php';

class Product extends Model
{
private $id;
private $name;
private $image;
private $price;
    public function __construct()
    {
        parent::__construct();

        $this->tableName = 'products';
    }

}

?>

