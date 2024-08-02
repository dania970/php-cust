<!DOCTYPE HTML>
<html>

<head>
    <style>
        form {
            display: flex;
            flex-direction: column;
            margin: auto;
            align-items: center;
            margin-top: 200px;
            border: solid;
            width: 40%;
            padding: 30px;
            background-color: white;
            border-radius: 20px;
        }

        body {
            background-color: black;
        }

        #sub {
            width: 100px;
        }
    </style>
</head>

<body>



    <h2>User and email Form </h2>

    <form method="GET" action="./1_ActionPage.php">
        Name : <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>

        <input id="sub" type="submit" name="submit" value="Submit">

        <?php

        $visitors = file_get_contents('visitors.txt');
        $visitors = $visitors + 1;

        file_put_contents('visitors.txt', $visitors);

        $content = file_get_contents('visitors.txt');
        echo "<br><br><br><br>The number of visitors is: (" . $content . ")";

        ?>


    </form>





</body>

</html>
<?php
$start_time = microtime(TRUE);
?>

<?php

$name = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    echo 'The Pass and Email was sent by "POST Method"';
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $name = $_GET["name"];
    $email = $_GET["email"];
    echo 'The Pass and Email was sent by "GET Method"';
}
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;



$cookie_name = "user";
$cookie_value = $name;
setcookie($cookie_name, $cookie_value, time() + 5);
?>


<?php



$end_time = microtime(TRUE);
$time_taken = ($end_time - $start_time) * 1000;
$time_taken = round($time_taken, 5);

echo '<br><br>Page generated in ' . $time_taken . ' seconds.<br><br>';

echo "The Script Name is : ( " . basename($_SERVER['SCRIPT_NAME']) . " )<br>";
echo "The Project Name is : ( " . basename(dirname(__FILE__)) . " )<br>";


if (!isset($_COOKIE[$cookie_name])) {
    echo "<br><br>Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "<br><br>Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
?>