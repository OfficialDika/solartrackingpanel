<?php
    if(isset($_POST["tanggal_awal"])){
        $tanggal_awal = $_POST["tanggal_awal"];
        echo $tanggal_awal;
    }
    if(isset($_POST["tanggal_akhir"])){
        $tanggal_akhir = $_POST["tanggal_akhir"];
        echo $tanggal_akhir;
    }
?>
<div class="col-md-9">          <div class="nav-tabs-custom">            <ul class="nav nav-tabs">              <li class="active"><a href="#activity" data-toggle="tab">Voltage</a></li>              <li><a href="#timeline" data-toggle="tab">Ampere</a></li>              <li><a href="#settings" data-toggle="tab">Watt</a></li>            </ul>            <div class="tab-content">              <div class="active tab-pane" id="voltage">                <!--content 1-->              </div>              <!-- /.tab-pane -->              <div class="tab-pane" id="ampere">                <!--content 2-->              </div>              <!-- /.tab-pane -->              <div class="tab-pane" id="watt">                <!-- content 3-->              </div>              <!-- /.tab-pane -->            </div>            <!-- /.tab-content -->          </div>          <!-- /.nav-tabs-custom -->        </div>        <!-- /.col -->      </div>      <!-- /.row -->	  
<div class="col-md-12">
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Suhu Tracker</h3>
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
						<form action="index.php?page=weekly" method="POST">
						<label for="tanggal_awal" class="col-sm-3">Pilih Waktu</label>
						<input type="date" class="col-sm-3" id="tanggal_awal" name="tanggal_awal">
						<label for="tanggal_akhir" class="col-sm-1" style="text-align:center;"> - </label>
						<input type="date" class="col-sm-3" id="tanggal_akhir" name="tanggal_akhir">
						<div class="col-sm-2">
							<button type="submit" class="btn btn-primary" style="padding-top:0px; padding-bottom:0">Sort</button>
						</div>
						</form>
					</div>
					<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
					<div id="chart_div"></div>
					<script>
						google.charts.load('current', {packages: ['corechart', 'line']});
						google.charts.setOnLoadCallback(drawBackgroundColor);
						
						function drawBackgroundColor() {
						var data = new google.visualization.DataTable();
						data.addColumn('datetime', 'Time of Day');
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
							$query="SELECT * FROM `mobile` WHERE DATE(`timestamp`) >= '2018-03-01' and DATE(`timestamp`) <= '2018-03-04' ORDER BY `raspberry`.`id` DESC";
							}else if ($tgl==2){
							$query="SELECT * FROM `mobile` WHERE DATE(`timestamp`) = '$tgl' ORDER BY `raspberry`.`id` DESC";
							}else if ($tgl==1) {
							
							// $query = "SELECT * FROM `mobile` WHERE DATE(`timestamp`) = CURDATE()";
							$query = "SELECT * FROM `mobile` WHERE DATE(timestamp) = CURDATE()";
							}
							$result = mysqli_query($con, $query)or die("Error: ".mysqli_error($con));
							$no=0;
							while($row_tarik = mysqli_fetch_array($result)){
							    $no++;
							    $id = $row_tarik['id'];
							    $suhu = $row_tarik['suhu'];
							    $timestamp  = $row_tarik['timestamp'];
							      $timestamp1 = explode(" ",$timestamp);
							      $date = $timestamp1[0];
							      $date1 = explode("-",$date);
							      $year = $date1[0];
							      $month = $date1[1]-1; 
							      $day = $date1[2];
							      $time = $timestamp1[1];
							      $time1 = explode(":",$time);
							      $hour = $time1[0];
							      $minute = $time1[1]; 
							      $second = $time1[2];
							      
							      
							      echo "[new Date( ".$year.", ".$month.", ".$day.", ".$hour.", ".$minute."), ".$suhu."],";
							
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
						backgroundColor: '#f1f8e9'
						};
						
						var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
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