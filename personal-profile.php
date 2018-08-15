<?php require_once("includes/validate_credentials.php"); ?>
<?php  include"includes/header.php" ?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 class="textarea">
          <small class="external-event bg-green ui-draggable ui-draggable-handle">GENERAL PROFILE</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Ongoing Operation</a></li>
          <li class="active">General profile</li>
        </ol>
      </section>

            <!-- Main content -->
    <section class="content">
      <div class="row text-center" style="color: #87a4b4;">
        <h1><b>SEARCH A MEMBER</b></h1>
        <span class="text-muted">Type in the seach field a name or a telephone number of a member <br> to see her/his general profile.</span>
      </div>
      <div class="row" style="margin: 20px 0 0px 0">
        <div class="box"> 
        <form>
          <!-- <div class="col-md-12"> -->
          <input type="text" class="form-control" name="search_profile" placeholder="Search a member here by names or telephone number" style="height: 50px">
          <!-- </div> -->
        </form>
        </div>
      </div>

      <div class="row">
        
        <div class="col-md-3 text-center">
            <div class="box box-primary padding-top-10">     
              <img src="assets/img/user.jpg" class="img img-circle img-bordered-sm " alt="User Image">
              <a class="users-list-name" href="general-profile.php">John Doe</a>
              <span class="users-list-date">Marketing Officer</span>
                <div class="box-footer text-center">
                  <a href="general-profile.php" id="viewAll" class="uppercase">View General Profile</a>
                </div>
                <!-- /.box-footer -->
              </div>
        </div>
        <!-- /.col -->
        <div class="col-md-3 text-center">
            <div class="box box-primary padding-top-10">     
              <img src="assets/img/user.jpg" class="img img-circle img-bordered-sm " alt="User Image">
              <a class="users-list-name" href="general-profile.php">M. Amudala Eric</a>
              <span class="users-list-date">System Administrator</span>
                <div class="box-footer text-center">
                  <a href="general-profile.php" id="viewAll" class="uppercase">View General Profile</a>
                </div>
                <!-- /.box-footer -->
              </div>
        </div>
        <!-- /.col -->
        <div class="col-md-3 text-center">
            <div class="box box-primary padding-top-10">     
              <img src="assets/img/user.jpg" class="img img-circle img-bordered-sm " alt="User Image">
              <a class="users-list-name" href="general-profile.php">John Weeck</a>
              <span class="users-list-date">Contract Dealer</span>
                <div class="box-footer text-center">
                  <a href="general-profile.php" id="viewAll" class="uppercase">View General Profile</a>
                </div>
                <!-- /.box-footer -->
              </div>
        </div>
        <!-- /.col -->
        <div class="col-md-3 text-center">
            <div class="box box-primary padding-top-10">     
              <img src="assets/img/user.jpg" class="img img-circle img-bordered-sm " alt="User Image">
              <a class="users-list-name" href="general-profile.php">Karim Benzema</a>
              <span class="users-list-date">CEO</span>
                <div class="box-footer text-center">
                  <a href="general-profile.php" id="viewAll" class="uppercase">View General Profile</a>
                </div>
                <!-- /.box-footer -->
              </div>
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