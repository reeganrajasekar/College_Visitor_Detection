<?php
require("./admin/layout/db.php");


$person = $_POST["person"];
$type = $_POST["type"];
$name = $_POST["name"];
$mobile = $_POST["mobile"];
$address = $_POST["address"];
$purpose = $_POST["purpose"];

$sql="INSERT INTO queue(person,type,name,mobile,address,purpose,status) VALUE('$person','$type','$name','$mobile','$address','$purpose','Waiting List')";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    $_SESSION["id"] = $last_id;
    header("Location: /status.php");
    die();
}else {
    header("Location: /?msg=Something went Wrong!");
    die();
}

?>