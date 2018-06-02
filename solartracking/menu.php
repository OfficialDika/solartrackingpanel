<?php
 if (isset($_GET['page'])) {

	$active = $_GET['page'];
}else{
	$active = '';
}

?>
<aside class="main-sidebar">
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <ul class="sidebar-menu">
            <li class="header">AUTOMATED SOLAR PANELS</li>
            <li class="treeview <?php if ($active == 'dashboard' || $active == ''){echo "active";}?>">
              <a href="index.php?page=dashboard">
				<i class="fa fa-dashboard"></i>
				<span>Dashboard</span>
				<span class="pull-right-container"></span>
			  </a>
            </li>
			<li class="treeview <?php if ($active == 'today' || $active == 'daily' || $active == 'weekly' || $active == 'monthly' || $active == 'yearly'){echo "active";}?>">
              <a href="#">
				<i class="fa fa-pie-chart"></i>
						<span>Charts</span>
						<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
						</span>
				</a>
				<ul class="treeview-menu">
					<li class="<?php if ($active == 'today'){echo 'active';}?>"><a href="index.php?page=today"><i class="fa fa-circle-o"></i> Today</a></li>
          <li class="<?php if ($active == 'daily'){echo 'active';}?>"><a href="index.php?page=daily"><i class="fa fa-circle-o"></i> Daily</a></li>
          <li class="<?php if ($active == 'weekly'){echo 'active';}?>"><a href="index.php?page=weekly"><i class="fa fa-circle-o"></i> Weekly</a></li>
					<li class="<?php if ($active == 'monthly'){echo 'active';}?>"><a href="index.php?page=monthly"><i class="fa fa-circle-o"></i> Monthly</a></li>
					<li class="<?php if ($active == 'yearly'){echo 'active';}?>"><a href="index.php?page=yearly"><i class="fa fa-circle-o"></i> Yearly</a></li>
				</ul>
            </li>
			<!-- <li class="treeview menu-open"> -->

			<li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
</aside>
