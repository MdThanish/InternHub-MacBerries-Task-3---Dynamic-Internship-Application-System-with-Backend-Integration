<?php
// Database connection
$servername = "localhost"; // Change this to your database server hostname
$username = "thanish"; // Change this to your database username
$password = "123123"; // Change this to your database password
$database = "internship_db"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all records from the database
$sql = "SELECT * FROM interns";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    $records = array();
    while ($row = $result->fetch_assoc()) {
        $records[] = $row;
    }
    echo json_encode($records);
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
