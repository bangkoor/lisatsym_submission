<script language="javascript"> 
function toggle2() {
	var auth2 = document.getElementById("author2");
	var tom2 = document.getElementById("tombol2");
	var tom3 = document.getElementById("tombol3");
		auth2.style.display = "block";
		tom2.style.display = "none";
		tom3.style.display = "block";
}
function toggle3() {
	var auth3 = document.getElementById("author3");
	var tom3 = document.getElementById("tombol3");
	var tom4 = document.getElementById("tombol4");
		auth3.style.display = "block";
		tom3.style.display = "none";
		tom4.style.display = "block";
}
function toggle4() {
	var auth4 = document.getElementById("author4");
	var tom4 = document.getElementById("tombol4");
	var tom5 = document.getElementById("tombol5");
		auth4.style.display = "block";
		tom4.style.display = "none";
		tom5.style.display = "block";
}
function toggle5() {
	var auth5 = document.getElementById("author5");
	var tom5 = document.getElementById("tombol5");
	var tom6 = document.getElementById("tombol6");
		auth5.style.display = "block";
		tom5.style.display = "none";
		tom6.style.display = "block";
}
function toggle6() {
	var auth6 = document.getElementById("author6");
	var tom6 = document.getElementById("tombol6");
	var tom7 = document.getElementById("tombol7");
		auth6.style.display = "block";
		tom6.style.display = "none";
		tom7.style.display = "block";
}
function toggle7() {
	var auth7 = document.getElementById("author7");
	var tom7 = document.getElementById("tombol7");
	var info = document.getElementById("info");
		auth7.style.display = "block";
		tom7.style.display = "none";
		info.style.display = "block";
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
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Abstract & Full Paper Submission
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Abstract & Full Paper</li>
      </ol>
	  <section class="content">
      <div class="row">
        <div class="col-md-12">
		<div class="form-group">
                  <h3><strong>Title</strong></h3>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter your paper title here">
                </div>
		<!-- -->
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
					  <div class="row">
						<div class="col-xs-6">
						  <input type="text" class="form-control" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" class="form-control" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" class="form-control" placeholder="Institution">
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
					  <div class="row">
						<div class="col-xs-12">
						  <input type="text" class="form-control" placeholder="Full name">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="email" class="form-control" placeholder="Email">
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
					  <div class="row">
						<div class="col-xs-6">
						  <input type="text" class="form-control" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" class="form-control" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" class="form-control" placeholder="Institution">
						</div>
					  </div>
					</div>
					<!-- /.box-body -->
				  </div>
			</div>
			<!-- end of 2nd author -->
			<div class="col-sm-3" id="info" style="display:none;">
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Alert!</h4>
					You already reach maximum slot for author.<br/>Leave the author form blank if there is cancellation
				</div>
			</div>
</div>
<div class="row">
			<!-- 3rd author -->
			<div class="col-sm-3" id="author3" style="display:none;">
				<div class="box box-success">
					<div class="box-header with-border">
					  <h3 class="box-title">3rd Author</h3>
					</div>
					<div class="box-body">
					  <div class="row">
						<div class="col-xs-6">
						  <input type="text" class="form-control" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" class="form-control" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" class="form-control" placeholder="Institution">
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
					  <div class="row">
						<div class="col-xs-6">
						  <input type="text" class="form-control" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" class="form-control" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" class="form-control" placeholder="Institution">
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
					  <div class="row">
						<div class="col-xs-6">
						  <input type="text" class="form-control" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" class="form-control" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" class="form-control" placeholder="Institution">
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
					  <div class="row">
						<div class="col-xs-6">
						  <input type="text" class="form-control" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" class="form-control" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" class="form-control" placeholder="Institution">
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
					  <div class="row">
						<div class="col-xs-6">
						  <input type="text" class="form-control" placeholder="Firstname">
						</div>
						<div class="col-xs-6">
						  <input type="text" class="form-control" placeholder="Lastname">
						</div>
					  </div><br />
					  <div class="row">
						<div class="col-xs-12">
						<input type="text" class="form-control" placeholder="Institution">
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
<a id="tombol2" class="btn btn-info" style="display:block;" href="javascript:toggle2();"><i class="fa fa-plus"></i> Add new author</a>
<a id="tombol3" class="btn btn-info" style="display:none;" href="javascript:toggle3();"><i class="fa fa-plus"></i> Add new author</a>
<a id="tombol4" class="btn btn-info" style="display:none;" href="javascript:toggle4();"><i class="fa fa-plus"></i> Add new author</a>
<a id="tombol5" class="btn btn-info" style="display:none;" href="javascript:toggle5();"><i class="fa fa-plus"></i> Add new author</a>
<a id="tombol6" class="btn btn-info" style="display:none;" href="javascript:toggle6();"><i class="fa fa-plus"></i> Add new author</a>
<a id="tombol7" class="btn btn-info" style="display:none;" href="javascript:toggle7();"><i class="fa fa-plus"></i> Add new author</a>
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
              <form>
                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                                            Type or paste your paper abstract here
                    </textarea>
              </form>
            </div>
          </div>
		  <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"><strong>Full Paper</strong>
                <small>(without figures)</small>
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
              <form>
                    <textarea id="editor2" name="editor2" rows="15" cols="80">
                                            Type or paste your full paper here (without any figures)
                    </textarea>
              </form>
            </div>
          </div>
		  <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"><strong>Figures</strong>
                <small>Please upload figures in <font color="red">min 300 dpi, jpg or png format</font> one by one</small>
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
			<div class="col-sm-3">
				<div class="form-group">
					  <label for="exampleInputFile">File input</label>
					  <input type="file" id="files" />

					  <p class="help-block">file size limit for each figure: 500kb</p>
					  <label for="exampleInputFile">Figure number and caption</label>
						<input type="text" class="form-control" placeholder="Figure number (e.g. Figure 1)">
						<input type="text" class="form-control" placeholder="Figure caption">
					  <button type="button" class="btn btn-primary" style="margin:5px;">
						<i class="fa fa-upload"></i> upload
					  </button><br/>
					<div class="progress progress-sm active">
						<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
						  <span class="sr-only">20% Complete</span>
						</div>
					  </div>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="box box-gray">
					<div class="box-header">
						<strong>Uploaded figure list</strong>
					</div>
					<div class="box-body pad">
						<div class="row">
							<div class="col-sm-3">
								<img id="image" width="200px" />
							</div>
							<div class="col-sm-7">
							<p>Figure 1. System working scheme</p>
							</div>
							<div class="col-sm-2">
								<button type="button" class="btn btn-danger btn-sm">delete</button>
							</div>
						</div>
						<hr/>
						<div class="row">
							<div class="col-sm-3">
								<img src="/data/images/figures/all.jpg" width="100%" />
							</div>
							<div class="col-sm-7">
							<p>Figure 2. Final suiatability map</p>
							</div>
							<div class="col-sm-2">
								<button type="button" class="btn btn-danger btn-sm">delete</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
          </div>
		  <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"><strong>Tables</strong>
                <small>Please upload tables in a <font color="red">Ms Word (.doc or .docx)</font> file</small>
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
			<div class="col-sm-3">
				<div class="form-group">
					  <label for="exampleInputFile">File input</label>
					  <input type="file" id="exampleInputFile">

					  <p class="help-block">file size limit for each figure: 500kb</p>
					  <button type="button" class="btn btn-primary" style="margin:5px;">
						<i class="fa fa-upload"></i> upload
					  </button><br/>
					<div class="progress progress-sm active">
						<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
						  <span class="sr-only">20% Complete</span>
						</div>
					  </div>
				</div>
			</div>
			</div>
          </div>
		  <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"><strong>References</strong>
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
              <form>
                    <textarea id="editor3" name="editor3" rows="15" cols="80">
                                            Type or paste your paper references here
                    </textarea>
              </form>
            </div>
          </div>
          </div>
			<div class="col-sm-10">
				<div class="pull-right">
				<h3>click to save and submit <i class="fa fa-hand-o-right"></i></h3>
				</div>
			</div>
			<div class="col-sm-2">
				<a class="btn btn-app">
					<i class="fa fa-save"></i> Save
				</a>
			</div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    </section>
  </div>
  <!-- /.content-wrapper -->
<script language="javascript">
  document.getElementById("files").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};
</script>