<?php
include 'conn.php';

if (isset($_GET['NurseSSN'])) {
    $NurseSSN= $_GET['NurseSSN']; 

    $sql = "DELETE FROM nurse WHERE NurseSSN = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $NurseSSN);
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
