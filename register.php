<?php
$servername = "localhost";
$username = "root";     
$password = "";      
$dbname = "registernew"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['register'])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $birthday = $_POST["birthday"];
    $password = $_POST["password"];

    // Hash the password 
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO newuser (username, email, phone, birthday, password)
            VALUES ('$username', '$email', '$phone', '$birthday', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        // echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if(isset($_POST['delete'])) {
    $id = $_POST["delete_id"];

    $sql = "DELETE FROM newuser WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        // echo "User deleted successfully!";
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}

// Fetch all registered users from the database
$sql = "SELECT * FROM newuser";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    <link rel="stylesheet" href="regist.css">
</head>
<body>
    <h1>Registered Users to DreamScapeTrips</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Birthday</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['birthday'] . "</td>";
                echo "<td>
                        <form method='POST'>
                            <input type='hidden' name='delete_id' value='" . $row['id'] . "'>
                            <button type='submit' name='delete' class='delete-btn'>Delete</button>
                        </form>
                    </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No registered users</td></tr>";
        }
        ?>
    </table>

</body>
</html>
