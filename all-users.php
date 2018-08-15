<?php require_once("includes/validate_credentials.php"); ?>
<?php  include"includes/header.php" ?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 class="textarea">
          All USERS
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Ongoing Operation</a></li>
          <li class="active">All Users</li>
        </ol>
      </section>

            <!-- Main content -->
    <section class="content">

      <div class="row">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Full Names</th>
                  <th>Telephone No.</th>
                  <th>Eamil</th>
                  <th>Department</th>
                  <th>View User</th>
                  <th>Edit User</th>
                  <th>Delete User</th>
                </tr>
                </thead>
                <tbody>
                	
                	<?php
                	 $sql = "SELECT * FROM user  ORDER BY id ASC";
					$query = $database->query($sql);
					$i=0;
					 while ($users = $database->fetch_array($query)) {
				 	echo '
					 <tr>
	                  <td>'. $users['fname'].' '.$users['lname'].'</td>
	                  <td>'. $users['phone'].'</td>
	                  <td>'. $users['email'].'</td>
	                  <td>'. $users['level'].'</td>
	                  <td><button class="label label-lg label-primary"  data-toggle="modal" data-target="#myModal">View user</button></td>
	                  <td><button class="label label-sm label-success" data-toggle="modal" data-target="#myModal">Edit user</button></td>
	                  <td><button class="label label-sm label-danger" data-toggle="modal" data-target="#myModal">Delete user</button></td>
	                </tr>
				 	';
				   }
                	
                	?>
                	

                               
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
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