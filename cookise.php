<?php
$cookie_name = "Cookie";
$cookie_value = "user";
$cookie_time = time() + 3600;
$cookie_path = "/aaa/ex9";
$cookie_domain = ".example.com";
$cookie_secure = true;

setcookie($cookie_name, $cookie_value, $cookie_time, $cookie_path, $cookie_domain, $cookie_secure);
?>

<html>

<body>

    <?php
    if (!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
        echo "Name is: " . $_COOKIE[$cookie_name] . "<br>";

        echo "Value is: " . $cookie_value . "<br>";

        echo "Expire time is: " . date('Y-m-d H:i:s', $cookie_time) . "<br>";
        echo "Cookie path is: " . $cookie_path . "<br>";
        echo "Cookie domain is: " . $cookie_domain . "<br>";
        echo "Cookie secure is: " . ($cookie_secure ? 'true' : 'false') . "<br>";
    }
    setcookie("user", "", time() - 3700);
    ?>

</body>

</html>