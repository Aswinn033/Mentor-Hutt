<?php
include("config.php");
session_start();
if(isset($_POST[btnsubmit])){

    $user=$_SESSION['userid'];
    $post=$_SESSION['post'];
    $comment=strip_tags($_POST['comment']);
    $sql=mysqli_query($conn,"insert into comment(user_id,post_id,comment)values('$user','$post','$comment')");
    if($sql)
    {
        header("location:../user/view_post.php?pid=".$post);
    }
    else
    {
        die(mysqli_error($conn));
    }
}
?>