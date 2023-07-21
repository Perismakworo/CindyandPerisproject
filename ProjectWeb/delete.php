<?php
include 'conn.php';
if (isset($_GET['PatientSSN'])) {
    $PatientSSN = $_GET['PatientSSN']; 

    $sql = "DELETE FROM patient WHERE PatientSSN = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $PatientSSN);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Deleted Successfully";
    } else {
        die("Error deleting record: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();
}
?>
