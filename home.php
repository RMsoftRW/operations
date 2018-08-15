<?php require_once("includes/validate_credentials.php"); ?>
<?php
if (isset($_POST['newop'])) {
	if($_POST['otitle'] == "" || $_POST['odetails'] == "" || $_POST['classification'] ==""){
		$message="<span style='color:red;'>Please fill out all required  the form data</span>";
	}else{
		$otitle = htmlentities($database->escape_value($_POST['otitle']));
		$odetails = htmlentities($database->escape_value($_POST['odetails']));
		$oremarks = htmlentities($database->escape_value($_POST['oremark']));
		$sql = "INSERT INTO operations(title,details,remarks,classification,user,poster_level,time) VALUES('{$otitle}','{$odetails}','{$oremarks}','{$_POST['classification']}',{$_SESSION["id"]},'{$_SESSION["level"]}',NOW()) ";
		$database->query($sql);
		$post_id = $database->inset_id();
		//for attachment 
		if (isset($_FILES['ofile']) && !empty($_FILES['ofile'])){
         ///////
		  $message;
		  $file = $_FILES['ofile'];
		  $db_file_name = basename($file['name']);
		  $ext = explode(".", $db_file_name);
		  $fileExt = end($ext);
		  //if ($fileExt == "docx" || $fileExt == "pdf") {	
			// $sql = "SELECT photo 
			// FROM diplomats WHERE id={$_POST['diplomat']} LIMIT 1 ";
			// $query = $database->query($sql);
			// $row = $database->fetch_array($query);
			// if (!empty($row['photo'])) {
			  // $path  = "uploads/".$row['photo'];
			  // unlink($path);
			// }
			$upload_errors = array(
			// http://www.php.net/manual/en/features.file-upload.errors.php
			  UPLOAD_ERR_OK 				=> "No errors.",
			  UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
			  UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
			  UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
			  UPLOAD_ERR_NO_FILE 		=> "No file.",
			  UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
			  UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
			  UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."	  
			);
			if (!$file || empty($file) || !is_array($file)){
			$messages = "No file was attached";
			} else if($file["error"] != 0){
			$messages = $upload_errors[$file["error"]];
			}
			else if($file["error"] == 0){
			$size = $file['size'];
			$type = $file['type'];
			$temp_name = $file['tmp_name'];
			$db_file_name = basename($file['name']);
			$ext = explode(".", $db_file_name);
			$fileExt =end($ext);
			$taget_file = $post_id.'-'.rand_string(20).".".$fileExt;
			$sql = "UPDATE operations SET  attachment ='{$taget_file}',fext='$fileExt' WHERE id ='$taget_file' LIMIT 1"; 
			$query = $database->query($sql);
			$afected = $database->inset_id();
			$path  = "audios/".$taget_file;
			if(move_uploaded_file($temp_name,$path) && ($afected >=1)){     
			  //$messages = "<span style='color:green;'>Done</span>";
			}else
			  $message = "<span style='color:red;'>Erros occur!</span>";
			}
		    //}else{
			// $message = "<span style='color:red;'>File format is not allowed. $db_file_name</span>";
		 // }
      ////
   }
	    //attachment ends here
		$message="<span style='color:green;'>User added successfully </span>";
		$_POST ='';
	}
}

