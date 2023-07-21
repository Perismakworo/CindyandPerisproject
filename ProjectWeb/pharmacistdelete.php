<?php
include 'conn.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="pharmacistdelete.css">
</head>
<body>
    <?php
    if (isset($_GET['Pharmacistid'])) {
        $PharmacistID = $_GET['Pharmacistid']; 

        $sql = "DELETE FROM pharmacist WHERE Pharmacistid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $PharmacistID);
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
</body>
</html>
