<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard</title>
</head>
<body>  
    <script>
        function OnblurPwd(){
            let pwd=document.getElementsById("pwd");
            let pwd2=document.getElementsById("pwd2");
            if(pwd.value!==pwd2.value){
                alert("รหัสผ่านทั้งสองช่องไม่ตรงกัน");
                pwd2.value="";
            }
        }
        </script>
<?php
session_start();
if (isset($_POST['login'])) {
    # code...

$login=$_POST['login'];
$password=sha1($_POST['pwd']);
$password2=sha1($_POST['pwd2']);
$name=$_POST['name'];
$gender=$_POST['gender'];
$email=$_POST['email'];

$conn=new PDO("mysql:host=localhost;dbname=webbord;charset=utf8","root","");
$sql="SELECT * FROM user where login='$login'";
$result=$conn->query($sql);
    if ($result->rowCount()==1) {
         $_SESSION['add_login']="error";
    }   
    
    
    else {
        if ($password!=$password2) {
            echo "<script>alert(); </script>";
        }
        else{
        $sql1="INSERT INTO user (login, password, name, gender, email, role)
            VALUES ('$login','$password','$name','$gender','$email','m')";
            $conn->exec($sql1);
         $_SESSION['add_login']="success";
         header("location:login.php");
        die();
        }
    }

$conn=null;
}
else {
    header("location:register.php");
    die();
}
?>
</body>
</html>

