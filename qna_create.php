<?php
 include 'header.php';
 include 'navbar.php'; 
?>

<?php
	$user = "root";
    $pass  = "aksenzhd123@";
      
    $connect = new PDO('mysql:host=localhost;dbname=qna', $user,$pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $password = $_POST['password'];

    $sql = "insert into qna_post(title, content, password) values (:title,:content,:password)";
    
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':title',$title);
    $stmt->bindParam(':content',$content);
    $stmt->bindParam(':password',$password);

    $stmt->execute();
    
    #echo "<script>location.replace('login.php')</script>";
?>


