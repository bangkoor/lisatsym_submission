<?php
$paper_id = $_GET['id'];
$namaFile = $paper_id."full";
$namaFileFig = $paper_id."fig";
$status_check = mysqli_query($link, "SELECT title, abs_status, full_status FROM tbl_title WHERE paper_id='".$paper_id."'");
$res_status = mysqli_fetch_array($status_check);
if($res_status['full_status'] == "submitted"){
	echo "<script>alert('The full version of your paper, ".$res_status['title'].", is already submitted')</script>";
} else if ($res_status['abs_status'] == "rejected"){
	echo "<script>alert('Your paper, ".$res_status['title'].", is rejected. You cannot edit or upload the full paper')</script>";
} else {
if(isset($_POST['submitfull'])){
	$allowed_ext_doc	= array('docx', 'doc');
	$file_name_doc 		= $_FILES['full']['name'];
	$value_doc			= explode('.', $file_name_doc);
	$file_ext_doc		= strtolower(array_pop($value_doc));
	$file_size_doc		= $_FILES['full']['size'];
	$file_tmp_doc		= $_FILES['full']['tmp_name'];

	$allowed_ext_fig	= array('jpg', 'jpeg', 'png');
	$filter = array(
	  'files1',
	  'files2',
		'files3',
		'files4',
		'files5',
		'files6',
		'files7'
	);
	$i = 0;
	foreach($_FILES as $key => $file)
	{
	    if(!in_array($key, $filter)) continue;

	    $i++;
	    ${'file_ext_fig'.$i}    = pathinfo($file['name'], PATHINFO_EXTENSION);
	    ${'file_name_fig'.$i}   = pathinfo($file['name'], PATHINFO_FILENAME);
			${'file_tmp_fig'.$i}    = $file['tmp_name'];
	}
	/*$lok = 'data/figures/'.$paper_id;
	echo "<script>alert('".$lok."')</script>";
	mkdir($lok,0777);*/

	$lokasi_fig = 'data/figures/'.$namaFileFig.'.'.$file_ext_fig1;
	move_uploaded_file($file_tmp_fig1, $lokasi_fig);
	echo "<script>alert('".$lokasi_fig."')</script>";
	/*if(!$file_name_fig[7] == NULL){
		$x = 7;
	} else if(!$file_name_fig[6] == NULL){
		$x = 6;
	} else if(!$file_name_fig[5] == NULL){
		$x = 5;
	} else if(!$file_name_fig[4] == NULL){
		$x = 4;
	} else if(!$file_name_fig[3] == NULL){
		$x = 3;
	} else if(!$file_name_fig[2] == NULL){
		$x = 2;
	} else {
		$x = 1;
	}*/

	if($file_size_doc === 0){
		echo "<script>alert('ERROR: Please provide the full paper!')</script>";
	}else if(in_array($file_ext_doc, $allowed_ext_doc) === true){
					if($file_size_doc < 1024000){
						if(!$file_name_doc == NULL){
							$queryfull = mysqli_query($link, "INSERT INTO tbl_full VALUE ('".$paper_id."', '".$namaFile.".".$file_ext_doc."')");
							$querystatus = mysqli_query($link, "UPDATE tbl_title SET full_status='submitted' WHERE paper_id='".$paper_id."'");
						}
						$lokasi = 'data/fullpaper/'.$namaFile.'.'.$file_ext_doc;
						move_uploaded_file($file_tmp_doc, $lokasi);
						echo "<script>alert('".$lokasi."')</script>";
						echo "<meta http-equiv='refresh' content='0;url='list.php''>";
						exit;
					}else{
						echo "<script>alert('ERROR: File is to large! (max = 1000 kb)')</script>";
					}
				}else{
					echo "<script>alert('ERROR: File extension not allowed!')</script>";
				}
}
?>
<script language="javascript">
function addDiv(form, tombol1, tombol2) {
	var form = document.getElementById(form);
	var tom1 = document.getElementById(tombol1);
	var tom2 = document.getElementById(tombol2);
		form.style.display = "block";
		tom1.style.display = "none";
		tom2.style.display = "block";
}
</script>
            <div class="box-body">
			<section class="content">
      <div class="row">
        <div class="col-md-12">
		<form enctype="multipart/form-data" method="POST">
		<input type="text" name="paper_id" value="<?php echo $paper_id ?>" style="display:none;"></input>
		<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"><strong>Full Paper</strong>
              </h3>
			  <p>Upload your full paper in <strong>doc or docx</strong> format here. Please make sure your paper has been prepared by using our format. Please download our paper template here.</p>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
					<div class="row">
								<div class="col-sm-7">
								<div class="form-group">
									<label for="exampleInputFile">File input</label><br/>
										<a class="btn btn-primary" onclick="javascript:full('full','docname');"><i class="fa fa-paperclip"></i> browse file</a>
										<input id="full" name="full" style="display:none;" type="file"/>
										<span id="docname"></span>
								</div>
							</div>
            </div>
          </div>
		  </div>
		  <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title"><strong>Figures</strong>
                <p>Please upload figures in <font color="red">min 300 dpi, jpg or png format</font> one by one</p>
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
			<div class="col-sm-12">

					<div class="box-body pad">
						<div id="uploadContainer">
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
							<div class="row">
								<div class="col-sm-7">
								<h2>1</h2>
								<div class="form-group">
									<label for="exampleInputFile">File input</label><br/>
										<a class="btn btn-primary" onclick="javascript:ambil('files1','image1', 'text1', 'clear1', 'cap1');"><i class="fa fa-paperclip"></i> browse file</a>
										<input id="files1" name="files1" style="display:none;" type="file"/>
										<span id="text1"></span>
								</div>
								<label for="exampleInputFile">Figure number and caption</label>
								<input type="text" id="fignum1" class="form-control" onkeyup="javascript:copyText('fignum1','figcap1','cap1')" placeholder="Figure number (e.g. 1)"><br/>
								<input type="text" id="figcap1" class="form-control" onkeyup="javascript:copyText('fignum1','figcap1','cap1')" placeholder="Figure caption">
								</div>
								<div class="col-sm-3">
									<div id="message1"></div>
									<img id="image1" style="width:100%;margin:10px;"></img>
									<div align="center" id="cap1"></div>
								</div>
								<div class="col-sm-2">
									<button type="button" class="btn btn-danger btn-sm" id="clear1" style="display:none;"><i class="fa fa-times"></i> Clear</button>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-7">
								<h2>2</h2>
								<div class="form-group">
									<label for="exampleInputFile">File input</label><br/>
										<a class="btn btn-primary" onclick="ambil('files2','image2', 'text2', 'clear2','cap2');"><i class="fa fa-paperclip"></i> browse file</a>
										<input id="files2" name="files2" style="display:none;" type="file"/>
										<span id="text2"></span>
								</div>
								<label for="exampleInputFile">Figure number and caption</label>
								<input type="text" id="fignum2" class="form-control" onkeyup="javascript:copyText('fignum2','figcap2','cap2')" placeholder="Figure number (e.g. 1)"><br/>
								<input type="text" id="figcap2" class="form-control" onkeyup="javascript:copyText('fignum2','figcap2','cap2')" placeholder="Figure caption">
								</div>
								<div class="col-sm-3">
									<div id="message2"></div>
									<img id="image2" style="width:100%;margin:10px;"></img>
									<div align="center" id="cap2"></div>
								</div>
								<div class="col-sm-2">
									<button type="button" class="btn btn-danger btn-sm" id="clear2" style="display:none;"><i class="fa fa-times"></i> Clear</button>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-7">
								<h2>3</h2>
								<div class="form-group">
									<label for="exampleInputFile">File input</label><br/>
										<a class="btn btn-primary" onclick="ambil('files3','image3','text3','clear3', 'cap3');"><i class="fa fa-paperclip"></i> browse file</a>
										<input id="files3" name="files3" style="display:none;" type="file"/>
										<span id="text3"></span>
								</div>
								<label for="exampleInputFile">Figure number and caption</label>
								<input type="text" id="fignum3" class="form-control" onkeyup="javascript:copyText('fignum3','figcap3','cap3')" placeholder="Figure number (e.g. 1)"><br/>
								<input type="text" id="figcap3" class="form-control" onkeyup="javascript:copyText('fignum3','figcap3','cap3')" placeholder="Figure caption">
								</div>
								<div class="col-sm-3">
									<div id="message3"></div>
									<img id="image3" style="width:100%;margin:10px;"></img>
									<div align="center" id="cap3"></div>
								</div>
								<div class="col-sm-2">
									<button type="button" class="btn btn-danger btn-sm" id="clear3" style="display:none;"><i class="fa fa-times"></i> Clear</button>
								</div>
							</div>

							<div class="row" id="form4" style="display:none;">
								<div class="col-sm-7">
								<h2>4</h2>
								<div class="form-group">
									<label for="exampleInputFile">File input</label><br/>
										<a class="btn btn-primary" onclick="ambil('files4','image4','text4','clear4', 'cap4');"><i class="fa fa-paperclip"></i> browse file</a>
										<input id="files4" name="files4" style="display:none;" type="file"/>
										<span id="text4"></span>
								</div>
								<label for="exampleInputFile">Figure number and caption</label>
								<input type="text" id="fignum4" class="form-control" onkeyup="javascript:copyText('fignum4','figcap4','cap4')" placeholder="Figure number (e.g. 1)"><br/>
								<input type="text" id="figcap4" class="form-control" onkeyup="javascript:copyText('fignum4','figcap4','cap4')" placeholder="Figure caption">
								</div>
								<div class="col-sm-3">
									<div id="message4"></div>
									<img id="image4" style="width:100%;margin:10px;"></img>
									<div align="center" id="cap4"></div>
								</div>
								<div class="col-sm-2">
									<button type="button" class="btn btn-danger btn-sm" id="clear4" style="display:none;"><i class="fa fa-times"></i> Clear</button>
								</div>
							</div>

							<div class="row" id="form5" style="display:none;">
								<div class="col-sm-7">
								<h2>5</h2>
								<div class="form-group">
									<label for="exampleInputFile">File input</label><br/>
										<a class="btn btn-primary" onclick="ambil('files5','image5','text5','clear5','cap5');"><i class="fa fa-paperclip"></i> browse file</a>
										<input id="files5" name="files5" style="display:none;" type="file"/>
										<span id="text5"></span>
								</div>
								<label for="exampleInputFile">Figure number and caption</label>
								<input type="text" id="fignum5" class="form-control" onkeyup="javascript:copyText('fignum5','figcap5','cap5')" placeholder="Figure number (e.g. 1)"><br/>
								<input type="text" id="figcap5" class="form-control" onkeyup="javascript:copyText('fignum5','figcap5','cap5')" placeholder="Figure caption">
								</div>
								<div class="col-sm-3">
									<div id="message5"></div>
									<img id="image5" style="width:100%;margin:10px;"></img>
									<div align="center" id="cap5"></div>
								</div>
								<div class="col-sm-2">
									<button type="button" class="btn btn-danger btn-sm" id="clear5" style="display:none;"><i class="fa fa-times"></i> Clear</button>
								</div>
							</div>

							<div class="row" id="form6" style="display:none;">
								<div class="col-sm-7">
								<h2>6</h2>
								<div class="form-group">
									<label for="exampleInputFile">File input</label><br/>
										<a class="btn btn-primary" onclick="ambil('files6','image6','text6','clear6','cap6');"><i class="fa fa-paperclip"></i> browse file</a>
										<input id="files6" name="files6" style="display:none;" type="file"/>
										<span id="text6"></span>
								</div>
								<label for="exampleInputFile">Figure number and caption</label>
								<input type="text" id="fignum6" class="form-control" onkeyup="javascript:copyText('fignum6','figcap6','cap6')" placeholder="Figure number (e.g. 1)"><br/>
								<input type="text" id="figcap6" class="form-control" onkeyup="javascript:copyText('fignum6','figcap6','cap6')" placeholder="Figure caption">
								</div>
								<div class="col-sm-3">
									<div id="message6"></div>
									<img id="image6" style="width:100%;margin:10px;"></img>
									<div align="center" id="cap6"></div>
								</div>
								<div class="col-sm-2">
									<button type="button" class="btn btn-danger btn-sm" id="clear6" style="display:none;"><i class="fa fa-times"></i> Clear</button>
								</div>
							</div>

							<div class="row" id="form7" style="display:none;">
								<div class="col-sm-7">
								<h2>7</h2>
								<div class="form-group">
									<label for="exampleInputFile">File input</label><br/>
										<a class="btn btn-primary" onclick="ambil('files7','image7','text7','clear7','cap7');"><i class="fa fa-paperclip"></i> browse file</a>
										<input id="files7" name="files7" style="display:none;" type="file"/>
										<span id="text7"></span>
								</div>
								<label for="exampleInputFile">Figure number and caption</label>
								<input type="text" id="fignum7" class="form-control" onkeyup="javascript:copyText('fignum7','figcap7','cap7')" placeholder="Figure number (e.g. 1)"><br/>
								<input type="text" id="figcap7" class="form-control" onkeyup="javascript:copyText('fignum7','figcap7','cap7')" placeholder="Figure caption">
								</div>
								<div class="col-sm-3">
									<div id="message7"></div>
									<img id="image7" style="width:100%;margin:10px;"></img>
									<div align="center" id="cap7"></div>
								</div>
								<div class="col-sm-2">
									<button type="button" class="btn btn-danger btn-sm" id="clear7" style="display:none;"><i class="fa fa-times"></i> Clear</button>
								</div>

							</div>
						</div><br/>
						<div class="col-sm-3">
						<div id="info" style="display:none;" class="alert alert-warning alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Alert!</h4>
							You alrady reach maximum slot for figure. You may upload more figures by following this link
						</div>
						<a type="button" id="tombol4" style="display:block;" class="btn btn-primary btn-sm" href="javascript:addDiv('form4','tombol4','tombol5');"/><i class="fa fa-plus"></i> Add new upload form</a>
						<a type="button" id="tombol5" style="display:none;" class="btn btn-primary btn-sm" href="javascript:addDiv('form5','tombol5','tombol6');"/><i class="fa fa-plus"></i> Add new upload form</a>
						<a type="button" id="tombol6" style="display:none;" class="btn btn-primary btn-sm" href="javascript:addDiv('form6','tombol6','tombol7');"/><i class="fa fa-plus"></i> Add new upload form</a>
						<a type="button" id="tombol7" style="display:none;" class="btn btn-primary btn-sm" href="javascript:addDiv('form7','tombol7','info');"/><i class="fa fa-plus"></i> Add new upload form</a>
						</div>
					</div>
			</div>
          </div>
          </div>
			<div class="col-sm-10">
				<div class="pull-right">
				<h3>click to save and submit <i class="fa fa-hand-o-right"></i></h3>
				</div>
			</div>
			<div class="col-sm-2">
				<button type="submit" action="POST" name="submitfull" id="tombolSave" class="btn btn-app">
					<i class="fa fa-save"></i> Save
				</button>
			</div>
			</form>
        </div>
        <!-- /.col-->
      </div>
			</div>
<!-- end of Abstract edit -->
<script>
function copyText(fignum, figcap, cap){
	var fignum = document.getElementById(fignum).value;
	var figcap = document.getElementById(figcap).value;
	var dot = ". ";
	var figure = "Figure ";
	var cap = document.getElementById(cap);
	cap.innerHTML = figure.concat(fignum, dot, figcap);
}
</script>
<script>
function full(files, text){
	document.getElementById(files).click();
	document.getElementById(files).onchange = function () {
	var filename = document.getElementById(files).value;
    var lastIndex = filename.lastIndexOf("\\");
    if (lastIndex >= 0) {
        filename = filename.substring(lastIndex + 1);
    }
    document.getElementById(text).innerHTML = filename;
};
}
</script>
<script>
function ambil(files, image, text, clear, cap){
	document.getElementById(files).click();
	document.getElementById(files).onchange = function () {
    var reader = new FileReader();
	document.getElementById(clear).style.display = 'block';
    reader.onload = function (e) {
        // get loaded data and render thumbnail.
       document.getElementById(image).src = e.target.result;
    };
	var filename = document.getElementById(files).value;
    var lastIndex = filename.lastIndexOf("\\");
    if (lastIndex >= 0) {
        filename = filename.substring(lastIndex + 1);
    }
    document.getElementById(text).innerHTML = filename;
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
	document.getElementById(image).style.display = 'block';
	document.getElementById(cap).style.display = 'block';
};
	document.getElementById(clear).onclick = function () {
		document.getElementById(image).style.display = 'none';
		document.getElementById(clear).style.display = 'none';
		document.getElementById(cap).style.display = 'none';
	}
}
</script>
<script>
document.getElementById('files1').addEventListener('change', checkFile, false);
files2.addEventListener('change', function(){
	checkFile('files1');
}, false);
files3.addEventListener('change', checkFile, false);
files4.addEventListener('change', checkFile, false);
files5.addEventListener('change', checkFile, false);
files6.addEventListener('change', checkFile, false);
files7.addEventListener('change', checkFile, false);

function checkFile(e) {
	var file_list = e.target.files;
	for (var i = 0, file; file = file_list[i]; i++) {
		var sFileName = file.name;
		var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
		var iFileSize = file.size;
		var iConvert = (file.size / 10485760).toFixed(2);
		if (!(sFileExtension === "jpg" || sFileExtension === "png" || sFileExtension === "tif") || iFileSize > 1048576) {
			txt = "File type : " + sFileExtension + "\n\n";
			txt += "Size: " + iConvert + " MB \n\n";
			txt += "Please make sure your file is in jpg or png format and less than 1 MB.\n\n";
			alert(txt);
			document.getElementById('files1').value = "";
		}
	}
}

</script>
<?php } ?>
