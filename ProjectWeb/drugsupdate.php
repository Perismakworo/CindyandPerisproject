<?php
include 'conn.php';

$Drugid = $_GET['Drugid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Drugid = $_POST['Drugid'];
    $Drugname = $_POST['Drugname'];
    $Drugprice = $_POST['Drugprice'];
    $Drugamount = $_POST['Drugamount'];

    // Validate the required fields
    if (empty($Drugid) || empty($Drugname) || empty($Drugprice) || empty($Drugamount)) {
        echo "Error: Please fill in all required fields.";
    } else {
        $sql = "UPDATE drugs SET Drugname=?, Drugprice=?, Drugamount=? WHERE Drugid=?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $Drugname, $Drugprice, $Drugamount, $Drugid);

        if ($stmt->execute()) {
            echo "Updated successfully.";
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
} else {
    // Fetch existing drug information
    $sql = "SELECT * FROM drugs WHERE Drugid=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $Drugid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Drugname = $row['Drugname'];
        $Drugprice = $row['Drugprice'];
        $Drugamount = $row['Drugamount'];
    } else {
        echo "No records found.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Drug Update</title>
    <link rel="stylesheet" type="text/css" href="drugsupdate.css">
</head>
<body>
    <div class="navbar">
        <!-- Your navbar code here -->
    </div>
    <br>
    <div class="registration-form">
        <h1>Drug Update</h1>
        <form method="post" action="Drug.php">
            <input type="text" name="Drugid" placeholder="Drug id" value="<?php echo $Drugid; ?>">
            <input type="text" name="Drugname" placeholder="Drug name" value="<?php echo $Drugname; ?>">
            <input type="text" name="Drugprice" placeholder="Drug price" value="<?php echo $Drugprice; ?>">
            <input type="text" name="Drugamount" placeholder="Drug amount" value="<?php echo $Drugamount; ?>">

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
