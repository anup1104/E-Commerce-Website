<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .message {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #4CAF50;
            color: #fff;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Retrieve form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phoneNumber = $_POST['phone_number'];
        $homeAddress = $_POST['home_address'];
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];

        // Database connection parameters
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "fswd";

        // Create a new connection
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement for inserting data into the 'cart' table
        $insert = "INSERT INTO cart (name, email, password, phone_number, home_address, productName, productPrice) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert);

        // Check if preparing the statement was successful
        if (!$stmt) {
            echo "Error preparing statement: " . $conn->error;
            exit;
        }

        // Bind parameters to the prepared statement
        $stmt->bind_param("sssisss", $name, $email, $password, $phoneNumber, $homeAddress, $productName, $productPrice);

        // Execute the prepared statement
        if (!$stmt->execute()) {
            echo "Error executing statement: " . $stmt->error;
            exit;
        }

        // Check if the insertion was successful
        if ($stmt->affected_rows > 0) {
            // Calculate delivery date (3 days from today)
            $deliveryDate = date('Y-m-d', strtotime('+3 days'));
            echo "<div class='message'>Ordered successfully! Your delivery will be on: $deliveryDate Now please go back and pay or else cash on delivery</div>";
        } else {
            echo "<div class='message'>Failed to insert data. Please try again later.</div>";
        }

        // Close the prepared statement and database connection
        $stmt->close();
        $conn->close();
        ?>
    </div>
</body>
</html>
