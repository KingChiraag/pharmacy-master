<?php
 require 'dbconfig/db.php';
 session_start();
 $name = $_SESSION['name'];
 //echo "$name";
 $query="SELECT s_id FROM staff u WHERE u.name='$name'";
 $query_run = mysqli_query($con , $query);
 while ($row = $query_run->fetch_assoc()) {
    // echo "Your Registration ID is: &nbsp";
    // echo $row['s_id']."<br> &nbsp";
     $s_id = $row['s_id'] ;
 }
         $_SESSION['s_id'] = $s_id;
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard1.css">
    <style>
        img {
    width: 1500px;
    height: 200px;
}
        </style>
</head>
<body>
    <h1><center>Pharmacy DashBoard</center></h1>
    <div class="add">
        <img src="imgs/d1.jpg" alt="no image">
        <h2><a href="medicinedashboard.php">Medicines</a></h2>
    </div>
   <div class="profile">
        <img src="imgs/d2.jpg" alt="no image">
        <h2><a href="cdashboard.php">Billing</a></h2>
    </div>
    <div class="logout">
        <img src="imgs/d3.jpg" alt="">
        <h2><a href="sales.php">Sales</a></h2>
    </div>
    <div class="update">
        <img src="imgs/d4.jpg" alt="">
        <h2><a href="stocks.php">Stock</a></h2>
    </div>
    <div class="exit">
        <img src="imgs/d5.jpg" alt="">
        <h2><a href="viewuser.php">Profile details</a></h2>
    </div>

    <div class="view">
        <img src="imgs/h1.jpg" alt="">
        <h2><a href="login.php">Logout</a></h2>
    </div>
</body>
</html>