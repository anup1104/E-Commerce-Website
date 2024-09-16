<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPI Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<!-- <?php
    // Retrieve the email value from the previous form
    // $email = $_POST['email'];
    // echo "emial $email";
?> -->
<div class="container">
    <h1>UPI Payment</h1>
    <form action="payment.php" method="post">
        <!-- Hidden input field for email -->
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="upi_id" name="email" required>
        </div>
        <div class="form-group">
            <label for="upi_id">UPI ID:</label>
            <input type="text" id="upi_id" name="upi_id" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" required>
        </div>
        <button type="submit">Pay Now</button>
    </form>
</div>
</body>
</html>
