<?php 
$con = mysqli_connect("localhost", "root", "", "project");

if(!$con){
    die("Connection failed: ".mysqli_connect_error());
}

$customer_id = $_POST['CUSTOMER_ID'];
$fnc = $_POST['FNC'];
$lnc = $_POST['LNC'];
$city = $_POST['CITY'];
$phone = $_POST['PHONE'];

if(empty($customer_id) || empty($fnc) || empty($lnc) || empty($city) || empty($phone)){
    die("Please enter your details");
}

$sql = "INSERT INTO customer(CUSTOMER_ID, FNC, LNC, CITY, PHONE) 
VALUES('$customer_id', '$fnc', '$lnc', '$city', '$phone')";

if(mysqli_query($con, $sql)){
    echo '<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Add Customer</title>
    <style>
        body{
            font-family: "Fira Sans", sans-serif;
            background-color: #ebd2ff;
            margin: 100px;
            color: #5012AC;
            font-size: 35px;
            text-align: center;
        }
    </style>
    </head>';
    echo "1 new customer added";
}else{
    echo "Error: ".$sql."<br>".mysqli_error($con);
}

mysqli_close($con);
?>