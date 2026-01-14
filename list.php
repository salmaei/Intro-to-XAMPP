<?php 
$con = mysqli_connect("localhost", "root", "", "project");

if(!$con){
    die("Connection failed: ".mysqli_connect_error());
}
echo '<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;
                0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Best Cars Contracts</title>
    <style>
    :root{
        --header: #BFA9FF;
        --backgroundColor: #ebd2ff;
        --bgtwo: #efe9ff;
        --button: #874EDA;
        --buttonhover: #5012AC;
        --textColor: #10002c;
        }
    body{
        font-family: "Fira Sans", sans-serif;;
        background-color: var(--backgroundColor);
        color: var(--textColor);
        margin: 100px;
        padding: 10px;
    }
    .h3{
        margin-bottom: 20px;
        text-align: center;
        font-size: 22px;
        color: var(--buttonhover);
    }

    table{
        background-color: var(--bgtwo);
        margin-top: 20px;
        width: 100%;
        border-collapse: collapse;
        border-radius: 8px;
    }
    th{
        background-color: var(--button);
        padding: 12px 20px;
        text-align: left;
        font-size: 18px;
        color: #fff;
    }
    td{
        padding: 12px 20px;
        text-align: left;
        font-size: 16px;
        color: var(--textColor);
    }
    tr:hover{
        background-color: #d199ff;
    } 
    </style>
</head>';

if(isset($_GET['CUSTOMER_ID'])){
    $customerId = $_GET['CUSTOMER_ID'];

    $sql = "SELECT CONTRACT_ID, contract.START_DATE, DUE_DATE, CUSTOMER_ID, CAR_ID 
            FROM contract WHERE CUSTOMER_ID = $customerId";

    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0){
        echo '<h3 class="conHead">Contracts for Customer ID = '."$customerId".'</h3>';
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>CONTRACT_ID</th>";
        echo "<th>START_DATE</th>";
        echo "<th>DUE_DATE</th>";
        echo "<th>CUSTOMER_ID</th>";
        echo "<th>CAR_ID</th>";
        echo "</tr>";

        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" . $row["CONTRACT_ID"] . "</td>";
            echo "<td>" . $row["START_DATE"] . "</td>";
            echo "<td>" . $row["DUE_DATE"] . "</td>";
            echo "<td>" . $row["CUSTOMER_ID"] . "</td>";
            echo "<td>" . $row["CAR_ID"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo "No contracts found for customer.";
    }
}else{
    echo "Please provide a Customer ID in the URL.";
}
mysqli_close($con);
?>
