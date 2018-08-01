<?php
	if(isset($_POST["date"])){
	    $date = $_POST["date"];
	}
	else{$date=date("Y-m-d");
	}

	if(isset($_POST["date1"])){
			$date1 = $_POST["date1"];
	}
	else{$date1=date("Y-m-d");
	}

include '../db_connect.php';
$query = "SELECT * FROM `average` WHERE DATE(date) = '$date';";
$query1 = "SELECT * FROM `average` WHERE DATE(date) = '$date1';";

$result = mysqli_query($con, $query)or die("Error: ".mysqli_error($con));
$no=0;
while($row_tarik = mysqli_fetch_array($result)){
		$no++;
		$suhu = $row_tarik['avg_temp'];
		$volt = $row_tarik['avg_volt'];
		$ampere = $row_tarik['avg_ampere'];
		$watt = $volt * $ampere;
}

$result1 = mysqli_query($con, $query1)or die("Error: ".mysqli_error($con));
$no=0;
while($row_tarik1 = mysqli_fetch_array($result1)){
		$no++;
		$suhu1 = $row_tarik1['avg_temp'];
		$volt1 = $row_tarik1['avg_volt'];
		$ampere1 = $row_tarik1['avg_ampere'];
		$watt1 = $volt1 * $ampere1;
}
?>


<div class="col-md-12">
	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Daily Comparison</h3>
			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
		</div>

		<!-- /.box-header -->
		<div class="box-body">
      <form action="index.php?page=daily_comparison" method="POST">
      <label for="datetime" class="col-sm-2">Choose a Date</label>
      <input type="date" class="col-sm-2" id="date" name="date" value="<?php echo $date;?>">

			<label for="datetime" class="col-sm-2">Choose a Second Date</label>
			<input type="date" class="col-sm-2" id="date1" name="date1" value="<?php echo $date1;?>">
			<div class="col-sm-2">
				<button type="submit" class="btn btn-primary" style="padding-top:0px; padding-bottom:0">Sort</button>
			</div>
			</form>
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["<?php echo $date;?>", <?php echo $watt;?>, "blue"],
        ["<?php echo $date1;?>", <?php echo $watt1;?>, "blue"],
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
			<div class="row">
				<div class="col-md-12">
                    <div id="columnchart_values" style="margin-top:30px;" width="50%"></div>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->
</div>
