<?php
$adminID = $_POST['adminID'];
$adminname = $_POST['adminname'];
$Cpassword = $_POST['Cpassword'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Clinic";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO admintable(adminID, adminname,Cpassword) VALUES (?, ?, ?)");
    $stmt->bind_param("sss",$adminID, $adminname,$Cpassword);
    $stmt->execute();
    echo "Registration successful.";
    $stmt->close();
    $conn->close();

    header("Location: homepage.html");
    exit(); // Terminate the current script to ensure a clean redirect
}
?>


