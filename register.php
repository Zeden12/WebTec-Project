<?php
$conn = mysqli_connect("localhost", "root", "", "Register");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Declare the button value
if (isset($_POST['submitform'])) {

    // Prepare and bind the data to be inserted
    $name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$birth = $_POST['birth'];
$sex = $_POST['sex'];

    // Create insertion query
     $INSERT = "INSERT INTO  `registration`(`User_Name`, `User_Email`, `User_Phone`, `User_BD`,` User_Sex`) 
    VALUES ('$name', '$email', '$phone', '$birth', '$sex')";

    
    $query = mysqli_query($conn, $INSERT);
    
    if ($query) {
        echo "Data inserted successfully!"; 
        header("Location: success.php");
        exit();

    } else {

        echo "Error: " . mysqli_error($conn);
    }
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>All user registered</title>
</head>

<body>
<style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        .head {
    display: flex;
    height:10vh;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}


.head h2 {
    margin: 0; /* Remove default margin from the h2 element */
    font-size: 24px; /* Adjust font size as needed */
}

.head a {
    text-decoration: none; /* Remove underline from the link */
    background-color: #0056b3; /* Button background color */
    color: #fff; /* Button text color */
    padding: 10px 20px; /* Button padding */
    border-radius: 5px; /* Rounded corners for the button */
    transition: background-color 0.3s; /* Smooth transition for hover effect */
}

.head a:hover {
    background-color: #0056b3; /* Button background color on hover */
}

      
    </style>
<div class="head">
    <div> <h2>All user registered</h2></div>
    <div> <a href="register.html"> Register new</a> </div>
</div>
    <table border="1">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>BirthDay</th>
            <th>Sex</th>
        </tr>
        <?php
        // SQL query to select all data from the "perfect" table
        $SELECT = "SELECT * FROM `registration`";
        $result = mysqli_query($conn, $SELECT);

        if (!$result) {
            die("Error: " . mysqli_error($conn));
        }

        // Loop through the rows of data and display them in the table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['User_Name'] . "</td>";
            echo "<td>" . $row['User_Email'] . "</td>";
            echo "<td>" . $row['User_Phone'] . "</td>";
            echo "<td>" . $row['User_BD'] . "</td>";
            echo "<td>" . $row['User_Sex'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>

<?php
mysqli_close($conn);
?>
