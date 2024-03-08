<?php 
    session_start();
    $comment=$_POST['comment'];
    $post_id=$_POST['post_id'];
    $user_id=$_SESSION['user_id'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    $conn = new PDO("mysql:host=localhost;dbname=webbord;charset=utf8","root","");
    
    $sql = "INSERT INTO comment (content,post_date,user_id,post_id) 
             VALUES ('$comment',NOW(),'$user_id','$post_id')";
    $conn->exec($sql);


?>
    
</body>
</html>