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

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO interns (join_date, first_name, last_name, email, phone, dob, age, department, intern_period, last_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters
$stmt->bind_param("ssssssisss", $join_date, $first_name, $last_name, $email, $phone, $dob, $age, $department, $intern_period, $last_date);

// Set parameters and execute
$join_date = $_POST['joinDate'];
$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$department = $_POST['dept'];
$intern_period = $_POST['internPeriod'];

$last_date = date('Y-m-d', strtotime($join_date . ' + ' . $intern_period . ' days'));

$last_date_formatted = date('d-m-Y', strtotime($last_date));

if ($stmt->execute()) {
    // If insertion is successful, redirect to a new page to display the inserted record
    header("Location: display_record.html?join_date=$join_date&first_name=$first_name&last_name=$last_name&email=$email&phone=$phone&dob=$dob&age=$age&department=$department&intern_period=$intern_period&last_date=$last_date_formatted");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
