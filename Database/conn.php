<?php
class database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "safecity_db";




    protected function connect()
    {
        try {
            $this->mysqli = new mysqli($this->servername, $this->username, $this->password, $this->db_name);
            $conn = new PDO("mysql:host=$this->servername;$this->db_name", $this->username, $this->password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            return false;
            echo "Connection failed: " . $e->getMessage();
        }
    }
}


class query extends database
{
    function getData()
    {

        $sql = "SELECT * FROM `test` ";
        $select_query = $this->connect()->prepare($sql);
        $select_query->execute();

        // print_r($select_query);

        while ($rows = $select_query->fetchAll(PDO::FETCH_ASSOC)) {
echo 1;
            print_r($rows);
            // $this->data[] = $rows;
            // echo $this->data;
        }
    }
}

