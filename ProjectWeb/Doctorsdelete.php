<?php
include 'conn.php';

if (isset($_GET['DoctorSSN'])) {
    $DoctorSSN = $_GET['DoctorSSN']; 

    $sql = "DELETE FROM doctor WHERE DoctorSSN = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $DoctorSSN);
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
