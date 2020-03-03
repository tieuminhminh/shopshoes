<?php
require_once 'model/Product.php';
require_once 'model/Category.php';

class ProductController
{

    public function view()
    {
        $data = [];
        $product = new Product();
        if (isset($_GET['search'])) {
            $data['products'] = $product->search($_GET['search']);

        } else {
            $data['products'] = $product->fetchAll();
        }
        var_dump($data['products']);die;
        include_once ('view/admin/product/view.php');
    }

    public function create()
    {


            if (isset($_POST['name'])) {
                try {
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $color = $_POST['color'];
                    $category = $_POST['category'];
                    $image = $this->validateUploadFile();

                    if (strpos($image, "[") !== false) {
                        echo json_encode($image);
                        return;
                    }


                    $product = new Product();
                    $product->setData('name', $name);
                    $product->setData('price', $price);
                    $product->setData('color', $color);
                    $product->setData('category', $category);
                    $product->setData('image', $image);

                    $product->save();


                } catch (Exception $exception) {
                    $status = false;
                }
                echo json_encode($product->getData(1));


        }




    }

    public function update()
    {


    }

    public function delete()
    {

    }


    public function validateUploadFile()
    {
        $target_dir = "assets/upload_image/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $image = "File is an image - " . $check["mime"] . ".";

            $uploadOk = 1;

        } else {
            $image = "[File is not an image]";
            $uploadOk = 0;
            return $image;
        }

// Check if file already exists
        if (file_exists($target_file)) {
            $image = "[Sorry file already exists]";
            $uploadOk = 0;
            return $image;
        }
// Check file size
        if ($_FILES["image"]["size"] > 500000) {
            $image = "[Sorry, your file is too large]";
            $uploadOk = 0;
            return $image;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            $image = "[Sorry, only JPG, JPEG, PNG & GIF files are allowed]";
            $uploadOk = 0;
            return $image;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $image = "[Sorry, your file was not uploaded]";
            return $image;
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image = "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";

                return $target_file;
            } else {
                $image = "[Sorry, there was an error uploading your file.]";
                return $image;
            }
        }

    }
}
?>
