<?php
include("config.php");
if (isset($_POST['btnsubmit']))
{
  $firstname=strip_tags($_POST['firstname']);
  $lastname=strip_tags($_POST['lastname']);
  $email=strip_tags($_POST['email']);
  $hash=md5($_POST['password']);
  $query=mysqli_query($conn,"insert into tbluser(first_name,last_name,email,password)values('$firstname','$lastname','$email','$hash')");
  if($query)
  {
    echo "<script>alert('registerd succesfully, Please login now.');window.location='index1.html'</script>";
  }
  else {
    die(mysqli_error($conn));
  }
}
 ?>
