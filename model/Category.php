<?php
include_once 'model/Model.php';

class Category extends Model
{
    private $id;
    private $name;
    private $image;
    private $price;

    public function __construct()
    {
        parent::__construct();

        $this->table = 'categories';
    }

    public function searchLevel2($params)
    {
        $table = $this->table;

        $result = [];

        foreach ($params as $item) {

            $sql = "SELECT name FROM $table WHERE parent_id = $item";
            $query = $this->execute($sql);
            $executeQuery = mysqli_fetch_assoc($query);
            foreach ($executeQuery as $value) {
                array_push($result, $executeQuery['name']);
            }

        }
        return $result;
    }
public function searchCateName($params) {
    $table = $this->table;
$result = [];
    foreach ($params as $item) {

        $sql = "SELECT name FROM $table WHERE id = $item";
        $query = $this->execute($sql);
        $executeQuery = mysqli_fetch_assoc($query);
      array_push($result,$executeQuery['name']);
    }

    return $result;
}

}

?>

