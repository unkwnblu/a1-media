<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();  // Start output buffering

if (!isset($_SESSION['user'])) {
    $_SESSION['login-error'] = "<div class='text-bg-danger rounded-3 p-3'>Login to Access Admin Panel.</div>";
    
    // PHP Redirect
    header("Location: ".SITEURL."admin/login.php");
    exit(); // STOP execution after redirect

    // JavaScript Fallback (Will never run because of exit)
    echo "<script>window.location.href = '".SITEURL."admin/login.php';</script>";
}

ob_end_flush();  // End output buffering
?>