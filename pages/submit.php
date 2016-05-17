<?php
$diff = time();
$diff2 = preg_replace('/\s+/', '', lcfirst($query_user['lastName']));
$diff3 = substr(md5($diff),0, 3);
$paper_id = "p".$diff2.$diff3;

if(isset($_POST['submitAbtract'])){
	$title 			= @$_POST['title'];
	$author1fname 	= @$_POST['author1fname'];
	$author2fname 	= @$_POST['author2fname'];
	$author3fname 	= @$_POST['author3fname'];
	$author4fname 	= @$_POST['author4fname'];
	$author5fname 	= @$_POST['author5fname'];
	$author6fname 	= @$_POST['author6fname'];
	$author7fname 	= @$_POST['author7fname'];
	$author1lname 	= @$_POST['author1lname'];
	$author2lname 	= @$_POST['author2lname'];
	$author3lname 	= @$_POST['author3lname'];
	$author4lname 	= @$_POST['author4lname'];
	$author5lname 	= @$_POST['author5lname'];
	$author6lname 	= @$_POST['author6lname'];
	$author7lname 	= @$_POST['author7lname'];
	$author1inst 	= @$_POST['author1inst'];
	$author2inst 	= @$_POST['author2inst'];
	$author3inst 	= @$_POST['author3inst'];
	$author4inst 	= @$_POST['author4inst'];
	$author5inst 	= @$_POST['author5inst'];
	$author6inst 	= @$_POST['author6inst'];
	$author7inst 	= @$_POST['author7inst'];
	$authorcorfname	= @$_POST['authorcorfname'];
	$authorcorlname	= @$_POST['authorcorlname'];
	$authorcormail	= @$_POST['authorcormail'];
	$abstract 		= @$_POST['abstract'];
	$keywords 		= @$_POST['keywords'];
	
	$queryabstract 	= mysqli_query($link, "INSERT INTO tbl_abstract VALUES ('".$paper_id."','".$abstract."','".$keywords."')");
	$querytitle		= mysqli_query($link, "INSERT INTO tbl_title VALUES 
	('".$query_user['user_id']."','".$paper_id."','".$title."','"
	.$author1fname."','".$author1lname."','".$author1inst."','"
	.$author2fname."','".$author2lname."','".$author2inst."','"
	.$author3fname."','".$author3lname."','".$author3inst."','"
	.$author4fname."','".$author4lname."','".$author4inst."','"
	.$author5fname."','".$author5lname."','".$author5inst."','"
	.$author6fname."','".$author6lname."','".$author6inst."','"
	.$author7fname."','".$author7lname."','".$author7inst."','"
	.$authorcorfname."','".$authorcorlname."','".$authorcormail."','in review', 'not submitted'
	)");
	
	if($querytitle){
		echo "<script>alert('Your paper, ".$title.", has been submitted succesfully!')</script>";
	}else{
		echo "<script>alert('Submit failed!".mysql_error()."')</script>";
	}
}
?>
<script language="javascript"> 
function toggle(auth, tombol1, tombol2) {
	var auth = document.getElementById(auth);
	var tom1 = document.getElementById(tombol1);
	var tom2 = document.getElementById(tombol2);
		auth.style.display = "block";
		tom1.style.display = "none";
		tom2.style.display = "block";
}
$( "tombol2" ).click(function() {
  $( "author2" ).slideUp( "slow", function() {
    // Animation complete.
  });
}); 
$( "tombol3" ).click(function() {
  $( "author3" ).slideUp( "slow", function() {
    // Animation complete.
  });
}); 
$( "tombol4" ).click(function() {
  $( "author4" ).slideUp( "slow", function() {
    // Animation complete.
  });
}); 
</script>
<script language="javascript">
function copyProfile(fName, lName, institution){
    document.getElementById(fName).value    = <?php echo json_encode($query_user['firstName']); ?>;
    document.getElementById(lName).value    = <?php echo json_encode($query_user['lastName']); ?>;
    document.getElementById(institution).value  = <?php echo json_encode($query_user['institution']); ?>;
}
function copyProfile2(fName, lName, email){
    document.getElementById(fName).value    = <?php echo json_encode($query_user['firstName']); ?>;
    document.getElementById(lName).value    = <?php echo json_encode($query_user['lastName']); ?>;
    document.getElementById(email).value  = <?php echo json_encode($query_user['email']); ?>;
}
</script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Abstract Submission
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Abstract Submission</li>
      </ol>
	  <section class="content">
      <div class="row">
        <div class="col-md-12">
		<form enctype="multipart/form-data" method="POST">
		<div class="form-group">
                  <h3><strong>Title</strong></h3>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter your paper title here" required="required">
        </div>
		<div class="form-group">
			<h3><strong>Author(s)</strong> <small>limited to 4 authors</small></h3>
			<div class="row">
			<!-- 1st author -->
			<div class="col-sm-3">
				<div class="box box-success">
					<div class="box-header with-border">
					  <h3 class="box-title">1st Author</h3>
					</div>
					<div class="box-body">
					<div class="checkbox">
						<label>
						  <input type="checkbox" id="auth1check" onClick="copyProfile('author1fname', 'author1lname', 'author1inst')">
						  Check here if this is you
						</label>
					  </div>
					  <div class="row">
						<div class="col-xs-6">
						  <input type="text" name="author1fname" id="author1fname" class="form-control" placeholder="Firstname" required="required">
						</div>
						<div class="col-xs-6">
						  <input type="text" name="author1lname" id="author1lname" class="form-control" placeholder="Lastname" required="required">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" name="author1inst" id="author1inst" class="form-control" placeholder="Institution" required="required">
						</div>
					  </div>
					</div>
					<!-- /.box-body -->
				  </div>
			</div>
			<!-- end of 1st author -->
			<!-- corresponding author -->
			<div class="col-sm-3">
				<div class="box box-success">
					<div class="box-header with-border">
					  <h3 class="box-title">Corresponding Author</h3>
					</div>
					<div class="box-body">
					<div class="checkbox">
						<label>
						  <input type="checkbox" onClick="copyProfile2('authorcorfname', 'authorcorlname', 'authorcormail')">
						  Check here if this is you
						</label>
					  </div>
					  <div class="row">
						<div class="col-xs-6">
						  <input type="text" name="authorcorfname" id="authorcorfname" class="form-control" placeholder="Firstname" required="required">
						</div>
						<div class="col-xs-6">
						  <input type="text" name="authorcorlname" id="authorcorlname" class="form-control" placeholder="Lastname" required="required">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="email" name="authorcormail" id="authorcormail" class="form-control" placeholder="Email" required="required">
						</div>
					  </div>
					</div>
					<!-- /.box-body -->
				  </div>
			</div>
			<!-- end of corresponding author -->
</div>
<div class="row">
			<!-- 2nd author -->
			<div class="col-sm-3" id="author2"style="display:none;">
				<div class="box box-success">
					<div class="box-header with-border">
					  <h3 class="box-title">2nd Author</h3>
					</div>
					<div class="box-body">
					  <div class="checkbox">
						<label>
						  <input type="checkbox" id="auth2check" onClick="copyProfile('author2fname', 'author2lname', 'author2inst')">
						  Check here if this is you
						</label>
					  </div>
					  <div class="row">
						<div class="col-xs-6">
						  <input type="text" name="author2fname" id="author2fname" class="form-control" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" name="author2lname" id="author2lname" class="form-control" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" name="author2inst" id="author2inst" class="form-control" placeholder="Institution">
						</div>
					  </div>
					</div>
					<!-- /.box-body -->
				  </div>
			</div>
			<!-- end of 2nd author -->
</div>
<div class="row">
			<!-- 3rd author -->
			<div class="col-sm-3" id="author3" style="display:none;">
				<div class="box box-success">
					<div class="box-header with-border">
					  <h3 class="box-title">3rd Author</h3>
					</div>
					<div class="box-body">
					  <div class="checkbox">
						<label>
						  <input type="checkbox" onClick="copyProfile('author3fname', 'author3lname', 'author3inst')">
						  Check here if this is you
						</label>
					  </div>
					  <div class="row">
						<div class="col-xs-6">
						  <input type="text" name="author3fname" id="author3fname" class="form-control" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" name="author3lname" id="author3lname" class="form-control" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" name="author3inst" id="author3inst" class="form-control" placeholder="Institution">
						</div>
					  </div>
					</div>
					<!-- /.box-body -->
				  </div>
			</div>
			<!-- end of 3rd author -->
</div>
<div class="row">
			<!-- 4th author -->
			<div class="col-sm-3" id="author4" style="display:none;">
				<div class="box box-success">
					<div class="box-header with-border">
					  <h3 class="box-title">4th Author</h3>
					</div>
					<div class="box-body">
					  <div class="checkbox">
						<label>
						  <input type="checkbox" onClick="copyProfile('author4fname', 'author4lname', 'author4inst')">
						  Check here if this is you
						</label>
					  </div>
					  <div class="row">
						<div class="col-xs-6">
						  <input type="text" name="author4fname" id="author4fname" class="form-control" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" name="author4lname" id="author4lname" class="form-control" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" name="author4inst" id="author4inst" class="form-control" placeholder="Institution">
						</div>
					  </div>
					</div>
					<!-- /.box-body -->
				  </div>
			</div>
			<!-- end of 4th author -->
</div>
<div class="row">
			<!-- 5th author -->
			<div class="col-sm-3" id="author5" style="display:none;">
				<div class="box box-success">
					<div class="box-header with-border">
					  <h3 class="box-title">5th Author</h3>
					</div>
					<div class="box-body">
					  <div class="checkbox">
						<label>
						  <input type="checkbox" onClick="copyProfile('author5fname', 'author5lname', 'author5inst')">
						  Check here if this is you
						</label>
					  </div>
					  <div class="row">
						<div class="col-xs-6">
						  <input type="text" name="author5fname" id="author5fname" class="form-control" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" name="author5lname" id="author5lname" class="form-control" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" name="author5inst" id="author5inst" class="form-control" placeholder="Institution">
						</div>
					  </div>
					</div>
					<!-- /.box-body -->
				  </div>
			</div>
			<!-- end of 5th author -->
</div>
<div class="row">
			<!-- 6th author -->
			<div class="col-sm-3" id="author6" style="display:none;">
				<div class="box box-success">
					<div class="box-header with-border">
					  <h3 class="box-title">6th Author</h3>
					</div>
					<div class="box-body">
					  <div class="checkbox">
						<label>
						  <input type="checkbox" onClick="copyProfile('author6fname', 'author6lname', 'author6inst')">
						  Check here if this is you
						</label>
					  </div>
					  <div class="row">
						<div class="col-xs-6">
						  <input type="text" name="author6fname" id="author6fname" class="form-control" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" name="author6lname" id="author6lname" class="form-control" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" name="author6inst" id="author6inst" class="form-control" placeholder="Institution">
						</div>
					  </div>
					</div>
					<!-- /.box-body -->
				  </div>
			</div>
			<!-- end of 6th author -->
</div>
<div class="row">
			<!-- 7th author -->
			<div class="col-sm-3" id="author7" style="display:none;">
				<div class="box box-success">
					<div class="box-header with-border">
					  <h3 class="box-title">7th Author</h3>
					</div>
					<div class="box-body">
					  <div class="checkbox">
						<label>
						  <input type="checkbox" onClick="copyProfile('author7fname', 'author7lname', 'author7inst')">
						  Check here if this is you
						</label>
					  </div>
					  <div class="row">
						<div class="col-xs-6">
						  <input type="text" name="author7fname" id="author7fname" class="form-control" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" name="author7lname" id="author7lname" class="form-control" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" name="author7inst" id="author7inst" class="form-control" placeholder="Institution">
						</div>
					  </div>
					</div>
					<!-- /.box-body -->
				  </div>
			</div>
			<!-- end of 7th author -->
			<div class="col-sm-3" id="info" style="display:none;">
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Alert!</h4>
					You already reach maximum slot for author.<br/>Leave the author form blank if there is cancellation
				</div>
			</div>
</div>
<div class="row">
<div class="col-sm-3">
<a id="tombol2" class="btn btn-info" style="display:block;" href="javascript:toggle('author2','tombol2','tombol3');"><i class="fa fa-plus"></i> Add new author</a>
<a id="tombol3" class="btn btn-info" style="display:none;" href="javascript:toggle('author3','tombol3','tombol4');"><i class="fa fa-plus"></i> Add new author</a>
<a id="tombol4" class="btn btn-info" style="display:none;" href="javascript:toggle('author4','tombol4','tombol5');"><i class="fa fa-plus"></i> Add new author</a>
<a id="tombol5" class="btn btn-info" style="display:none;" href="javascript:toggle('author5','tombol5','tombol6');"><i class="fa fa-plus"></i> Add new author</a>
<a id="tombol6" class="btn btn-info" style="display:none;" href="javascript:toggle('author6','tombol6','tombol7');"><i class="fa fa-plus"></i> Add new author</a>
<a id="tombol7" class="btn btn-info" style="display:none;" href="javascript:toggle('author7','tombol7','info');"><i class="fa fa-plus"></i> Add new author</a>
</div>
</div><br/>
			<p>For more authors, please kindly contact us at <a href="mailto:lisatsymposium@apps.ipb.ac.id">lisatsymposium@apps.ipb.ac.id</a></p>
			</div>
		<!-- -->
           <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"><strong>Abstract</strong>
			  <small>(max 500 words)</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                    <textarea id="abstract" name="abstract" maxlength="500" rows="10" cols="80" required="required"></textarea>
					<script language="javascript">
						CKEDITOR.replace('abstract');
						CKEDITOR.add
					</script>
            </div>
          </div>
		  <div class="form-group">
                  <h3><strong>Keywords</strong></h3>
                  <input type="text" name="keywords" id="keywords" class="form-control" placeholder="Enter your keywords here" required="required">
		  </div>
          </div>
			<div class="col-sm-10">
				<div class="pull-right">
				<h3>click to save and submit <i class="fa fa-hand-o-right"></i></h3>
				</div>
			</div>
			<div class="col-sm-2">
				<button type="submit" action="POST" name="submitAbtract" id="tombolSave" class="btn btn-app">
					<i class="fa fa-save"></i> Save
				</button>
			</div>
			</form>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    </section>
  </div>
  <!-- /.content-wrapper -->