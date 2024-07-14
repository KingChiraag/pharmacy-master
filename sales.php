
<?php
// Connect to your MySQL database
require 'dbconfig/db.php';

// Query your database to retrieve data
$sql = "SELECT i.invoice_date,sum(f.total_amount) as amount 
from invoice i join finalbill f on i.invoice_no=f.invoice_no GROUP by i.invoice_date ORDER by i.invoice_date;
";
$result = $con->query($sql);

// Create an array to hold your data
$data = array();
while($row = $result->fetch_assoc()) {
    $data[] = $row;
}


?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="register.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
       <center> <h1><b>QuickRelief Pharmacy</b></h1>
        <h6><b> "Empowering Health, Enriching Lives: Your Trusted Pharmaceutical Partner"</b></h6></center>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">QuickRelief Pharmacy </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                <a class="nav-link" href="medicinedashboard.php">Medicine<span class="sr-only">(current)</span></a>
               </li>
                <li class="nav-item">
                <a class="nav-link" href="invoice.php">Billing</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="stocks.php">Stock</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="viewuser.php">View Profile</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="home.php">Log out</a>
                </li>
                
                
             </ul>
          </div>
        </nav><br><br>
<title>Vertical Bar Chart</title>
    <!-- Load Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback function to draw the chart
        function drawChart() {
            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'invoice_date');
            data.addColumn('number', 'amount');
        

           
            <?php
        foreach ($data as $row) {
            echo "data.addRow(['" . $row['invoice_date'] . "', " . $row['amount'] . "]);\n";
        }
        ?>
         // Set chart options
         var options = {
                title: 'Current Sales',
                width: 600,
                height: 400
            };
            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>

<div id="chart_div"></div>
