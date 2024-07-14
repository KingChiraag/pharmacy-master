<?php
    require 'dbconfig/db.php';
    session_start();
    $s_id = $_SESSION['s_id'];
   // echo $s_id;
            $_SESSION['s_id'] = $s_id;
?>
<html>
    <head>
        <title>View User</title>
        <link rel="stylesheet" href="viewuser.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="addcompany.css">
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
                <a class="nav-link" href="sales.php">Sales</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="home.php">Log out</a>
                </li>
                
                
             </ul>
          </div>
        </nav>
</head>
    </head>
        <body>
            <h3>VIEW PROFILE</h3>
            <table>
                <thead>
                    <tr>
                        <th>S_id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Dob</th>
                        <th>Email</th>
                        
                    </tr>
                </thead>
<?php
$sql="Select s_id,name,phone,dob,email from staff where s_id='$s_id'";
$result=$con->query($sql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        echo"<tr><td>".$row["s_id"]."</td><td>".$row["name"]."</td><td>".$row["phone"]."</td><td>".$row["dob"]."</td><td>".$row["email"]."</td></tr>";
    }
    echo"</table>";
}
else{
    echo"no rows";
}?>
         
        </body>
</html>
