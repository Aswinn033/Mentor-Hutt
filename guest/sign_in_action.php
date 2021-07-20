<?php
include("config.php");
session_start();
if (isset($_POST['btnsubmit']))
{
  $email=strip_tags($_POST['email']);
  $hash=md5($_POST['password']);
  $query=mysqli_query($conn,"select * from tbluser where email='$email' and password='$hash'");
  $row=mysqli_fetch_array($query);
  if($row>0)
  {
    $_SESSION["userid"]=$row["user_id"];
    $stat=mysqli_query($conn,"update tbluser set is_active=1 where email='$email'");
    if($stat)
    echo "<script>window.location='../user/user_home.php'</script>";
    else
    die(mysqli_error($conn));

  }
  else {
    die(mysqli_error($conn));
  }
}
 ?>
