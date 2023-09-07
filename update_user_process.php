<?php
 include 'header.php';
 include 'navbar.php'; 
?>
<?php
	$user = "root";
        $pass  = "aksenzhd123@";
	 	 
        $connect = new PDO('mysql:host=localhost;dbname=user', $user,$pass);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        $userid =  $_POST['userid'];
	$password = $_POST['password'];
	$address = $_POST['address'];
	
        $sql = "update users SET password = :password, address= :address where userid = :userid";
        $connect_statement = $connect->prepare($sql);
        $connect_statement->bindValue(":userid", $userid);
        $connect_statement->bindValue(":password",$password);
        $connect_statement->bindValue(":address", $address);
        $connect_statement->execute();
        echo "<script>alert('수정이 완료되었습니다.');</script>";
        echo "<script>location.href='login.php'</script>";   
?>



