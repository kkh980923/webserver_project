
<?php
if(!isset($_FILES['file']))
{
    echo '<p>Please select a file</p>';
}
else
{
    try   
    {
        upload();
        echo '<p>Thank you for submitting</p>';
    }
    catch(Exception $e)
    {
        echo '<h4>'.$e->getMessage().'</h4>';
    }
}

function upload(){
    if(is_uploaded_file($_FILES['file']['tmp_name']))
    {
        $size = getimagesize($_FILES['file']['tmp_name']);
        $type = $size['mime'];
        $imgfp = fopen($_FILES['file']['tmp_name'], 'rb');
        $size = $size[3];
        $name = $_FILES['file']['name'];
        $maxsize = 99999999;

        if($_FILES['file']['size'] < $maxsize )
        {
            $user = "root";
            $pass  = "aksenzhd123@";
            $dbh = new PDO("mysql:host=127.0.0.1;dbname=post" ,$user, $pass);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare("INSERT INTO testblob (image_type ,image, image_size, image_name) VALUES (? ,?, ?, ?)");

            $stmt->bindParam(1, $type);
            $stmt->bindParam(2, $imgfp, PDO::PARAM_LOB);
            $stmt->bindParam(3, $size);
            $stmt->bindParam(4, $name);

            $stmt->execute();
        }
        else
        {
            /*** throw an exception is image is not of type ***/
            throw new Exception("File Size Error");
        }
    }
    else
    {
        // if the file is not less than the maximum allowed, print an error
        throw new Exception("Unsupported Image Format!");
    }
}
?>
<script>
   history.back();
</script>

