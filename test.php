<?php
 include 'header.php';
 include 'navbar.php'; 
 $dbname = "post"; 
 require 'includes/database-connection.php';
 require 'includes/functions.php';
?>
<style>

.box{

	width: 50%;
	height: 50%;

	border-style: solid;
	border-width: 2px;
	border-radius: 25px;
	margin: auto;
	padding : 30px;

}
</style>
<body>
<?php
        $userid =  $_SESSION['name'];
        $sql = "SELECT p.id,p.title,p.username FROM posts AS p JOIN users AS a ON a.userid = p.username WHERE a.userid = :userid;";
        $posts = pdo($pdo,$sql,['userid'=>$userid])->fetchAll();
        $sql = "SELECT * FROM users where userid = :userid";
        $row = pdo($pdo, $sql, ['userid' => $userid])->fetch();
?>


<div class="grid text-center box">
	<div class="mb-3">
	  <h3>환영합니다. <?= html_escape($userid); ?>님</h3>
	  <h4>사용자 정보</h4>
	</div>
	<table class="table table-dark table-striped">
		<tr>
		 <th scope="row">사용자 이름 : </th>
		 <td><?= html_escape($userid); ?></td>
		</tr>
		<tr>
		 <th scope="row">Address : </th>
		 <td><?= html_escape($row['address']); ?></td>
	</table>
	<button type="button" class="btn btn-outline-dark" onclick="window.location.href ='update_user.php'">회원 정보 수정</button>
</div>

<div class="grid text-center box">
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">작성한 게시물</th>
        </tr>
      </thead>
    <tbody>
    <?php foreach($posts as $post){ ?>
      <tr>
        <td><a href="http://192.168.219.103/post.php?id=<?= $post['id']?>"><?= html_escape($post['title']); ?></a>  </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</body>  
<?php include 'footer.php' ?>
