<?php
session_start();
require_once('../Models/alldb.php');
$id=$_GET['delete'];
$status=delete($id);
if($status)
{
    $_SESSION['mes']="Deleted";
    header("location:../Views/home.php");
}
?>