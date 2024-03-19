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

// Check if record ID is provided
if (isset($_POST['recordToDelete'])) {
    $recordToDelete = $_POST['recordToDelete'];

    // Prepare SQL statement to delete the record
    $sql = "DELETE FROM interns WHERE id = $recordToDelete";

    if ($conn->query($sql) === TRUE) {
        // Record deleted successfully
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Record ID not provided";
}

// Close connection
$conn->close();
?>
