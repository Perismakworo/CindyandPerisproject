<!DOCTYPE html>
<html>
<head>
  <title>Welcome</title>
  <style>
    body {
      background-image: url("1.jpg.jpeg");
      background-size: cover;
      background-position: center;
      color: #FFF; /* Font color */
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      padding: 0;
    }

    h2 {
      text-align: center;
    }

    h3 {
      text-align: center;
      margin-bottom: 10px;
    }

    ul {
      list-style: none;
      padding: 0;
      text-align: center;
    }

    li {
      margin-bottom: 5px;
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
  <h2>Welcome, <?php echo $_GET['username']; ?>!</h2>
  
  <?php
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

  // Retrieve and display information for all users
  $sql = "SELECT * FROM users";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<h3>User Information:</h3>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
      echo "<li>Username: " . $row['username'] . "</li>";
      // Display other user information here
    }
    echo "</ul>";
  } else {
    echo "No users found.";
  }

  // Close the database connection
  $conn->close();
  ?>
</body>
</html>
