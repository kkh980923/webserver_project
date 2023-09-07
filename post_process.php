<?php
 include 'header.php';
 include 'navbar.php'; 
?>
<body>
<?php
        $user = "root";
        $pass  = "aksenzhd123@";
	 	 
        $connect = new PDO('mysql:host=localhost;dbname=post', $user,$pass);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        
        if(empty($_POST['update_title'] && $_POST['update_contents']))
        {
            $sql = "INSERT INTO posts(title,contents,username,time) VALUE(:title,:contents,:username,:time)";
            $stmt = $connect->prepare($sql);
    
            $title = $_POST['title'];
            $contents = $_POST['contents'];
            $username = $_SESSION['name'];
            $time = date("Y-m-d H:i:s");
            
            $stmt->bindValue(":title", $title);
            $stmt->bindValue(":contents", $contents);
            $stmt->bindValue(":username", $username);
            $stmt->bindValue(":time", $time);
    
            $stmt->execute();
            echo "<script>location.replace('index.php');</script>";
        }
  	    else
        {

            $sql = "UPDATE posts SET title = :update_title, contents = :update_contents WHERE id = :id";
            $stmt = $connect->prepare($sql);
            
            $stmt->bindParam(":update_title",$title);
            $stmt->bindParam(":update_contents",$contents);
            $stmt->bindParam(":id", $id);

            $title = $_POST['update_title'];
            $contents = $_POST['update_contents'];
            $id = $_POST['id'];

            echo "trtsatstatsat";
            $stmt->execute();
            echo "<script>location.replace('index.php');</script>";
        }
?>


</body>  
<?php include 'footer.php' ?>


       
