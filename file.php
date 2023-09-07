<?php
 include 'header.php';
 include 'navbar.php'; 
 $file = "./upload/";
?>
<body>
<form method="post" action="fileUpload.php" enctype="multipart/form-data" name="upload"> 
 <p>이미지 파일 업로드 테스트</p>
 <hr> <br>
 <div class="mb-2">
 <div class="row">
 	<div class="col-3">
  	<input class="form-control" type="file" id="file" name="file">
  	</div>
  	<div class="col-1">
  	<button type="submit" class="btn btn-outline-dark">선택</button>
  	</div>
  </div>
</div>
</form>
<hr>
<p>download test</p>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">FILE_NAME</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $number = 0;
      $user = "root";
      $pass  = "aksenzhd123@";
      $dbh = new PDO("mysql:host=127.0.0.1;dbname=post" ,$user, $pass);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT image_name,image_id FROM testblob";
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
     
      while($array = $stmt->fetch(PDO::FETCH_ASSOC)) 
      {
         $number++;
          
          $id = $array['image_id'];
          echo "<tr>";
          echo "<th scope='row'>".$number."</th>";
          echo "<td><a href='fileDownload.php?id=$id'>".$array['image_name']."</a></td>";
          echo "</tr>";
	}	
      ?>

  </tbody>
</table>
</body>
<?php include 'footer.php' ?>




