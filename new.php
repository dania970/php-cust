<?php


# Question One
$x = "OraNge codIng acadEmy";

#a. string uppercase
echo strtoupper($x) . "<br>";
#b. string lowercase
echo strtolower($x) . "<br>";
#c. first letter uppercase
echo ucfirst($x) . "<br>";
#d. first letter lowercase
echo lcfirst($x) . "<br>";

echo str_repeat("####", 40) .   "<br>";

# Question TWo : Splitting Numeric format to be date format:

echo substr(chunk_split("085119", 2, ":"), 0, strlen(chunk_split("085119", 2, ":")) - 1) .  "<br>";
echo str_repeat("####", 40) .   "<br>";

# Question Three : check if the string contain a word or not:

$word = "iam a full stack developer at orange coding academy";




if (stripos($word, "Orange") > 0) {
    echo  "Word Found" . "<br>";
} else {
    echo  "Word Not Found" . "<br>";
}

echo str_repeat("####", 40) .   "<br>";

# Question Four : Extract the file Nmae from URL:
$URL = "https://www.orange.com/index.php";

echo substr($URL, strrpos($URL, "/") + 1, strlen($URL))  . "<br>";
echo str_repeat("####", 40) .   "<br>";

# Question Five : Extract the username Name from email address:

$email = "info@orange.com";
echo substr($email, 0, strrpos($email, "@"))  . "<br>";
echo str_repeat("####", 40) .   "<br>";

# Question sex : get lst three charachter in string :
echo substr($email, -3)  . "<br>";
echo str_repeat("####", 40) .   "<br>";

# Question seven : genrate password :
$pattern = "1234567890QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklmnbvcxz";
echo substr(str_shuffle($pattern), 0, 7) . "<br>";
echo str_repeat("####", 40) .   "<br>";

# Question eight : replace first word in string :

$word = "that new trainee is so genuis";
echo substr_replace($word, "Our", 0, strpos($word, " ")) . "<br>";
echo str_repeat("####", 40) .   "<br>";

# Question nighn : find first charachter differance between two string:
$st1 = "dragonball";
$st2 = "dragonboll";

$str_pos = strspn($st1 ^ $st2, "\0");

printf(
    'First difference between two strings at position %d: "%s" vs "%s"',
    $str_pos,
    $st1[$str_pos],
    $st2[$str_pos]
);
echo "<br>";

echo str_repeat("####", 40) .   "<br>";
# Question ten : split words in array:

$wo = "orange coding academy Alpalqa" . "<br>";

echo "<pre>";
print_r(explode(" ", $wo));
echo "</pre>";

echo str_repeat("####", 40) .   "<br>";
# Question eleven : print the next charachter:

echo chr(ord("a") + 1) . " <br>	";

echo str_repeat("####", 40) .   "<br>";
# Question 12 : insert string is specifide position :

$word = "the brown fox";
echo substr_replace($word, "quick ", 4, 0) . "<br>";

echo str_repeat("####", 40) .   "<br>";
# Question 13 : remove charachters from string :

$str = "0000657022.24";
echo str_replace("0", "", $str) . "<br>";
echo str_repeat("####", 40) .   "<br>";
# Question 14 : remove word from string :

$word = "the quick brown fox jumbs over the lazy dogs ";

echo  substr_replace($word, "", strpos($word, "fox"), 3) . "<br>";
echo str_repeat("####", 40) .   "<br>";
# Question 15 : remove dashes from string :

$word = "the quick brown fox jumbs over the lazy dogs---";

echo  substr_replace($word, "", -3, 3) . "<br>";
echo str_repeat("####", 40) .   "<br>";
# Question 16 : remove special charachters from string :

$str = "\\\"\\1+2/32:2-3/'4";

echo str_replace(["\\", "+", ":", "+", "-", "\"", "'", "/"], "", $str) . "<br>";
echo str_repeat("####", 40) .   "<br>";
# Question 17 : remove special charachters from string :

$word = "the quick brown fox jumbs over the lazy dogs";

echo implode(" ", explode(" ", $word, -4)) . "<br>";
echo str_repeat("####", 40) .   "<br>";
# Question 18 : remove comma from numeric string :

$st = "2,543.12";
echo str_replace(",", "", $st) . "<br>";
echo str_repeat("####", 40) .   "<br>";
# Question 19 : remove comma from numeric string :

for ($i = ord("a"); $i <= ord("z"); $i++) {
    echo chr($i) . " ";
}

echo str_repeat("####", 40) .   "<br>";

echo str_repeat("<br>", 5);
echo str_repeat("***", 40) .   "<br>";
echo str_repeat("***", 40) .   "<br>";
echo str_repeat("<br>", 5);

?>









<?php

########## part Two ###########

# Question 1 :  check if the year is leap or not  .

