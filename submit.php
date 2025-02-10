<?php
require 'db.php';  // Include the database connection file
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Status</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f4f4f4;
            text-align: center;
        }
        .message-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .success {
            color: green;
        }
        .error {
            color: red;
        }
        .back-button {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background: #ff4500;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-button:hover {
            background: #e03e00;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST["name"]);
            $email = trim($_POST["email"]);

            if (!empty($name) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $stmt = $conn->prepare("INSERT INTO subscribers (name, email) VALUES (?, ?)");
                $stmt->bind_param("ss", $name, $email);

                if ($stmt->execute()) {
                    echo "<p class='success'>Thank you for subscribing, $name!</p>";
                } else {
                    echo "<p class='error'>Email already registered or an error occurred.</p>";
                }

                $stmt->close();
            } else {
                echo "<p class='error'>Invalid input. Please check your details.</p>";
            }
        } else {
            echo "<p class='error'>Invalid request method.</p>";
        }
        $conn->close();
        ?>
        <a href="index.html" class="back-button">Back to Home</a>
    </div>
</body>
</html>