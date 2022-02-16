<?php
session_start();
include "config.php";

if (!empty($_POST['doctor'])){
    $dID = $_POST['doctor'];
    $_SESSION['doc'] = $dID;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consult</title>
    <style>
          * {
  box-sizing:border-box;
}
body {
  margin:20px;
  background-color: #fafafa;
}
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #d9ad7c;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #d9ad7c;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<div>

<style>
        body {
        background-image: url("https://mocah.org/uploads/posts/4562144-simple-simple-background-primary-colors-minimalism-geometry-abstract.png")
    }
</style>

</head>
<body>

<form action="" method="POST">
    PatientID:
   <input type="text" id="patient" name="patient" <br>
   <input type="submit" value="Submit">
  </form>

<?php
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
    $_SESSION['patient']=$pID;
}

?>

<form action="makeconsult.php" method="POST">
    Consult Date:
   <input type="date" id="date" name="date" <br>
   <a href="makeconsult.php">
      <input type="submit" value="Submit"/>
     </a>
  </form>




</body>
</html>
