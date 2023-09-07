<?php
try{
    $id = $_GET['id'];
    $user = "root";
    $pass  = "aksenzhd123@";
    $dbh = new PDO("mysql:host=127.0.0.1;dbname=post" ,$user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM testblob WHERE image_id=$id";


    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $array = $stmt->fetch();
	

    header("Content-type:".$array['image_type']);
    header("Content-Disposition: attachment; filename=".$array['image_name']."");
    ob_clean();
    flush();
    echo $array['image'];
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
catch(Exception $e)
{
    echo $e->getMessage();
}
?>
