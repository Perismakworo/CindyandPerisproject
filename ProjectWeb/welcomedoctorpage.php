<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Doctor</title>
    <style>
        body {
            background-image: url("1.jpg.jpeg");
            background-size: cover;
            background-position: center;
            color: orange;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center; /* Center content horizontally */
            align-items: center; /* Center content vertically */
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .welcome-box {
            text-align: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
        }

        h2 {
            margin-top: 20px;
        }

        .prescribe-btn {
            background-color: orange;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .prescribe-btn:hover {
            background-color: #ff9800; /* Change color on hover */
        }
    </style>
</head>
<body>
    <div class="welcome-box">
        <?php if (isset($DoctorName)) { ?>
            <h2>Welcome, Dr. <?php echo $DoctorName; ?></h2>
        <?php } else { ?>
            <h2>Welcome, doctor1</h2>
        <?php } ?>

        <!-- Add the "Prescribe Drugs" button -->
        <a href="patientsearch.php"><button class="prescribe-btn" type="button">Prescribe Drugs</button></a>
    </div>
</body>
</html>
