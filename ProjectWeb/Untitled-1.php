<?php
// Retrieve the submitted username and password
$username = $_POST['username'];
$password = $_POST['password'];

// Your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Clinic";

// Create a database connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL query
$sql = "SELECT * FROM patient WHERE PatientSSN= ? AND Cpassword = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

// Fetch the result
$result = $stmt->get_result();

$sql2 = "SELECT * FROM doctor WHERE DoctorSSN = ? AND Cpassword = ?";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("ss", $username, $password);
$stmt2->execute();

// Fetch the result for the second table
$result2 = $stmt2->get_result();


$sql2 = "SELECT * FROM nurse WHERE NurseSSN = ? AND Cpassword = ?";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("ss", $username, $password);
$stmt2->execute();

// Fetch the result for the second table
$result2 = $stmt2->get_result();

$sql2 = "SELECT * FROM pharmacist WHERE Pharmacistid = ? AND Cpassword = ?";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("ss", $username, $password);
$stmt2->execute();

// Fetch the result for the second table
$result2 = $stmt2->get_result();

// Check if the login was successful
if ($result->num_rows === 1) {
    // Successful login
    echo "Login successful!";
    // You can redirect the user to a different page here
} else {
    // Failed login
    echo "Invalid username or password";
}

// Close the database connection
$stmt->close();
$conn->close();
?>
