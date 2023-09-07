<?php
  error_reporting( E_ALL );
  ini_set( "display_errors", 1 );
?>
<?php
session_start();
if(!isset($_SESSION['name'])) {
    echo "<script>location.replace('login.php');</script>";            
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/bootstrap.css">
    <title>GuradKim</title>
</head>
