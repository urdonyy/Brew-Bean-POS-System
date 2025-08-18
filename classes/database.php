<?php 
session_start();

class Database {

    private $_host = "localhost";
    private $_root = "root";
    private $_password = "";
    private $_database = "pos_project";
    public $conn;

    // Connection to database 
    public function __construct() {
        $this->conn = new mysqli(
            $this->_host, 
            $this->_root, 
            $this->_password, 
            $this->_database
        );

        if ($this->conn->connect_error) {
            die("Connection Failed: " . $this->conn->connect_error);        
        }
    }

    // Get all products
    public function getProducts() {
        return $this->conn->query("SELECT * FROM products");
    }

    // Get distinct categories (Hot Coffe, Cold Coffe, Non-Coffe)
    public function getCategories() {
        return $this->conn->query("SELECT DISTINCT product_id FROM products");
    }

    // Get products by category
    public function getProductsByCategory($category) {
        $stmt = $this->conn->prepare("SELECT product_name, price FROM products WHERE product_id = ?");
        $stmt->bind_param("s", $category); // "s" because product_id is VARCHAR in your DB
        $stmt->execute();
        return $stmt->get_result();
    }

    
}
?>
