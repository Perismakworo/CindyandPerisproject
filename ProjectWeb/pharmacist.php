<?php
$PharmacistID = $_POST['PharmacistID'];
$PharmacistName = $_POST['PharmacistName'];
$TelNo = $_POST['TelNo'];
$Gender = $_POST['Gender'];
$Address=$_POST['pAddress']
$Cpassword=$_POST['Cpassword']

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Clinic";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO pharmacist(PharmacistID, PharmacistName,TelNo,Gender,pAddress,Cpassword) VALUES (?, ?, ?, ?,?,?)");
    $stmt->bind_param("ssisss",$PharmacistID, $PharmacistName,$TelNo,$Gender,$pAddress,$Cpassword);
    $stmt->execute();
    echo "Registration successful.";
    $stmt->close();
    $conn->close();

    header("Location: homepage.html");
    exit(); // Terminate the current script to ensure a clean redirect
}
?>