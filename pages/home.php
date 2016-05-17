<?php
$query_message = mysqli_query($link, "SELECT * FROM `tbl_message` WHERE `to`= '".$query_user['username']."' OR `to`= 'all'  ORDER BY message_id DESC LIMIT 3");
//$message = mysqli_fetch_($query_message);
$no = 1;
//echo "<script>alert('".$message[0][1]."');</script>";
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
	  <h2>Welcome to the 3rd International Symposium on LISat 2016
	  <small>Administration Page</h2></small><br/>
	  <p>In this page, you are able to upload your abstract and full paper as the main requirement to attend the 3rd International Symposium on LAPAN-IPB Satellite 2016 as oral or poster presenter. The abstract and full paper should be submitted <strong>no later than June 25th 2016 (asbtract) and September 10th 2016 (full paper)</strong>.</p>
	  <p>Please refer to the <a href="guide.html">submission guideline</a> for more detail.</p>
	  <p>For technical support, please kindly contact us at <a href="mailto:lisatsymposium@apps.ipb.ac.id">lisatsymposium@apps.ipb.ac.id</a></p>
	<h3>Support team message</h3>
	<div class="row">
        <div class="col-md-12">
          <ul class="timeline">
		  <!-- message start -->
			<?php
			$no = 1;
			while($message = $query_message->fetch_assoc()){
				if($message['to'] === $query_user['username']){
					$class = "bg-orange";
					$user = "only for you";
				}else{
					$class = "";
					$user = "to all participant";
				}
			?>
            <li class="time-label">
                  <span class="bg-green">
                    <?php
					echo $message['date'];
					?>
                  </span>
            </li>
            <li>
              <i class="fa fa-bullhorn bg-blue"></i>
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                <h3 class="timeline-header">From Administrator, <font color="red"><?php echo $user;?></font></h3>
                <div class="timeline-body <?php echo $class;?>">
					<?php
					echo $message['message'];
					?>
                </div>
              </div>
            </li>
			<?php
			$no++;
			}
			?>
			<!-- message end -->
          </ul>
        </div>
        <!-- /.col -->
      </div>
	</section>
  </div>
  <!-- /.content-wrapper -->
