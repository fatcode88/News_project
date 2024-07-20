<?php
include('./conn.php');

$id = $_GET['id'];
$sql = "DELETE FROM categories WHERE category_id='$id'";
$conn->exec($sql);
echo "<br> Data deleted succ";
header('Refresh:3 URL=./categories.php');

