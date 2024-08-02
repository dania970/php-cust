<?php
//example 1
$st = "Dania Amro";
echo strtoupper($st);
echo "</br> ";
print strtolower($st);
echo "</br> ";
echo ucfirst($st);
echo "</br> ";
echo ucwords($st);
echo "</br> ";
// example 2
$num = "290602";
$date = substr_replace($num, ":", 2, 0);
$date = substr_replace($date, ":", 5, 0);
echo $date;
echo "</br> ";
// example 3
$word = ("I am a full stack developer at orange coding academy");
if (str_contains($word, 'orange')) {
    echo 'Word found';
} else
    echo 'Word not found';
echo "</br> ";

// example 4
$url = ("info@orange.com/index_php");
$file = basename($url);
$file = basename($url, ".php");
echo ($file);
echo "</br> ";
// example 5
$url = ("info@orange.com/index_php");
$username = strstr($url, '@', true);
echo ($username);
echo "</br> ";
// example 6
$url = ("info@orange.com");
echo substr($url, -3);
echo "</br> ";
//example 7
function get_password($str, $len = 0)
{

    // Variable $pass to store password 
    $pass = "";

    // Variable $str_length to store 
    // length of the given string 
    $str_length = strlen($str);

    // Check if the $len is not provided 
    // or $len is greater than $str_length 
    // then assign $str_length into $len 
    if ($len == 0 || $len > $str_length) {
        $len = $str_length;
    }

    // Shuffle the string  
    $pass = str_shuffle($str);

    // Extract the part of string 
    $pass = substr($pass, 0, $len);

    return $pass;  //str_shuffle() is better than this function 
}
$str = "GeeksForGeeks";
echo get_password($str, 5) . "\n<br/>";
echo "</br> ";

// example 8
$fword = "Hello my name is Dalia";

echo str_replace('Hello', 'Hi', $fword);
echo "</br> ";
// example 9
// $fw=array('a','b','c','d', 'e' , 'f');
// $lw=array('a','b','c','d', 'd' , 'f');
// $result=array_diff($fw,$lw);
// print_r($result);
// echo "</br> ";
// example 10 
$d = array("Hello", "My", "Name", "Is", "Dalia");
echo var_dump($d);
echo "</br> ";
//////////////////////////////////////////////////////// example 11
function nextLetter($letter)
{
    // Define a mapping of letters to their next letters
    $next_map = [
        'a' => 'b', 'b' => 'c', 'c' => 'd', 'd' => 'e',
        'e' => 'f', 'f' => 'g', 'g' => 'h', 'h' => 'i',
        'i' => 'j', 'j' => 'k', 'k' => 'l', 'l' => 'm',
        'm' => 'n', 'n' => 'o', 'o' => 'p', 'p' => 'q',
        'q' => 'r', 'r' => 's', 's' => 't', 't' => 'u',
        'u' => 'v', 'v' => 'w', 'w' => 'x', 'x' => 'y',
        'y' => 'z', 'z' => 'a'
    ]; // ord



    // Check if the input is a valid single letter
    if (strlen($letter) !== 1) {
        echo "Please input a valid single letter.";
        return;
    }

    // Get the next letter using the mapping
    $next_letter = isset($next_map[$letter]) ? $next_map[$letter] : $letter;

    // Output the next letter
    echo "The next letter after '{$letter}' is '{$next_letter}'.";
}

// Example usage:
$input_letter = 'e';
nextLetter($input_letter);
echo "</br> ";
//example 12
$st1 = "Hello There";
$st2 = "!";
echo substr_replace($st1, $st2, 11);
echo "</br> ";
//print the first word of sentence
$sen = "It is a PHP examples";
$arra = explode(' ', trim($sen));
echo $arra[0];
echo "</br> ";
//example 13
$numb = "393900023002";

$num = str_replace('0', '', $numb);

