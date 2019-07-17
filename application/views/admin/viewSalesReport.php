
<div id="chartContainer" style="height: 300px; width: 100%; margin-top:50px;"></div>
<small><b>X:Month and Year</b></small><br>
<small><b>Y:Total Sales in ₹</b></small>
<script>
window.onload = function () {

var options = {
	title: {
		text: "Sales By month"              
	},
	data: [              
	{
		type: "column",
		dataPoints: [
			<?php echo $dataPoints; ?>		
		]
	}
	]
};

$("#chartContainer").CanvasJSChart(options);
}
</script>