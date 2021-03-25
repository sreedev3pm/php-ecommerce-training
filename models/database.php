<?php 
 class database{ 
    protected $connection;

    function __construct($server = 'localhost', $username = 'root', $password = 'iamgod123', $db = 'fruit_market') {
        $this->connection = new mysqli($server,$username,$password,$db);

        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
            exit();
        }
    }

    function __destruct() {
        $this->connection->close();
    }  
     public $result;// Create connection
    function query($sql)
    {
    
    $this->result = $this->connection->query($sql);
    return $this->result;


    }
    public function runQuery($sql) {
        if ($this->connection->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>