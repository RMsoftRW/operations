<?php require_once("includes/validate_credentials.php"); ?>
<?php  include"includes/header.php" ?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 class="textarea">
          <small class="external-event bg-green ui-draggable ui-draggable-handle">SEARCH A GROUP</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Ongoing Operation</a></li>
          <li class="active">Search a group</li>
        </ol>
      </section>

            <!-- Main content -->
    <section class="content">
      <div class="row text-center" style="color: #87a4b4;">
        <h1><b>SEARCH A GROUP</b></h1>
        <span class="text-muted">Type in the seach field a groupe name <br> to see it general profile.</span>
      </div>
      <div class="row" style="margin: 20px 0 0px 0">
        <div class="box"> 
        <form>
          <!-- <div class="col-md-12"> -->
          <input type="text" class="form-control" name="search_profile" placeholder="Search a group member here by name" style="height: 50px">
          <!-- </div> -->
        </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Group Members</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">8 Members</span>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <li>
                      <img src="assets/img/user.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Alexander Pierce</a>
                      <span class="users-list-date">CEO</span>
                    </li>
                    <li>
                      <img src="assets/img/user.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Alexander Pierce</a>
                      <span class="users-list-date">Chairman</span>
                    </li>
                    <li>
                      <img src="assets/img/user.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Alexander Pierce</a>
                      <span class="users-list-date">Public relation</span>
                    </li>
                    <li>
                      <img src="assets/img/user.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Alexander Pierce</a>
                      <span class="users-list-date">Marketing</span>
                    </li>
                    <li>
                      <img src="assets/img/user.jpg" alt="User Image">
                      <a class="users-list-name" href="#">Norman</a>
                      <span class="users-list-date">Manager</span>
                    </li>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <ul class="pagination list-inline pagination-sm no-margin">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                    <li class="pull-left"><a href="#"> General Profile</a></li>
                  </ul>
                </div>
                <!-- /.box-footer -->
              </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        
      </div>

    </section>
    <!-- /.content -->
      
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
 <?php  include"includes/footer.php" ?>