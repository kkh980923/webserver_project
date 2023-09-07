<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      $dbname = "post";
      require 'includes/database-connection.php';
      require 'includes/functions.php';

      $sql = "SELECT * FROM users WHERE (userid = :userid) AND (password =:password)";
      
      $userid = $_POST['id'];
      $password = $_POST['pw'];

      $row = pdo($pdo,$sql,['userid'=>$userid , 'password'=>$password])->fetch();
      
      if ($row != null) 
      {
          session_start();
          $_SESSION['name'] = $row['userid'];
          echo "<script>location.replace('index.php');</script>";
          exit;
       }
       
       if($row == null)
       {
          echo "<script>alert('Invalid username or password')</script>";
          echo "<script>location.replace('login.php');</script>";
          exit;
       }
    
    
    ?>
</body>
</html>

