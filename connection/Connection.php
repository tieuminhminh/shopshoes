<?php
include_once 'connection/Config.php';

class Connection

{
    /**
     * @return mysqli
     */

    private $conn;
    private $server_name;
    private $user_name;
    private $password;
    private $database;

    public function getConn()
    {
        return $this->conn;
    }

    /**
     * @return string
     */
    public function getServerName()
    {
        return $this->server_name;
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getDatabase()
    {
        return $this->database;
    }


    public function __construct()
    {
        $this->server_name = SERVER_NAME;
        $this->user_name = USER_NAME;
        $this->password = PASSWORD;
        $this->database = DATABASE;

        $this->conn = new mysqli($this->getServerName(),$this->getUserName(),$this->getPassword(),$this->getDatabase());
    if (!empty($this->conn)) {
       return $this->conn;
    } else {

        echo("ERROR: Could not connect. ".mysqli_connect_error());
    }
    }

}