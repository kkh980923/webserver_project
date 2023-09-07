<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/bootstrap.css">
    <title>GuradKim</title>
</head>

<form action="qna_create.php" method="post">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">제목</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="문의">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">문의 내용</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
  
  <label for="pass" class="form-label">password</label>
  <input type="password" class="form-control" id="pass" name="password" placeholder="">
  
  <br>
  <div class="row">
  	<button type="submit" class="btn btn-dark">제출하기</button>
  </div>
</div>
</form>



<?php include 'footer.php' ?>
