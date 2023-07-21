<?php
$DoctorSSN = $_POST['DoctorSSN'];
$DoctorName = $_POST['DoctorName'];
$phoneNo = $_POST['phoneNo'];
$Speciality = $_POST['Speciality'];
$Experience = $_POST['Experience'];
$Cpassword = $_POST['Cpassword'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Clinic";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO doctor(DoctorSSN, DoctorName, phoneNo, Speciality,Experience,Cpassword) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss",$DoctorSSN, $DoctorName, $phoneNo, $Speciality,$Experience,$Cpassword);
    $stmt->execute();
    echo "Registration successful.";
    $stmt->close();
    $conn->close();

    
    header("Location: homepage.html");
    exit(); // Terminate the current script to ensure a clean redirect
}
?>


