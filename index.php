<?php
require_once('model/Model.php');
$controller = '';
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
}

switch ($controller) {
    case 'product':
        require_once 'controller/ProductController.php';
        break;
    default:
//        require_once 'view/shop/layout/main.php';
        require_once 'view/shop/layout/main.php';
}

?>