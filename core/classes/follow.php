<?php
class Follow extends User {
    protected $conn;
    function __construct($conn){
        $this->conn = $conn;
    }
}
?>