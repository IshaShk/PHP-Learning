<?php
$insert = false;
if(isset($_POST['name'])){
    // set connection variables
$_SERVER="localhost";
$username="root";
$password="";

// create a db conn
$con =mysqli_connect($_SERVER,$username,$password);

// check conn succ
if(!$con){
    die("connection to this database failed due to " .mysqli_connect_error());
}
// echo "success connect to DB"
// collect post var
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql="INSERT INTO `Trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    
    // execute the query
    if($con->query($sql)==true){
        // echo"sucess";
        // flag for succ insertion
        $insert = true;

    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    // close the db connection
    $con->close();
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="download (1).jpg" alt="AJIET">
    <div class="container">
        <h1>Welcome to AJIET UAE Trip Form</h1>
        <p >Enter your details and submit this form to confirm your participation in this trip</p>
    <?php
    if($insert == true){
        echo "<p class='thanks'>thank you for submitting your form</p>";
    }
        ?>
        <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="'Enter your name">
        <input type="text" name="age" id="age" placeholder="'Enter your age">
        <input type="text" name="gender" id="gender" placeholder="'Enter your gender">
        <input type="email" name="email" id="email" placeholder="'Enter your email">
        <input type="phone" name="phone" id="phone" placeholder="'Enter your phone number">
<textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
<button class="btn">Submit</button>

    </form>
    </div>
<script src="index.js"></script>
</body>
</html>