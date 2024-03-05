<div class="container-lg">
    <h1 style="text-align: center;" class="mt-3">WebboardlnwZa007</h1>
    <hr>

    <?php 
        include "nav.php";
    ?> 

<div class="mt-3 d-flex justify-content-between" >
<div>
    <label> หมวดหมู่</label>
    <span class="dropdown">
  <button class="btn btn-light btn-sm  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    --ทั้งหมด--
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">ทั้งหมด</a></li>
    <?php
      $conn=new PDO("mysql:host=localhost;dbname=webbord;charset=utf8","root","");
      $sql="SELECT * FROM category ";
      foreach($conn->query($sql) as $row){
        echo"<li> <a class=dropdown-item href=#>$row[name]</a></li>";

      }
      $conn=null;
    ?>
  </ul>
</span>
  </div>
   <?php if(isset($_SESSION['id'])){?>
   
   <div> <a href="newpost.php" class="btn btn-success btn-sm">
    <i class="bi bi-plus"></i> สร้างกระทู้ใหม่</a></div>

   <?php }?>
</div>

    <table class="table table-striped mt-4  ">
    <?php 
         
        $conn = new PDO("mysql:host=localhost;dbname=webbord;charset=utf8","root","");
        $sql = "SELECT t3.name,t1.title,t1.id,t2.login,t1.post_date FROM post as t1
                INNER JOIN user as t2 ON (t1.user_id=t2.id)
                INNER JOIN category as t3 ON (t1.cat_id=t3.id) ORDER BY t1.post_date DESC";
        $result=$conn->query($sql);
        while($row = $result->fetch()){
            echo "<tr><td>[ $row[0] ] <a href=post.php?id=$row[2]
            style=text-decoration:none>$row[1]</a><br>$row[3] - $row[4]</td></tr>";
        }
        $conn = null;
    ?>
    </table>

        </div>