<?php
// Your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Clinic";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the username from the URL parameter
$username = $_GET['username'];

// Prepare the SQL query
$sql = "SELECT NName FROM nurse WHERE NurseSSN = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();

// Fetch the result
$stmt->bind_result($NName);
$stmt->fetch();

// Close the database connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            background-image: url("1.jpg.jpeg");
            background-size: cover;
            background-position: center;
            color: orange;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: flex-start; /* Align content to the left */
            align-items: flex-start; /* Align content to the top */
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 20px; /* Add some top margin to create space from the top */
        }
    </style>
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
    <h2>
        <?php
        // Display the name
        if ($NName) {
            echo "Nurse: " . $NName;
        } else {
            echo "Nurse not found.";
        }
        ?>
    </h2>
</body>
</html>
