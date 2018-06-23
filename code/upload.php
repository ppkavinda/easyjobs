<?php
if(isset($_POST["submit"])) {
$target_dir = "uploads/img/";
$target_file = $target_dir . basename($_FILES["profilePic"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $target_file)) {
        echo "The file $target_file has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="profilePic" id="profilePic">
    <input type="submit" value="Upload Image" name="submit">
</form>
