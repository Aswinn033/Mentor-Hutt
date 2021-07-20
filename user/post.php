<?php
include("config.php");
session_start();
if(isset($_POST['btnsubmit']))
{
    $user=$_SESSION['userid'];
    //echo $user;
    $content=strip_tags($_POST['content']);
    $sql=mysqli_query($conn,"insert into user_post(user_id,post_content)values('$user','$content')");
    if($sql)
    {
        header("location:../user/user_home.php");
    }
    else
    {
        die(mysqli_error($conn));
    }
}