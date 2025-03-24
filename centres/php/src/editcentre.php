<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    $sql = "SELECT * FROM centres WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $name = $row['name'];
        $image = $row['image'];
        $infoLink = $row['infoLink'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Center</title>
</head>
<body>
    <h1>Edit Center</h1>
    <form action="updatecentre.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
        <br>
        <label for="image">Image:</label>
        <input type="file" name="image">
        <br>
        <label for="infoLink">Info Link:</label>
        <input type="text" name="infoLink" value="<?php echo $infoLink; ?>">
        <br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
