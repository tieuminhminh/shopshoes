<?php
require_once 'model/Category.php';

class CategoryController
{

    public function view()
    {
    $category = new Category();

    $data = $category->fetchAll();


        require_once 'view/shop/category/view.php';
    }

    public function create()
    {
        $category = new Category();

        $data = $category->fetchAll();
       require_once 'view/admin/category/create.php';


    }

    public function update()
    {


    }

    public function delete()
    {

    }
}

?>
