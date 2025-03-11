<?php
include 'dbconnect.php';

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="INSERT INTO `user2`(`email`, `password`) VALUES ('$email','$password')";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        header("location:index.php");
    }
}

?>