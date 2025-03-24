<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    $sql = "DELETE FROM centres WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "Center deleted successfully.";
    } else {
        echo "Error.... <br>";
    }
}
?>
