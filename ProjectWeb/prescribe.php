<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Assuming you have already established the database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "Clinic";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $PatientSSN = $_POST['PatientSSN'];
    $prescription = $_POST['prescription'];
    $frequency = $_POST['frequency'];

    // Get drug information based on the prescribed drug
    $sql = "SELECT * FROM Drugs WHERE Drugname = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $prescription);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $drug = $result->fetch_assoc();
        $Drugid = $drug['Drugid'];
        $Drugname = $drug['Drugname'];
        $Drugprice = $drug['Drugprice'];
        $Drugamount = $drug['Drugamount'];

        // Insert the prescription into the database
        $sql = "INSERT INTO prescriptions (PatientSSN, Drugid, Frequency, Drugamount) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sssi", $PatientSSN, $Drugid, $frequency, $Drugamount);

        if ($stmt->execute()) {
            // Prescription ID will be generated automatically due to auto-increment
            echo "Prescription added successfully. ";
            echo "Drug ID: " . $Drugid . "<br>";
            echo "Drug Name: " . $Drugname . "<br>";
            echo "Drug Price: " . $Drugprice . "<br>";
            echo "Drug amount: " . $Drugamount . "<br>";


            header("Location: welcomedoctorpage.php");
            exit(); // Terminate the current script to ensure a clean redirect

        } else {
            echo "Error adding prescription: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Prescribed drug not found in the Drugs table.";
    }
}

$connection->close();
?>
<!-- Your prescription form HTML here -->