function checkLeapYear($year)
{
    if ($year % 4 == 0) {
        if ($year % 100 == 0) {
            if ($year % 400 == 0) {
                echo "The $year is Leap Year." . "<br>";
            } else {
                echo "The $year is Not Leap Year." . "<br>";
            }
        } else {
            echo "The $year is Leap Year." . "<br>";
        }
    } else {
        echo "The $year is Not Leap Year." . "<br>";
    }
}

checkLeapYear(2015);

echo str_repeat("####", 40) .   "<br>";

# Question 2 :  check the seasion depend on tempreature  .

function checkSeasion($temp)
{
    if ($temp >= 20) {
        echo "it is Summer time, the Tempreasure: $temp" . "<br>";
    } else {

        echo "it is winter time, the Tempreasure: $temp" . "<br>";
    }
}

checkSeasion(19.9);

echo str_repeat("####", 40) .   "<br>";


# Question 3 :  calc sum of two intger  .

function sum2($n1, $n2)
{
    if ($n1 === $n2) {
        echo ($n1 + $n2) * 3 . "<br>";
    } else {
        echo ($n1 + $n2) . "<br>";
    }
}

sum2(...[2, 5]);

echo str_repeat("####", 40) .   "<br>";


# Question 4 :  calc sum 30  .
function checksum30($i, $o)
{
    if (($i + $o) == 30) {
        echo $i . "<br>";
    } else {
        echo "false" . "<br>";
    }
}
checksum30(20, 10);
echo str_repeat("####", 40) .   "<br>";

# Question 5 :  calc sum 30  .

function checkmultiple3($i)
{
    if ($i % 3 == 0) {
        echo "true" . "<br>";
    } else {
        echo "false" . "<br>";
    }
}
checkmultiple3(20);
echo str_repeat("####", 40) .   "<br>";


# Question 6 :  check between range .

function checbtwrange($i)
{
    if ($i >= 20 && $i <= 50) {
        echo "true" . "<br>";
    } else {
        echo "false" . "<br>";
    }
}

checbtwrange(50);
echo str_repeat("####", 40) .   "<br>";


# Question 7 :  print max .

function Maax($q1, $q2, $q3)
{
    $max = 0;
    if ($q1 > $q2) {
        if ($q1 > $q3) {
            return  $q1;
        } else {
            return $q3;
        }
    } else {
        if ($q2 > $q3) {
            return $q2;
        } else {
            return $q3;
        }
    }
}

echo Maax(...[1, 5, 9]) . "<br>";
echo str_repeat("####", 40) .   "<br>";


# Question 8 :  claculate the electricty bill .

function calcbill($b)
{
    if ($b > 0 && $b <= 50) {
        return $b * 2.5;
    } elseif ($b > 50 && $b <= 150) {
        return (50 * 2.5 + ($b - 50) * 5);
    } elseif ($b > 150 && $b <= 250) {
        return (50 * 2.5 + 100 * 5 + ($b - 150) * 6.20);
    } elseif ($b > 250) {
        return (50 * 2.5 + 100 * 5 + 100 * 6.20 + ($b - 250) * 7.5);
    }
}

echo calcbill(651) . "<br>";
echo str_repeat("####", 40) .   "<br>";


# Question 9 :  claculate the electricty bill .

function calculator($ope, $n1, $n2)
{
    switch ($ope) {
        case '+':
            return $n1 + $n2;
            break;
        case '-':
            return $n1 - $n2;
            break;
        case '*':
            return $n1 * $n2;
            break;

        default:
            return $n1 / $n2;
            break;
    }
}

echo calculator("/", 16, 5) . "<br>";
echo calculator("*", 16, 5) . "<br>";
echo calculator("+", 16, 5) . "<br>";
echo calculator("-", 16, 5) . "<br>";

echo str_repeat("####", 40) .   "<br>";

# Question 10 :  check allow to vote .

function checkallowtovote($i)
{
    if ($i >= 18) {
        echo "the Persoon allow to vote" . "<br>";
    } else {

        echo "the Person Not allow to vote" . "<br>";
    }
}

checkallowtovote(17);
echo str_repeat("####", 40) .   "<br>";

# Question 11 :  check the number - or + or 0 .

function checknum($T)
{
    if ($T === 0) {
        echo "the Number is Zero" . "<br>";
    } elseif ($T > 0) {

        echo "the Number is Positive" . "<br>";
    } else {

        echo "the Number is Negative" . "<br>";
    }
}

checknum(-60);
echo str_repeat("####", 40) .   "<br>";


# Question 12 :  calc student grid .

function calcgrid($q)
{
    if ($q < 60) {
        return "F" . "<br>";
    } elseif ($q >= 60 && $q < 70) {
        return "D" . "<br>";
    } elseif ($q >= 70 && $q < 80) {
        return "C" . "<br>";
    } elseif ($q >= 80 && $q < 90) {
        return "B" . "<br>";
    } elseif ($q >= 90 && $q <= 100) {
        return "A" . "<br>";
    }
}

echo calcgrid(89);

?>