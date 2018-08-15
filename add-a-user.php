<?php
require_once("includes/validate_credentials.php");
$message ='';
if (isset($_POST['newusr'])) {
	if($_POST['fname'] == "" || $_POST['lname'] == ""  || $_POST['email'] == "" || $_POST['password'] == "" || $_POST['level'] == ""){
		$message="<span style='color:red;'>Please fill out all required  the form data</span>";
	}else{
		$gender = $_POST['gender'];
		$level = $_POST['level'];
		$fname = htmlentities($database->escape_value($_POST['fname']));
		$lname = htmlentities($database->escape_value($_POST['lname']));
		$oname = htmlentities($database->escape_value($_POST['oname']));
		$job_position = htmlentities($database->escape_value($_POST['job_title']));
		$email = htmlentities($database->escape_value($_POST['email']));
		$address = htmlentities($database->escape_value($_POST['address']));
		$password = htmlentities($database->escape_value($_POST['password']));
		$password = md5($password);
		$phone = htmlentities($database->escape_value($_POST['phone']));
		$sql = "SELECT email FROM user WHERE email='$email' ";
        $query = $database->query($sql);
	    $found_email = $database->num_rows($query);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $message="<span style='color:red;'>Invalid email format</span>";
		}else if ($found_email >= 1){
	        $message ="<span style='color:red;'>Email entered  is in use by system</span>";
		} else if (is_numeric($fname[0]) || is_numeric($lname[0])){
	       $message= "<span style='color:red;'>Names can not begin with a number</span>";
	    } else {
			$sql = "INSERT INTO user(fname,lname,oname,job_position,email,password,address,phone,level,gender,date_created) VALUES('{$fname}','{$lname}','{$oname}','{$job_position}','{$email}','{$password}','{$address}','{$phone}','{$level}','{$gender}',NOW()) ";
			$database->query($sql);
			$user_id = $database->inset_id();
			//adding restriction to the user
			if(isset($_POST['Restricted'])){
			 $sql = "INSERT INTO users_view(user,viev) VALUES($user_id,'{$_POST['Restricted']}')";
	         $database->query($sql);	
			}
			if(isset($_POST['Confidential'])){
			 $sql = "INSERT INTO users_view(user,viev) VALUES($user_id,'{$_POST['Confidential']}')";
	         $database->query($sql);	
			}
			if(isset($_POST['Secret'])){
			 $sql = "INSERT INTO users_view(user,viev) VALUES($user_id,'{$_POST['Secret']}')";
	         $database->query($sql);	
			}
			if(isset($_POST['Top_secret'])){
			 $sql = "INSERT INTO users_view(user,viev) VALUES($user_id,'{$_POST['Top_secret']}')";
	         $database->query($sql);	
			}
			if(isset($_POST['None'])){
			 $sql = "INSERT INTO users_view(user,viev) VALUES($user_id,'{$_POST['None']}')";
	         $database->query($sql);	
			}
			$message="<span style='color:green;'>User added successfully </span>";
			$_POST ='';
	  }
	}
}
?>
<?php  include"includes/header.php" ?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 class="textarea">
          <!-- USER REGISTRATION -->
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Ongoing Operation</a></li>
          <li class="active">User Registration</li>
        </ol>
      </section>
    <!-- Main content -->
    <section class="content">

      <div class="row">
          <div class="box box-warning">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="panel-body">

                  <h4>How it's working?</h4>
                  <p>To register a user successfuly, you must fill all the field with a red star, after the registration you will receive a successful registration message to make sure the registration has been completed successfully.</p>
                  <hr>
                  <h4>Edit a user</h4>
                  <p>
                    If you want to edit a user please click on this button <br><br>
                    <a href="all-users.php" class="btn btn-info btn-xs">Edit user</a>
                  </p>

                </div>
                </div>
                <div class="col-md-8">
                  <div class="panel-body">
                    <form id="add_user" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" novalidate="novalidate">
                            <fieldset>
                              <div class="row">
                                <div class="form-group">
                                  <div class="col-md-6 col-sm-6">
                                    <label>First Name <span class="text-danger">*</span></label>
                                    <input type="text" name="fname" maxlength="255" value="<?php if (isset($_POST['fname'])) echo$_POST['fname'];?>" class="form-control required">
                                  </div>
                                  <div class="col-md-6 col-sm-6">
                                    <label>Last Name <span class="text-danger">*</span></label>
                                    <input type="text" name="lname" maxlength="255" value="<?php if (isset($_POST['lname'])) echo$_POST['lname'];?>" class="form-control required">
                                  </div>
                                </div>
                              </div>

                              <div class="row" style="margin-top: 7px">
                                <div class="form-group">
                                  <div class="col-md-12 col-sm-12">
                                    <label>Other name </label>
                                    <input type="text" name="oname" value="<?php if (isset($_POST['oname'])) echo$_POST['oname'];?>" maxlength="255" id="o_name" class="form-control ">
                                  </div>
                                </div>
                              </div>

                              <div class="row" style="margin-top: 7px">
                                <div class="form-group">
                                  <div class="col-md-6 col-sm-6">
                                    <label>Gender</label>
                                    <select name="gender" id="user_gn" class="form-control pointer required">
                                      <option value="">--- Select Gender---</option>
                                      <option <?php if(isset($_POST['gender']) && $_POST['gender'] == 'Male') echo "selected";?> value="Male">Male</option>
                                      <option <?php if(isset($_POST['gender']) && $_POST['Female'] == 'Female') echo "selected";?> value="Female">Female</option>                             
                                   </select>
                                  </div>
                                  <div class="col-md-6 col-sm-6">
                                    <label>Job Position <span class="text-danger">*</span></label>
                                    <input type="text" name="job_title" maxlength="255" value="<?php if (isset($_POST['job_title'])) echo$_POST['job_title'];?>" id="job_title" class="form-control required">
                                  </div>
                                </div>
                              </div>
                              <div class="row" style="margin-top: 7px">
                                <div class="form-group">
                                  <div class="col-md-6 col-sm-6">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="user_email" maxlength="100" value="<?php if (isset($_POST['email'])) echo$_POST['email'];?>" class="form-control nbrs required">
                                  </div>
                                  <div class="col-md-6 col-sm-6">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input type="text" name="password" maxlength="100" value="<?php if (isset($_POST['password'])) echo$_POST['password'];?>" id="password" class="form-control required">
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row" style="margin-top: 7px">
                                <div class="form-group">
                                  <div class="col-md-6 col-sm-6">
                                    <label>Phone Number </label>
                                    <input type="text" name="phone" id="user_phone" maxlength="15" value="<?php if (isset($_POST['phone'])) echo$_POST['phone'];?>" class="form-control nbrs required">
                 
                                  </div>
                                  <div class="col-md-6 col-sm-6">
                                    <label>Address (Location)</label>
                                    <input type="text" name="address" maxlength="255" value="<?php if (isset($_POST['address'])) echo$_POST['address'];?>" id="user_add"  class="form-control required">                          
                                  </div>
                                </div>
                              </div>
                              <div class="row" style="margin-top: 7px">
                                <div class="form-group">
                                  <div class="col-md-12 col-sm-6">
                                    <label>Department <span class="text-danger">*</span></label>
                                    <select name="level" id="user_departemt" onchange="toggleTitle('user_departemt')" class="form-control pointer required">
                                      <option value="">--- Select department ---</option>
                                      <option <?php if(isset($_POST['level']) && $_POST['level'] == 'DGIE') echo "selected";?> value="DGIE">DGIE</option>
                                      <option <?php if(isset($_POST['level']) && $_POST['level'] == 'DGIIS') echo "selected";?> value="DGIIS">DGIIS</option>
                                      <option <?php if(isset($_POST['level']) && $_POST['level'] == 'DGEIS') echo "selected";?> value="DGEIS">DGEIS</option>
                                      <option <?php if(isset($_POST['level']) && $_POST['level'] == 'DGAF') echo "selected";?> value="DGAF">DGAF</option>
                                      <option <?php if(isset($_POST['level']) && $_POST['level'] == 'NIA') echo "selected";?> value="NIA">NIA</option>
                                      <option <?php if(isset($_POST['level']) && $_POST['level'] == 'HQ') echo "selected";?> value="HQ">HQ</option>
                                      <option <?php if(isset($_POST['level']) && $_POST['level'] == 'Admin') echo "selected";?> value="Admin">Admin</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row" id="user_post_hq" style="margin-top: 7px; display: none;" >
                                <div class="form-group">
                                  <div class="col-md-12 col-sm-6">
                                    <label>Post <span class="text-danger">*</span></label>
                                    <select name="accesslevel" id="user_post_hqq" class="form-control pointer required">
                                      <option value="">--- Select access level ---</option>
                                      <option <?php if(isset($_POST['accesslevel']) && $_POST['accesslevel'] == 'SG') echo "selected";?> value="SG">SG</option>
                                      <option <?php if(isset($_POST['accesslevel']) && $_POST['accesslevel'] == 'AD-SG') echo "selected";?> value="AD-SG">AD-SG</option>
                                      <option <?php if(isset($_POST['accesslevel']) && $_POST['accesslevel'] == 'D/Analysis') echo "selected";?> value="D/Analysis">D/Analysis</option>
                                      <option <?php if(isset($_POST['accesslevel']) && $_POST['accesslevel'] == 'D/Sp Ops') echo "selected";?> value="D/Sp Ops">D/Sp Ops</option>
                                      <option <?php if(isset($_POST['accesslevel']) && $_POST['accesslevel'] == 'D/ST') echo "selected";?> value="D/ST">D/ST</option>
                                      <option <?php if(isset($_POST['accesslevel']) && $_POST['accesslevel'] == 'Desk1') echo "selected";?> value="Desk1">Desk Analysis 1</option>
                                      <option <?php if(isset($_POST['accesslevel']) && $_POST['accesslevel'] == 'Desk2') echo "selected";?> value="Desk2">Desk Analysis 2</option>
                                      <option <?php if(isset($_POST['accesslevel']) && $_POST['accesslevel'] == 'Desk3') echo "selected";?> value="Desk3">Desk Analysis 3</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
							  
							  <div class="row" id="user_post" style="margin-top: 7px;display: none;">
                                <div class="form-group">
                                  <div class="col-md-12 col-sm-6">
                                    <label>Post <span class="text-danger">*</span></label>
                                    <select name="accesslevel" id="user_postt" class="form-control pointer required">
                                      <option value="">--- Select access level ---</option>
                                      <option <?php if(isset($_POST['accesslevel']) && $_POST['accesslevel'] == 'DG') echo "selected";?> value="DG">DG</option>
                                       <option <?php if(isset($_POST['accesslevel']) && $_POST['accesslevel'] == 'DO') echo "selected";?> value="DO">Adviser</option>
                                      <option <?php if(isset($_POST['accesslevel']) && $_POST['accesslevel'] == 'DO') echo "selected";?> value="DO">DO</option>
                                      <option <?php if(isset($_POST['accesslevel']) && $_POST['accesslevel'] == 'DA') echo "selected";?> value="DA">DA</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row" style="margin-top: 7px">
                                <div class="form-group">
                                  <div class="col-md-12 col-sm-6">
                                    <label>Information access levels</label><br />
                                        <input name="Restricted"  value="Restricted"  type='checkbox'/><span>Restricted</span><br />
                                        <input name="Confidential"  value="Confidential" type='checkbox'/><span>Confidential</span><br />
                                        <input name="Secret" value="Secret"  type='checkbox'/><span>Secret</span><br />
                                        <input name="Top_secret" value="Top secret"  type='checkbox'/><span>Top secret</span><br />
                                        <input name="None"  value="None"  type='checkbox'/><span>None</span><br />
                                  </div>
                                </div>
                              </div>
                            </fieldset>
                            
                            <hr>
                            <div class="row">
                              <div class="col-md-12">
                                <button type="submit" class="btn btn-3d btn-warning btn-xlg btn-block" name="newusr">
                                  CREATE USER
                                </button>
                              </div>
                            </div>
                            <p><?php echo $message; ?></p>
                          </form>
                        </div>  
                </div>
              </div>  
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