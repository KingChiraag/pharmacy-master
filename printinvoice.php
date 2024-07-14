<?php
require "dbconfig/db.php";
session_start();
 $phone_number = $_SESSION['phone_number'];
 $invoice_date= $_SESSION['invoice_date'] ;
 $invoice_no= $_SESSION['invoice_no'] ;
 $s_id= $_SESSION['s_id'] ;
 /*echo "$phone_number";
 echo "$invoice_date";
 echo "$s_id";
 echo "$invoice_no";*/
  $_SESSION['invoice_no'] =  $invoice_no;
  $_SESSION['s_id'] =  $s_id;
 $_SESSION['phone_number']=$phone_number;

?>
<!DOCTYPE html>
<html>
<head>
<center>
<html>
<head>
<title> Invoice</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                
                <li class="nav-item">
                <a class="nav-link" href="invoice.php">Billing</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="medicinedashboard.php">Medicine Dashboard</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="home.php">Log out</a>
                </li>
                
                
             </ul>
          </div>
        </nav>
<body>

<!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>-->
<!--<h1>A G BUS LINES</h1>-->
    <h6>Bangalore Branch #321,7th main ,Vijayanagar<br>
         Bangalore, Karnataka, Pin: 560040
        <br>080-23456789, 080-26800012<br>
                quickreliefpharmacy@gmail.com<br> </h6>
      <br>
      <br>

    <h3>Invoice Details</h3>
    <br>
    <br>
    </center>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
      body{
              border: 2px solid powderblue;
              padding: 30px;
              margin: 50px;
              background-color:white;
        
          }
      table, th, td {
                       border: 0.5px solid black;
                       padding: 5px;
                        margin: 10px;
                          border-collapse: collapse;

                    }
      </style>
    
</head>


<body>


          <div>
          
         <center>   
          <?php
                          
                      $sqli="SELECT cust_name,phone,email FROM customer WHERE phone='$phone_number';";
                      $res=mysqli_query($con, $sqli);
                      while($row =$res->fetch_assoc())
                    { 
                  
                      echo "NAME:    ";
                      echo $row['cust_name']."</br>"; 
                      echo "EMAIL:    "; 
                      echo $row['email']."</br>"; 
                      echo "PHONENO:    ";
                      echo $row['phone']."</br>"; 
                    
                    } 
                  
                       
            ?>
        </center>   
          </div>
          <center>   
          <?php
                          
                      $sqli1="SELECT f.invoice_no,i.invoice_date,f.total_amount from invoice i join finalbill f on i.invoice_no=f.invoice_no
                       WHERE i.invoice_no='$invoice_no';";
                      $res1=mysqli_query($con, $sqli1);
                      while($row1 =$res1->fetch_assoc())
                    { 
                  
                        echo "Invoice No:    ";
                        echo $row1['invoice_no']."</br>"; 
                        echo "Date:    "; 
                        echo $row1['invoice_date']."</br>"; 
                        echo "Total Amount:    "; 
                        echo $row1['total_amount']."</br>";
                    
                    } 
                  
                       
            ?>
        </center>   
          </div>
<div>
<center>
<table class="w3-table-all w3-card-4">
  <thead>
            <tr>
                <th>MEDICINE NAME</th>
                <th>CATEGORY NAME</th>
                <th>MANUFACTURED DATE</th>
                <th>EXPIRY DATE</th>
                <th>MRP</th>
                <th>QUANTITY</th>
                <th>PRICE</th>
                <th>STAFF NAME</th>
                
            </tr> <br>
  </thead>
  
<?php
  $sql="SELECT i.invoice_no,i.invoice_date,m.medicine_name,m.mfg_date,m.category_name,m.expiry,m.mrp,b.quantity,
  (m.mrp*b.quantity) as price ,f.total_amount,s.name FROM `invoice` i JOIN bill b ON i.invoice_no=b.invoice_no 
  JOIN medicine m ON m.medicine_id=b.medicine_id
  JOIN finalbill f ON i.invoice_no=f.invoice_no  
  join staff s on s.s_id=f.s_id WHERE  i.invoice_no=$invoice_no;";
  $result=mysqli_query($con , $sql);
  while ($row = $result->fetch_assoc()) 
  {
  
            ?>
            
            <tr>
              <center>
                <td> <?php echo $row['medicine_name']; ?> </td>
                <td> <?php echo $row['category_name']; ?> </td>
                
                <td> <?php echo $row['mfg_date']; ?> </td>
                <td> <?php echo $row['expiry']; ?> </td>
                <td> <?php echo $row['mrp']; ?> </td>
                <td> <?php echo $row['quantity']; ?> </td>
                
                <td> <?php echo $row['price']; ?> </td>
                <td> <?php echo $row['name']; ?> </td>
</td>
            </center>
            </tr>

            <?php
        }
    
  session_destroy();
  ?>

</table>

</div>
</center>
<br>
<br>







<br>
<br>

<button onclick="myfunc()">Print</button>
     <script type="text/javascript">
      function myfunc(){
        window.print();
      }
      </script>
      </body>


</html>



  





