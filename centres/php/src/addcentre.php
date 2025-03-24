<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $infoLink = $_POST['infoLink'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['image']['name']);

    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    $sql = "INSERT INTO centres (name, image, infoLink) VALUES ('$name', '$image', '$infoLink')";

    if (mysqli_query($conn, $sql)) {
        echo "New center added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
