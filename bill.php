<?php
     require 'dbconfig/db.php';
     session_start();
 $phone_number = $_SESSION['phone_number'];
 $invoice_date= $_SESSION['invoice_date'] ;
 echo "$phone_number";
 echo "$invoice_date";
$query="SELECT invoice_no FROM invoice u WHERE u.phone_number='$phone_number' and  u.invoice_date='$invoice_date'" ;
$query_run = mysqli_query($con , $query);
while ($row = $query_run->fetch_assoc()) {
    echo "Your InvoiceNo. is:";
    echo $row['invoice_no']."<br>";
    $invoice_no = $row['invoice_no'] ;
}
  $_SESSION['invoice_no'] =  $invoice_no;
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
                <a class="nav-link" href="home.php">Change medicine details <span class="sr-only">(current)</span></a>
               </li>
                <li class="nav-item">
                <a class="nav-link" href="deletemedicine.php">Remove medicines</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="viewmedicine.php">View Medicine</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="medicinedashboard.php">Medicine Dashboard</a>
                </li>
                
             </ul>
          </div>
        </nav>
<body>
    <div class="container">
        <h1>Pharmacy Management System</h1>
        <form action="bill.php" method="post">
            <label for="pnumber">Phone Number:</label>
            <input type="number" maxlength="10" id="pnumber">
            <div id="medicineFields">
                <div class="medicineField">
                    <label for="medicine1">Medicine 1:</label>
                    <input type="text" id="medicine1" name="medicines[]"><br>
</div>
<div class="quantityField">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity[]"><br>
               
            </div>
</div>
            <button type="button" id="addMedicine">Add Medicine</button><br>
            <input type="submit" value="Submit Purchase">
        </form>
        </div>

    <script>
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("addMedicine").addEventListener("click", function () {
        var medicineFields = document.getElementById("medicineFields");
        var newMedicineField = document.createElement("div");
        newMedicineField.classList.add("medicineField");
        var medicineNumber = medicineFields.getElementsByClassName("medicineField").length + 1;
        newMedicineField.innerHTML = '<label for="medicine' + medicineNumber + '">Medicine ' + medicineNumber + ':</label>' +
            '<input type="text" id="medicine' + medicineNumber + '" name="medicines[]"><br>';
        medicineFields.appendChild(newMedicineField);

        var quantityFields = document.getElementById("medicineFields");
        var newquantityField = document.createElement("div");
        newquantityField.classList.add("quantityField");
        var quantityNumber = quantityFields.getElementsByClassName("quantityField").length + 1;
        newquantityField.innerHTML = '<label for="quantity' +  quantityNumber + '">Quantity ' +  quantityNumber + ':</label>' +
            '<input type="text" id="quantity' +  quantityNumber + '" name="quantity[]"><br>';
        quantityFields.appendChild(newquantityField);
    });
});
</script>
</body>
</html>
<?php
   require "dbconfig/db.php";


// Insert purchased medicines into database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medicines = $_POST['medicines'];
    $sql = "INSERT INTO bill (medicine_name) VALUES ";
    $values = array();

    foreach ($medicines as $medicine) {
        if (!empty($medicine)) {
            $values[] = "('" . $conn->real_escape_string($medicine) . "')";
        }
    }

    if (!empty($values)) {
        $sql .= implode(",", $values);
        if ($conn->query($sql) === TRUE) {
            echo "Purchased medicines added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}


?>
