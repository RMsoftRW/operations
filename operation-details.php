<?php 
require_once("includes/validate_credentials.php");
$oper = 0;
if (isset($_GET['op']) && is_numeric($_GET['op'])) {
	$oper = $_GET['op'];
}
if (isset($_POST['op']) && is_numeric($_POST['op'])) {
	$oper = $_POST['op'];
	$comment = htmlentities($database->escape_value($_POST['comments']));
	$sql = "INSERT INTO comments(operation,user,comment,time) VALUES('{$oper}','{$_SESSION["id"]}','{$comment}',NOW()) ";
    $database->query($sql);
}
	$sql = "SELECT * FROM operations WHERE id ='{$oper}' LIMIT 1";
	$query = $database->query($sql);
	$postdata = $database->fetch_array($query);
	$details = nl2br($postdata['details']);
	$remarks = nl2br($postdata['remarks']);
	$postuser  = $database->fetch_array($database->query("SELECT id,fname,lname,job_position FROM user WHERE id ='{$postdata['user']}' LIMIT 1 "));

?>
<?php  include"includes/header.php" ?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 class="textarea">
          <!-- User Registration -->
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Ongoing Operation</a></li>
          <li class="active"><?php echo $postdata['title'];?></li>
        </ol>
      </section>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-9">
        <div class="box box-widget" style="padding: 20px">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle img-bordered-sm" src="assets/img/user.jpg" alt="user image">
                <span class="username"><a href="#"><?php echo $postdata['title'];?></a></span>
                <span class="description">Ongoing operation posted on <?php echo $postdata['time'];?></span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->
                  <?php echo $details;?>
                <br>

              <!-- Social sharing buttons -->
              <ul class="list-inline">
              	<?php
              	   if(strtolower($postdata['fext'] == 'mp3')){
						echo '
                    <li><span class="label label-lg ">
					<audio controls>
					  <source src="audios/'.$postdata['attachment'].'" type="audio/mpeg">
					  Your browser does not support the audio element.
					</audio>
                    </span></li>';
					}else if ($postdata['fext'] !='') {
						
					 echo ' <li><a href="audios/'.$postdata['attachment'].'" class="link-black text-sm"><span class="label label-lg label-primary"><b>DOWNLOAD ATTACHMENT</b></span></a></li>';
					} 

              	?>
                    <li class="pull-right" id="com1">
                      <a class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (0)</a></li>
               </ul>     
              
            </div>
            <!-- /.box-body -->
            
            
            
      
            <div class="item" id="com_area" style="display: none;">
                  <div class="box box-success" style="border-top: none;">
                    <div class="box-body chat" id="chat-box">
                      <!-- chat item -->
                      <div class="item" style="background-color: #f4f4f4;border-radius: 3px;padding: 10px;margin-top: 5px">
                        <img class="img-circle" alt="user image" src="assets/img/user.jpg">

                        <p class="message">
                          <a class="name" href="#">
                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                            User One
                          </a>
                          Waiting for more comment to be posted.
                        </p>
                      </div>
                    </div>
                    <!-- /.chat -->
                  </div>
              </div>
              
              
            <!-- /.box-footer -->
            <div class="box-footer">
               <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <!-- <img class="img-responsive img-circle img-sm hidden-sx" src="assets/img/user.jpg" alt="Alt Text"> -->
                <div class="form-group margin-bottom-none">
                  <div class="col-sm-5">
                    <input name="comments" class="form-control input-sm" placeholder="Add comment">
                  </div>
                  <div class="col-sm-4">
                  	<input type="hidden" name="op" value="<?php echo $oper; ?>" />
                      <div class="fancy-file-upload fancy-file-info">
                        <i class="fa fa-upload"></i>
                        <input type="file" class="form-control" onchange="jQuery(this).next('input').val(this.value);">
                        <input type="text" class="form-control required" id="user_pic" name="user_pic" placeholder="no file selected" readonly="">
                        <span class="button">Choose File</span>
                      </div>
                  </div>
                  <div class="col-sm-3">
                    <button type="submit" class="btn btn-success pull-right btn-block btn-sm">Comment</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.box-footer -->
          </div>
      </div>
        <!-- /.col -->
    <div class="col-md-3">
      <div class="box box-solid box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Recommended Actions</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"> <?php echo $remarks;?> </li>
                <!-- <li><a href="#"><i class="fa fa-filter"></i><strong>Attachment</strong> <span class="label label-warning pull-right">Download Attachment</span></a>
                </li> -->
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
		  
          <div class="box box-solid box-primary text-center">
            <div class="box-header with-border">
              <h3 class="box-title">Posted by</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
              <!--<img class="profile-user-img img-responsive img-circle" src="assets/img/user.jpg" alt="User profile picture"> -->

              <h4 class="profile-username text-center" style='margin-top:-5px;'><?php echo $postuser['fname'].' '.$postuser['lname'];?></h4>
              <p class="text-muted text-center" style='margin-top:-10px;margin-bottom:-2px;'><?php echo $postuser['job_position'];?></p>
			  <a href="general-profile?op_u=<?php echo $postuser['id'];?>" class="link-black text-sm"><span class="label label-lg label-success"><b>Visit Profile</b></span></a>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
    </div>
  </div>
      <!-- /.row -->

        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
      
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
 <?php  include"includes/footer.php" ?>
