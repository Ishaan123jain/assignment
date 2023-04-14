<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "assignment";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['login'])) {
        $emailid = $_POST['email'];
        $pass = $_POST['pass'];

        $stmt = $conn->prepare("SELECT * FROM `Sign_in` WHERE `emailid` = :emailid AND `password` = :pass");
        $stmt->bindParam(':emailid', $emailid);
        $stmt->bindParam(':pass', $pass);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            $_SESSION['name'] = $row['name'];
            ?>
            <script>
                alert("You have successfully logged in");
                window.open('assignment.html','_self');
            </script>
            <?php
        }
        else {
            ?>
            <script>
                alert("Wrong Emailid and Password!! Try Again");
                window.open('index.html','_self');
            </script>
            <?php
        }
    }
}
catch(PDOException $e) {    
    echo "Connection failed: " . $e->getMessage();
}
?>
