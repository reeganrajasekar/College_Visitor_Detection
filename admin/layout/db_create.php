<?php 
require("./db.php");

$sql = "CREATE TABLE queue(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    person VARCHAR(500) NOT NULL,
    type VARCHAR(500) NOT NULL,
    name VARCHAR(500) NOT NULL,
    mobile VARCHAR(125) NOT NULL,
    address VARCHAR(500) NOT NULL,
    purpose VARCHAR(500) NOT NULL,
    status VARCHAR(125) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table queue created successfully<br>";
} else {
    echo "Error creating table: ";
}


?>