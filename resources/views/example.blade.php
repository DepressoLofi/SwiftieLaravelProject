<?php

$dataPoints = [['label' => 'Taylor Swift', 'y' => 1, 'color' => '#a9c2a4'],
                ['label' => 'Fearless', 'y' => 1, 'color' => '#e4b975'],
                ['label' => 'Speak Now', 'y' => 1, 'color' => '#c4a5c5'],
                ['label' => 'Red', 'y' => 1, 'color' => '#e7163a'],
                ['label' => '1989', 'y' => 1, 'color' => '#b1daec'],
                ['label' => 'Reputation', 'y' => 1, 'color' => '#393436'],
                ['label' => 'Lover', 'y' => 1, 'color' => '#f0aac6'],
                ['label' => 'Folklore', 'y' => 1, 'color' => '#c5c2bb'],
                ['label' => 'Evermore', 'y' => 1, 'color' => '#c76b03'],
                ['label' => 'Midnights', 'y' => 1, 'color' => '#3c435d']];

?>
<!DOCTYPE HTML>
<html>

<head>
    <script>
        window.onload = function() {


            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "The Swiftie's pie chart"
                },
                data: [{
                    type: "pie",
                    color: "{color}",
                    yValueFormatString: "#,##0",
                    indexLabel: "{label} ({y})",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>

<body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>

</html>
