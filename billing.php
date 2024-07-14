<?php
     require 'dbconfig/db.php';
     session_start();
 $phone_number = $_SESSION['phone_number'];
 $invoice_date= $_SESSION['invoice_date'] ;
 $s_id= $_SESSION['s_id'] ;
 //echo "$phone_number";
 //echo "$invoice_date";
 //echo "$s_id";
$query="SELECT invoice_no FROM invoice u WHERE u.phone_number='$phone_number' and  u.invoice_date='$invoice_date'" ;
$query_run = mysqli_query($con , $query);
while ($row = $query_run->fetch_assoc()) {
   // echo "Your InvoiceNo. is:";
   // echo $row['invoice_no']."<br>";
    $invoice_no = $row['invoice_no'] ;
}
  $_SESSION['invoice_no'] =  $invoice_no;
  $_SESSION['s_id'] =  $s_id;
 $_SESSION['phone_number']=$phone_number;
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
.container {
    width: 50%;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="text"], input[type="submit"] {
    margin-bottom: 10px;
    padding: 5px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}
</style>
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
                <a class="nav-link" href="medicinedashboard.php">Medicines<span class="sr-only">(current)</span></a>
               </li>
                <li class="nav-item">
                <a class="nav-link" href="invoice.php">Billing</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="printinvoice.php">View Bill</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="home.php">Log out</a>
                </li>
                
             </ul>
          </div>
        </nav>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Purchase Form</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h2>Medicine Purchase Form</h2>
    <form id="medicineForm" method="POST" action="billing.php">
        <div id="medicineInputs">
            <div class="medicineInput">
                <input type="text" name="medicine_name[]" placeholder="Medicine Name">
                <input type="number" name="quantity[]" placeholder="Quantity">
                <button type="button" class="removeMedicine">Remove</button>
            </div>
        </div>
        <button type="button" id="addMedicine">Add Medicine</button>
        <button type="submit">Purchase</button>
    </form>

    <script>
        $(document).ready(function() {
            // Add medicine input fields dynamically
            $("#addMedicine").click(function() {
                var html = '<div class="medicineInput">';
                html += '<input type="text" name="medicine_name[]" placeholder="Medicine Name">';
                html += '<input type="number" name="quantity[]" placeholder="Quantity">';
                html += '<button type="button" class="removeMedicine">Remove</button>';
                html += '</div>';
                $("#medicineInputs").append(html);
            });

            // Remove medicine input fields
            $(document).on("click", ".removeMedicine", function() {
                $(this).parent('.medicineInput').remove();
            });
        });
    </script>
</body>
</html>

<?php
require 'dbconfig/db.php';

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$customer_name = $_POST["customer_name"];
    $medicine_names = $_POST["medicine_name"];
    $quantities = $_POST["quantity"];

    // Assuming your medicine_table has columns 'medicine_name', 'price', and 'quantity'
    $total_cost = 0;

    // Loop through each medicine and calculate the total cost
    for ($i = 0; $i < count($medicine_names); $i++) {
        $medicine_name = $medicine_names[$i];
        $quantity = $quantities[$i];

        // Fetch medicine price and quantity from the database
        $sql = "SELECT mrp, quantity, medicine_id FROM medicine WHERE medicine_name = '$medicine_name'";
        $result = $con->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $price = $row["mrp"];
                $available_quantity = $row["quantity"];
                $medicine_id = $row["medicine_id"];

                // Check if there's enough quantity in stock
                if ($available_quantity >= $quantity) {
                    $total_cost += $price * $quantity;

                    // Update the medicine table with reduced quantity
                    $new_quantity = $available_quantity - $quantity;
                    $update_sql = "UPDATE medicine SET quantity = $new_quantity WHERE medicine_name = '$medicine_name'";
                    $con->query($update_sql);

                    // Insert into bill table
                    $bill_sql = "INSERT INTO bill (invoice_no, medicine_id, quantity) VALUES ('$invoice_no', '$medicine_id', '$quantity')";
                    $con->query($bill_sql);
                } else {
                    // Handle insufficient stock error
                    echo "Error: Insufficient stock for $medicine_name";
                    exit;
                }
            } else {
                // Handle medicine not found error
                echo "Error: Medicine $medicine_name not found";
                exit;
            }
        } else {
            // Handle query execution error
            echo "Error executing query: " . mysqli_error($con);
            exit;
        }
    }

    // Insert customer and order details into the database
    $sql = "INSERT INTO finalbill (invoice_no, total_amount, s_id) VALUES ('$invoice_no', '$total_cost', '$s_id')";
    if (!$con->query($sql)) {
        echo "Error inserting final bill: " . mysqli_error($con);
echo "Data added successfully";
header('location:printinvoice.php');
       
    }

}
?>
