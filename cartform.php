<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .payment-option {
            margin-top: 10px;
        }
    </style>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
     $productName = $_POST['productName'];
     $productPrice = $_POST['productPrice'];
    ?>
    <h2>User Details Form</h2>
    <form action="cart.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>

        <label for="phone_number">Phone Number:</label><br>
        <input type="text" id="phone_number" name="phone_number" required><br>

        <label for="home_address">Home Address:</label><br>
        <textarea id="home_address" name="home_address" required></textarea><br>
        <input type="hidden" name="productName" value="<?php echo $productName; ?>">
        <input type="hidden" name="productPrice" value="<?php echo $productPrice; ?>">
        <div class="payment-option">
            <!-- <a href="upi.html"><button type="button" class="btn btn-primary">Pay with UPI</button></a> -->
        </div>
        <input type="submit" value="Submit">
    </form>
    <!-- Payment form -->
    <form action="upi.php" method="post" id="upiForm">
        <!-- Your other form fields here -->
        <input type="hidden" id="hiddenEmail" name="email" value="">
        <button type="submit" class="btn btn-primary" id="submitPayment">Submit Payment</button>
    </form>

    <script>
        // Get the email value from the hidden input field
        var email = document.getElementById("email").value;

        // Set the email value to the hiddenEmail field in the UPI form
        document.getElementById("hiddenEmail").value = email;
    </script>
</body>
</html>
