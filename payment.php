<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Processing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .success-message p {
            margin: 0;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Payment Processing</h1>
    <?php
    // Retrieve form data
    $email = $_POST['email'];
    $upi_id = $_POST['upi_id'];
    $amount = $_POST['amount'];

    // Database connection
    $servername = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "fswd"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into the 'upi' table
    $sql = "INSERT INTO upi (email, id, amount) VALUES (?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $email, $upi_id, $amount);

    // Execute the SQL statement
    if ($stmt->execute()) {
        echo '<div class="success-message">';
        echo '<p>Payment successfully processed.</p>';
        echo '</div>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
    ?>
</div>
</body>
</html>
