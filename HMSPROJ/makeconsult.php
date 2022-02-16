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


if(!empty($_POST['date'])){
    $date = $_POST['date'];
    $cost = $_SESSION['cost'];
    $pID = $_SESSION['patient'];
    $dID = $_SESSION['doc'];
    $sql_statement3 = "INSERT INTO `consultation`(`pID`, `dID`, `bID`, `Consultdate`) VALUES ($pID,$dID,$bID,'$date') ";
    $sql_statement5 = "INSERT INTO `payment`(`pID`, `bID`, `amount`, `status`, `TreatmentDescription`) VALUES ($pID,$bID,$cost,'Not_Paid','Consultation')";
    $result3 = mysqli_query($db,$sql_statement5);
    $result4 = mysqli_query($db,$sql_statement3);
    echo "New consultation added to database";
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
        background: #d9ad7c;
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
    </style>

</style>
</head>
<body>
  <section>
    <h1>New consultation added to database</h1>
    
  </section>
</body>
</html>
