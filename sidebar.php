<?php
$query = mysqli_query($link, "SELECT * FROM tbl_user WHERE username='".$sessionUser."'");
$query_user = mysqli_fetch_array($query);
?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="data/images/user_profile/<?php echo $query_user['profpic'];?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $query_user['firstName']." ". $query_user['lastName']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">AUTHOR NAVIGATION</li>
        <li class="<?php if(empty($_GET['p'])){echo 'active treeview';};?>">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="<?php if(!empty($_GET['p'])){if($_GET['p']=="profile"){echo 'active treeview';}};?>"><a href="index.php?p=profile"><i class="fa fa-user"></i> <span>Profile</span></a></li>
		<li class="<?php if(!empty($_GET['p'])){if($_GET['p']=="guide"){echo 'active treeview';}};?>"><a href="index.php?p=guide"><i class="fa fa-check"></i> <span>Submission Guideline</span></a></li>
		<li class="<?php if(!empty($_GET['p'])){if($_GET['p']=="submit"){echo 'active treeview';}};?>"><a href="index.php?p=submit"><i class="fa fa-plus-square"></i> <span>Submit New Abstract</span></a></li>
		<li class="<?php if(!empty($_GET['p'])){if($_GET['p']=="list"){echo 'active treeview';}};?>"><a href="index.php?p=list" title="list of your submitted paper"><i class="fa fa-book"></i> <span>Full Paper List</span></a></li>
        <div style="display:none;">
		<li class="header">ADMIN NAVIGATION</li>
		<li>
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
		<li><a href=""><i class="fa fa-users"></i> <span>Users</span><i class="fa fa-angle-left pull-right"></i></a>
			<ul class="treeview-menu">
				<li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> View users</a></li>
				<li><a href="index2.html"><i class="fa fa-circle-o"></i> Edit users</a></li>
			</ul>
		</li>
		<li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Submitted Manuscript</span></a></li>
		</div>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>