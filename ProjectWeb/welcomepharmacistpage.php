<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Pharmacist</title>
    <style>
        body {
            background-image: url("1.jpg.jpeg");
            background-size: cover;
            background-position: center;
            color: #FFA500; /* Orangeish font color */
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
        }

        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        label {
            margin-bottom: 5px;
        }

        input {
            margin-bottom: 10px;
            padding: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            background-color: #333;
            color: #FFF;
            padding: 0px; /* Reduce the padding for a smaller navbar */
            z-index: 0; /* Set a high z-index value to ensure the menu stays on top of other elements */
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
            margin: 0; /* Remove default margin to reduce black area */
            padding: 0; /* Remove default padding to reduce black area */
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
        <style>
    /* Your existing styles here */

    .container {
        display: grid;
        grid-template-columns: 1fr 2fr; /* Two columns with a ratio of 1:2 */
        grid-gap: 20px;
        justify-items: center;
        margin-top: 20px;
    }

    .username {
        grid-column: 1; /* Display the username in the first column */
    }

    .button-grid {
        grid-column: 2; /* Display the buttons in the second column */
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 20px;
        justify-items: center;
    }

    /* Adjust the width of the buttons to fit the grid cells */
    .button-grid button,
    .button-grid input {
        width: 100%;
        max-width: 200px;
    }

    /* Optional: Center the grid within the container */
    body {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>

    </style>
</head>
<body>
<?php
// Include the database connection file
include 'conn.php';

// Retrieve the username from the URL parameter
$username = $_GET['username'];

// Prepare the SQL query
$sql = "SELECT PharmacistName FROM pharmacist WHERE Pharmacistid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();

// Fetch the result
$stmt->bind_result($PharmacistName);
$stmt->fetch();

// Close the database connection
$stmt->close();
$conn->close();
?>
<h2>Welcome, <?php echo $PharmacistName; ?>!</h2>
    <div class="navbar">
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
    

    <!-- Add drugs button -->
    <form action="Drugform.html" method="get">
        <button type="submit">Add drugs</button>
    </form>
    <form action="viewdispensed.php" method="get">
        <button type="submit">Drugs history</button>
    </form>

    <!-- View all prescriptions button -->
    <form action="viewprescriptions.php" method="get">
        <button type="submit">View All Prescriptions</button>
    </form>

    <!-- View drugs available button -->
    <form action="Drugstable.php" method="get">
        <button type="submit"> View Drugs available</button>
    </form>

    <!-- View patient prescriptions button -->
    <form action="viewpatientsprescriptions.php" method="get">
        <label for="PatientSSN">Enter Patient SSN:</label>
        <input type="text" id="PatientSSN" name="PatientSSN" required>
        <button type="submit">View Patient Prescriptions</button>
    </form>

    <!-- Dispense drugs button -->
    <form action="dispensedrugs.php" method="post">
        <label for="PatientSSN">Patient SSN:</label>
        <input type="text" id="PatientSSN" name="PatientSSN" required>
        <br>
        <label for="Drugid">Drug ID:</label>
        <input type="text" id="Drugid" name="Drugid" required>
        <br>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" required>
        <br>
        <button type="submit">Dispense Drugs</button>
    </form>
</body>
</html>
