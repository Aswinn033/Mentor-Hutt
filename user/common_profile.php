<?php
include("config.php");
include("head.php");
//include("get_user.php");
include("get_common_user.php");
session_start();
//include("get_post.php");
?>
  <!-- ./nav -->

  <!-- main -->
  <main class="container">
    <div class="row">
      <div class="col-md-3">
        <!-- edit profile -->
       <!-- <div class="panel panel-default">
          <div class="panel-body">
            <h4>Edit profile</h4>
            <form method="post" action="edit_profile.php" enctype="multipart/form-data">
              <div class="form-group">
                <input class="form-control" type="text" name="status" placeholder="Status" value="">
              </div>

              <div class="form-group">
                <input class="form-control" type="text" name="location" placeholder="Location" value="">
              </div>

              <div class="form-group">
                <input class="form-control" type="file" name="photo" placeholder="Location" value="">
              </div>

              <div class="form-group">
                <input class="btn btn-primary" type="submit" name="btnsubmit" value="Save">
              </div>
            </form>
          </div>
        </div>
        <!-- ./edit profile -->
      </div>
      <div class="col-md-6">
        <!-- user profile -->
        <div class="media">
          <div class="media-left">
              <?php
              $check=$common_user_row['user_photo'];
              if($check)
              {
                $loc="user-".$uid.$common_user_row['user_photo']; 
              echo '<img src="../upload/user upload/'.$loc.'" class="media-object" style="width: 128px; height: 128px;">';
              }
              else
              {
                echo '<img src="../upload/user upload/def.jpg" class="media-object" style="width: 128px; height: 128px;">';  
              }
            ?>
          </div>
          <div class="media-body">
            <h2 class="media-heading"><?php echo $common_user_row['first_name']; echo " "; echo $common_user_row['last_name'];?> </h2>
            <p>Status: <?php echo $common_data_row['status'];?></p><br><p> Location: <?php echo $common_data_row['location'];?>,&nbsp; Badge: <?php echo $common_data_row['badge'];?></p>
        
        <?php
        $me=$_SESSION['userid'];
        if($uid!=$me)
        {
            echo '<p><a href="connect.php?id='.$uid.'">[connect]</a></p>';
        }  
        ?> 
          </div>
        </div>
        <!-- user profile -->

        <hr>

        <!-- timeline -->
        <div>
          <!-- post -->
          <?php
            $u=$_GET['id'];
            $feed=mysqli_query($conn,"select * from user_post where user_id='$u'");
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
              <span>posted on <?php echo $feed_row['date'];?></span> 

              <?php 
              $pid=$feed_row['post_id'];
              $like_fetch=mysqli_query($conn,"select count(like_id) as likes from tbl_like where post_id='$pid'");
              $like_row=mysqli_fetch_array($like_fetch);
              ?>
              <span class="pull-right"><a class="text-danger" href="#">Delete </a></span>
              <span class="pull-right"><a class="text-danger" href="like.php?pid=<?php echo $pid;?>">Like(<?php echo $like_row['likes'];?>)&nbsp;</a></span>
              <span class="pull-right"><a class="text-danger" href="view_post.php?pid=<?php echo $pid;?>">View &nbsp;</a></span>
            </div>
          </div>
          <?php
            }
            ?>
          <!-- ./post -->
        </div>
        <!-- ./timeline -->
      </div>
      <div class="col-md-3">
        <!-- friends -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>Friends</h4>
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