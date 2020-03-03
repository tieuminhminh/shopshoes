<?php

include_once 'connection/Connection.php';

abstract class AbstractDatabase
{
    /**
     * @var Connection
     */
    protected $connection;
    private $result;

    public function __construct()
    {
        //Inject đối tượng connection tại đây
   $connection = new Connection();
   $this->connection = $connection;
    }

    /**
     * @param $sql
     * @return bool|mysqli_result
     */
    public function execute($sql)
    {
        $this->result = $this->connection->getConn()->query($sql);
        return $this->result;
    }

    /**
     * @param $tableName
     * @param  $condition
     * @return array|AbstractDatabase
     */
    public function fetch($tableName)
    {
        $data = [];
        $sql = "SELECT * FROM $tableName";
        $this->result = $this->execute($sql);
        if ($this->result === false) {
            return [];
        }
        while ($row = $this->result->fetch_array(MYSQLI_ASSOC)) {
            $data[] = $row;
        }
        return $data;

    }

    public function insert($tableName, $data)
    {
        $column_name = $data['columnName'];
        $condition = $data['condition'];
        $sql = "INSERT INTO $tableName ($column_name) VALUES ($condition)";
        $this->result = $this->execute($sql);
        return mysqli_insert_id($this->connection);
    }

    public function update($tableName, $data, $condition)
    {
        $column_name = $data['columnName'];
        $update_data = $data['condition'];

        $sql = "UPDATE $tableName SET $column_name = $update_data  WHERE id = $condition";
        $this->result = $this->execute($sql);
        return $condition;


    }

    public function deleteById($id)
    {
        //Todo
        // Build query delete
        // Thực thi query
        // Trả kết quả xóa thành công hay khong
        return true;
    }


}