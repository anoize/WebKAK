<?php
session_start();
if (isset($_SESSION['topic'])) {
    

$category=$_POST['category'];
$topic=$_POST['topic'];
$comment=$_POST['comment'];
$user=($_POST['user_id']);


$conn=new PDO("mysql:host=localhost;dbname=webbord;charset=utf8","root","");
$sql="INSERT INTO user (title, content, post_date, cat_id, user_id)
VALUES ('$topic','$comment',NOW(),'$category','$user')";
$conn->exec($sql1);
$result=$conn->query($sql);

$conn=null;
header("location:index.php");
    die();
}
else {
    header("location:index.php");
    die();
}
?>