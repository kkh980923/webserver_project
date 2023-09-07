
<?php
 include 'header.php';
 include 'navbar.php'; 
?>
<body>
	<h1>update page</h1>
    <?php 
        $user = "root";
        $pass  = "aksenzhd123@";
	 	 
        $connect = new PDO('mysql:host=localhost;dbname=post', $user,$pass);
        $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $update_id = $_GET['id'];

        $sql = "SELECT * FROM posts where id = :update_id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam('update_id',$update_id);

        $stmt->execute();
        $row = $stmt->fetch();    
    ?>
    <form  method="post" action="post_process.php">
        <div class="mb-3">
                <br>
                <label for="exampleFormControlInput1" class="form-label" >TITLE</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="title" name="update_title" value="<?php echo $row['title'] ?>">
        </div>
        <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label" >본문</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="update_contents"><?php echo $row['contents'] ?></textarea><br>
            <button type="submit" class="btn btn-outline-dark" name="id" value="<?php echo $update_id; ?>">수정하기</button>
        </div>
    </form>

</body>
<?php include 'footer.php' ?>







