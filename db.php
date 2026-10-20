<?php
$conn = mysqli_connect("localhost", "root", "", "debyong_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Database connected successfully!";
?>