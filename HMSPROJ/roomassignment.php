<?php
session_start();
include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Room</title>
</head>
<body>

<style>
     body {
        background-image: url("https://mocah.org/uploads/posts/4562144-simple-simple-background-primary-colors-minimalism-geometry-abstract.png")
     }
</style>

<style>
  * {
  box-sizing:border-box;
}
body {
  margin:20px;
  background-color: #fafafa;
}
textarea {
  width:100%;
  resize: vertical;
  padding:15px;
  border-radius:15px;
  border:0;
  box-shadow:4px 4px 10px rgba(0,0,0,0.06);
  height:150px;
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
  background-color: #686256;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #686256;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>

<div>
<form action="" method="POST">
<label for="roomtype">Roomtype:</label>
<select id ="roomtype" name="roomtype">

<?php
  $sql_command =
  "SELECT rtype FROM roomcost";
  $myresult = mysqli_query($db, $sql_command);
  while($id_rows = mysqli_fetch_assoc($myresult)) {
  $rtype = $id_rows['rtype'];
  echo "<option value='$rtype'>".$rtype. "</option>";
} 
?>
</select>
<input type="submit" value="Submit">
</form>

<?php

if (!empty($_POST['roomtype'])){ // Check sname is not empty
    $rtype_ = $_POST['roomtype'];
    $sql_statement =
    "SELECT cost FROM `roomcost` WHERE roomcost.rtype = '$rtype_'";
    $result = mysqli_query($db, $sql_statement);
    $id_rows = mysqli_fetch_assoc($result);
    $cost = $id_rows['cost'];
    $_SESSION['cost2'] = $cost;
    }
?>

<form action="roomassignmentpatient.php" method="POST">
<label for="room">Preferred room:</label>
<select id ="room" name="room">

<?php
  $sql_command =
  "SELECT rID FROM rooms WHERE rooms.rtype = '$rtype_' AND rooms.status = 'Empty'";
  $myresult = mysqli_query($db, $sql_command);
  while($room_rows = mysqli_fetch_assoc($myresult)) {
  $rID = $room_rows['rID'];
  echo "<option value=$rID>".$rID. "</option>";
  } 
?>

</select>
<a href="roomassignmentpatient.php">
  <input type="submit" value="submit"/>
</a>
</div>

</form>
</body>
</html>



