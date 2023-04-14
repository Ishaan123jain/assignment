<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "assignment";

try {
    $con = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $emailid=$_POST['email'];
    $username=$_POST['username'];
    $pass=$_POST['pass'];
    $repeatpass=$_POST['repeatpass'];
    
    
  //  $con=mysqli_connect('127.0.0.1','id20538158_firefly','mh8pcN~|O%?<qN48','id20538158_firefly_car_rental');
    // if($con==false)
    // {
    //     echo "Error in database connection!!";
    // }
    // else
   // {
        $select = $con->prepare("SELECT * FROM `Sign_in` WHERE `emailid`=:emailid");
$select->bindParam(':emailid', $emailid);
$select->execute();
$num = $select->rowCount();

        if($num>0)
        {
            ?>
            <script> alert("Emailid already exists! Register with different email");
            window.open('Register.html','_self');</script>
            <?php
            
        }
        else{
            $insert="INSERT INTO `Sign_in`(`name`, `emailid`, `username`, `password`, `repeatpassword`) VALUES ('$name','$emailid','$username','$pass','$repeatpass')";
            $row = $con->exec($insert);

            if($row==true)
            {
            ?>
                <script> alert("Regitered Successfully");
                window.open('index.html','_self');</script>
            <?php
            }
            else{
                echo "error";
            }
        }
  //  }
        
}
}
 catch(PDOException $e) {    
    echo "Connection failed: " . $e->getMessage();
    }
?>