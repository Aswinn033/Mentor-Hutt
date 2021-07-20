<?php
include("config.php");
session_start();
$to_user=$_GET['id'];
$from_user=$_SESSION['userid'];
$check=mysqli_query($conn,"select * from tbl_connection where to_user='$to_user' and from_user='$from_user'");
if(mysqli_fetch_array($check)>0){
    header("location:../user/common_profile.php?id=".$to_user);
}
else{
$sql=mysqli_query($conn,"insert into tbl_connection(to_user,from_user)values('$to_user','$from_user')");
if($sql){
    $noti=mysqli_query($conn,"insert into tbl_notification(destination_id,notification)values('$from_user','you have a new connection request')");
    header("location:../user/common_profile.php?id=".$to_user);
}
else{
    die(mysqli_error($conn));
}
}
?>