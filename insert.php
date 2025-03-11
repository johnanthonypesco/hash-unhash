<?php
include 'dbconnect.php';

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $email=$_POST['email'];
    $password=$_POST['password'];

    $hashpassword = md5($password);

    $sql="INSERT INTO `user`(`email`, `password`) VALUES ('$email','$hashpassword')";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        header("location:index.php");
    }
}

?>