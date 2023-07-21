<?php
include 'conn.php';

// Define a variable to store the status message
$statusMessage = '';

if (isset($_GET['PatientSSN'])) {
    $PatientSSN = $_GET['PatientSSN']; 

    // Prepare the SQL query to delete the patient record
    $sql = "DELETE FROM patient WHERE PatientSSN = ?";
    $stmt = $conn->prepare($sql);

    // Bind the parameter
    $stmt->bind_param("s", $PatientSSN);

    // Execute the query
    if ($stmt->execute()) {
        // Check if any rows were affected
        if ($stmt->affected_rows > 0) {
            $statusMessage = "Deleted Successfully";
        } else {
            $statusMessage = "No matching record found for deletion.";
        }
    } else {
        die("Error deleting record: " . $stmt->error);
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Patient</title>
</head>
<body>
    <h1>Delete Patient Record</h1>
    <br>
    <?php echo $statusMessage; ?>
    <br>
    <a href="prescriptionstable.php">Back to Prescription Table</a>
</body>
</html>
