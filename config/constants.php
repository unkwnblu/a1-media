<?php 
    session_start();

    define('SITEURL', 'http://localhost/a1-media/'); 
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'a1-media');

    // Establish Connection
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) 
        or die("Database Connection Failed: " . mysqli_connect_error());

    // Select Database
    $db_select = mysqli_select_db($conn, DB_NAME) 
        or die("Database Selection Failed: " . mysqli_error($conn));
?>
