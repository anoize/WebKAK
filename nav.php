<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Webboard</title>
</head>
<body>
<nav class="navbar navbar-expand-lg " style="background-color: #d3d3d3">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><i class="bi bi-house-fill"></i>Home</a>
      <ul class="navbar-nav">
        <?php if(!isset($_SESSION['id'])){


        ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php"><i class="bi bi-pencil-square"></i>เข้าสู่ระบบ</a>
        </li>

        <?php } else{?>

            <li class="nav-item dropdown">
          <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-lines-fill"></i>

            <?php echo $_SESSION['name'];?>
          </a>
          
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="logout.php"><i class="bi bi-power"></i>ออกจากระบบ</a></li>
           
          </ul>
        </li>

            <?php }?>
      </ul>
  </div>
</nav>
</body>
</html>