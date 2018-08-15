<?php 
require_once("includes/validate_credentials.php");
if (isset($_GET['op_u']) && is_numeric($_GET['op_u'])) {
	$postuser  = $database->fetch_array($database->query("SELECT * FROM user WHERE id ='{$_GET['op_u']}' LIMIT 1 "));
}
?>
<?php  include"includes/header.php" ?>
 <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 class="textarea">
            <!-- Ongoing Operations -->
          <small class="" ></small>
        </h1>
        <ol class="breadcrumb hidden-xs">
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Ongoing Operations</a></li>
        </ol>
      </section>

            <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="assets/img/user.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $postuser['fname'].' '.$postuser['lname'];?></h3>
              <p class="text-muted text-center"><?php echo $postuser['job_position'];?></p>
              <a href="#" class="btn btn-primary btn-block"><b>Send a message</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <!-- <li class="active"><a href="#activity" data-toggle="tab">Activities</a></li>
              <li><a href="#timeline" data-toggle="tab">My Posts</a></li>
              <li class="hidden-xs"><a href="#newOperation" data-toggle="tab">Add a new operation</a></li> -->
              <li class="active"><a href="#gprofile" data-toggle="tab">General Profile</a></li>
              <!-- <li class="hidden-xs"><a href="#Password" data-toggle="tab">Change your Password</a></li> -->
            </ul>
            <div class="tab-content">
              <!-- My profile-Pane -->
              <div class="active tab-pane" id="gprofile" style="padding: 20px">
                <table class="table table-striped">
                    <tbody>
                    <tr>  
                      <td><b>Names</b></td>
                      <td><?php echo $postuser['fname'].' '.$postuser['lname'];?></td>
                    </tr>
                    <tr>
                      <td><b>Gender</b></td>
                      <td><?php echo $postuser['gender'];?></td>
                    </tr>
                    <tr>
                      <td><b>Email</b></td>
                      <td><?php echo $postuser['email'];?></td>
                    </tr>
                    <tr>
                      <td><b>Telephone No.</b></td>
                      <td><?php echo $postuser['phone'];?></td>
                    </tr>
                    <tr>
                      <td><b>Address</b></td>
                      <td><?php echo $postuser['address'];?> </td>
                    </tr>
                    <tr>
                      <td><b>Job Position</b></td>
                      <td><?php echo $postuser['job_position'];?></td>
                    </tr>
                    <tr>
                      <td><b>Department</b></td>
                      <td><?php echo $postuser['level'];?></td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.End of my profile-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
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
 