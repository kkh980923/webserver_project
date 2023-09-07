<?php
      session_start();
       $dbname = "post"; 
 	require 'includes/database-connection.php';
 	require 'includes/functions.php';
      
      $name = $_POST['name'];
      $password = $_POST['passwd'];
      $address = $_POST['address']." ".$_POST['detailAddress'];
      
      $compsql = "SELECT userid FROM users";
      
      foreach($pdo->query($compsql) as $user)
      {
        if(strcmp($user['userid'], $name) == 0)
        {
          echo "<script>alert('중복되는 아이디 입니다!');</script>";
          echo "<script>location.replace('signup.php');</script>";
          exit();
        }
      }
      
      $sql = "INSERT INTO users (userid,password,address) VALUE (:name, :password,:address)";
      
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(":name",$name);
      $stmt->bindValue(":password",$password);
      $stmt->bindValue(":address",$address);
 
      $stmt->execute();
      echo "<script>location.replace('login.php');</script>";
    ?>


