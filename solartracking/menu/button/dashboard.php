<div class="container">
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li><a href="#temperature" data-toggle="tab">Temperature</a></li>
      <li><a href="#voltage" data-toggle="tab">Voltage</a></li>
      <li><a href="#ampere" data-toggle="tab">Ampere</a></li>
    </ul>
    <div class="tab-content" style="width:100%">

      <!-- Temperature Chart -->
      <div class="tab-pane" id="temperature" style="width:100%">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <div id="chart_div" style="width:100%"> </div>
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
                  $hour = $time1[0]+7;
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
          colors: ['#3b8cbb'],
          backgroundColor: '#f1f8e9',
          'width' : 1100,
          'height' :300
          };
          var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
          chart.draw(data, options);
          }
        </script>
      </div>

      <!-- Voltage Chart -->
      <div class="tab-pane" id="voltage" style="width:100%">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <div id="chart_volt" style="width:100%"> </div>
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
          colors: ['#ffc600'],
          backgroundColor: '#f1f8e9',
          'width' : 1100,
          'height' :300
          };
          var chart = new google.visualization.LineChart(document.getElementById('chart_volt'));
          chart.draw(data, options);
          }
        </script>
      </div>

      <!-- Ampere Charts -->
      <div class="tab-pane" id="ampere" style="width:100%">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <div id="chart_ampere" style="width:100%"> </div>
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
          colors: ['#ff2534'],
          backgroundColor: '#f1f8e9',
          'width' : 1100,
          'height' :300
          };

          var chart = new google.visualization.LineChart(document.getElementById('chart_ampere'));
          chart.draw(data, options)
          }
        </script>
      </div>

    </div>
    <!-- /.tab-content -->
  </div>
  <!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->
  <!-- /.row -->
  <!-- Notifications -->
