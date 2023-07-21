<?php
include 'conn.php';

$NurseSSN = $_GET['NurseSSN'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NurseSSN = $_POST['NurseSSN'];
    $NName = $_POST['NName'];
    $NPhoneNo = $_POST['NPhoneNo'];
    $Cpassword = $_POST['Cpassword'];

    // Validate the required fields
    if (empty($NurseSSN) || empty($NName) || empty($NPhoneNo) || empty($Cpassword)) {
        echo "Error: Please fill in all required fields.";
    } else {
        $sql = "UPDATE nurse SET NName=?, NPhoneNo=?, Cpassword=? WHERE NurseSSN=?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $NName, $NPhoneNo, $Cpassword, $NurseSSN);

        if ($stmt->execute()) {
            echo "Updated successfully.";
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
} else {
    // Fetch existing nurse information
    $sql = "SELECT * FROM nurse WHERE NurseSSN='$NurseSSN'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $NName = $row['NName'];
        $NPhoneNo = $row['NPhoneNo'];
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
    <link rel="stylesheet" type="text/css" href="nurseupdate.css">
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
        <form action="<?php echo $_SERVER['PHP_SELF'] . '?NurseSSN=' . $NurseSSN; ?>" method="post">
            <input type="text" name="NurseSSN" placeholder="Nurse SSN" value="<?php echo $NurseSSN; ?>" readonly>
            <input type="text" name="NName" placeholder="Nurse Name" value="<?php echo $NName; ?>">
            <input type="text" name="NPhoneNo" placeholder="Phone Number" value="<?php echo $NPhoneNo; ?>">
            <input type="text" name="Cpassword" placeholder="Create Password" value="<?php echo $Cpassword; ?>">
            <button type="submit">Update</button> 
        </form>
    </div>
</body>
</html>
