<?php
session_start();
if ($_SESSION['role'] == 'a') {
    $conn = new PDO ("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM post WHERE id=$_GET[id]";
    $conn->exec($sql);
    header("location:index.php");
  
} else {
    header("location:index.php");
    die();
}
?>