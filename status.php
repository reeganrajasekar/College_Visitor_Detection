<?php 
require("./admin/layout/db.php");
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$id = $_SESSION["id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiting List Form</title>
    <meta http-equiv="refresh" content="10">
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <link rel="shortcut icon" href="/static/img/logo.png">
    <style>
        body, html {
            height:100%
        }
    </style>
</head>
<body >
    <div id="loader" style="position:fixed;width:100%;height:100%;background-color:rgba(106, 17, 203, 1);z-index: 10000;top:0px;display: none;">
        <div class="spinner-border" style="color:#fff;position:fixed;top:48%;left:49%;" role="status">
          <span class="sr-only"></span>
        </div>
    </div>

    <section class="gradient-custom h-100">
        <div class="container py-1 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card" style="border-radius: 1rem;background-color:#f5f5f5;min-height:200px">
                        <div class="card-body p-4 text-center">
                            <h2 class="fw-bold mb-4 text-uppercase" style="color:#051937;font-weight:800">Your Request Status</h2>
                            <br>
                            <?php 
                                $result = $conn->query("SELECT * FROM queue WHERE id='$id'");
                                while($row = $result->fetch_assoc()){
                                    if($row["status"]=="Allowed"){
                                    ?>
                                        <h3 style="color:green;">Allowed</h3>
                                    <?php
                                    }else if($row["status"]=="Rejected"){
                                    ?>
                                        <h3 style="color:red;">Rejected</h3>
                                    <?php
                                    }else if($row["status"]=="Thank You"){
                                    ?>
                                        <h3 style="color:gray;">Thankyou!</h3>
                                    <?php
                                    }else{
                                    ?>
                                        <h3 style="color:orange;">Waiting List</h3>
                                    <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <style>
        .gradient-custom {
            background-image: linear-gradient(to right top, #051937, #004d7a, #008793, #00bf72, #a8eb12);
        }
    </style>
    <script>
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    if(urlParams.get('err')){
        document.write("<div id='err' style='position:fixed;bottom:30px; right:30px;background-color:tomato;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('err')+"</div>")
    }
    setTimeout(()=>{
        document.getElementById("err").style.display="none"
    }, 5000)
    if(urlParams.get('msg')){
        document.write("<div id='msg' style='position:fixed;bottom:30px; right:30px;background-color:green;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('msg')+"</div>")
    }
    setTimeout(()=>{
        document.getElementById("msg").style.display="none"
    }, 5000)
</script>
    
    <script src="/static/js/bootstrap.bundle.js"></script>
</body>
</html>