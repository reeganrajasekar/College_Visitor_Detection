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
    <meta http-equiv="refresh" content="3">
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
                <div class="col-12 col-md-8 col-lg-6 col-xl-8">
                    <div class="card" style="border-radius: 1rem;background-color:#f5f5f5;">
                        <div class="row mt-2 px-2">
                            <div class="col-3">
                                <img src="/static/logo.jpg" style="width:100%" alt="" class="rounded">
                            </div>
                            <div class="col-9" style="height:100px;display:flex;justify-content:center;align-items:center">
                                <h2 style="color:#a94442;text-align:center;font-size:26px;font-weight:900;">
                                    BON SECOURS COLLEGE FOR WOMEN<br>Thanjavur
                                </h2>
                            </div>
                        </div>
                        <div class="my-4 text-center">
                            <h4>Your Request has been Submitted.</h4>
                            <br>
                            <h4>You will receive a response as Message.</h4>
                            <br>
                            <h4>Thank you</h4>
                            <br>
                            <?php 
                                $result = $conn->query("SELECT * FROM queue WHERE id='$id'");
                                while($row = $result->fetch_assoc()){
                                    if($row["status"]=="Waiting List"){
                                    ?>
                                        <h2>Request Status : <span style="color:orange;">Waiting List</span></h2>
                                        <?php
                                    }else{
                                        ?>
                                            <h2>Request Status : <span style="color:#a8eb12;"><?php echo($row["status"]) ?></span></h2>
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
    
    <script src="/static/js/bootstrap.bundle.js"></script>
</body>
</html>