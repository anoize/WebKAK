<?php
session_start();
if (isset($_SESSION['id'])) {
    header("location:index.php");
    die();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div class="container-lg">
    <h1 style="text-align:center ;" class="mt-3">Webboard KakKak</h1>
    
    <?php   
    include "nav.php"
    ?>
    <div class="row mt-4">
        <div class="col-lg-4 col-md-3 col-sm-2 col-1"></div>
        <div class="col-lg-4 col-md-6 col-sm-8 col-10">
            <?php   
            if (isset($_SESSION['error'])) {
                echo" <div class='alert alert-danger'> ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง</div> ";
                unset($_SESSION['error']);
            }
            
            
            
            ?>
            <div class="card">
                <div class="card-header">เข้าสู่ระบบ</div>
                <div class="card-body">
                <form action="verify.php" method="post">
                    <div class="form-group">
                        <label for="user" class="form-label">Login:</label>
                        <input type="text" id="user" class="form-control" name="name" required></div>
                        <div class="form-group mt-2">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" id="password" class="form-control" name="password" required>
                    </div>
                        <div class="mt-3 justify-content-center d-flex" >
                            <button type="submit" class="btn btn-secondary btn-sm me-2">Login</button>
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                        </div>



                </form>
                
                </div>
            </div>
        </div>
        <center>ถ้ายังไม่ได้เป็นสมาชิก <a href="register.php">กรุณาสมัครสมาชิก</a></center>
        <div class="col-lg-4 col-md-3 col-sm-2 col-1"></div>
    </div>
   
</div>
</body>

</html>
