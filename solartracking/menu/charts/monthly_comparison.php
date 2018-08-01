<?php
  if(isset($_POST["bulan"])){
    $bulan = $_POST["bulan"];
    // echo $bulan;
  } else {
    $bulan = date("Y")."-".date("m");
  }

  if(isset($_POST["bulan1"])){
    $bulan1 = $_POST["bulan1"];
    // echo $bulan1;
  } else {
    $bulan1 = date("Y")."-".date("m");
  }

include '../db_connect.php';
$query = "SELECT avg(volt), avg(ampere), avg(suhu), DATE(timestamp) FROM mobile WHERE timestamp LIKE '".$bulan."-%'";
$query1 = "SELECT avg(volt), avg(ampere), avg(suhu), DATE(timestamp) FROM mobile WHERE timestamp LIKE '".$bulan1."-%'";
// $query = "SELECT * FROM `average` WHERE date like '".$bulan."%'";
// $query = "SELECT * FROM `average` WHERE date like '".$bulan1."%'";
$result = mysqli_query($con, $query)or die("Error: ".mysqli_error($con));
$no=0;
while($row_tarik = mysqli_fetch_array($result)){
		$no++;
		$suhu = $row_tarik['avg(suhu)'];
		$volt = $row_tarik['avg(volt)'];
		$ampere = $row_tarik['avg(ampere)'];
		$watt = $volt * $ampere;
}

$result1 = mysqli_query($con, $query1)or die("Error: ".mysqli_error($con));
$no=0;
while($row_tarik1 = mysqli_fetch_array($result1)){
		$no++;
		$suhu1 = $row_tarik1['avg(suhu)'];
		$volt1 = $row_tarik1['avg(volt)'];
		$ampere1 = $row_tarik1['avg(ampere)'];
		$watt1 = $volt1 * $ampere1;
}
?>


<div class="col-md-12">
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Monthly Comparison</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div>

		<!-- /.box-header -->
		<div class="box-body">
      <form action="index.php?page=monthly_comparison" method="POST">
      <label for="bulan" class="col-sm-2">Choose a Month</label>
      <input type="month" class="col-sm-2" id="bulan" name="bulan" value="<?php echo $bulan;?>">
			<label for="bulan1" class="col-sm-2">Choose a Second Month</label>
			<input type="month" class="col-sm-2" id="bulan1" name="bulan1" value="<?php echo $bulan1;?>">
			<div class="col-sm-2">
				<button type="submit" class="btn btn-primary" style="padding-top:0px; padding-bottom:0">Sort</button>
			</div>
			</form>
			<div class="row">
				<div class="col-md-12">
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
					<div id="columnchart_values" style="margin-top:30px;" width="50%"></div>
          <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

      <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ["Element", "Density", { role: "style" } ],
            ["<?php echo $bulan;?>", <?php echo $watt;?>, "blue"],
            ["<?php echo $bulan1;?>", <?php echo $watt1;?>, "blue"],
          ]);
          var view = new google.visualization.DataView(data);
          view.setColumns([0, 1,
                           { calc: "stringify",
                             sourceColumn: 1,
                             type: "string",
                             role: "annotation" },
                           2]);
          var options = {
            title: "Daily Comparison Energy in WattHour",
            width: 1000,
            height: 400,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
          };

          var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
          chart.draw(view, options);
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
