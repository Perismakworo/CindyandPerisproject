<?php
include 'conn.php';

if (isset($_GET['Drugid'])) {
    $NurseSSN= $_GET['Drugid']; 

    $sql = "DELETE FROM Drugs WHERE Drugid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $Drugid);
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
