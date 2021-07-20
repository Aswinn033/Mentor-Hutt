<?php
//session_start();
$uid=$_GET['id'];
$c_sql=mysqli_query($conn,"select first_name,last_name,user_photo from tbluser where user_id='$uid'");
$c_sql1=mysqli_query($conn,"select location,status,badge from user_data where user_id='$uid'");
if($c_sql){
    if($c_sql1){
       $common_data_row=mysqli_fetch_array($c_sql1);
       $common_user_row=mysqli_fetch_array($c_sql);
    }
}
else{
    die(mysqli_error($conn));
}