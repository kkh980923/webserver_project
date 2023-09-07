<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/bootstrap.css">
    <title>GuradKim</title>
</head>
<body>

<form action=" <?=$_SERVER[ "REQUEST_URI" ]?>" method='post'>
<input type="password" name="password">
<button type="submit" class="btn btn-dark">submit</button>
</form>

<?php 

    $user = "root";
    $pass  = "aksenzhd123@";
    
    if(empty($_POST)) $password = "";
    else $password = $_POST['password'];
    
    
    
    $connect = new PDO('mysql:host=localhost;dbname=qna', $user,$pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    if(empty($_GET['id']) === false && !empty($_POST))
    {   
    	    $id = $_GET['id'];
	    $sql = "SELECT * FROM qna_post where id = $id";
	   
	    $connect_statment = $connect->prepare($sql);
	    $connect_statment->execute();
	    $row = $connect_statment->fetch(PDO::FETCH_ASSOC);
	   
	   if($row['password'] == $password) 
	   {
	    	echo '<h3> 제목: '.$row['title']."<h3><hr>";
	    	echo '<h6> 본문 </h6>'.$row['content'].'<hr>';
	   }
	   else
	   {
	    	echo "<script>alert('비밀번호가 일치하지 않습니다.')</script>";
	    	echo "<script>location.replace('login.php')</script>";
	   }
	    
	   
	    
    }
?>


<?php include 'footer.php' ?>
