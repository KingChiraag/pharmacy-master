<?php
  require 'dbconfig/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   
</head>
<body style="background-color: aliceblue;">

   

    

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
            title: 'SALES REPORT',
            
            backgroundColor: 'none'
          }
        };
        
        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <br>
            </form>
            
    </div>
    <div id="columnchart_material" style="width: 1150px; height: 400px;margin:50px 60px;"></div>
</body>
</html>