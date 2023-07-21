<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="margin:50px;background-image: url('1.jpg.jpeg'); background-size: cover;">
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
    <h1>Doctors</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>DoctorSSN</th>
                <th>DoctorName</th>
                <th>phoneNo</th>
                <th>Speciality</th>
                <th>Experience</th>
                <th>Cpassword</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "Clinic";

            $connection = new mysqli($servername, $username, $password, $database);

            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            }

            $sql = "SELECT * FROM doctor";
            $result = $connection->query($sql);

            if (!$result) {
                die("Invalid query: " . $connection->error);
            }

            while ($row = $result->fetch_assoc()) {
                $DoctorSSN = $row["DoctorSSN"];
                echo "<tr>
                <td>" . $row["DoctorSSN"] . "</td>
                <td>" . $row["DoctorName"] . "</td>
                <td>" . $row["phoneNo"] . "</td>
                <td>" . $row["Speciality"] . "</td>
                <td>" . $row["Experience"] . "</td>
                <td>" . $row["Cpassword"] . "</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='Doctorsupdate.php?DoctorSSN=" . $DoctorSSN . "'>Update</a>
                    <a class='btn btn-primary btn-sm' href='Doctorsdelete.php?DoctorSSN=" . $DoctorSSN . "'>Delete</a>
                </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
