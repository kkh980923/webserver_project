<?php
 include 'header.php';
 include 'navbar.php'; 
?>

<body> 
    <form  method="post" action="post_process.php" >
    <div class="mb-3">
            <br>
            <label for="exampleFormControlInput1" class="form-label" >TITLE</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="title" name="title">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label" >본문</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="contents"></textarea><br>
        <button type="submit" class="btn btn-outline-dark">제출하기</button>
        </div>
    </form>
</body> 

<?php include 'footer.php' ?>
