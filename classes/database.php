<?php 

session_start();

class database {

    private $_host = "localhost";
    private $_root = "root";
    private $_password = "";
    private $_database = "pos_project";
    public $conn;

    // connection to database 

    public function __construct(){

        $this -> conn = new mysqli( $this -> _host, $this -> _root, $this -> _password, $this -> _database );

        if($this -> conn -> connect_error){
            die("Connection Failed" . $this -> conn -> connect_error);        
        }

    }


    // Get products 

    


}




?>