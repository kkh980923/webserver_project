<?php
 include 'header.php';
 include 'navbar.php'; 
 $file = "./upload/";
?>
<body>
<form method="post" action="fileUpload.php" enctype="multipart/form-data" name="upload"> 
 <p>이미지 파일 업로드 테스트</p>
 <hr> <br>
 <input type="file" name="file" /><br>
 <input type="submit" value="Upload" />
</form>

<form method="post" action="fileDownload.php" enctype="multipart/form-data" name="download">
<input type="text" name ="filename">
<button type="submit">search</button>
<form>
</body>




<?php include 'footer.php' ?>


