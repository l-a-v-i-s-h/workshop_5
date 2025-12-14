<?php include 'includes/header.php' ?>
<li><a href="index.php">Home</a></li>

<h2>Add Student Info</h2>

<form method="post">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="email" name="email"><br><br>
    Skills (comma-separated): <input type="text" name="skills"><br><br>
    <button type="submit">Save</button>
</form>
<?php
if ($_POST) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $skills = trim($_POST['skills']);

    if ($name == "" || $email == "" || $skills == "") {
        echo "All fields required";
    } else {

        $skillArray = explode(",", $skills);

        $data = $name . "|" . $email . "|" . implode(",", $skillArray) . "\n";

        file_put_contents("students.txt", $data, FILE_APPEND);

        echo "Student saved";
    }
}
?>
<?php include 'includes/footer.php' ?>