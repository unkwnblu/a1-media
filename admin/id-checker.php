<?php 
    $id = $_GET['id']; // Get the ID from URL
    echo "Received ID: " . $id . "<br>";
    
    // Check if the project exists
    $sql = "SELECT * FROM tbl_project WHERE id = $id";
    $res = mysqli_query($conn, $sql);
    
    if ($res) {
        $count = mysqli_num_rows($res);
        echo "Rows found: " . $count . "<br>";
    
        if ($count > 0) {
            $row = mysqli_fetch_assoc($res);
            echo "Project Title: " . $row['title']; // Print project title
        } else {
            echo "Error: Project not found!";
        }
    } else {
        echo "Error: Query failed!";
    }
    
    exit();
?>