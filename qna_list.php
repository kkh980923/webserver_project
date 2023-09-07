<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/bootstrap.css">
    <title>GuradKim</title>
</head>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Title</th>
    </tr>
  </thead>
  <tbody>
  
<?php

$user = "root";
    $pass  = "aksenzhd123@";
      
    $connect = new PDO('mysql:host=localhost;dbname=qna', $user,$pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM qna_post ORDER BY id";
    $connect_statment = $connect->prepare($sql);
    $connect_statment->execute();
    
    while($row = $connect_statment->fetch(PDO::FETCH_ASSOC))
		{	
		    echo '<tr>';
		    echo '<td>'.$row['id'].'</td>';
		    echo '<td><a href="qna_view.php?id='.$row['id'].'" >'.$row['title'].'</td>';
		    echo '</tr>';	
		    
		}
?>
<div class="row">
<button type="button" class="btn btn-dark" onclick="location.href='qna.php'">문의하기</button>
</div>
</body>
<?php include 'footer.php' ?>
