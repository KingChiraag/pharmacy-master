<?php
    require 'dbconfig/db.php';
    //  include "header1.html";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
        }
        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .container {
            width: 400px;
            margin: 0 auto;
            margin-top: 100px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-btn {
            text-align: center;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Contact</a>
    </div>
    <div class="container">
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="text" placeholder="Enter username:" name="name" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
        <div><p>Not registered yet <a href="register.php">Register Here</a></p></div>
    </div>
</body>
</html>

<?php
if(isset($_POST['login'])) {
    $name=$_POST['name'];
    $password=$_POST['password'];
    $query="select  * from staff WHERE name='$name' AND password='$password'";
    $query_run =mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0) {
        echo '<script type ="text/javascript"> alert("User logged in successfully ") </script>';
        session_start();
        $_SESSION['name']=$name;
        header('location:dashboard.php');
    } else {
        echo '<script type ="text/javascript"> alert("Invalid Credentials ") </script>';
    }
}
?>