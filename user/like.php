<?php
include("config.php");
session_start();
$userid=$_SESSION['userid'];
$postid=$_GET['pid'];
$like_check=mysqli_query($conn,"select like_id from tbl_like where user_id='$userid' and post_id='$postid'");
if(mysqli_fetch_array($like_check)>0)
{
    header("location:../user/user_home.php");
}
else
{
$like_query=mysqli_query($conn,"insert into tbl_like(user_id,post_id)values('$userid','$postid')");
if($like_query)
{
    header("location:../user/user_home.php");
}
else
{
    die(mysqli_error($conn));
}
}
?>