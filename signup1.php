<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    if (empty($name)) {
        die('Please enter your name.');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Please enter a valid email address.');
    }
    if (strlen($password) < 6) {
        die('Password must be at least 6 characters long.');
    }
    echo 'Registration successful!';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <style>
        body {
            margin: 30px;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
            background-image: url('https://i.pinimg.com/564x/47/c8/0f/47c80fb43dfd8e884b63709c32275097.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 90vh;
        }

        .container {
            background-color: #144f44;
            border-radius: 10px;
            padding: 40px;
            width: 400px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            color: #ffffff;
            text-align: center;
        }

        .container img {
            width: 50px;
            height: auto;
            margin-bottom: 20px;
        }

        .container h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #00bbaa;
        }

        .form-group label {
            margin-bottom: 5px;
            display: block;
            font-weight: bold;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-options a {
            color: #ffffff;
            font-size: 14px;
            text-decoration: none;
        }

        .form-options a:hover {
            text-decoration: underline;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
        }

        .checkbox-group input {
            margin-right: 10px;
        }

        .submit-button {
            width: 100%;
            background-color: #00bbaa;
            color: white;
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }

        .submit-button:hover {
            background-color: #009688;
        }

        .footer {
            font-size: 14px;
            margin-top: 20px;
        }

        .footer a {
            color: #00bbaa;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector('form');

            form.addEventListener('submit', function(event) {
                let valid = true;


                const name = document.getElementById('name').value;
                if (name === '') {
                    alert('Please enter your name.');
                    valid = false;
                }
                const email = document.getElementById('email').value;
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(email)) {
                    alert('Please enter a valid email address.');
                    valid = false;
                }


                const password = document.getElementById('password').value;
                if (password.length < 6) {
                    alert('Password must be at least 6 characters long.');
                    valid = false;
                }

                if (!valid) {
                    event.preventDefault(); // منع إرسال النموذج إذا كانت البيانات غير صحيحة
                }
            });
        });
    </script>

    <div class="container">
        <img src="https://img.icons8.com/ios-filled/50/ffffff/fingerprint.png" alt="Fingerprint Icon">

        <h1>Sign Up</h1>

        <div class="form-group">
            <label for="name">Your name</label>
            <input type="text" id="name" name="name" placeholder="Your name">
        </div>

        <div class="form-group">
            <label for="email">E-mail address</label>
            <input type="email" id="email" name="email" placeholder="E-mail address">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password">
        </div>

        <div class="form-options">
            <div class="checkbox-group">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>
            <a href="#" class="forgot-password">Forget password?</a>
        </div>

        <button class="submit-button">Sign up</button>

        <div class="footer">
            <p>By creating an account, you agree and accept our <a href="#">Terms</a> and <a href="#">Privacy
                    Policy</a>.</p>
            <p>Already have an account? <a href="#">Log in.</a></p>
        </div>
    </div>
</body>

</html>