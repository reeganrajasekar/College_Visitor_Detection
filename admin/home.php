<?php require("./layout/Header.php") ?>
<?php require("./layout/db.php") ?>

<div class="container mt-3">
    <h3 class="mt-4" style="color:#2b74e2;display:flex;flex-direction:row;justify-content:space-between">
        <span>Waiting Queue :</span>
    </h3>
    <br>  
    <div class="table-responsive">        
    <table class="table table-striped table-bordered">
        <thead style="text-align:center">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $result = $conn->query("SELECT * FROM queue WHERE NOT status='Thank You' AND NOT status='Rejected' ORDER BY id ASC");
            if($result->num_rows > 0){
                $i=0;
                while($row = $result->fetch_assoc()){
                    $i++;
                    ?>
                        <tr>
                            <td style="text-align:center"><?php echo($i) ?></td>
                            <td><?php echo($row["name"]) ?></td>
                            <td><?php echo($row["des"]) ?></td>
                            <td><?php echo($row["status"]) ?></td>
                            <td style="display:flex;justify-content:space-between">
                            <?php if($row["status"]=="Waiting List"){ ?>
                                <form action="/admin/action/update.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo($row["id"]) ?>">
                                    <input type="hidden" name="status" value="Allowed">
                                    <center>
                                        <button class="btn btn-success">Allow</button>
                                    </center>
                                </form>
                            <?php } ?>
                                <form action="/admin/action/update.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo($row["id"]) ?>">
                                    <input type="hidden" name="status" value="Rejected">
                                    <center>
                                        <button class="btn btn-danger">Reject</button>
                                    </center>
                                </form>
                                <form action="/admin/action/update.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo($row["id"]) ?>">
                                    <input type="hidden" name="status" value="Thank You">
                                    <center>
                                        <button class="btn btn-secondary">Close</button>
                                    </center>
                                </form>
                            </td>
                        </tr>
                    <?php
                }
            }else{
            ?>
            <tr>
                <td style="text-align:center" colspan="5">Nothing Found</td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    </div>
    <br>
</div>





<script>
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    if(urlParams.get('err')){
      document.write("<div id='err' style='position:fixed;bottom:30px; right:30px;background-color:#FF0000;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('err')+"</div>")
    }
    setTimeout(()=>{
        document.getElementById("err").style.display="none"
    }, 3000)
</script>

<script>
    if(urlParams.get('msg')){
      document.write("<div id='msg' style='position:fixed;bottom:30px; right:30px;background-color:#4CAF50;padding:10px;border-radius:10px;box-shadow:2px 2px 4px #aaa;color:white;font-weight:600'>"+urlParams.get('msg')+"</div>")
    }
    setTimeout(()=>{
        document.getElementById("msg").style.display="none"
    }, 3000)
</script>


<?php require("./layout/Footer.php") ?>