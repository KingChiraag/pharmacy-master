<?php
 require 'dbconfig/db.php';
 session_start();
 $s_id = $_SESSION['s_id'];
 echo $s_id;
         $_SESSION['s_id'] = $s_id;
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard1.css">
</head>
<body>
    <h1><center> Medicines DashBoard</center></h1>
     <div class="profile">
        <img src="imgs/m1.jpg" alt="no image">
        <h2><a href="addcompany.php">Add Company</a></h2>
        </div>
    <div class="add">
        <img src="imgs/m2.jpg" alt="no image">
        <h2><a href="addmedicine.php">Add Medicine</a></h2>
    </div>
   <!-- <div class="profile">
        <img src="https://th.bing.com/th/id/OIP.YrE7WLFs_sBdL0r6p62iJwHaHa?w=187&h=187&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="no image">
        <h2><a href="#">Change medicine details</a></h2>
    </div>-->

    <div class="logout">
        <img src="imgs/m3.jpg" alt="">
        <h2><a href="deletemedicine.php">Remove medicines</a></h2>
    </div>
    <div class="update">
        <img src="imgs/m4.jpg" alt="">
        <h2><a href="viewmedicine.php">View Purchase Details</a></h2>
    </div>
    <div class="exit">
        <img src="imgs/m5.jpg" alt="">
        <h2><a href="home.php">Logout</a></h2>
    </div>
    <div class="exit">
    <img src="imgs/m6.jpg" alt="">
       <h2><a href="dashboard.php">Main Dashboard</a></h2>

    </div>
  <!--  <div class="view">
        <img src="https://th.bing.com/th/id/OIP.LjB4EzUEhlFn5IU9HZzhFQHaHa?w=209&h=209&c=7&r=0&o=5&dpr=1.3&pid=1.7" alt="">
        <h2><a href="Dashboard.html">Medicines to expire</a></h2>
    </div>-->
</body>
</html>