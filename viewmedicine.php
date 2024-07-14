<?php
    require 'dbconfig/db.php'
?>
<html>
    <head>
        <title>View Medicine</title>
        <link rel="stylesheet" href="viewuser.css">
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
                <a class="nav-link" href="addcompany.php">Add Comapany <span class="sr-only">(current)</span></a>
               </li>
                <li class="nav-item">
                <a class="nav-link" href="addmedicine.php">Add Medicine</a>
                </li>
                <li class="nav-item"><li class="nav-item">
                <a class="nav-link" href="deletemedicine.php">Delete Medicine Details</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="medicinedashboard.php">Medicine Dashboard</a></li>
                <li class="nav-item">
                <a class="nav-link" href="login.php">Logout</a>
                </li>
             </ul>
          </div>
        </nav>
    </head>
        <body>
            <h3>VIEW MEDICINES</h3>
            <table>
                <thead>
                    <tr>
                        <th>Medicine_id</th>
                        <th>Medicine name</th>
                        <th>Category_name</th>
                        <th>Mfd_date</th>
                        <th>Expiry_date</th>
                        <th>Mrp</th>
                        <th>Quantity</th>
                        
                    </tr>
                </thead>

<?php
$sql="Select medicine_id,medicine_name,category_name,mfg_date,expiry,mrp,quantity from medicine";
$result=$con->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
      echo"<tr><td>".$row["medicine_id"]."</td><td>".$row["medicine_name"]."</td><td>".$row["category_name"]."</td><td>".$row["mfg_date"]."</td><td>".$row["expiry"]."</td><td>".$row["mrp"]."</td><td>".$row["quantity"]."</td></tr>";
        
    }
    echo"</table>";
}
else{
    echo"no rows";
}?>
         
        </body>
</html>
