<?php include 'includes/header.php'; ?>

<li><a href="index.php">home</a></li>

<h2>Upload File</h2>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="file"> <br><br>
    <button type="submit">Upload</button>
</form>

<?php
if (!empty($_FILES['file']['name'])) {

    $name = $_FILES['file']['name'];
    $tmp  = $_FILES['file']['tmp_name'];
    $size = $_FILES['file']['size'];

    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

    if ($ext != "pdf" && $ext != "jpg" && $ext != "png") {
        echo "Only PDF, JPG, PNG allowed";
    }
    elseif ($size > 2000000) {
        echo "File too large";
    }
    else {
        if (move_uploaded_file($tmp, "uploads/" . $name)) {
            echo "File uploaded successfully";
        } else {
            echo "Upload failed";
        }
    }
}
?>

<?php include 'includes/footer.php'; ?>
