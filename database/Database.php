<?php
require_once 'database/AbstractDatabase.php';

class Database extends AbstractDatabase
{

public function __construct()
{
  parent::__construct();
    try {
        if (empty($this->connection)) {
            echo("ERROR: Could not connect. ".mysqli_connect_error());
            throw new Exception("Connection error");
        }
    } catch (Exception $exception) {
        echo $exception;

    }

}



}
