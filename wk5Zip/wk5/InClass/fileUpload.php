<?php

    if (isset ($_FILES['file1'])) {
        $tmp_name = $_FILES['file1']['tmp_name'];
        $path = getcwd() .DIRECTORY_SEPARATOR . 'uploads';
        $new_name = $path . DIRECTORY_SEPARATOR . $_FILES['file1']['name'];

        move_uploaded_file($tmp_name, $new_name);
    }
?>


<form action="fileUpload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file1">
    <input type="submit" value="Upload">

</form>