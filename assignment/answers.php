<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finalresult";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function checkAnswers() {
    global $conn;
    
    // Get user inputs
    $answer1 = mysqli_real_escape_string($conn, strtolower($_POST["answer1"]));
    $answer2 = mysqli_real_escape_string($conn, $_POST["answer2"]);
    $answer3 = mysqli_real_escape_string($conn, strtolower($_POST["answer3"]));
    $answer4 = mysqli_real_escape_string($conn, $_POST["answer4"]);
    $answer5 = mysqli_real_escape_string($conn, strtolower($_POST["answer5"]));
    $answer6 = mysqli_real_escape_string($conn, strtolower($_POST["answer6"]));

    // Check answers
    $correctAnswers = 0;
    $wrongAnswers = 0;

    if ($answer1 === "paris") {
        $correctAnswers++;
    } else {
        $wrongAnswers++;
    }

    if ($answer2 === "12") {
        $correctAnswers++;
    } else {
        $wrongAnswers++;
    }

    if ($answer3 === "neil armstrong") {
        $correctAnswers++;
    } else {
        $wrongAnswers++;
    }

    if ($answer4 === "3.14") {
        $correctAnswers++;
    } else {
        $wrongAnswers++;
    }

    if ($answer5 === "france") {
        $correctAnswers++;
    } else {
        $wrongAnswers++;
    }

    if ($answer6 === "asia") {
        $correctAnswers++;
    } else {
        $wrongAnswers++;
    }

    // Save results to database
    $sql = "INSERT INTO allanswers (correctAnswers, wrongAnswers)
            VALUES ('$correctAnswers', '$wrongAnswers')";
    echo nl2br("Correct Answers - $correctAnswers \n Wrong Answers - $wrongAnswers \n");
    

    if (mysqli_query($conn, $sql)) {
        echo "Results saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Check if form is submitted
if(isset($_POST['submit'])){
    checkAnswers();

    // Display alert box and redirect to assignment.html
}

mysqli_close($conn);
?>
