<?php
  error_reporting( E_ALL );
  ini_set( "display_errors", 1 );
?>
<?php
	$user = "root";
        $pass  = "aksenzhd123@";
	
	$id =  $_GET['id'];
	
	if(empty($_GET['id']) === false)	 
	{
		$connect = new PDO('mysql:host=localhost;dbname=post', $user,$pass);
		$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		echo "success!"; 
        
		$sql = "DELETE FROM posts where id = $id";
		$connect->exec($sql);
		
		#$connect_statment = $connect->prepare($sql);
		#$connect_statment->execute();
		echo "success!";
		header("location: /index.php");
        }
?>

