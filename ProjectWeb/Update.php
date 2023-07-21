<?php
include 'conn.php';

$PatientSSN = $_GET['PatientSSN'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $PatientSSN = $_POST['PatientSSN'];
    $PatientName = $_POST['PatientName'];
    $Address = $_POST['Address'];
    $Age = $_POST['Age'];
    $Weight = $_POST['Weight'];
    $Disease = $_POST['Disease'];
    $Cpassword = $_POST['Cpassword'];

    // Validate the required fields
    if (empty($PatientSSN) || empty($PatientName) || empty($Address) || empty($Age) || empty($Weight)) {
        echo "Error: Please fill in all required fields.";
    } else {
        $sql = "UPDATE patient SET PatientName='$PatientName', Address='$Address', Age=$Age, Weight=$Weight, Disease='$Disease', Cpassword='$Cpassword' WHERE PatientSSN='$PatientSSN'";

        if ($conn->query($sql) === TRUE) {
            echo "Updated successfully.";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Form</title>
    <link rel="stylesheet" type="text/css" href="pupdate.css">
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
</head>
<body>
    <div class="registration-form">
        <h1>Patients Update</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] . '?PatientSSN=' . $PatientSSN; ?>" method="post">
            <input type="text" name="PatientSSN" placeholder="Patient SSN" value="<?php echo $PatientSSN; ?>" readonly>
            <input type="text" name="PatientName" placeholder="Patient Name">
            <input type="text" name="Address" placeholder="Address">
            <input type="text" name="Age" placeholder="Age">
            <input type="text" name="Weight" placeholder="Weight">
            <input type="text" name="Disease" placeholder="Disease">
            <input type="text" name="Cpassword" placeholder="Create Password">
            <button type="submit">Update</button> 
        </form>
    </div>
</body>
</html>
