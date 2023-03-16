<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiting List Form</title>
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
                        <form onsubmit="document.getElementById('loader').style.display='block'" action="/apply.php" method="POST" class="card-body p-4 text-center">
                            <h4 class="fw-bold mb-4 text-uppercase" style="color:#051937;font-weight:800">Visitor Registration Form</h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-floating mb-4">
                                        <select name="person" class="form-control" required>
                                            <option selected disabled value="">Select Person Type</option>
                                            <option value="Guest">Guest</option>
                                            <option value="Parent">Parent</option>
                                            <option value="Staff">Staff</option>
                                            <option value="Student">Student</option>
                                            <option value="Others">Others</option>
                                        </select>
                                        <label for="floatingInput">Reason</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-4">
                                        <select name="type" class="form-control" required>
                                            <option selected disabled value="">Select Catagory</option>
                                            <option value="Personal">Personal</option>
                                            <option value="Official">Official</option>
                                        </select>
                                        <label for="floatingInput">Reason</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input required type="text" name="name" class="form-control" id="floatingInput" placeholder="Name">
                                        <label for="floatingInput">Name</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input required type="number" name="mobile" class="form-control" id="floatingInput" placeholder="Mobile">
                                        <label for="floatingInput">Mobile</label>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <textarea required name="address" class="form-control" id="floatingInput" placeholder="Address"></textarea>
                                        <label for="floatingInput">address</label>
                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <textarea required name="purpose" class="form-control" id="floatingInput" placeholder="Purpose"></textarea>
                                        <label for="floatingInput">Purpose</label>
                                    </div>
                                </div>
    
                            </div>
                            <button class="btn btn-lg px-5 mb-2 mt-2" style="background:#051937;color:#fff" type="submit">Request</button>
                        </form>
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