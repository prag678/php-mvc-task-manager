<?php

//database class
class Database
{
    private $conn;
    //contstruct function
    public function __construct()
    {
        $this->_conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        return $this->_conn;
    }
    //insertquery
    public function insertquery(string $tblname, array $columns, array $values)
    {
        $sql = "INSERT INTO $tblname (" . implode(',', $columns) . ") VALUES ('" . implode("', '", $values) . "')";
        return mysqli_query($this->_conn, $sql);
    }
    //selectquery
    public function selectquery(string $tblname, $columns = '*', $where = '1 = 1')
    {
        $sql = "SELECT $columns FROM $tblname WHERE $where";
        return mysqli_query($this->_conn, $sql);
    }
    //getquery
    public function getquery(string $tblname, $columns, $where = '1 = 1')
    {
        $sql = "SELECT $columns FROM $tblname WHERE $where LIMIT 1";
        return mysqli_query($this->_conn, $sql);
    }
    //deletequery
    public function deletequery($tblname, $where = '1 = 1')
    {
        $sql = "DELETE FROM $tblname WHERE $where";
        return mysqli_query($this->_conn, $sql);
    }
    //updatequery
    public function updatequery($tblname, $columns, $where = '1 = 1')
    {
        $sql = "UPDATE $tblname SET " . implode(',', $columns) . " WHERE $tblname. $where";
        return mysqli_query($this->_conn, $sql);
    }
    //countquery
    public function countquery($tblname, $count, $where = '1 = 1')
    {
        $sql = "SELECT $count FROM $tblname WHERE $where LIMIT 2";
        return mysqli_query($this->_conn, $sql);
    }
}
