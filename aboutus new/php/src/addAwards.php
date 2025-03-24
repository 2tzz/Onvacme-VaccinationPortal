<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $image = $_POST['image'];

    $sql = "INSERT INTO awards (title, image) VALUES ('$title', '$image')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New award added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Award</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #E8B5F7;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #571896;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top:50px;
        }

        #imagePreview {
            width: 200px;
            height: 200px;
            border: 1px solid #ccc;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Add Award</h1>
    <form method="POST" action="addAwards.php">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br>

        <label for="image">Image:</label>
        <input type="text" name="image" required><br>

        <input type="submit" value="Add Award">
    </form>
</body>
</html>
