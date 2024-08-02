<?php
require 'config.php';

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
        $errors['email'] = "Invalid email format.";
    }

    if (!preg_match('/^\d{10}$/', $mobile)) {
        $errors['mobile'] = "Mobile number must be 10 digits.";
    }

    if (empty($first_name) || empty($middle_name) || empty($last_name) || empty($family_name)) {
        $errors['name'] = "All name fields are required.";
    }

    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password)) {
        $errors['password'] = "Password must be at least 8 characters long and include uppercase, lowercase, numbers, and special characters.";
    }

    if ($password !== $password_confirmation) {
        $errors['password_confirmation'] = "Passwords do not match.";
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO employees (email, mobile, first_name, middle_name, last_name, family_name, password, role) VALUES (?, ?, ?, ?, ?, ?, ?, 'user')");
        $stmt->bind_param('sssssss', $email, $mobile, $first_name, $middle_name, $last_name, $family_name, $hashed_password);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Registration successful.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
        }

        $stmt->close();
    } else {

        session_start();
        $_SESSION['errors'] = $errors;
        header("Location: signup.php");
        exit();
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
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 500px;
            margin-top: 50px;
        }

        .form-control {
            border-radius: 0.25rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: bold;
        }

        .error {
            color: red;
            font-size: 0.875em;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>
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

            var isValid = true;

            if (!emailPattern.test(email)) {
                document.getElementById('emailError').innerText = "Invalid email format.";
                isValid = false;
            } else {
                document.getElementById('emailError').innerText = "";
            }
            if (!mobilePattern.test(mobile)) {
                document.getElementById('mobileError').innerText = "Mobile number must be 10 digits.";
                isValid = false;
            } else {
                document.getElementById('mobileError').innerText = "";
            }
            if (!first_name || !middle_name || !last_name || !family_name) {
                document.getElementById('nameError').innerText = "All name fields are required.";
                isValid = false;
            } else {
                document.getElementById('nameError').innerText = "";
            }
            if (!passwordPattern.test(password)) {
                document.getElementById('passwordError').innerText = "Password must be at least 8 characters long and include uppercase, lowercase, numbers, and special characters.";
                isValid = false;
            } else {
                document.getElementById('passwordError').innerText = "";
            }
            if (password !== password_confirmation) {
                document.getElementById('passwordConfirmationError').innerText = "Passwords do not match.";
                isValid = false;
            } else {
                document.getElementById('passwordConfirmationError').innerText = "";
            }
            return isValid;
        }
    </script>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4">Sign Up</h2>
        <form name="signupForm" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <small id="emailError" class="error"></small>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input type="text" class="form-control" id="mobile" name="mobile" required>
                <small id="mobileError" class="error"></small>
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
                <small id="nameError" class="error"></small>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <small id="passwordError" class="error"></small>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                <small id="passwordConfirmationError" class="error"></small>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
        </form>
    </div>
</body>

</html>