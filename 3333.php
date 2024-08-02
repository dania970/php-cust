<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (empty($username) || empty($password)) {
        $_SESSION['login_error'] = 'Username and password are required.';
        header('Location: login.php');
        exit;
    }


    include 'User.php';

    $user = new User($username, $password);

    if ($user->authenticate()) {
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        $_SESSION['login_error'] = 'Incorrect username or password.';
        header('Location: login.php');
        exit;
    }
}

class User
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function authenticate()
    {
        $validUsername = 'admin';
        $validPassword = 'password123';

        return ($this->username === $validUsername && $this->password === $validPassword);
    }
    private function validateWithDatabase()
    {
        try {
            $dsn = 'mysql:host=localhost;dbname=mydatabase';
            $db = new PDO($dsn, 'root', '');

            $query = "SELECT * FROM users WHERE username = :username AND password = :password";
            $stmt = $db->prepare($query);
            $stmt->execute([
                'username' => $this->username,
                'password' => md5($this->password)
            ]);

            return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
        } catch (PDOException $e) {

            return false;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="https://www.flaticon.com/free-icon/user_747376?term=user&page=1&position=10&origin=search&related_id=747376">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #1d3b37;
            color: #ffffff;
        }

        header {
            background-color: #1d3b37;
            padding: 10px 50px;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #f2c33a;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: #c7d4d0;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #f2c33a;
        }

        .icons {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-icon::before,
        .cart-icon::before {
            content: '';
            display: inline-block;
            width: 20px;
            height: 20px;
            background-size: cover;
        }

        .user-icon::before {

            background-image: url('https://img.icons8.com/?size=100&id=108652&format=png&color=000000');
        }

        .cart-icon::before {
            background-image: url('<ion-icon name="cart-outline"></ion-icon>');
        }

        .login-section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 150px);
            background: url(https://i.pinimg.com/564x/c9/19/3e/c9193efb2ff431290270b586df00a939.jpg) no-repeat;
            background-size: cover;
            background-position: center;
        }

        .login-container {
            background-color: #2b4d45;
            border-radius: 20px;
            box-shadow: 5px 0 10px rgba(255, 255, 255, 0.579);
            width: 500px;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;

            justify-content: center;

            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #ffffff;
            font-size: 24px;
        }

        .input-group {
            margin-bottom: 20px;
            width: 100%;
        }

        .input-group label {
            display: block;
            color: #c7d4d0;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
            cursor: pointer;
            width: 50%;
            margin-left: 10%;
        }

        .btn-primary {
            background-color: #f2c33a;
            color: #1d3b37;
            border: none;
        }

        .btn-primary:hover {
            background-color: #e6b82e;
        }

        .error-message {
            color: #ff6b6b;
            margin-top: 10px;
            font-size: 14px;
        }

        .success-message {
            color: #4caf50;
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="logo">Furni.</div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact us</a></li>
            </ul>
            <div class="icons">
                <a href="login.php"><i class="user-icon"></i></a>
                <a href="#"><i class="cart-icon"></i></a>
            </div>
        </nav>
    </header>

    <main>
        <section class="login-section">
            <div class="login-container">
                <h2>Welcome!</h2>
                <?php

                if (isset($_SESSION['login_error'])) {
                    echo '<div class="error-message">' . $_SESSION['login_error'] . '</div>';
                    unset($_SESSION['login_error']);
                }
                ?>
                <form id="loginForm" action="authenticate.php" method="post">
                    <div class="input-group">
                        <label for="username">User Name</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </section>
    </main>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            const username = document.getElementById('username').value.trim();
            const password = document.getElementById('password').value.trim();
            if (username === '' || password === '') {
                event.preventDefault();
                alert('Both username and password are required.');
                return;
            }

            if (username.length < 3 || password.length < 6) {
                event.preventDefault();
                alert('Username must be at least 3 characters and password at least 6 characters.');
                return;
            }
        });
    </script>
</body>

</html>