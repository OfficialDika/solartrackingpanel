<div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Voltage</a></li>
              <li><a href="#timeline" data-toggle="tab">Ampere</a></li>
              <li><a href="#settings" data-toggle="tab">Watt</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="voltage">
                <div id="chart_volt" style="margin-top:30px;"></div>
      					<script>
      						google.charts.load('current', {packages: ['corechart', 'line']});

      						google.charts.setOnLoadCallback(drawBackgroundColor);



      						function drawBackgroundColor() {

      						var data = new google.visualization.DataTable();

      						data.addColumn('datetime', 'Time of Day');

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

      							    $volt = $row_tarik['volt'];

      							    $timestamp  = $row_tarik['timestamp'];

      							      $timestamp1 = explode(" ",$timestamp);

      							      $date = $timestamp1[0];

      							      $date1 = explode("-",$date);

      							      $year = $date1[0];

      							      $month = $date1[1]-1;

      							      $day = $date1[2];

      							      $time = $timestamp1[1];

      							      $time1 = explode(":",$time);

      							      $hour = $time1[0]+7;

      							      $minute = $time1[1];

      							      $second = $time1[2];





      							      echo "[new Date( ".$year.", ".$month.", ".$day.", ".$hour.", ".$minute."), ".$volt."],";



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
      						backgroundColor: '#f1f8e9'
      						};
      						var chart = new google.visualization.LineChart(document.getElementById('chart_volt'));

      						chart.draw(data, options);

      						}

      					</script>
              </div>
              <div class="tab-pane" id="ampere">
                <div id="chart_ampere" style="margin-top:30px;"></div>
      					<script>
      						google.charts.load('current', {packages: ['corechart', 'line']});

      						google.charts.setOnLoadCallback(drawBackgroundColor);



      						function drawBackgroundColor() {

      						var data = new google.visualization.DataTable();

      						data.addColumn('datetime', 'Time of Day');

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

      							    $ampere = $row_tarik['ampere'];

      							    $timestamp  = $row_tarik['timestamp'];

      							      $timestamp1 = explode(" ",$timestamp);

      							      $date = $timestamp1[0];

      							      $date1 = explode("-",$date);

      							      $year = $date1[0];

      							      $month = $date1[1]-1;

      							      $day = $date1[2];

      							      $time = $timestamp1[1];

      							      $time1 = explode(":",$time);

      							      $hour = $time1[0]+7;

      							      $minute = $time1[1];

      							      $second = $time1[2];





      							      echo "[new Date( ".$year.", ".$month.", ".$day.", ".$hour.", ".$minute."), ".$ampere."],";



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

      						backgroundColor: '#f1f8e9'

      						};



      						var chart = new google.visualization.LineChart(document.getElementById('chart_ampere'));

      						chart.draw(data, options);

      						}

      					</script>
      				</div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="watt">
                <!-- content 3-->
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

<!-- Notifications -->
      <div class="col-md-3">
      	<div class="box box-default">
      		<div class="box-header with-border">
      			<h3 class="box-title">Alert</h3>
      			<div class="box-tools pull-right">
      				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
      			</div>
      		</div>
