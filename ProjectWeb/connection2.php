<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $PatientSSN = $_POST['PatientSSN'];
  $PatientName = $_POST['PatientName'];
  $Address = $_POST['Address'];
  $Age = $_POST['Age'];
  $Weight = $_POST['Weight'];
  $Disease = $_POST['Disease'];
  $Cpassword = $_POST['Cpassword'];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Clinic";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
  } else {
    $stmt = $conn->prepare("INSERT INTO patient (PatientSSN, PatientName, Address, Age, Weight, Disease, Cpassword) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisss", $PatientSSN, $PatientName, $Address, $Age, $Weight, $Disease, $Cpassword);
    $stmt->execute();
    echo "Registration successful.";
    $stmt->close();
    $conn->close();
  }
  header("Location: homepage.html");
    exit(); // Terminate the current script to ensure a clean redirect
}
?>



