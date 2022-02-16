<?php
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
echo "<p align=center> $bID</p>"

?>