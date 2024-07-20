<?php
include('./conn.php');

$id = $_GET['id'];
$sql = "DELETE FROM users WHERE user_id='$id'";
$conn->exec($sql);
echo "<br> Data deleted succ";
header('Refresh:3 URL=./users.php');
