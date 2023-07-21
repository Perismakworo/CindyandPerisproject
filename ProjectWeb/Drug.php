<?php
$Drugid = $_POST['Drugid'];
$Drugname = $_POST['Drugname'];
$Drugprice = $_POST['Drugprice'];
$Drugamount = $_POST['Drugamount'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Clinic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    // Check if the Drugid already exists in the database
    $check_stmt = $conn->prepare("SELECT Drugid FROM Drugs WHERE Drugid = ?");
    $check_stmt->bind_param("s", $Drugid);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        // Drugid already exists, show an error message or handle the situation as needed
        echo "Error: Drugid already exists.";
    } else {
        // Drugid does not exist, proceed with insertion
        $stmt = $conn->prepare("INSERT INTO Drugs(Drugid, Drugname, Drugprice, Drugamount) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $Drugid, $Drugname, $Drugprice, $Drugamount);
        $stmt->execute();
        echo "Registration successful.";
        $stmt->close();
    }

    $conn->close();

    header("Location: welcomepharmacistpage.php");
    exit(); // Terminate the current script to ensure a clean redirect
}
?>
