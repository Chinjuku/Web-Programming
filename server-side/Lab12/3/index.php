<?php
    $result = json_decode(file_get_contents("http://10.0.15.21/lab/lab12/restapis/products.php?list=10"));
?>
<!DOCTYPE HTML>
<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
<script>
window.onload = function() {
    var dataPoints = <?php echo json_encode($result, JSON_NUMERIC_CHECK); ?>;
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title:{
            text: "Price of Products"
        },
        axisY: {
            title: "Unit Price (in THB)",
            includeZero: true,
            suffix: " Baht"
        },
        data: [{
            type: "bar",
            yValueFormatString: "#,##0 Baht",
            indexLabel: "{ProductName}",
            indexLabelPlacement: "inside",
            indexLabelFontWeight: "bolder",
            indexLabelFontColor: "white",
            dataPoints: dataPoints.map(function(dataPoint) {
                return { label: dataPoint.ProductName, y: dataPoint.UnitPrice };
            })
        }]
    });
    chart.render();
}
</script>
</head>
<body class="h-screen flex justify-center items-center">
<div id="chartContainer" style="height: 410px; width: 75%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>
