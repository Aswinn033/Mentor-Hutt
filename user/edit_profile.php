<?php
include("config.php");
session_start();
if(isset($_POST['btnsubmit']))
{
    $user=$_SESSION['userid'];
    $location=strip_tags($_POST['location']);
    $status=strip_tags($_POST['status']);
    $s=$_FILES['photo'] ['name'];
    //echo $user;
    if($location && $status)
    {
    
    $sql=mysqli_query($conn,"update user_data set location='$location', status='$status' where user_id='$user'");
    if($sql)
    {
        echo "<script>alert('both update');</script>";
        header("location:../user/profile.php");
    }
    else
    {
        die(mysqli_error($conn));
    }
   }
   elseif($location){

    $location=strip_tags($_POST['location']);
    //$status=strip_tags($_POST['status']);
    $sql=mysqli_query($conn,"update user_data set location='$location' where user_id='$user'");
    if($sql)
    {
        echo "<script>alert('location update');</script>";
        header("location:../user/profile.php");
    }
    else
    {
        die(mysqli_error($conn));
    }

   }
   elseif($status){

    //$location=strip_tags($_POST['location']);
    $status=strip_tags($_POST['status']);
    $sql=mysqli_query($conn,"update user_data set status='$status' where user_id='$user'");
    if($sql)
    {
        echo "<script>alert('status update');</script>";
        header("location:../user/profile.php");
    }
    else
    {
        die(mysqli_error($conn));
    }

   }

   elseif($s){

    //$location=strip_tags($_POST['location']);
     $loc= "../upload/user upload/user-".$user;
     //$uid=$_SESSION['userid'];
     if(move_uploaded_file($_FILES['photo']['tmp_name'],$loc.$s))
     {
     $sql=mysqli_query($conn,"UPDATE tbluser SET user_photo='$s' where user_id='$user'");
     if($sql)
     {
        header("location:../user/profile.php");
        //echo "<script>alert('file added!');</script>";
     }  
     else
     {
        echo mysqli_error($conn);
        echo "<script>alert('An error occured please try again later!!');</script>";
     }
    }

   }

   else
   {
    echo "<script>alert('nothing update');</script>";
    header("location:../user/profile.php");
   }
}