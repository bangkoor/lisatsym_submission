<?php
$paper_id = $_GET['id'];
$status_check = mysqli_query($link, "SELECT title, abs_status AS status FROM tbl_title WHERE paper_id='".$paper_id."'");
$res_status = mysqli_fetch_array($status_check);
if($res_status['status'] == "in review"){
	echo "<script>alert('Your paper, ".$res_status['title'].", is being in review process. You cannot edit it until you are told to do so')</script>";
} else if ($res_status['status'] == "rejected"){
	echo "<script>alert('Your paper, ".$res_status['title'].", is rejected. You cannot edit it anymore')</script>";
} else {
$query_abs = mysqli_query($link, "
SELECT 
a.title, 
a.author1fname, 
a.author2fname, 
a.author3fname,
a.author4fname,
a.author5fname,
a.author6fname,
a.author7fname,
a.author1lname,
a.author2lname,
a.author3lname,
a.author4lname,
a.author5lname,
a.author6lname,
a.author7lname,
a.author1inst,
a.author2inst,
a.author3inst,
a.author4inst,
a.author5inst,
a.author6inst,
a.author7inst,
a.authorcorfname,
a.authorcorlname,
a.authorcormail,
b.abstract,
b.keywords  
FROM tbl_title AS a, tbl_abstract AS b  
WHERE a.paper_id='".$paper_id."' AND b.paper_id='".$paper_id."'
");
$res = mysqli_fetch_array($query_abs);

if(isset($_POST['submitAbtractEdit'])){
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
	
	$queryabstract 	= mysqli_query($link, "UPDATE tbl_abstract SET abstract='".$abstract.",keywords='".$keywords."' WHERE paper_id='".$paper_id."'");
	$querytitle		= mysqli_query($link, "UPDATE tbl_title SET 
	title='".$title."',author1fname='"
	.$author1fname."',author1lname='".$author1lname."',author1inst='".$author1inst."',author2fname='"
	.$author2fname."',author2lname='".$author2lname."',author2inst='".$author2inst."',author3fname='"
	.$author3fname."',author3lname='".$author3lname."',author3inst='".$author3inst."',author4fname='"
	.$author4fname."',author4lname='".$author4lname."',author4inst='".$author4inst."',author5fname='"
	.$author5fname."',author5lname='".$author5lname."',author5inst='".$author5inst."',author6lname='"
	.$author6fname."',author6lname='".$author6lname."',author6inst='".$author6inst."',author7lname='"
	.$author7fname."',author7lname='".$author7lname."',author7inst='".$author7inst."',authorcorfname='"
	.$authorcorfname."',authorcorlname='".$authorcorlname."',authorcormail='".$authorcormail."' 
	WHERE paper_id='".$paper_id."'
	");
	
	if($querytitle){
		echo "<script>alert('Your paper, ".$title.", with keywords: ".$keywords." has been succesfully edited!')</script>";
		echo "<meta http-equiv='refresh' content='0;url='index.php?p=edit''>";
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
<!-- Abstract edit -->
            <div class="box-body">
			<section class="content">
      <div class="row">
        <div class="col-md-12">
		<form enctype="multipart/form-data" method="POST">
		<div class="form-group">
                  <h3><strong>Title</strong></h3>
                  <input type="text" class="form-control" name="title" id="title" value="<?php echo $res['title']?>">
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
						  <input type="text" name="author1fname" id="author1fname" class="form-control" value="<?php echo $res['author1fname']?>" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" name="author1lname" id="author1lname" class="form-control" value="<?php echo $res['author1lname']?>" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" name="author1inst" id="author1inst" class="form-control" value="<?php echo $res['author1inst']?>" placeholder="Institution">
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
						  <input type="text" name="authorcorfname" id="authorcorfname" class="form-control" value="<?php echo $res['authorcorfname']?>" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" name="authorcorlname" id="authorcorlname" class="form-control" value="<?php echo $res['authorcorlname']?>" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="email" name="authorcormail" id="authorcormail" class="form-control" value="<?php echo $res['authorcormail']?>" placeholder="Email">
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
						  <input type="text" name="author2fname" id="author2fname" class="form-control" value="<?php echo $res['author2fname']?>" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" name="author2lname" id="author2lname" class="form-control" value="<?php echo $res['author2lname']?>" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" name="author2inst" id="author2inst" class="form-control" value="<?php echo $res['author2inst']?>" placeholder="Institution">
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
						  <input type="text" name="author3fname" id="author3fname" class="form-control" value="<?php echo $res['author3fname']?>" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" name="author3lname" id="author3lname" class="form-control" value="<?php echo $res['author3lname']?>" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" name="author3inst" id="author3inst" class="form-control" value="<?php echo $res['author3inst']?>" placeholder="Institution">
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
						  <input type="text" name="author4fname" id="author4fname" class="form-control" value="<?php echo $res['author4fname']?>" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" name="author4lname" id="author4lname" class="form-control" value="<?php echo $res['author4lname']?>" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" name="author4inst" id="author4inst" class="form-control" value="<?php echo $res['author4inst']?>" placeholder="Institution">
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
						  <input type="text" name="author5fname" id="author5fname" class="form-control" value="<?php echo $res['author5fname']?>" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" name="author5lname" id="author5lname" class="form-control" value="<?php echo $res['author5fname']?>" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" name="author5inst" id="author5inst" class="form-control" value="<?php echo $res['author5inst']?>" placeholder="Institution">
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
						  <input type="text" name="author6fname" id="author6fname" class="form-control" value="<?php echo $res['author6fname']?>" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" name="author6lname" id="author6lname" class="form-control" value="<?php echo $res['author6lname']?>" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" name="author6inst" id="author6inst" class="form-control" value="<?php echo $res['author6inst']?>" placeholder="Institution">
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
						  <input type="text" name="author7fname" id="author7fname" class="form-control" value="<?php echo $res['author7fname']?>" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" name="author7lname" id="author7lname" class="form-control" value="<?php echo $res['author7lname']?>" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" name="author7inst" id="author7inst" class="form-control" value="<?php echo $res['author7inst']?>" placeholder="Institution">
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
                    <textarea id="abstract_edit" name="abstract_edit" rows="10" cols="80" style="width:100%"><?php echo $res['abstract']?></textarea>
					<script language="javascript">
						CKEDITOR.replace('abstract_edit',
						{
							customConfig: 'config_abstract.js'
						});
						CKEDITOR.add
					</script>
            </div>
          </div>
		  <div class="form-group">
                  <h3><strong>Keywords</strong></h3>
                  <input type="text" name="keywords" id="keywords" class="form-control" id="exampleInputEmail1" value="<?php echo $res['keywords']?>" placeholder="Enter your keywords here">
		  </div>
          </div>
			<div class="col-sm-10">
				<div class="pull-right">
				<h3>click to save and submit <i class="fa fa-hand-o-right"></i></h3>
				</div>
			</div>
			<div class="col-sm-2">
				<button type="submit" action="POST" name="submitAbtractEdit" id="tombolSave" class="btn btn-app">
					<i class="fa fa-save"></i> Save
				</button>
			</div>
			</form>
        </div>
        <!-- /.col-->
      </div>
			</div>
<!-- end of Abstract edit -->
<?php
}
?>