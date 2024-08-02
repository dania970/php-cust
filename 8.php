<?php
// Start or resume the session
session_start();

// Initialize the counter if it doesn't exist in session
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}

// Increment the counter
$_SESSION['counter']++;

// Display the counter
echo "<h1>Visitor Count: {$_SESSION['counter']}</h1>";