echo $num;
echo "</br> ";
//example 14
$s = "This is a simple example in PHP";
echo $s;
echo "</br> ";
$ss = str_replace("simple", '', $s);
echo $ss;
echo "</br> ";
//example 15
$dash = "Remove -- all dashes ----";
$d = str_replace('-', '', $dash);
echo $dash;
echo "</br> ";
echo $d;
echo "</br> ";
//example 16
$symbols = "@ed/3fa#";
$symbols = preg_replace('/[^A-Za-z0-9\-]/', '', $symbols);
echo $symbols;
echo "</br> ";
//example 17
$st = "One two three four five six seven";
$words = explode(' ', $st);
$words = implode(' ', array_slice($words, 0, 5)); // return the array into string 
echo $words;
echo "</br> ";
// example 18
$com = "23,21,3,6,99,,9,";
$d = str_replace(',', '', $com);
echo $com;
echo "</br> ";
echo $d;
echo "</br> ";
//example 19
$a2z = range('a', 'z');
foreach ($a2z as $letter) //store each letter in $letter var
{
    print("$letter\n");
}
echo "</br> ";
//Logical operation
//example 1
function leapyear($year)
{
    if ($year % 4 == 0) {
        if ($year % 100 == 0) {
            echo "$year is not a leap year";
        } else
            echo "$year is a leap year";
    } else
        echo "$year is not a leap year";
}
echo leapyear(1000);
echo "</br> ";
//example 2
function seasson($tem)
{
    if ($tem < 20) {
        echo "We are in winter";
    } else
        echo "We are in summer";
}
echo seasson(22);
echo "</br> ";
//example 3
function sum($x, $y)
{
    $sum = 0;
    if ($x == $y) {
        $sum = ($x + $y) * 3;
        echo $sum;
    } else
        echo ($x + $y);
}
echo sum(3, 3);
echo "</br> ";
//example 4
function checksum($x, $y)
{
    if ($x + $y == 30) {
        echo ($x + $y);
    } else
        echo ("False");
}
checksum(21, 9);
echo "</br> ";
//example 5
function multithree($num)
{
    if ($num % 3 == 0) {
        echo ('True');
    } else
        echo ("False");
}
multithree(21);
echo "</br> ";
//example 6
function checking($num)
{
    if ($num <= 50 & $num >= 20) {
        echo ("True");
    } else
        echo ("False");
}
checking(51);
echo "</br> ";
//example 7
function large($x, $y, $z)
{
    $max = $x;
    if ($y > $max) {
        $max = $y;
        if ($z > $max) {
            $max = $z;
            echo ($max);
        } else
            echo ($max);
    } else
        echo ($max);
}
large(1, 55, 19);
echo "</br> ";
//example 8
function bill($units)
{
    $counter = 0;
    if ($units <= 50) {
        $counter = 2.5;
        echo ($counter);
    } else if ($units <= 100) {
        $counter += $counter;
        echo ($counter);
    } else if ($units > 100) {
        $counter = 6.20;
        echo ($counter);
    } else if ($units >= 250) {
        $counter = 7.5;
        echo ($counter);
    }
}
bill(70);
echo "</br> ";
//example 9
function calculator($x, $y, $type)
{
    $sum = 0;
    if ($type === "+") {
        function summ($x, $y)
        {
            $sum = $x + $y;
            echo ($sum);
        }
        summ($x, $y);
    } else if ($type === "-") {
        function sub($x, $y)
        {
            $sum = $x - $y;
            echo ($sum);
        }
        sub($x, $y);
    } else if ($type === "*") {
        function mul($x, $y)
        {
            $sum = $x * $y;
            echo ($sum);
        }
        mul($x, $y);
    } else {
        function div($x, $y)
        {
            $sum = $x / $y;
            echo ($sum);
        }
        div($x, $y);
    }
}
calculator(150, 44, '*');
echo "</br> ";
//example 10
function voting($age)
{
    if ($age >= 18) {
        echo "You can vote";
    } else
        echo "you can't vote";
}
voting(14);
echo "</br> ";
//example 11
function number($num)
{
    if ($num > 0) {
        echo "This is a positive number";
    } else if ($num < 0) {
        echo "This is a negative number";
    } else
        echo "This is zero";
}
number(-4);
echo "</br> ";
//example 12
function degree($a, $b, $c, $d, $e)
{
    $sum = $a + $b + $c + $d + $e;
    $avg = $sum / 5;
    if ($avg < 60) {
        echo "F";
    } else if ($avg > 60 && $avg <= 70) {
        echo "D";
    } else if ($avg > 70 && $avg <= 80) {
        echo "C";
    } else if ($avg > 80 && $avg <= 90) {
        echo "B";
    } else if ($avg > 90 && $avg <= 100) {
        echo "A";
    }
}
degree(50, 83, 56, 92, 99);
