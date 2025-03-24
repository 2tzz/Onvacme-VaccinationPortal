<?php
include 'config.php';

// Function to display all centers
function displayCenters()
{
    global $conn;
    $sql = "SELECT * FROM centres";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td><img src='uploads/" . $row['image'] . "' height='50' width='50'></td>";
            echo "<td>" . $row['infoLink'] . "</td>";
            echo "<td><a href='editcentre.php?id=" . $row['id'] . "'>Edit</a></td>";
            echo "<td><a href='deletecentre.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this center?\")'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No centers found.</td></tr>";
    }
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Add new center
    if (isset($_POST['addCentre'])) {
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
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Vaccination Portal</title>

    <style>
        /* Style for heading */
      

        /* Style for form */
        .formdec{
            margin-bottom: 20px;
			border-radius: 20px;
            padding:50px;
			padding-top:20px;
			background-color: #E8B5F7;
        }
		
		
		
        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="file"] {
            width: 200px;
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #690D89;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        /* Style for table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>



</head>
<body>
    

    <!-- Add Center Form -->
   <div class="formdec"> <h1>Add Center</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name">
        <br>
        <label for="image">Image:</label>
        <input type="file" name="image">
        <br>
        <label for="infoLink">Info Link:</label>
        <input type="text" name="infoLink">
        <br>
        <input type="submit" name="addCentre" value="Add Center">
    </form>
    </div>
    <!-- Centers Table -->
    <h2>Centers</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Info Link</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php displayCenters(); ?>
    </table>

</body>
</html>