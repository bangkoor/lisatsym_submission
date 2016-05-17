<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Your Full Paper List
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Full paper list</li>
      </ol>
	  </section>
	  <section class="content">
	  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Full Paper List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
			<div style="margin:10px;">
              <table id="dataTables" class="table table-bordered table-striped">
				<thead>
                <tr>
				  <th>Action</th>
				  <th>#</th>
                  <th>Title</th>
				  <th>1st Author</th>
				  <th>Abstract Status</th>
				  <th>Full Paper Status</th>
                </tr>
				</thead>
				<tbody>
				<?php
				$no = 1;
				$res = mysqli_query($link, "SELECT * FROM tbl_title WHERE user_id=(SELECT user_id FROM tbl_user WHERE username='".$sessionUser."')");				
				while($row = $res->fetch_assoc()){
					if($row['abs_status'] == 'accepted'){
							$label = '<span class="label label-success">';
						} else if($row['abs_status'] == 'in review'){
							$label = '<span class="label label-info">';
						} else if($row['abs_status'] == 'revision'){
							$label = '<span class="label label-warning">';
						} else {
							$label = '<span class="label label-danger">';
						}
					if($row['full_status'] == 'submitted'){
							$label2 = '<span class="label label-success">';
						} else {
							$label2 = '<span class="label label-warning">';
						}
					if($row['abs_status'] == 'rejected' or $row['abs_status'] == 'in review' or $row['full_status'] == 'submitted'){
						$class1="btn-xs btn-danger disabled";
						$class2="btn-xs btn-danger disabled";
					}else if($row['abs_status'] == 'revision'){						
						$class1="btn-xs btn-danger";
						$class2="btn-xs btn-danger disabled";
					}else{
						$class1="btn-xs btn-danger";
						$class2="btn-xs btn-danger";
					}
					echo '
					<tr>
						<td><a href="index.php?p=list&section=abstract_edit&id='.$row['paper_id'].'" class="btn '.$class1.'" title="edit abstract" style="margin:2px;"><i class="fa fa-edit"></i> edit</a>
						<button type="button" class="btn '.$class2.'" title="withdraw" style="margin:2px;" data-toggle="modal" data-target="#withdraw"><i class="fa fa-remove"></i> withdraw</button>
						<a href="index.php?p=list&section=fullpaper_edit&id='.$row['paper_id'].'" class="btn '.$class2.'" title="submit full paper" style="margin:2px;"><i class="fa fa-plus"></i> full paper</a></td>
						<td>'.$no.'</td>
						<td>'.$row['title'].'</td>
						<td>
						'.$row['author1fname'].' '.$row['author1lname'].'
						</td>
						<td><font style="text-transform:uppercase;">'.$label, $row['abs_status'].'</span></font></td>
						<td><font style="text-transform:uppercase;">'.$label2, $row['full_status'].'</span></font></td>
						</span>
						</td>
					</tr>
					';
					$no++;
				}
				?>
				</tbody>
              </table>
<!-- Modal -->
<div class="modal fade" id="withdraw" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Paper withdrawal</h4>
      </div>
      <div class="modal-body">
        Are you sure?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-default">Yes</button>
      </div>
    </div>
  </div>
</div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
	  </section>
	<section class="content">
	<div class="row">
        <div class="col-xs-12">
          
		  <?php
		  $pages_dir = 'pages';
			if(!empty($_GET['section'])){
				$pages = scandir($pages_dir, 0);
				unset($pages[0], $pages[1]);
	 
				$section = $_GET['section'];
				if(in_array($p.'.php', $pages)){
					include($pages_dir.'/'.$section.'.php');
				} else {
					include($pages_dir.'/404.php');
				}
			}
			?>
		  
		</div>
	</div>
	</section>
  </div>
  <!-- /.content-wrapper -->
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="http://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script>
	$(document).ready(function() {
		$('#dataTables').DataTable();
	} );
	</script>