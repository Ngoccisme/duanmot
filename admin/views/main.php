<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['dm_name' , 'number_cate'],
            <?php foreach ($chart as $key => $value ) { 
                 echo "['".$value["dm_name"]."' , ".$value["number_cate"]."],";
             } ?>
        ]);

        var options = {
            title: 'Thống kê số sản phẩm theo danh mục !',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
    </script>
<div class="container" style="height: 550px ;">
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
</div>

