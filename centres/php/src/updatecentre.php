<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $infoLink = $_POST['infoLink'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['image']['name']);

    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    $sql = "UPDATE centres SET name = '$name', image = '$image', infoLink = '$infoLink' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "Center updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

