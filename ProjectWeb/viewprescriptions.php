<?php
// view_prescriptions.php

include 'conn.php'; // Include the database connection file

// Fetch all prescriptions from the database
$sql = "SELECT * FROM prescriptions";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="viewprescriptions.css">

    <title>View All Prescriptions</title>
</head>
<body>
    <h2>All Prescriptions</h2>
    <?php
    if ($result->num_rows > 0) {
        echo "<table>
            <thead>
                <tr>

                    <th>Patient SSN</th>
                    <th>Drug id</th>
                    <th>Frequency</th>
                    <th>Drug Amount</th>
                </tr>
            </thead>
            <tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>

                <td>" . $row['PatientSSN'] . "</td>
                <td>" . $row['Drugid'] . "</td>
                <td>" . $row['frequency'] . "</td>
                <td>" . $row['Drugamount'] . "</td>
            </tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "No prescriptions found.";
    }
    ?>

</body>
</html>
