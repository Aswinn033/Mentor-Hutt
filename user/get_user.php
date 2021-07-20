<?php
session_start();
$user=$_SESSION['userid'];
$sql=mysqli_query($conn,"select first_name,last_name,user_photo from tbluser where user_id='$user'");
$sql1=mysqli_query($conn,"select location,status,badge from user_data where user_id='$user'");
if($sql){
    if($sql1){
       $data_row=mysqli_fetch_array($sql1);
       $user_row=mysqli_fetch_array($sql);
    }
}
else{
    die(mysqli_error($conn));
}