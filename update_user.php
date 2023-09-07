<?php
 include 'header.php';
 include 'navbar.php'; 
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
	$user = "root";
        $pass  = "aksenzhd123@";
	 	 
        $connect = new PDO('mysql:host=localhost;dbname=user', $user,$pass);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        
        $userid =  $_SESSION['name'];
        $sql = "SELECT * FROM users where userid = :userid";
        $connect_statement = $connect->prepare($sql);
        $connect_statement->bindValue(":userid",$userid);
        $connect_statement->execute();
        $row = $connect_statement->fetch();                
?>


<div class="grid text-center box">
	<div class="mb-3">
	  <h3>환영합니다. <?= $userid ?>님</h3>
	  <h4>사용자 정보 수정</h4>
	</div>
    <form action='update_user_process.php' method='post'>
	<table class="table table-dark table-striped">
		<tr>
		 <th scope="row">사용자 이름 : </th>
		 <td><?= $userid ?></td>
		</tr>
		<tr>
		 <th scope="row">Address : </th>
		 <td><input type='text' name="address" value ='<?= $row['address'] ?>'></td>
        </tr>
        <tr>
            <th scope="row">Password</th>
            <td><input type='password' name='password' required></td>
        </tr>
	</table>
	<button type="submit" class="btn btn-outline-dark" name="userid" value="<?= $userid ?>">수정하기</button>
	</form>
</div>

</body>  
<?php include 'footer.php' ?>

