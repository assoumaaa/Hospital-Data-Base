<?php
session_start();
include "config.php";
  $row = "";
  if (!empty($_POST['patient'])){
    $pID = $_POST['patient'];
    $sql_statement2 = "SELECT * FROM patients WHERE  pID = $pID";
    $result = mysqli_query($db,$sql_statement2);
    $row = mysqli_fetch_assoc($result);
    if (!$row){
        header("Location: newpatient.php");
        exit;
    }
    $pID = $row["pID"];
    $pName = $row["pFullName"];
    $_SESSION['PatientID'] = $pID;
    header("Location: pay.php");
    exit;
}
?>