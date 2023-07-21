<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Patients</title>
    <link rel="stylesheet" href="patientsearch.css">
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
    <h1>Search Patients</h1>
    <form action="" method="post">
        <input type="text" name="searchName" placeholder="Enter patient name">
        <button type="submit" name="searchPatient">Search</button>
    </form>

    <?php
    // Place the PHP code here (the search code)
    
// Assuming you have already established the database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "Clinic";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_POST['searchPatient'])) {
    $searchName = $_POST['searchName'];

    $sql = "SELECT * FROM patient WHERE PatientName LIKE '%$searchName%'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Search Results:</h2>";
        echo "<table class='table'>
            <thead>
                <tr>
                    <th>PatientSSN</th>
                    <th>PatientName</th>
                    <th>Address</th>
                    <th>Weight</th>
                    <th>Age</th>
                    <th>Disease</th>
                </tr>
            </thead>
            <tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row['PatientSSN'] . "</td>
                <td>" . $row['PatientName'] . "</td>
                <td>" . $row['Address'] . "</td>
                <td>" . $row['Weight'] . "</td>
                <td>" . $row['Age'] . "</td>
                <td>" . $row['Disease'] . "</td>
               
        </td>
            </tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "No matching records found.";
    }
}

$connection->close();
?>
 <h1>Prescribe Drugs</h1>
    <form action="prescribe.php" method="post">
        <input type="text" name="PatientSSN" placeholder="Patient SSN">
        <input type="text" name="prescription" placeholder="Prescribed Drug">
        <input type="text" name="frequency" placeholder="Frequency">
        <button type="submit">Prescribe</button>
    </form>
    <!-- Display the search results here if needed -->
</body>
</html>
