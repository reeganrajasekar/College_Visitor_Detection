<?php
require("./admin/layout/db.php");


$name = $_POST["name"];
$reason = $_POST["reason"];

$sql="INSERT INTO queue(name,des,status) VALUE('$name','$reason','Waiting List')";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    $_SESSION["id"] = $last_id;
    header("Location: /status.php?msg=Now you are in the queue!");
    die();
}else {
    header("Location: /?msg=Something went Wrong!");
    die();
}

?>