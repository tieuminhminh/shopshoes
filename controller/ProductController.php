<?php
include_once 'model/Product.php';

class ProductController
{

    public function view()
    {
        require_once 'view/shop/product/view.php';
    }

    public function create()
    {


    }

    public function update()
    {

    }

    public function delete()
    {

    }
}

$action = 'view';

if (isset($_GET['action']) && $_GET['action'] != '') {
    $action = $_GET['action'];
}
$product = new ProductController();
$product->$action();


?>
