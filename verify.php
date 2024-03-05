<?php
session_start();
if(isset($_SESSION['id'])){
    header("location:index.php");
    die();}
    $login = $_POST['login'];
    $pwd = $_POST['password'];
    $conn = new PDO("mysql:host=localhost;dbname=webbord;charset=utf8","root","");
    $sql ="SELECT * FROM user where login='$login' and password=sha1('$pwd')";
    $result = $conn->query($sql);
    if($result->rowCount()==1){
        $data=$result->fetch(PDO::FETCH_ASSOC);
        $_SESSION['username'] = $data['login'];
        $_SESSION['role'] = $data['role'];
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['id'] = session_id();
        header("location:index.php");
        die();
    }else{
        $_SESSION['error'] = "error";
        header("location:login.php");
        die();
    }
    $conn=null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verify</title>
    </head>
<body>
    <?php
    $n = $_POST['name'];
    $p = $_POST['password'];
    if ($n =="admin" && $p =="ad1234") {
        $_SESSION['name']='admin';
        $_SESSION['role']='a';
        $_SESSION['id']=session_id();
        header("location:index.php");
        die();
    }
    elseif ($_POST['name'] == "member" && $_POST['password'] == "mem1234") {
        $_SESSION['name']='member';
        $_SESSION['role']='m';
        $_SESSION['id']=session_id();
        header("location:index.php");
        die();
    }
    else{
        //echo"<center>ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง <BR>";
        //echo"<a href=login.php>เข้าสู่ระบบอีกครั้ง</a>";
        $_SESSION['error']='error';
        header("location:login.php");
        die();
    }
    ?> 
</div>
    <br>
    
</body>
</html>