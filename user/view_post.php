<?php
include("config.php");
include("head.php");
include("get_user.php");
?>

<main class="container">

<div>
          <!-- post -->
          <?php
            $post=$_GET['pid'];
            $_SESSION['post']=$post;
            $feed=mysqli_query($conn,"select * from user_post where post_id='$post'");
            while($feed_row=mysqli_fetch_array($feed)){
            $uid=$feed_row['user_id'];
            $fetch_user=mysqli_query($conn,"select first_name,last_name,user_photo from tbluser where user_id='$uid'");
            $u_row=mysqli_fetch_array($fetch_user);
          ?>
          <div class="panel panel-default">
         
            <div class="panel-body">
              <p><?php echo $feed_row['post_content'];?></p>
            </div>
            <div class="panel-footer">
              <span>posted on <?php echo $feed_row['date'];?> by <?php echo $u_row['first_name']; echo " "; echo $u_row['last_name'];?></span> 

              <?php 
              $pid=$feed_row['post_id'];
              $like_fetch=mysqli_query($conn,"select count(like_id) as likes from tbl_like where post_id='$pid'");
              $like_row=mysqli_fetch_array($like_fetch);
              ?>

            </div>
            </div>
            <?php
            }
            ?>

<form method="post" action="comment.php">
          <div class="input-group">
            <input class="form-control" type="text" name="comment" placeholder="Add a comment...">
            <span class="input-group-btn">
              <button class="btn btn-success" type="submit" name="btnsubmit">Comment</button>
            </span>
          </div>
        </form><hr>


        <?php
        $get_comment=mysqli_query($conn,"select * from comment where post_id='$post' order by comment_id desc");
        while($comment_row=mysqli_fetch_array($get_comment))
        {
          $commentor=$comment_row['user_id'];
          $get_commentor=mysqli_query($conn,"select first_name,last_name from tbluser where user_id='$commentor'");
          $commentor_row=mysqli_fetch_array($get_commentor);
        ?>
        <div class="panel panel-default">
         
            <div class="panel-body">
              <p><?php echo $comment_row['comment'];?></p>
            </div>
            <div class="panel-footer">
              <span>By <?php echo $commentor_row['first_name']; echo " "; echo $commentor_row['last_name'];?></span> 

              
            </div>
            </div>
            <?php
        }
        ?>
    
    </main>
    <!-- ./main -->
  
    <!-- footer -->
    <footer class="container text-center">
      <ul class="nav nav-pills pull-right">
        <li>FaceClone - Made by [your name here]</li>
      </ul>
    </footer>
    <!-- ./footer -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </body>
  </html>