if (isset($_POST['newstrep'])){
	if($_POST['s_subject'] == "" || $_POST['s_details'] == "" || $_POST['classification'] =="" || $_POST['category'] ==""){
		$message="<span style='color:red;'>Please fill out all required  the form data</span>";
	}else{
		$subject = htmlentities($database->escape_value($_POST['s_subject']));
		$s_details = htmlentities($database->escape_value($_POST['s_details']));
		$s_remarks = htmlentities($database->escape_value($_POST['s_remark']));
		$sql = "INSERT INTO operations(title,details,remarks,classification,category,user,poster_level,time) VALUES('{$subject}','{$s_details}','{$s_remarks}','{$_POST['classification']}','{$_POST['category']}',{$_SESSION["id"]},'{$_SESSION["level"]}',NOW()) ";
		$database->query($sql);
		$post_id = $database->inset_id();
		//for attachment 
		if (isset($_FILES['sfile']) && !empty($_FILES['sfile'])){
         ///////
		  $message;
		  $file = $_FILES['sfile'];
		  $db_file_name = basename($file['name']);
		  $ext = explode(".", $db_file_name);
		  $fileExt = end($ext);
		  //if ($fileExt == "docx" || $fileExt == "pdf") {	
			// $sql = "SELECT photo 
			// FROM diplomats WHERE id={$_POST['diplomat']} LIMIT 1 ";
			// $query = $database->query($sql);
			// $row = $database->fetch_array($query);
			// if (!empty($row['photo'])) {
			  // $path  = "uploads/".$row['photo'];
			  // unlink($path);
			// }
			$upload_errors = array(
			// http://www.php.net/manual/en/features.file-upload.errors.php
			  UPLOAD_ERR_OK 				=> "No errors.",
			  UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
			  UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
			  UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
			  UPLOAD_ERR_NO_FILE 		=> "No file.",
			  UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
			  UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
			  UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."	  
			);
			if (!$file || empty($file) || !is_array($file)){
			$messages = "No file was attached";
			} else if($file["error"] != 0){
			$messages = $upload_errors[$file["error"]];
			}
			else if($file["error"] == 0){
			$size = $file['size'];
			$type = $file['type'];
			$temp_name = $file['tmp_name'];
			$db_file_name = basename($file['name']);
			$ext = explode(".", $db_file_name);
			$fileExt =end($ext);
			$taget_file = $post_id.'-'.rand_string(20).".".$fileExt;
			$sql = "UPDATE operations SET  attachment ='{$taget_file}',fext='$fileExt' WHERE id ='$taget_file' LIMIT 1"; 
			$query = $database->query($sql);
			$afected = $database->inset_id();
			$path  = "audios/".$taget_file;
			if(move_uploaded_file($temp_name,$path) && ($afected >=1)){     
			  //$messages = "<span style='color:green;'>Done</span>";
			}else
			  $message = "<span style='color:red;'>Erros occur!</span>";
			}
		    //}else{
			// $message = "<span style='color:red;'>File format is not allowed. $db_file_name</span>";
		 // }
      ////
   }
	    //attachment ends here
		
		$message="<span style='color:green;'>Strep added successfully </span>";
		header("location:streps");
		$_POST ='';
	}
}
?>
<?php  include"includes/header.php" ?>
 <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1 class="textarea">
            <!-- Ongoing Operations -->
          <small class="external-event bg-green ui-draggable ui-draggable-handle" >Ongoing Operations</small>
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
          <div class="box box-primary" style='text-align:center;' >
            <div class="box-body box-profile"  >
              <img class="" src="assets/img/ns.jpg" width='190px' alt="User profile picture">
			  <div style="text-align: left;margin-left: 70px;">
              <h3 class="profile-username">Values</h3>
              <p class="text-muted ">Integrity </p>
              <p class="text-muted ">Professionalism </p>
              <p class="text-muted ">Accountability</p>
              <p class="text-muted ">Team work</p>
             </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary" style="padding: 5px">
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Department</strong>

              <p class="text-muted">
               <?php echo $userdata['level']; ?>
              </p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activities</a></li>
              <li><a href="#timeline" data-toggle="tab">My Posts</a></li>
              <li class="hidden-xs"><a href="#newOperation" data-toggle="tab">New operation</a></li>
              
            </ul>
            <div class="tab-content">

             <!-- Activity Tab -->
              
              <div class="active tab-pane" id="activity" style="padding: 20px">
              	<!-- <div class="row" style="margin-bottom: 40px; ">
	        		<form class="form-horizontal" method="post" action="/operationsboard/public/operation-details.php">
		                <div class="form-group margin-bottom-none">
		                  <div class="col-sm-5">
		                    <input name="comments" class="form-control input-sm" placeholder="Search Operation" style="border-radius: 20px">
		                  </div>
		                  <div class="col-sm-3">
		                    <button type="submit" class="btn btn-success pull-right btn-block btn-sm">Comment</button>
		                  </div>
		                </div>
		              </form>
	        	</div> -->
	        	<div class="row">
	        		<div class="col-md-6"></div>
	        			<div style="margin-bottom: 20px">
						    <form>
						      <div class="input-group">
						        <input type="text" class="form-control pull-right" placeholder="Search an ongoing operarion" autocomplete="off">
						          <div class="input-group-btn">
						            <button type="button" class="btn btn-primary"><i class="fa fa-search"></i> SEARCH</button>
						          </div>
						      </div>
						    </form>
					</div>
				</div>

	        	<div class="row">
              	<?php
				$sql = "SELECT * FROM operations WHERE poster_level ='{$_SESSION["level"]}' AND category='' ORDER BY time DESC";
				if ($_SESSION["level"] == 'HQ' ) {
					$sql = "SELECT * FROM operations WHERE category=''  ORDER BY time DESC";
				}
				$query = $database->query($sql);
				 while ($postdata = $database->fetch_array($query)) {
				 	$details = nl2br($postdata['details']);
					$remarks = nl2br($postdata['remarks']);
					 $postuser  = $database->fetch_array($database->query("SELECT fname,lname,id,level FROM user WHERE id ='{$postdata['user']}' LIMIT 1 "));  
					echo '
					
			     <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="assets/img/user.jpg" alt="user image">
                        <span class="username">
                          <a href="#">'.$postdata['title'].'</a>
                          <!-- <a href="#" class="pull-right btn-box-tool"><i class="fa fa-clock-o"></i> 7:30</a> -->
                        </span>
                    <span class="description">Ongoing operation posted on '.$postdata['time'].'</span>
                  </div>
                  <!-- /.user-block -->
                  <p style="padding-bottom: 10px">
                    '.$details.'
                  </p>
                  ';

                  if(strtolower($postdata['fext'] == 'mp3')){
						echo '
                    <li style="list-style:none"><span class="label label-lg ">
					<audio controls>
					  <source src="audios/'.$postdata['attachment'].'" type="audio/mpeg">
					  Your browser does not support the audio element.
					</audio>
                    </span></li>';
					}else if ($postdata['fext'] !='') {
						
					 echo ' <li style="list-style:none"><a href="audios/'.$postdata['attachment'].'" class="link-black text-sm"><span class="label label-lg label-primary"><b>DOWNLOAD ATTACHMENT</b></span></a></li>';
					} 

                  echo '
                  <ul class="list-inline" style="padding-top: 10px">
                    <li>Posted by <a href="general-profile?op_u='.$postuser['id'].'" class="link-black text-sm" style="color:rgba(60, 141, 188, 1);"><i class="fa fa-user margin-r-5"></i> '.$postuser['level'].': '.$postuser['fname'].' '.$postuser['lname'].'</a></li>
                    <li><a href="operation-details?op='.$postdata['id'].'" class="link-black text-sm"><span class="label label-lg label-success"><b>READ MORE DETAILS</b></span></a></li> 
                    ';
					// if(strtolower($postdata['fext'] == 'mp3')){
					// 	echo '
     //                <li><span class="label label-lg ">
					// <audio controls>
					//   <source src="audios/'.$postdata['attachment'].'" type="audio/mpeg">
					//   Your browser does not support the audio element.
					// </audio>
     //                </span></li>';
					// }else if ($postdata['fext'] !='') {
						
					//  echo ' <li><a href="audios/'.$postdata['attachment'].'" class="link-black text-sm"><span class="label label-lg label-primary"><b>DOWNLOAD ATTACHMENT</b></span></a></li>';
					// } 
					 echo '
                    <li class="pull-right" id="com1">
                      <a class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (0)</a></li>
                  </ul>
                </div>
                <!-- /.post -->
                <div class="item" id="com_area" style="display:none;">
                  <div class="box box-success" style="border-top: none;">
                    <div class="box-body chat" id="chat-box">

                      <!-- chat item -->
                      <div class="item" style="background-color: #f4f4f4;border-radius: 3px;padding: 10px;margin-top: 5px">
                        <img class="img-circle" alt="user image" src="assets/img/user.jpg">

                        <p class="message">
                          <a class="name" href="#">
                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                            User Three
                          </a>
                          Waiting for more comments 
                        </p>
                      </div>
                      <!-- /.item -->
                    </div>
                    <!-- /.chat -->
                    <div class="box-footer">
                       <form class="form-horizontal">
                        
                      </form>
                    </div>
                  </div>
              </div>
					   
			';
					 
				 }				
			  ?>
                </div>
              </div>
              <!-- /.post -->
                            
              <!-- /.End of Activity-pane -->

              <!-- My post-pane  -->
              <div class="tab-pane" id="timeline" style="padding: 20px">
                <!-- The post -->
                <ul class="timeline timeline-inverse">
                  <!-- post item -->
                  <?php
				$sql = "SELECT * FROM operations WHERE user ='{$_SESSION["id"]}' AND category ='' ORDER BY time DESC";
				$query = $database->query($sql);
				$i=0;
				 while ($postdata = $database->fetch_array($query)) {
				 	$details = nl2br($postdata['details']);
					$remarks = nl2br($postdata['remarks']);
					 $postuser  = $database->fetch_array($database->query("SELECT fname,lname,id FROM user WHERE id ='{$postdata['user']}' LIMIT 1 "));  
					 $calor = "bg-blue";
					 if ($i %2 ==0) {
						$calor = "bg-purple"; 
					 }
					 $i++;
					 echo '
					 
						 <li>
		                    <i class="fa fa-file-text-o '.$calor.'"></i>
		
		                    <div class="timeline-item">
		                      <span class="time"><i class="fa fa-clock-o"></i> '.$postdata['time'].'</span>
		
		                      <h3 class="timeline-header"><a href="#">'.$postdata['title'].'</a></h3>
		
		                      <div class="timeline-body">
		                        '.$details.'
		                      </div>
		                      <div class="timeline-footer">
		                        <a class="btn btn-primary btn-xs">Add attachment</a>
		                        <a class="btn btn-danger btn-xs">Edit Post</a>
		                        <a href="operation-details?op='.$postdata['id'].'" class="btn btn-success btn-xs">View full Post</a>
		                      </div>
		                    </div>
		                  </li>
					 
					 ';
					 
				  }
				  ?>
                </ul>
              </div>
              <!-- /.End of my post-pane -->

              <!-- Add a new post-pane  -->
              <div class="tab-pane" id="newOperation" style="padding: 20px">
                <form id="add_operation" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" novalidate="novalidate">
                      <fieldset>
                        <div class="row">
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6">
                              <label>Title <span class="text-danger">*</span></label>
                              <input type="text" name="otitle" id="o_title"  class="form-control required" placeholder="Operation title here">
                            </div>
                            <div class="col-md-6 col-sm-6">
                              <label>Attachment</label>
                              <div class="fancy-file-upload fancy-file-info">
                                <i class="fa fa-upload"></i>
                                <input type="file" name="ofile" class="form-control" onchange="jQuery(this).next('input').val(this.value);">
                                <input type="text" class="form-control required" id="user_pic" name="user_pic" placeholder="no file selected" readonly="">
                                <span class="button">Choose File</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <div class="row" style="margin-top: 5px">
                          <div class="form-group">
                            <div class="col-md-12 col-sm-12">
                              <label>Details <span class="text-danger">*</span></label>
                              <textarea class="form-control" rows="7" name="odetails" id="o_details"  placeholder="Operation details here"></textarea>
                            </div>
                          </div>
                        </div>

                        <div class="row" style="margin-top: 15px">
                          <div class="form-group">
                            <div class="col-md-12 col-sm-12">
                              <label>Recommended Actions </label>
                              <textarea class="form-control" rows="4" name="oremark" id="0_remark" placeholder="Recommended Actions here"></textarea>
                            </div>
                          </div>
                        </div>
                        
                        <div class="row" style="margin-top: 15px">
                          <div class="form-group">
                            <div class="col-md-12 col-sm-12">
                              <label>Classification <span class="text-danger">*</span> </label>
                              <select name="classification" id="classification" class="form-control pointer required">
                                      <option value="">--- Select Classification ---</option>
                                      <option <?php if(isset($_POST['classification']) && $_POST['classification'] == 'Restricted') echo "selected";?> value="Restricted">Restricted</option>
                                      <option <?php if(isset($_POST['classification']) && $_POST['classification'] == 'Confidential') echo "selected";?> value="Confidential">Confidential</option>
                                      <option <?php if(isset($_POST['classification']) && $_POST['classification'] == 'Secret') echo "selected";?> value="Secret">Secret</option>
                                      <option <?php if(isset($_POST['classification']) && $_POST['classification'] == 'Top secret') echo "selected";?> value="Top secret">Top secret</option>
                               </select>
                            </div>
                          </div>
                        </div>  
                        
                        <div class="row" style="margin-top: 15px">
                          <div class="form-group">
                            <div class="col-md-12 col-sm-12">
                              <label>Source </label>
                              <textarea class="form-control" rows="2" name="info_source" id="info_source" placeholder="Source of information"></textarea>
                            </div>
                          </div>
                        </div>
                        
                        <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-3d btn-primary btn-xlg btn-block margin-top-30" name="newop">
                            CREATE OPERATION
                          </button>
                        </div>
                      </div> 
                    </fieldset>
                  </form>

              </div>
              <!-- /.End of add a new post-pane -->



               <!-- Add a new Strips-pane  -->
              <div class="tab-pane" id="newStrips" style="padding: 20px">
                <form id="add_strep" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" novalidate="novalidate">
                      <fieldset>
                        <div class="row">
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6">
                              <label>Subject <span class="text-danger">*</span></label>
                              <input type="text" name="s_subject" id="s_subject" class="form-control required" placeholder="Sitrep title here">
                            </div>
                            <div class="col-md-6 col-sm-6">
                              <label>Attachment</label>
                              <div class="fancy-file-upload fancy-file-info">
                                <i class="fa fa-upload"></i>
                                <input type="file" name='sfile' class="form-control" onchange="jQuery(this).next('input').val(this.value);">
                                <input type="text" class="form-control required" id="str_attach" name="str_attach" placeholder="no file selected" readonly="">
                                <span class="button">Choose File</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <div class="row" style="margin-top: 5px">
                          <div class="form-group">
                            <div class="col-md-12 col-sm-12">
                              <label>Details </label>
                              <textarea class="form-control" rows="6" name="s_details" id="s_details" placeholder="Sitrep details here"></textarea>
                            </div>
                          </div>
                        </div>

                        <div class="row" style="margin-top: 15px">
                          <div class="form-group">
                            <div class="col-md-12 col-sm-12">
                              <label>Recommend Actions </label>
                              <textarea class="form-control" rows="3" name="s_remark" id="s_remark" placeholder="Recommend actions here"></textarea>
                            </div>
                          </div>
                        </div> 
                       
                        <div class="row" style="margin-top: 15px">
                          <div class="form-group">
                            <div class="col-md-12 col-sm-12">
                              <label>Category <span class="text-danger">*</span> </label>
                              <select name="category" id="category" class="form-control pointer required">
                                      <option value="">--- Select Classification ---</option>
                                      <option <?php if(isset($_POST['category']) && $_POST['category'] == 'Spot') echo "selected";?> value="Spot">Spot</option>
                                      <option <?php if(isset($_POST['category']) && $_POST['category'] == 'Six Hours') echo "selected";?> value="Six Hours">Six Hours</option>
                                      <option <?php if(isset($_POST['category']) && $_POST['category'] == 'Daily') echo "selected";?> value="Daily">Daily</option>
                                      <option <?php if(isset($_POST['category']) && $_POST['category'] == 'Weekly') echo "selected";?> value="Weekly">Weekly</option>
                                      <option <?php if(isset($_POST['category']) && $_POST['category'] == 'Monthly') echo "selected";?> value="Monthly">Monthly</option>
                               </select>
                            </div>
                          </div>
                        </div>
                        
                         <div class="row" style="margin-top: 15px">
                          <div class="form-group">
                            <div class="col-md-12 col-sm-12">
                              <label>Classification <span class="text-danger">*</span> </label>
                              <select name="classification" id="classification" class="form-control pointer required">
                                      <option value="">--- Select Classification ---</option>
                                      <option <?php if(isset($_POST['classification']) && $_POST['classification'] == 'Restricted') echo "selected";?> value="Restricted">Restricted</option>
                                      <option <?php if(isset($_POST['classification']) && $_POST['classification'] == 'Confidential') echo "selected";?> value="Confidential">Confidential</option>
                                      <option <?php if(isset($_POST['classification']) && $_POST['classification'] == 'Secret') echo "selected";?> value="Secret">Secret</option>
                                      <option <?php if(isset($_POST['classification']) && $_POST['classification'] == 'Top secret') echo "selected";?> value="Top secret">Top secret</option>
                               </select>
                            </div>
                          </div>
                        </div>
                        
                         <div class="row" style="margin-top: 15px">
                          <div class="form-group">
                            <div class="col-md-12 col-sm-12">
                              <label>Source </label>
                              <textarea class="form-control" rows="2" name="info_source" id="info_sources" placeholder="Source of information"></textarea>
                            </div>
                          </div>
                        </div>
                        
                        
                        <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-3d btn-primary btn-xlg btn-block margin-top-30" name="newstrep">
                            CREATE SITREP
                          </button>
                        </div>
                      </div> 
                    </fieldset>
                  </form>

              </div>
              <!-- /.End of add a new Strips-pane -->


              <!-- Settings-Pane -->
              <div class="tab-pane" id="settings" style="padding: 20px">
                <form class="form-horizontal" id="user_form" action="#" method="post" >
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">First Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control required" id="inputName" placeholder="First Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label required">Middle Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputMname" placeholder="Middle name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="lname" class="col-sm-2 control-label required">Last Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputLname" placeholder="Last name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="jtitle" class="col-sm-2 control-label required">Job Title</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputJob" placeholder="Job Title">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="school" class="col-sm-2 control-label required">School</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSchool" placeholder="Eg : UR">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="school" class="col-sm-2 control-label required">School Level</label>

                    <div class="col-sm-10">
                      <select class="form-control required" id="selectSchool">
                        <option value="">--- Select level ---</option>
                        <option value="PhD">PhD</option>
                        <option value="Masters">Masters</option>
                        <option value="A0">A0</option>
                        <option value="A1">A1</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="jtitle" class="col-sm-2 control-label required">Department</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputDepartment" placeholder="Eg : Computer Science">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="gender" class="col-sm-2 control-label required">Gender</label>

                    <div class="col-sm-10">
                      <select class="form-control required" id="selectGender">
                        <option value="">--- Select gender ---</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Telephone No.</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control required" id="inputTel" placeholder="Phone Number">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control required" id="inputAdd" placeholder="Home Location">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Update Details</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.End of my settings-pane -->

              <!-- Change my password -->
              <div class="tab-pane" id="Password" style="padding: 20px">
                <form class="form-horizontal" id="user_form" action="#" method="post" >
                  <div class="form-group">
                    <label for="o_password" class="col-sm-2 control-label">Old Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control required" id="o_password" placeholder="Enter your current password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="n_password" class="col-sm-2 control-label required">New Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="n_password" placeholder="Enter your new password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="r_password" class="col-sm-2 control-label required">Repeast Password</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="r_password" placeholder="Repeat your new password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Update Password</button>
                    </div>
                  </div>
                </form>  
              </div>

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
 