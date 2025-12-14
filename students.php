<?php include 'includes/header.php'; ?>

<li><a href="index.php">Home</a></li>

<h2>Students</h2>

<?php
if (file_exists("students.txt")) {

    $lines = file("students.txt");

    foreach ($lines as $line) {

        if (substr_count($line, "|") < 2) {
            continue;
        }

        list($name, $email, $skills) = explode("|", trim($line));
        $skillArray = explode(",", $skills);

        echo "<b>Name:</b> $name <br>";
        echo "<b>Email:</b> $email <br>";
        echo "<b>Skills:</b> ";
        echo implode(", ", $skillArray);
        echo "<hr>";
    }
}
?>

<?php include 'includes/footer.php'; ?>
