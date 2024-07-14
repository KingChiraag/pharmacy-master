<?php
    require 'dbconfig/db.php';
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="container5">
        <h5>CHANGE PASSWORD</h5>
        <form action ="changepassword.php" method="post">
                    <br>&#160;&#160; &#160;&#160;<label><b> <b>OLD PASSWORD:</label></br>
                    <input name="curpass" type="password" class="inputvalues" placeholder="Enter old password" required/></br>
                    <br><label class="tab"><b>NEW PASSWORD:</label></br>
                    <input  name="newpass" type="password" class="inputvalues" placeholder="Enter new password"required/><br>
                    <br><label class="tab"><b>CONFIRM PASSWORD:</label></br>
                    <input  name="conpass" type="password" class="inputvalues" placeholder="Confirm password"required/><br>
                    <br><input type="submit" id="change_btn" name = "submit" value="CHANGE">
        
                    </form>
                    <?php
        
        $name = $_SESSION['name'];
        //echo "$username";
        $query="SELECT u.email FROM staff u WHERE u.name='$name'";
        $query_run = mysqli_query($con , $query);
        while ($row = $query_run->fetch_assoc()) {
            //echo "Your Registration ID is:"; 
            //echo $row['userid']."<br>";
            $email = $row['email'] ;
        }
                $_SESSION['email'] = $email;
        
                if(isset($_POST['submit']))
                {
                        $cur=$_POST['curpass'];
                        $new=$_POST['newpass'];
                        $conf=$_POST['conpass'];
                                if($new<>$conf)
                                {
                                        echo "New password amd Confirm password did not match";
                                }
                                else
                                {
                                    $sql="SELECT * from staff where email='$email' and password='$cur'";
                                    $query_run=$con->query($sql);
                                    
                                                    if($query_run->num_rows>0)
                                                    {
                                                            $sql1="UPDATE staff set password='$new' where email='$email' and password='$cur'";
                                                            $query_run1=$con->query($sql1);
                                                            if($query_run1){
                                                            //if($query_run1->num_rows >0)
                                                            //{
                                                                echo"Password has changed";
                                                           // }
                                                            }
                            
                                                    }
                                                    else
                                                    {
                                                        echo "invalid current password";
                                                    }
                                    
                                 }
        
                }?>
        
</body>
</html>