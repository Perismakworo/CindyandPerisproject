<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="login.css">
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
  <div class="container">
    <h2>Login Page</h2>
    <form id="loginForm" action="" method="post">
      <input type="text" id="username" name="username" placeholder="Username" required><br>
      <input type="password" id="password" name="password" placeholder="Password" required><br>
      <input type="submit" value="Login">
    </form>
    <p id="errorMessage" class="error"></p>
  </div>
  <div class="left">
    <button id="signupButton" onclick="redirectToSignup()">Sign up</button>
  </div>
  <script>
    function redirectToSignup() {
      window.location.href = "userregistration.php";
    }
  </script>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the submitted username and password
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Your database credentials
  $dbServername = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbName = "Clinic";

  // Create a database connection
  $conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare the SQL query
  $sql = "SELECT * FROM admintable WHERE adminid= ? AND Cpassword = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();

  // Fetch the result
  $result = $stmt->get_result();

  // Check if the login was successful
  if ($result->num_rows === 1) {
    // Successful login as admin
    echo "Admin Login successful!";
    // You can redirect the user to a different page here
    header("Location: welcomeadminpage.php?username=" . urlencode($username));
    exit();
  } else {
    // Prepare the SQL queries for other user types
    $sql_patient = "SELECT * FROM patient WHERE PatientSSN = ? AND Cpassword = ?";
    $stmt_patient = $conn->prepare($sql_patient);
    $stmt_patient->bind_param("ss", $username, $password);
    $stmt_patient->execute();
    $result_patient = $stmt_patient->get_result();

    $sql_doctor = "SELECT * FROM doctor WHERE DoctorSSN = ? AND Cpassword = ?";
    $stmt_doctor = $conn->prepare($sql_doctor);
    $stmt_doctor->bind_param("ss", $username, $password);
    $stmt_doctor->execute();
    $result_doctor = $stmt_doctor->get_result();

    $sql_nurse = "SELECT * FROM nurse WHERE NurseSSN = ? AND Cpassword = ?";
    $stmt_nurse = $conn->prepare($sql_nurse);
    $stmt_nurse->bind_param("ss", $username, $password);
    $stmt_nurse->execute();
    $result_nurse = $stmt_nurse->get_result();

    $sql_pharmacist = "SELECT * FROM pharmacist WHERE Pharmacistid = ? AND Cpassword = ?";
    $stmt_pharmacist = $conn->prepare($sql_pharmacist);
    $stmt_pharmacist->bind_param("ss", $username, $password);
    $stmt_pharmacist->execute();
    $result_pharmacist = $stmt_pharmacist->get_result();

    // Check for successful login as patient
    if ($result_patient->num_rows === 1) {
      echo "Patient Login successful!";
      // You can redirect the user to a different page here
      header("Location: welcomepatientpage.php?username=" . urlencode($username));
      exit();
    }
    // Check for successful login as doctor
    elseif ($result_doctor->num_rows === 1) {
      echo "Doctor Login successful!";
      // You can redirect the user to a different page here
      header("Location: welcomedoctorpage.php?username=" . urlencode($username));
      exit();
    }
    // Check for successful login as nurse
    elseif ($result_nurse->num_rows === 1) {
      echo "Nurse Login successful!";
      // You can redirect the user to a different page here
      header("Location: welcomenursepage.php?username=" . urlencode($username));
      exit();
    }
    // Check for successful login as pharmacist
    elseif ($result_pharmacist->num_rows === 1) {
      echo "Pharmacist Login successful!";
      // You can redirect the user to a different page here
      header("Location: welcomepharmacistpage.php?username=" . urlencode($username));
      exit();
    }
    // Invalid username or password
    else {
      echo "Invalid username or password";
    }

    // Close the database connections
    $stmt_patient->close();
    $stmt_doctor->close();
    $stmt_nurse->close();
    $stmt_pharmacist->close();
  }

  // Close the database connection
  $stmt->close();
  $conn->close();
}
?>
