<?php
// view_patient_prescriptions.php

include 'conn.php'; // Include the database connection file

if (isset($_GET['PatientSSN']) && !empty($_GET['PatientSSN'])) {
    $PatientSSN = $_GET['PatientSSN'];

    // Fetch patient's prescriptions from the database using patient SSN
    $sql = "SELECT * FROM prescriptions WHERE PatientSSN = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $PatientSSN);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are any prescriptions for the patient
    if ($result->num_rows > 0) {
        echo "<h2>Patient's Prescriptions:</h2>";
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
        echo "No prescriptions found for the patient.";
    }

    $stmt->close();
}

$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patient Prescriptions</title>
    <link rel="stylesheet" href="viewpatientsprescriptions.css">

</head>
<body>
<div class="navbar" style="display: flex;">
            <div class="icon">
                <h2 class="logo">Keencure</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a class="active" href="homepage.html">Home</a></li>
                    <li><a href="aboutpage.php">About</a></li>
                    <li><a href="servicepagehtml.php">Services</a></li>
                    <li><a href="contactpage.php">Contact</a></li>
                    <li><a href="login2.php">Login</a></li>
                </ul>
            </div>
        </div>
        <br>
        <style>
          .navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #333;
    color: #FFF;
    padding: 10px;
    z-index: 999; /* Set a high z-index value to ensure the menu stays on top of other elements */
  }
  


.icon {
    width: 200px;
    height: 70px;
}

.logo {
    color: #00bbff;
    font-size: 25px;
    font-weight: bold;
    padding-top: 10px;
}

.menu ul {
    display: flex;
    list-style: none;
}

.menu ul li {
    margin-left: 20px;
}

.menu ul li a {
    text-decoration: none;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    padding: 6px 10px;
    transition: 0.4s ease-in-out;
    border-radius: 2px;
}

.menu ul li a.active,
.menu ul li a:hover {
    background: #ff7200;
    color: #000;
}
</style>
    
</body>
</html>
