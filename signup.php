<?php
$fname = $_POST['fname'];
$pass = $_POST['pass'];
$mail = $_POST['mail'];
$dob = $_POST['dob'];
$gen = $_POST['gen'];

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "fswd";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert user information into the database
$insert = "INSERT INTO signup (fname, pass, mail, dob, gen) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($insert);

if (!$stmt) {
    echo "Error preparing statement: " . $conn->error;
    exit;
}

$stmt->bind_param("sssis", $fname, $pass, $mail, $dob, $gen);

if (!$stmt->execute()) {
    echo "Error executing statement: " . $stmt->error;
    exit;
}

// Check if the registration was successful
if ($stmt->affected_rows > 0) {
    echo "<p>Registration completed successfully!</p>";
    header("Location: index.html"); // Redirect to a new HTML file
    exit; // Make sure to exit after redirection to prevent further execution
} else {
    echo "<p>Registration failed. Please try again later.</p>";
}

$stmt->close();
$conn->close();
?>
