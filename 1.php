<?php

require 'config.php';


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $family_name = $_POST['family_name'];
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];


    $errors = [];


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (!preg_match('/^\d{10}$/', $mobile)) {
        $errors[] = "Mobile number must be 10 digits.";
    }


    if (empty($first_name) || empty($middle_name) || empty($last_name) || empty($family_name)) {
        $errors[] = "All name fields are required.";
    }


    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password)) {
        $errors[] = "Password must be at least 8 characters long and include uppercase, lowercase, numbers, and special characters.";
    }

    if ($password !== $password_confirmation) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($errors)) {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);


        $stmt = $conn->prepare("INSERT INTO employees (email, mobile, first_name, middle_name, last_name, family_name, password, role) VALUES (?, ?, ?, ?, ?, ?, ?, 'user')");
        $stmt->bind_param('sssssss', $email, $mobile, $first_name, $middle_name, $last_name, $family_name, $hashed_password);

        if ($stmt->execute()) {
            echo "Registration successful.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function validateForm() {
            var email = document.forms["signupForm"]["email"].value;
            var mobile = document.forms["signupForm"]["mobile"].value;
            var first_name = document.forms["signupForm"]["first_name"].value;
            var middle_name = document.forms["signupForm"]["middle_name"].value;
            var last_name = document.forms["signupForm"]["last_name"].value;
            var family_name = document.forms["signupForm"]["family_name"].value;
            var password = document.forms["signupForm"]["password"].value;
            var password_confirmation = document.forms["signupForm"]["password_confirmation"].value;

            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var mobilePattern = /^\d{10}$/;
            var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

            if (!emailPattern.test(email)) {
                alert("Invalid email format.");
                return false;
            }
            if (!mobilePattern.test(mobile)) {
                alert("Mobile number must be 10 digits.");
                return false;
            }
            if (!first_name || !middle_name || !last_name || !family_name) {
                alert("All name fields are required.");
                return false;
            }
            if (!passwordPattern.test(password)) {
                alert("Password must be at least 8 characters long and include uppercase, lowercase, numbers, and special characters.");
                return false;
            }
            if (password !== password_confirmation) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Sign Up</h2>
        <form name="signupForm" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input type="text" class="form-control" id="mobile" name="mobile" required>
            </div>
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="middle_name">Middle Name:</label>
                <input type="text" class="form-control" id="middle_name" name="middle_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="family_name">Family Name:</label>
                <input type="text" class="form-control" id="family_name" name="family_name" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>
</body>

</html>