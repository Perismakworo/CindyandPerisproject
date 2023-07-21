<?php
// dispense_drugs.php

include 'conn.php'; // Include the database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['PatientSSN'], $_POST['Drugid'], $_POST['quantity'])) {
        $PatientSSN = $_POST['PatientSSN'];
        $Drugid = $_POST['Drugid'];
        $quantity = $_POST['quantity'];

        // Check if the drug is available in the Drugs table
        $sql = "SELECT * FROM Drugs WHERE Drugid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $Drugid);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $drug = $result->fetch_assoc();
            $Drugname = $drug['Drugname'];
            $Drugprice = $drug['Drugprice'];
            $Drugamount = $drug['Drugamount'];

            // Check if there is enough quantity of the drug
            if ($Drugamount >= $quantity) {
                // Update the drug amount in the Drugs table after dispensing
                $newAmount = $Drugamount - $quantity;
                $updateSql = "UPDATE Drugs SET Drugamount = ? WHERE Drugid = ?";
                $updateStmt = $conn->prepare($updateSql);
                $updateStmt->bind_param("ds", $newAmount, $Drugid);

                if ($updateStmt->execute()) {
                    echo "Drug dispensed successfully. ";
                    echo "Drug Name: " . $Drugname . "<br>";
                    echo "Drug Price: " . $Drugprice . "<br>";
                    echo "Quantity Dispensed: " . $quantity . "<br>";
                    echo "Remaining Drug Amount: " . $newAmount . "<br>";
                } else {
                    echo "Error dispensing drug: " . $updateStmt->error;
                }

                $updateStmt->close();
            } else {
                echo "Insufficient quantity of the drug.";
            }
        } else {
            echo "Drug not found in the Drugs table.";
        }

        $stmt->close();
    } else {
        echo "Please fill in all the required fields.";
    }
}

$conn->close(); // Close the database connection
?>
