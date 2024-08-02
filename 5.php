<?php
session_start();

class User
{
    private $conn;
    private $table = 'users';

    public $name;
    public $email;
    public $password;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function create()
    {
        $query = 'INSERT INTO ' . $this->table . ' (user_name, email, password) VALUES (?, ?, ?)';

        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            printf("Error: %s.\n", $this->conn->error);
            return false;
        }

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt->bind_param('sss', $this->name, $this->email, $this->password);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}

// Check if the user is already logged in, redirect to welcome page if true
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("location: 44.php");
    exit;
}

$nameError = $emailError = $passwordError = '';
$isValid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_name = trim($_POST['user_name']);
    if (empty($user_name)) {
        $nameError = 'Please enter your name.';
        $isValid = false;
    }

    $email = trim($_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Please enter a valid email address.';
        $isValid = false;
    }

    $password = trim($_POST['password']);
    if (strlen($password) < 6) {
        $passwordError = 'Password must be at least 6 characters long.';
        $isValid = false;
    }

    if ($isValid) {
        echo "<script>alert('Signup successful!');</script>";

        $conn = new mysqli('localhost', 'root', '', 'brief4');
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        $stmt = $conn->prepare('INSERT INTO users (user_name, email, password) VALUES (?, ?, ?)');
        $stmt->bind_param('sss', $user_name, $email, $password);

        if ($stmt->execute()) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user_name;
            header("location: welcome.php");
        } else {
            echo 'Error: ' . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="5.css">
</head>

<body>

    <div class="container">
        <img src="https://img.icons8.com/ios-filled/50/ffffff/fingerprint.png" alt="Fingerprint Icon">

        <h1>Sign Up</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="signupForm">
            <?php if (!$isValid) : ?>
                <div class="error-message">
                    <?php
                    echo htmlspecialchars($nameError);
                    echo htmlspecialchars($emailError);
                    echo htmlspecialchars($passwordError);
                    ?>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label for="name">Your name</label>
                <input type="text" id="name" name="user_name" placeholder="Your name" value="<?php echo htmlspecialchars($user_name ?? ''); ?>">
                <div class="error-message" id="nameError"><?php echo htmlspecialchars($nameError); ?></div>
            </div>

            <div class="form-group">
                <label for="email">E-mail address</label>
                <input type="email" id="email" name="email" placeholder="E-mail address" value="<?php echo htmlspecialchars($email ?? ''); ?>">
                <div class="error-message" id="emailError"><?php echo htmlspecialchars($emailError); ?></div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password">
                <div class="error-message" id="passwordError"><?php echo htmlspecialchars($passwordError); ?></div>
            </div>

            <div class="form-options">
                <div class="checkbox-group">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <a href="#" class="forgot-password">Forget password?</a>
            </div>

            <button class="submit-button" type="submit">Sign up</button>
        </form>

        <div class="footer">
            <p>By creating an account, you agree and accept our <a href="#">Terms</a> and <a href="#">Privacy Policy</a>.</p>
            <p>Already have an account? <a href="login.php">Log in</a></p>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('signupForm');
            const nameErrorDiv = document.getElementById('nameError');
            const emailErrorDiv = document.getElementById('emailError');
            const passwordErrorDiv = document.getElementById('passwordError');

            form.addEventListener('submit', function(event) {
                let valid = true;
                nameErrorDiv.style.display = 'none';
                emailErrorDiv.style.display = 'none';
                passwordErrorDiv.style.display = 'none';

                const name = document.getElementById('name').value.trim();
                if (name === '') {
                    nameErrorDiv.textContent = 'Please enter your name.';
                    nameErrorDiv.style.display = 'block';
                    valid = false;
                }

                const email = document.getElementById('email').value.trim();
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(email)) {
                    emailErrorDiv.textContent = 'Please enter a valid email address.';
                    emailErrorDiv.style.display = 'block';
                    valid = false;
                }

                const password = document.getElementById('password').value.trim();
                if (password.length < 6) {
                    passwordErrorDiv.textContent = 'Password must be at least 6 characters long.';
                    passwordErrorDiv.style.display = 'block';
                    valid = false;
                }

                if (!valid) {
                    event.preventDefault();
                }
            });
        });
    </script>

</body>

</html>