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
    <?php
    $login=$_POST['login'];
    $password=sha1($_POST['password']);
    
    $conn=new PDO("mysql:host=localhost;dbname=webbord;charset=utf8","root","");
    $sql="SELECT * FROM user where login='$login' and password=sha1('$password')";
    $result=$conn->query($sql);
        if ($result->rowCount()==1) {
            $data=$result->fetch(PDO::FETCH_ASSOC);
            $_SESSION['login']=$data['login'];
            $_SESSION['role']=$data['role'];
            $_SESSION['user_id']=$data['id'];
            $_SESSION['id']=session_id();
            header("location:index.php");
            die();
        }else {
            $_SESSION['error']="error";
            header("location:login.php");
            die();
        }
    
    $conn=null;
    ?>
</body>
</html>


