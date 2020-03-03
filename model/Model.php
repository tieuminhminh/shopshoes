<?php
include_once 'database/Database.php';

/**
 * Class Model
 * @property Object $abstractDb
 * @property String $tableName
 * @property int $primaryKey
 * @property Object $data
 * @author minhln
 */
class Model
{
    /**
     * @var AbstractDatabase
     */
    protected $abstractDb;
    protected $tableName = null;
    protected $primaryKey = null;
    protected $data = [];

    /**
     * Model constructor.
     * init connection via object Database()
     */
    public function __construct()
    {
        // initialize object Database
        $connect = new Database();
        //check $connection exist, assign connection to $connect
        if (!empty($connect))
            $this->abstractDb = $connect;
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    /**
     * @return array
     */
    public function fetchAll()
    {
        return $this->abstractDb->fetch($this->getTableName());
    }

    /**
     * load data by id
     * @param $id
     * @return array|AbstractDatabase
     */
    public function load($id)
    {
        // Check result va tra ket qua
        return $this->abstractDb->fetch($this->getTableName(), $id);
    }

    /**
     * save data to database
     * @return Object
     */
    public function save()
    {
        //handle data, assign to array $data
        $data = $this->prepareDataBeforeSave();

        //if idExist -> call to insert
        if ($this->isNew() === false) {
            $result = $this->abstractDb->insert($this->getTableName(), $data);
        } else {
        //if idNotExist -> call to update
            $condition = $this->data['id'];
            $result = $this->abstractDb->update($this->getTableName(), $data, $condition);
        }

        //check return result, assign to $this->data
        $check = $this->prepareDataAfterSave($result);

        //validate $check
        if (isset($check) | $check != null)
            $this->data = $check;
        return $this->data;
    }

    /**
     * @return Connection|AbstractDatabase
     */
    public function delete()
    {
        $condition = '1';
        foreach ($this->data as $item) {
            if(isset($item['id']))
                $condition = "id  = ".$item['id'];
        }

        $sql = "DELETE FROM $this->tableName WHERE $condition";
        return $this->abstractDb->execute($sql);
    }

    /**
     * @return array
     */
    protected function prepareDataBeforeSave()
    {
        //validate $this->data
        if (empty($this->data))
            return [];

        $column_name_arr = [];
        $column_data_arr = [];
        $temp = [];

        //get and push id to a temporary array $temp[], clear $data[]
        if (isset($this->data['id'])) {
            array_push($temp, $this->data['id']);
            unset($this->data['id']);
        }

        //split key and value of $data
        foreach ($this->data as $key => $value) {
            array_push($column_name_arr, $key);
            array_push($column_data_arr, "'" . $value . "'");
        }

        //convert array to string
        $column_name_str = implode(',', $column_name_arr);
        $column_data_str = implode(',', $column_data_arr);
        //assign key and value to $data (local)
        $data = [
            'columnName' => $column_name_str,
            'condition' => $column_data_str
        ];
        //push id from $temp to $this->data
        if (!empty($temp))
            $this->data = ['id' => $temp[0]];
        return $data;
    }

    /**
     * @param $result
     * @return object
     */
    protected function prepareDataAfterSave($result)
    {
        if ($result != null)
            return $this->abstractDb->fetch($this->tableName, $result);
    }

    /**
     * @return bool
     */
    public function isNew()
    {
        if (isset($this->data['id']))
            if (!empty($this->abstractDb->fetch($this->tableName, $this->data['id'])))
                return true;

        return false;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function setData($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    /**
     * @param $key
     * @return string
     */
    public function getData($key)
    {

        if (isset($this->data[$key]))
            return $this->data[$key];
    }

    public function search($key)
    {
        $result = [];
        $data = $this->fetchAll();

        foreach ($data as $item) {
            if (is_int(strpos($item['id'], $key)) || is_int(strpos($item['name'], $key))) {
                array_push($result, $item);
            }
        }
        return $result;
    }
}