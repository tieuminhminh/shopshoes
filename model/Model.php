<?php

class Model
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "shopshoes";


    //connect variable
    private $conn = null;
//    private $result = null;

    //initialize construct fuction
    public function __construct()
    {
        $this->connect();

    }

    /*
 * open connection to database
 * @effect: mysqli|null|false
 */
    /**
     * @return null
     */
    // connect function
    public function connect()
    {

        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);

        //check connection
//        if (!$this->conn) {
//            die ("Connect fail!");
//        } else {
//            //set up utf8
//            $this->conn->set_charset("utf8");
//            echo "sucesss";
//        }
//        return $this->conn;
        if (!$this->conn) {
            die("fail");
        } else {
            echo 'sucess';
        }
    }

}

?>

