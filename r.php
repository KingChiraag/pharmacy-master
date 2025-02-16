<?php
  require 'dbconfig/db.php';
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['medicine_name','quantity'],
          <?php
         require 'dbconfig/db.php';
         $sql="SELECT `medicine_name`,`quantity`from  `medicine` ;";
          $re=mysqli_query($con,$sql);
          while($row=mysqli_fetch_array($re)){  //change
         $medicine_name=$row[`medicine_name`];
         $quantity=$row[`quantity`];
        }
          ?>

        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>
