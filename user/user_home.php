<?php
include("config.php");
include("head.php");
include("get_user.php");
//include("get_post.php");
?>
  <!-- ./nav -->

  <!-- main -->
  <main class="container">
    <div class="row">
      <div class="col-md-3">
        <!-- profile brief -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>Welcome <?php echo $user_row['first_name'];?></h4>
            <p>This website is still under construction. Please report bugs and crashes..</p>
          </div>
        </div>
        <!-- ./profile brief -->

        <!-- friend requests -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>friend requests</h4>
            <ul>
              <li>
                <a href="#">johndoe</a> 
                <a class="text-success" href="#">[accept]</a> 
                <a class="text-danger" href="#">[decline]</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- ./friend requests -->
      </div>
      <div class="col-md-6">
        <!-- post form -->
        <form method="post" action="post.php">
          <div class="input-group">
            <input class="form-control" type="text" name="content" placeholder="Make a post...">
            <span class="input-group-btn">
              <button class="btn btn-success" type="submit" name="btnsubmit">Post</button>
            </span>
          </div>
        </form><hr>
        <!-- ./post form -->

        <!-- feed -->
        <div>
          <!-- post -->
          <?php
            $user=$_SESSION['userid'];
            $feed=mysqli_query($conn,"select * from user_post order by date desc ");
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
              <span>posted on <?php echo $feed_row['date'];?> by <a href="common_profile.php?id=<?php echo $uid;?>"><?php echo $u_row['first_name']; echo " "; echo $u_row['last_name'];?></span> 

              <?php 
              $pid=$feed_row['post_id'];
              $like_fetch=mysqli_query($conn,"select count(like_id) as likes from tbl_like where post_id='$pid'");
              $like_row=mysqli_fetch_array($like_fetch);
              ?>

              <span class="pull-right"><a class="text-danger" href="like.php?pid=<?php echo $pid;?>">Like(<?php echo $like_row['likes'];?>)</a></span>
              <span class="pull-right"><a class="text-danger" href="view_post.php?pid=<?php echo $pid;?>">View</a></span>
            </div>
          </div>
          <?php
 }
 ?>
          <!-- ./post -->
        </div>
        <!-- ./feed -->
      </div>
      <div class="col-md-3">
      <!-- add friend -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>add friend</h4>
            <ul>
              <li>
                <a href="#">alberte</a> 
                <a href="#">[add]</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- ./add friend -->

        <!-- friends -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>friends</h4>
            <ul>
              <li>
                <a href="#">peterpan</a> 
                <a class="text-danger" href="#">[unfriend]</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- ./friends -->
      </div>
    </div>
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