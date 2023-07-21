<?php
$NurseSSN = $_POST['NurseSSN'];
$NName = $_POST['NName'];
$NPhoneNo = $_POST['NPhoneNo'];
$Cpassword = $_POST['Cpassword'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Clinic";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO nurse(NurseSSN, NName, NPhoneNo,Cpassword) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis",$NurseSSN, $NName, $NPhoneNo,$Cpassword);
    $stmt->execute();
    echo "Registration successful.";
    $stmt->close();
    $conn->close();
}
?>