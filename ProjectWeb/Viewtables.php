<!DOCTYPE html>
<html>
<head>
  <title>Users</title>
  <style>
    body {
      font-family: Arial, sans-serif;
  text-align: center;
  background-image: url("1.jpg.jpeg");
  background-size: cover;
  background-position: center;
  color: orange;
    }
    .container {
      margin-top: 200px;
    }
    
    input {
      margin-bottom: 10px;
    }
    
    .error {
      color: red;
      margin-bottom: 10px;
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
  <div class="container">
    <h2>Users</h2>
    <p>Please select to view Registered users:</p>
  <ul>
    <li><a href="Patientshtmltable.php">Patient Users</a></li>
    <li><a href="Doctorstable.php">Doctor Users</a></li>
    <li><a href="nursetable.php">Nurse Users</a></li>
    <li><a href="pharmacisttable.php">Pharmacist Users</a></li>
  </ul>
      
     
  </div>
</body>
</html>
