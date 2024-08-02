<?php

#Q1 : 

function checkPrime($I)
{
    for ($i = 2; $i < $I; $i++) {
        if ($I % $i == 0) {
            return "$I it's not Prime";
        }
    }
    return "$I it's  Prime";
}


echo checkPrime(1) . "<br>";

echo str_repeat("####", 40) .   "<br>";




#Q2: 

echo strrev("remove") . "<br>";
echo str_repeat("####", 40) .   "<br>";


#Q3: 

function checkallStringLower($r)
{
    if ($r === strtolower($r)) {
        return "Your String Is OK" . "<br>";
    } else {

        return "Your String Is Not OK" . "<br>";
    }
}

echo checkallStringLower("remove") . "<br>";
echo str_repeat("####", 40) .   "<br>";

#Q4 and Q5: 
function swap(&$x, &$y)
{
    $z = $x;
    $x = $y;
    $y = $z;
}

$q = 10;
$w = 5;

echo "the q = $q , and the w = $w" . "<br>";
swap($q, $w);
echo "the new q = $q , and the new w = $w" . "<br>";
echo str_repeat("####", 40) .   "<br>";

#Q6: 

function checkArmestrong($n)
{
    $sum = 0;
    $numst = str_split((string) $n);
    for ($i = 0; $i < count($numst); $i++) {
        $sum += (int) $numst[$i]  ** count($numst);
    }
    return $sum;
}

echo checkArmestrong(407);
echo "<br>";
echo str_repeat("####", 40) .   "<br>";

#Q7: 

function checkPalindoram($str)
{
    if ($str == strrev($str)) {
        echo "it is a Palindoram" . "<br>";
    } else {
        echo "it is NOt Palindoram" . "<br>";
    }
}

checkPalindoram("madam");
echo str_repeat("####", 40) .   "<br>";

#Q8: 

echo "<pre>";
print_r(array(2, 4, 7, 4, 8, 4));
echo "</pre>";
echo "<br>";
echo "<pre>";
print_r(array_unique(array(2, 4, 7, 4, 8, 4)));
echo "</pre>";

echo str_repeat("####", 40) .   "<br>";

?>


<?php

#Q1: 

for ($i = 1; $i <= 10; $i++) {
    $check = $i == 10 ? "" : "-";
    echo $i . "$check";
}

echo  "<br>";
echo str_repeat("####", 40) .   "<br>";



#Q2: 
$sum = 0;
for ($i = 0; $i <= 30; $i++) {
    $sum += $i;
}

echo $sum . "<br>";

echo str_repeat("####", 40) .   "<br>";

#Q3: 



for ($i = ord("A"); $i <= ord("A") + 4; $i++) {
    for ($j = 1; $j <= 5; $j++) {
        if ($i == ord("A")) {
            echo chr($i) . " ";
            continue;
        } elseif ($j <= ord("A") + 4 - $i) {
            echo   "A ";
        } else {
            echo chr($i) . " ";;
        }
    }
    echo "<br>";
}
echo "<br>";
echo str_repeat("####", 40) .   "<br>";

#Q4: 



for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= 5; $j++) {
        if ($i == 1) {
            echo "1 ";
            continue;
        } elseif ($j <= 5 - $i) {
            echo "1 ";
        } else {
            echo "$i ";
        }
    }
    echo "<br>";
}
echo "<br>";
echo str_repeat("####", 40) .   "<br>";





#Q5:

for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= 5; $j++) {
        if ($i == $j) {
            echo $i . "  ";
        } else {
            echo 0 . "  ";
        }
    }
    echo "<br>";
}
echo str_repeat("####", 40) .   "<br>";


#Q6:
$fac = 1;
for ($i = 5; $i > 1; $i--) {
    $fac *= $i;
}
echo $fac . "<br>";
echo str_repeat("####", 40) .   "<br>";

#Q7:

function fibonacciSequence($n)
{
    $a = 0;
    $b = 1;


    echo $a . " ";
    if ($n > 1) {
        echo $b . " ";
    }


    for ($i = 2; $i < $n; $i++) {
        $next_number = $a + $b;
        echo $next_number . " ";


        $a = $b;
        $b = $next_number;
    }
}


fibonacciSequence(13);
echo    "<br>";

echo str_repeat("####", 40) .   "<br>";

#Q8:

function co($s): int
{
    $a = str_split($s);
    $count = 0;
    for ($i = 0; $i < count($a); $i++) {
        if (($a[$i] == "c") || ($a[$i] == "C")) {
            $count++;
        }
    }
    return $count;
}

echo co("Orange Coding Academy") . "<br>";

echo str_repeat("####", 40) .   "<br>";


#Q9:
echo "<table border=1>";
for ($i = 1; $i <= 6; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= 5; $j++) {

        echo "<td style='padding-right:10px;'>";
        echo "$i * $j= " . $j * $i;
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";


echo "<br>";
echo str_repeat("####", 40) .   "<br>";

#Q10:

for ($i = 1; $i <= 50; $i++) {
    if ($i % 3 == 0  && $i % 5 == 0) {
        echo "FizzBuzz" . "\t";
    } elseif ($i % 3 == 0) {
        echo "Fizz" . "\t";
    } elseif ($i % 5 == 0) {
        echo "Buzz" . "\t";
    } else {
        echo $i . "\t";
    }
}

echo "<br>";
echo str_repeat("####", 40) .   "<br>";


#Q11:

function pr($n)
{
    $num = 1;
    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            if ($num == $n) {

                echo $num . " ";
                return;
            } else {
                echo $num . " ";
            }
            $num++;
        }
        echo "<br>";
    }
}

pr(100);


echo "<br>";
echo str_repeat("####", 40) .   "<br>";

#Q12:

?>