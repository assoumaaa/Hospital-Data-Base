<?php
session_start();
include "config.php";


$bIDtemp =rand();
$sql_statement4 = "SELECT * FROM payment WHERE payment.bID = $bIDtemp";
$result2 = mysqli_query($db,$sql_statement4);
$bill = mysqli_fetch_assoc($result2);
if(!$bill){
    $bID = $bIDtemp;
}
while($bill){
    $bIDtemp =rand();
    $sql_statement4 = "SELECT * FROM payment WHERE payment.bID = $bIDtemp";
    $result2 = mysqli_query($db,$sql_statement4);
    $bill = mysqli_fetch_assoc($result2);
    if(!$bill){
        $bID = $bIDtemp;
    }
}    


if(!empty($_POST['entrydate'])){
    $entrydate = $_POST['entrydate'];
    $date = date_create($entrydate);
    $staylength = $_POST['staylength'];
    $length = $staylength." days";
    date_add($date,date_interval_create_from_date_string($length));
    $exitdate = date_format($date,"Y-m-d");
    $cost = $_SESSION['cost2'];
    $pID = $_SESSION['patients'];
    $rID = $_SESSION['room'];
    $sql_statement3 = "INSERT INTO `assigned_room`(`pID`, `bID`, `rID`, `EntryDate`, `ExitDate`, `Staylength`) VALUES ($pID,$bID,$rID,'$entrydate','$exitdate',$staylength) ";
    $sql_statement5 = "INSERT INTO `payment`(`pID`, `bID`, `amount`, `status`, `TreatmentDescription`) VALUES ($pID,$bID,$cost,'Not_Paid','Room Stay')";
    $sql_statement6 = "UPDATE `rooms` SET `status`='Occupied' WHERE rooms.rID = $rID";
    $result3 = mysqli_query($db,$sql_statement5);
    $result4 = mysqli_query($db,$sql_statement3);
    $result5 = mysqli_query($db,$sql_statement6);
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consult</title>
    <style>
    body {
        background: white }
    section {
        background: #686256;
        color: white;
        border-radius: 1em;
        padding: 1em;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%) }

     body {
          
        background-image: url("https://mocah.org/uploads/posts/4562144-simple-simple-background-primary-colors-minimalism-geometry-abstract.png")
     }
    </style>

</style>
</head>
<body>
  <section>
    <h1>Patient is added to the Room.</h1>
    
  </section>
</body>
</html>
