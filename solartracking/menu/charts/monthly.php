<?php
	if(isset($_POST["bulan"])){
	    $bulan = $_POST["bulan"];
		
	} else {
		$bulan = date("Y")."-".date("m");
	}
	//echo $bulan;
	?>
<div class="col-md-12">
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Monthly Chart</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<form action="index.php?page=monthly" method="POST">
							<label for="bulan" class="col-sm-3">Choose a Month</label>
							<input type="month" class="col-sm-3" id="bulan" name="bulan" max="December" value="<?php echo $bulan;?>">
							<div class="col-sm-2">
								<button type="submit" class="btn btn-primary" style="padding-top:0px; padding-bottom:0">Sort</button>
							</div>
						</form>
					</div>
					<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

					<!-- Temperature -->
					<div id="chart_div" style="margin-top:30px;" width="100%"></div>
					<script>
						google.charts.load('current', {packages: ['corechart', 'line']});
						google.charts.setOnLoadCallback(drawBackgroundColor);

						function drawBackgroundColor() {
						var data = new google.visualization.DataTable();
						data.addColumn('date', 'Date');
						data.addColumn('number', 'temperature');
						data.addRows([

						<?php
							if (isset($_POST['tgl'])) {
							    $tgl=$_POST['tgl'];
							} else {
							  $tgl=1;
							}
							include '../db_connect.php';
							if ($tgl==NULL){
							$query="SELECT * FROM `mobile` WHERE DATE(`timestamp`) >= '2018-01-01' and DATE(`timestamp`) <= '2018-12-31' GROUP BY 'MONTH' ORDER BY `raspberry`.`id` DESC";
							}else if ($tgl==2){
							$query="SELECT * FROM `mobile` WHERE DATE(`timestamp`) = '$tgl' ORDER BY `raspberry`.`id` DESC";
							}else if ($tgl==1) {

							// $query = "SELECT * FROM `mobile` WHERE DATE(`timestamp`) = CURDATE()";
							$query = "SELECT * FROM `average` WHERE date like '".$bulan."%'";
							}
							$result = mysqli_query($con, $query)or die("Error: ".mysqli_error($con));
							$no=0;
							while($row_tarik = mysqli_fetch_array($result)){
							    $no++;
							    //$id = $row_tarik['id'];
							    $suhu = $row_tarik['avg_temp'];
							    $timestamp  = $row_tarik['date'];
							      $timestamp1 = explode(" ",$timestamp);
							      $date = $timestamp1[0];
							      $date1 = explode("-",$date);
							      $year = $date1[0];
							      $month = $date1[1]-1;
							      $day = $date1[2];
							      echo "[new Date( ".$year.", ".$month.", ".$day."), ".$suhu."],";
							}
							?>
						]);
						var options = {
						hAxis: {
						title: 'Time'
						},
						vAxis: {
						title: 'Temperature (Celcius)'
						},
						colors: ['#3b8cbb'],
						backgroundColor: '#f1f8e9'
						};
						var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
						chart.draw(data, options);
						}
					</script>

					<!-- Voltage  -->
					<div id="chart_volt" style="margin-top:30px;"></div>
					<script>
						google.charts.load('current', {packages: ['corechart', 'line']});
						google.charts.setOnLoadCallback(drawBackgroundColor);
						function drawBackgroundColor() {
						var data = new google.visualization.DataTable();
						data.addColumn('date', 'Date');
						data.addColumn('number', 'voltage');
						data.addRows([
						<?php
							if (isset($_POST['tgl'])) {
							    $tgl=$_POST['tgl'];
							} else {
							  $tgl=1;
							}
							include '../db_connect.php';
							if ($tgl==NULL){
							$query="SELECT * FROM `mobile` WHERE DATE(`timestamp`) >= '2018-01-01' and DATE(`timestamp`) <= '2018-12-31' ORDER BY `raspberry`.`id` DESC";
							}else if ($tgl==2){
							$query="SELECT * FROM `mobile` WHERE DATE(`timestamp`) = '$tgl' ORDER BY `raspberry`.`id` DESC";
							}else if ($tgl==1) {
							// $query = "SELECT * FROM `mobile` WHERE DATE(`timestamp`) = CURDATE()";
							$query = "SELECT * FROM `average` WHERE date like '".$bulan."%'";
							}
							$result = mysqli_query($con, $query)or die("Error: ".mysqli_error($con));
							$no=0;
							while($row_tarik = mysqli_fetch_array($result)){
							    $no++;
							    //$id = $row_tarik['id'];
							    $volt = $row_tarik['avg_volt'];
							    $timestamp  = $row_tarik['date'];
							      $timestamp1 = explode(" ",$timestamp);
							      $date = $timestamp1[0];
							      $date1 = explode("-",$date);
							      $year = $date1[0];
							      $month = $date1[1]-1;
							      $day = $date1[2];
							      //$time = $timestamp1[1];
							      //$time1 = explode(":",$time);
							      //$hour = $time1[0]+7;
							      //$minute = $time1[1];
							      //$second = $time1[2];
							      echo "[new Date( ".$year.", ".$month.", ".$day."), ".$volt."],";

							}
							?>
						]);
						      var options = {
						hAxis: {
						title: 'Time'
						},
						vAxis: {
						title: 'Voltage (Volt)'
						},
						colors: ['#ffc600'],
						backgroundColor: '#f1f8e9'
						};
						var chart = new google.visualization.LineChart(document.getElementById('chart_volt'));
						chart.draw(data, options);
						}
					</script>

					<!-- Ampere -->
					<div id="chart_ampere" style="margin-top:30px;"></div>
					<script>
						google.charts.load('current', {packages: ['corechart', 'line']});
						google.charts.setOnLoadCallback(drawBackgroundColor);
						function drawBackgroundColor() {
						var data = new google.visualization.DataTable();
						data.addColumn('date', 'Date');
						data.addColumn('number', 'ampere');
						data.addRows([
						<?php
							if (isset($_POST['tgl'])) {
							    $tgl=$_POST['tgl'];
							} else {
							  $tgl=1;
							}
							include '../db_connect.php';
							if ($tgl==NULL){
							$query="SELECT * FROM `mobile` WHERE DATE(`timestamp`) >= '2018-01-01' and DATE(`timestamp`) <= '2018-12-31' ORDER BY `raspberry`.`id` DESC";
							}else if ($tgl==2){
							$query="SELECT * FROM `mobile` WHERE DATE(`timestamp`) = '$tgl' ORDER BY `raspberry`.`id` DESC";
							}else if ($tgl==1) {
							// $query = "SELECT * FROM `mobile` WHERE DATE(`timestamp`) = CURDATE()";
							$query = "SELECT * FROM `average` WHERE date like '".$bulan."%'";
							}
							$result = mysqli_query($con, $query)or die("Error: ".mysqli_error($con));
							$no=0;
							while($row_tarik = mysqli_fetch_array($result)){
							    $no++;
							    //$id = $row_tarik['id'];
							    $ampere = $row_tarik['avg_ampere'];
							    $timestamp  = $row_tarik['date'];
							      $timestamp1 = explode(" ",$timestamp);
							      $date = $timestamp1[0];
							      $date1 = explode("-",$date);
							      $year = $date1[0];
							      $month = $date1[1]-1;
							      $day = $date1[2];
							      //$time = $timestamp1[1];
							      //$time1 = explode(":",$time);
							      //$hour = $time1[0]+7;
							      //$minute = $time1[1];
							      //$second = $time1[2];
							      echo "[new Date( ".$year.", ".$month.", ".$day."), ".$ampere."],";
							}
							?>
						]);
						var options = {
						hAxis: {
						title: 'Time'
						},
						vAxis: {
						title: 'Current (Ampere)'
						},
						colors: ['#ff2534'],
						backgroundColor: '#f1f8e9'
						};
						var chart = new google.visualization.LineChart(document.getElementById('chart_ampere'));
						chart.draw(data, options);
						}
					</script>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->
</div>
