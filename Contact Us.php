<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
   <style> .message {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #4CAF50;
            color: #fff;
            border-radius: 8px;
        }
        </style>
</head>
<body>
    

<?php
// Step 2: Establish connection to your database
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "fswd"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 3: Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Step 4: Validate form data (you can add more validation if needed)
if (empty($name) || empty($email) || empty($message)) {
    $error_message = "All fields are required.";
} else {
    // Step 5: Insert data into database table
    $sql = "INSERT INTO ContactUs (name, email, message) VALUES ('$name', '$email', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        // $success_message = "Message sent successfully!";

        echo "<div class='message'>Thanks for contacting us, we will reach out your query</div>";
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
</body>
</html>
