<?php
include 'conn.php';
$Pharmacistid = $_GET['Pharmacistid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Pharmacistid = $_POST['Pharmacistid'];
    $PharmacistName = $_POST['PharmacistName'];
    $TelNo = $_POST['TelNo'];
    $Gender = $_POST['Gender'];
    $pAddress = $_POST['pAddress'];
    $Cpassword = $_POST['Cpassword'];

    // Validate the required fields
    if (empty($Pharmacistid) || empty($PharmacistName) || empty($TelNo) || empty($Gender) || empty($pAddress) || empty($Cpassword)) {
        echo "Error: Please fill in all required fields.";
    } else {
        $sql = "UPDATE pharmacist SET PharmacistName=?, TelNo=?, Gender=?, pAddress=?, Cpassword=? WHERE PharmacistID=?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $PharmacistName, $TelNo, $Gender, $pAddress, $Cpassword, $Pharmacistid);

        if ($stmt->execute()) {
            echo "Updated successfully.";
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
} else {
    // Fetch existing pharmacist information
    $sql = "SELECT * FROM pharmacist WHERE Pharmacistid='$Pharmacistid'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $PharmacistName = $row['PharmacistName'];
        $TelNo = $row['TelNo'];
        $Gender = $row['Gender'];
        $pAddress = $row['pAddress'];
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
    <link rel="stylesheet" type="text/css" href="pharmacistupdate.css">
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
        <form action="<?php echo $_SERVER['PHP_SELF'] . '?Pharmacistid=' . $Pharmacistid; ?>" method="post">
            <input type="text" name="Pharmacistid" placeholder="Pharmacist id" value="<?php echo $Pharmacistid; ?>" readonly>
            <input type="text" name="PharmacistName" placeholder="Pharmacist Name" value="<?php echo $PharmacistName; ?>">
            <input type="text" name="TelNo" placeholder="Phone Number" value="<?php echo $TelNo; ?>">
            <input type="text" name="Gender" placeholder="Gender" value="<?php echo $Gender; ?>">
            <input type="text" name="pAddress" placeholder="Address" value="<?php echo $pAddress; ?>">
            <input type="text" name="Cpassword" placeholder="Create Password" value="<?php echo $Cpassword; ?>">
            <button type="submit">Update</button> 
        </form>
    </div>
</body>
</html>
