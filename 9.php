<?php
if (isset($_POST['op'])) {
    $x = $_POST['num1'];
    $y = $_POST['num2'];
    $op = $_POST['op'];
    switch ($op) {
        case 'sum':
            $result = $x + $y;
            break;
        case 'sub':
            $result = $x - $y;
            break;
        case 'mul':
            $result = $x * $y;
            break;
        case 'div':
            $result = $x / $y;
            break;
    }
}
?>
<!DOCTYPE html>

<body>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">

        <div>
            <label for="num1">Number1</label>
            <input type="text" name="num1">
        </div>
        <br>
        <div>
            <label for="num2">Number2</label>
            <input type="text" name="num2">
        </div>
        <br>
        <div>
            <label for="res">Result</label>
            <input type="number" id="result" value="<?= $result ?>" disabled>
        </div><br>
        <div>
            <input type="button" value="sum" name="op">
            <input type="button" value="sub" name="op">
            <input type="button" value="mul" name="op">
            <input type="button" value="div" name="op">
        </div>

    </form>


</body>

</html>