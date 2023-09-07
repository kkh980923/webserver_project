<?php 
	session_start();
	$user = "root";
        $pass  = "aksenzhd123@";
	 	 
        $connect = new PDO('mysql:host=localhost;dbname=post', $user,$pass);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        $id = $_GET['id'];
        $user_id = $_SESSION['name'];
        
        $sql = "SELECT * FROM posts WHERE id = ${id}";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch();
      	
      	if($user_id == $res['username'])
      	{
      		echo "<script>alert('자신의 게시물은 좋아요를 누를 수 없습니다.');";
      		echo "window.history.back()</script>";
      		exit;
      	}
      	
      	$sql = "SELECT * FROM like_manage WHERE like_post_id='$id' and like_user = '$user_id'";
      	$stmt = $connect->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch();
        
        if($res)
        {
   	     $sql = "
    		UPDATE posts SET likes=likes-1 WHERE id=$id;
    		DELETE FROM like_manage WHERE like_post_id='$id' and like_user='$user_id';";
    	     $stmt = $connect->prepare($sql);
             $stmt->execute();
             echo "<script>alert('좋아요를 취소했습니다!');";
             echo "window.history.back()</script>";
             exit;
        }
        
        $sql = "
    	UPDATE posts SET likes=likes+1 WHERE id=$id;
    	INSERT INTO like_manage(like_post_id, like_user) VALUES ('$id', '$user_id');";
    	$stmt = $connect->prepare($sql);
        $stmt->execute();
        
        echo "<script>alert('좋아요 했습니다!');";
    	echo "window.history.back()</script>";
        
        
?>
