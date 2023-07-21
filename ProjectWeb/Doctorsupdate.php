<?php
include 'conn.php';

$DoctorSSN = $_GET['DoctorSSN'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $DoctorSSN = $_POST['DoctorSSN'];
    $DoctorName = $_POST['DoctorName'];
    $phoneNo = $_POST['phoneNo'];
    $Speciality = $_POST['Speciality'];
    $Experience = $_POST['Experience'];
    $Cpassword = $_POST['Cpassword'];

    // Validate the required fields
    if (empty($DoctorSSN) || empty($DoctorName) || empty($phoneNo) || empty($Speciality) || empty($Experience) || empty($Cpassword)) {
        echo "Error: Please fill in all required fields.";
    } else {
        $sql = "UPDATE doctor SET DoctorName='$DoctorName', phoneNo='$phoneNo', Speciality='$Speciality', Experience='$Experience', Cpassword='$Cpassword' WHERE DoctorSSN='$DoctorSSN'";

        if ($conn->query($sql) === TRUE) {
            echo "Updated successfully.";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    $conn->close();
} else {
    // Fetch existing doctor information
    $sql = "SELECT * FROM doctor WHERE DoctorSSN='$DoctorSSN'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $DoctorName = $row['DoctorName'];
        $phoneNo = $row['phoneNo'];
        $Speciality = $row['Speciality'];
        $Experience = $row['Experience'];
        $Cpassword = $row['Cpassword'];
    } else {
        echo "No records found.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Form</title>
    <link rel="stylesheet" type="text/css" href="Doctorsupdate.css">
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
    <div class="registration-form">
        <h1>Update form</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] . '?DoctorSSN=' . $DoctorSSN; ?>" method="post">
            <input type="text" name="DoctorSSN" placeholder="Doctor SSN" value="<?php echo $DoctorSSN; ?>" readonly>
            <input type="text" name="DoctorName" placeholder="Doctor Name" value="<?php echo $DoctorName; ?>">
            <input type="text" name="phoneNo" placeholder="Phone Number" value="<?php echo $phoneNo; ?>">
            <input type="text" name="Speciality" placeholder="Speciality" value="<?php echo $Speciality; ?>">
            <input type="text" name="Experience" placeholder="Experience" value="<?php echo $Experience; ?>">
            <input type="text" name="Cpassword" placeholder="Create Password" value="<?php echo $Cpassword; ?>">
            <button type="submit">Update</button> 
        </form>
    </div>
</body>
</html>
