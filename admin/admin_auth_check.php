<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require('../config.php');

// If needed, check for session login
if (!isset($_SESSION["id"])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}
?>
