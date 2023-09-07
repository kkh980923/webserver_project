<?php
 $dbname = "post";
 include 'header.php';
 include 'navbar.php'; 
 require 'includes/database-connection.php';
 require 'includes/functions.php';
 
?>
<body>
<?php
        $loginuser = $_SESSION['name'];

	$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
	if(!$id)
	{
		include 'page_not_found.php';
	}

        $sql = "SELECT * FROM posts where id = :id";

        $row = pdo($pdo,$sql,['id' => $id])->fetch();
           
        echo '<h3> 제목: '.html_escape($row['title'])."<h3><hr>";
        echo '<h6> 본문 </h6>'.html_escape($row['contents']).'<hr>';
        echo '<p> 작성시간: '.html_escape($row['time']).'<p>';
        echo '<p> 조회수: '.html_escape($row['views']) .'</p>';
        echo '<p> Like: '.html_escape($row['likes']).'</p>';
        
        $views = $_GET['id'];//
        $sql = "UPDATE posts SET views = views + 1 WHERE id = $views"; //
        $view_update = pdo($pdo,$sql)->fetch(); //
  		       
?>
<button class=like type="button" onclick="window.location.href='like_check.php?id=<?=$id?>'">좋아요</button>
</body>  
<?php include 'footer.php' ?>


