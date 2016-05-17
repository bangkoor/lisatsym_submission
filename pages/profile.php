<?php
$query = mysqli_query($link, "SELECT * FROM tbl_user WHERE username='".$sessionUser."'");
$query_user = mysqli_fetch_array($query);

$userID 	= $query_user['user_id'];
$namaFile	= $userID;

if(isset($_POST['submitProfile'])){
	$allowed_ext	= array('png', 'jpg', 'gif', '');
	$file_name 		= $_FILES['file']['name'];
	$value			= explode('.', $file_name);
	$file_ext		= strtolower(array_pop($value));
	$file_size		= $_FILES['file']['size'];
	$file_tmp		= $_FILES['file']['tmp_name'];

	$password 		= @$_POST['password'];
	$salutation 	= @$_POST['salutation'];
	$firstname 		= @$_POST['firstname'];
	$lastname 		= @$_POST['lastname'];
	$email 			= @$_POST['email'];
	$institution 	= @$_POST['institution'];
	$address 		= @$_POST['address'];
	$phone 			= @$_POST['phone'];
	$type 			= @$_POST['type'];
	$topic 			= @$_POST['topic'];
	
	$errorProfpic = "";
	
	
	if(in_array($file_ext, $allowed_ext) === true){
					if($file_size < 102400){
						if(!$file_name == NULL){
							$queryEdit = mysqli_query($link, "UPDATE tbl_user SET profpic='".$namaFile.".".$file_ext."' WHERE username='".$sessionUser."';");
						}
						$lokasi = 'data/images/user_profile/'.$namaFile.'.'.$file_ext;
						move_uploaded_file($file_tmp, $lokasi);
						$queryEdit = mysqli_query($link, "UPDATE tbl_user SET password='".$password."', salutation='".$salutation."', firstName='".$firstname."', lastName='".$lastname."', email='".$email."', institution='".$institution."', address='".$address."', phone='".$phone."', type='".$type."', topic='".$topic."' WHERE username='".$sessionUser."';");
	
						echo "<meta http-equiv='refresh' content='0;url='profile.php''>";						
					}else{
						$errorProfpic = "ERROR: File is to large! (max = 100 kb)";
					}
				}else{
					$errorProfpic = "ERROR: File extention not allowed! Please use jpg, png, or gif";
				}
}
?>
<script language="javascript"> 
function toggleEdit() {
	var form = document.getElementById("formEdit");
	if (form.style.display == "none"){	
		form.style.display = "block";
	} else {form.style.display="none";}
}
function toggleSave() {
	var form = document.getElementById("formEdit");
		form.style.display = "none";
}
$( "tombolEdit" ).click(function() {
  $( "form" ).slideUp( "slow", function() {
    // Animation complete.
  });
});
$( "tombolSave" ).click(function() {
  $( "form" ).slideUp( "slow", function() {
    // Animation complete.
  });
});
</script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Your Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
	  <section class="content">	
	  <div class="row">
	  <div class="form-group">
	  <div class="col-sm-9">
	  <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active" style="background:url('dist/img/background-profile.png') no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
              <h3 class="widget-user-username"><?php echo $query_user['salutation'].". ".$query_user['firstName']." ". $query_user['lastName']; ?></h3>
              <h5 class="widget-user-desc"><?php echo $query_user['type'];?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="data/images/user_profile/<?php echo $query_user['profpic'];?>" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-12">
                  <div>
					<dl class="dl-horizontal">
						<dt>Username :</dt>
						<dd><?php echo $query_user['username'];?></dd>
						<dt>Email :</dt>
						<dd><?php echo $query_user['email'];?></dd>
						<dt>Institution :</dt>
						<dd><?php echo $query_user['institution'];?></dd>
						<dt>Address :</dt>
						<dd><?php echo $query_user['address'];?></dd>
						<dt>Participation type :</dt>
						<dd><?php echo $query_user['type'];?></dd>
						<dt>Chosen topic :</dt>
						<dd><?php echo $query_user['topic'];?></dd>
					  </dl>
						  <div class="pull-right">
							<a id="tombolEdit" class="btn btn-app" href="javascript:toggleEdit();">
								<i class="fa fa-edit"></i> edit profile
							</a>
						  </div>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
		  <small><i>Please complete your profile with appropriate address and detail for correspondencing purpose</i></small>
	  </div>
	  </div>
	  </div>
	  <div id="formEdit" style="display:none;" class="row">
	  <div class="col-sm-9">
	  <div class="form-group">
	  <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"><strong>Profile Edit</strong>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
			<div class="row">
			<div class="col-sm-6">
			<form enctype="multipart/form-data" method="POST">
				<div class="form-group">
					<label for="profile_pic">Profile Picture</label>
					<small>Please use your recent photogpraph (max 100 kb)</small>
					  <input type="file" name="file" id="profile_pic">
					  <font color="red"><small>
					  <?php if(!empty($errorProfpic)){
						?>
						<script>
						alert("<?php echo $errorProfpic;?>")
						</script>
						<?php echo $errorProfpic;
						}
						?>
					  </small></font>
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" disabled="disabled" name="username" value="<?php echo $query_user['username'];?>">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email" value="<?php echo $query_user['email'];?>">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<a title="you are not allowed to edit username" ><input type="password" class="form-control" name="password" value="<?php echo $query_user['password'];?>"></a>
				</div>
				<div class="form-group">
					<?php
					$salutation = $query_user['salutation'];
					?>
					<label for="salutation">Salutation</label>
						  <div class="radio">
							<label>
							  <input type="radio" name="salutation" id="salutation1" value="Prof" <?php if ($salutation=="Prof"){echo "checked='checked'";}else{echo "";}; ?>>
							  Prof.
							</label>
						  </div>
						  <div class="radio">
							<label>
							  <input type="radio" name="salutation" id="salutation2" value="Dr" <?php if ($salutation=="Dr"){echo "checked='checked'";}else{echo "";}; ?>>
							  Dr.
							</label>
						  </div>
						  <div class="radio">
							<label>
							  <input type="radio" name="salutation" id="salutation3" value="Mr" <?php if ($salutation=="Mr"){echo "checked='checked'";}else{echo "";}; ?>>
							  Mr.
							</label>
						  </div>
						  <div class="radio">
							<label>
							  <input type="radio" name="salutation" id="salutation4" value="Mrs" <?php if ($salutation=="Mrs"){echo "checked='checked'";}else{echo "";}; ?>>
							  Mrs.
							</label>
						  </div>
				</div>	
				<div class="form-group">
					<label for="firstname">Firstname</label>
						<input type="text" class="form-control" name="firstname" value="<?php echo $query_user['firstName'];?>">
					<label for="lastname">Lastname</label>
						<input type="text" class="form-control" name="lastname" value="<?php echo $query_user['lastName'];?>">
				</div>
				</div>
				<div class="col-sm-6">
				<div class="form-group">
					<label for="institution">Institution/affiliation</label>
						<textarea class="form-control" name="institution"><?php echo $query_user['institution'];?></textarea>
				</div>
				<div class="form-group">
					<label for="address">Mailing address</label>
					<small>(including postal code)</small>
						<textarea class="form-control" name="address"><?php echo $query_user['address'];?></textarea>
				</div>
				<div class="form-group">
					<label for="phone">Phone/fax</label>
						<input type="text" class="form-control" name="phone" value="<?php echo $query_user['phone'];?>">
				</div>
				<div class="form-group">
					<?php
					$type = $query_user['type'];
					?>
					<label for="type">Participation Type</label>
					<small>Please choose one type of participation</small>
							  <div class="radio">
								<label>
								  <input type="radio" name="type" id="type1" value="Oral presenter" <?php if ($type=="Oral presenter"){echo "checked='checked'";}else{echo "";}; ?>>
								  Oral Presenter
								</label>	
							  </div>
							  <div class="radio">
								<label>
								  <input type="radio" name="type" id="type2" value="Poster presenter" <?php if ($type=="Poster presenter"){echo "checked='checked'";}else{echo "";}; ?>>
								 Poster Presenter
								</label>
							  </div>
							  <div class="radio">
								<label>
								  <input type="radio" name="type" id="type3" value="Non-paper Participant" <?php if ($type=="Non-paper Participant"){echo "checked='checked'";}else{echo "";}; ?>>
								  Non-paper Participant
								</label>
							  </div>
					</div>
					<div class="form-group">
					<?php
					$topic = $query_user['topic'];
					?>
					<label for="topic">Topic on parallel session</label>
					<small>Please choose one topic</small>
							  <div class="radio">
								<label>
								  <input type="radio" name="topic" id="topic1" value="Agriculture" <?php if ($topic=="Agriculture"){echo "checked='checked'";}else{echo "";}; ?>>
								  Agriculture
								</label>
							  </div>
							  <div class="radio">
								<label>
								  <input type="radio" name="topic" id="topic2" value="Marine and Fisheries" <?php if ($topic=="Marine and Fisheries"){echo "checked='checked'";}else{echo "";}; ?>>
								 Marine & Fisheries
								</label>
							  </div>
							  <div class="radio">
								<label>
								  <input type="radio" name="topic" id="topic3" value="Climate" <?php if ($topic=="Climate"){echo "checked='checked'";}else{echo "";}; ?>>
								  Climate
								</label>
							  </div>
							  <div class="radio">
								<label>
								  <input type="radio" name="topic" id="topic4" value="Forestry" <?php if ($topic=="Forestry"){echo "checked='checked'";}else{echo "";}; ?>>
								  Forestry
								</label>
							  </div>
							  <div class="radio">
								<label>
								  <input type="radio" name="topic" id="topic5" value="Satellite Technology" <?php if ($topic=="Satellite Technology"){echo "checked='checked'";}else{echo "";}; ?>>
								  Satellite technology
								</label>
							  </div>
					</div>
						<div class="form-group">
							<div class="pull-right">
							<button type="submit" action="POST" name="submitProfile" id="tombolSave" class="btn btn-app">
								<i class="fa fa-save"></i> save
							</button>
					</form>
							</div>
						</div>
					</div>
				</div>					
			</div>
		</div>
		</div>
		</div>
		</div>
    </section>
  </div>
  <!-- /.content-wrapper -->