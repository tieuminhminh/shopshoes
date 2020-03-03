<?php

$Route = array();
/**Homepage routes*/
$Route['/'] = "view/admin/layout/main";
$Route[''] = "view/admin/layout/main";
/**Product routes*/
$Route['/viewProduct'] = "controller/ProductController|view";
$Route['/createProduct'] = "controller/ProductController|create";


/**Category route*/
$Route['/viewCategory'] = "controller/CategoryController|view";
$Route['/testConn'] = "/Connection";

?>