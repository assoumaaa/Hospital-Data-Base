<?php
session_start();
include "config.php"
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consult</title>

</head>
<body>
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
</style>






<form action="" method="POST">
<label for="specialization">Specialization:</label>
<select id ="specialization" name="specialization">
<?php
$sql_command =
"SELECT Specialization FROM doctorcost";
$myresult = mysqli_query($db, $sql_command);
while($id_rows = mysqli_fetch_assoc($myresult)) {
$special = $id_rows['Specialization'];
echo "<option value=$special>".$special. "</option>";
} 
?>
</select>
<input type="submit" value="Submit">
</form>

<?php

if (!empty($_POST['specialization'])){ // Check sname is not empty
    $specialization = $_POST['specialization'];
    $sql_statement =
    "SELECT cost FROM `doctorcost` WHERE doctorcost.specialization = '$specialization'";
    $result = mysqli_query($db, $sql_statement);
    $id_rows = mysqli_fetch_assoc($result);
    $cost = $id_rows['cost'];
    $_SESSION['cost'] = $cost;
    }
    ?>

<form action="consultpatient.php" method="POST">
<label for="doctor">Preferred doctor:</label>
<select id ="doctor" name="doctor">
<?php
$sql_command =
"SELECT dID, dFullName FROM doctors WHERE doctors.specialization = '$specialization'";
$myresult = mysqli_query($db, $sql_command);
while($doctor_rows = mysqli_fetch_assoc($myresult)) {
$dID = $doctor_rows['dID'];
$_SESSION['doc'] = $dID;
$dName = $doctor_rows['dFullName'];
echo "<option value=$dID>".$dID. "-" . $dName . "</option>";
} 
?>
</select>

<a href="consultpatient.php">
      <input type="submit" value="Submit"/>
     </a>
</form>
</div>

</body>
</html>
