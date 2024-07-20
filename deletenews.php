<?php
include('./conn.php');

$id = $_GET['id'];
$sql = "DELETE FROM news WHERE news_id='$id'";
$conn->exec($sql);
echo "<br> News deleted succ";
header('Refresh:3 URL=./News.php');
