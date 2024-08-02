<?php
// Start or resume the session
session_start();

// Check if counter exists in session, initialize if not
if (!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 1;
} else {
    $_SESSION['visits']++;
}

// Display the visitor count
echo "<h1>Number of Visitors: {$_SESSION['visits']}</h1>";
