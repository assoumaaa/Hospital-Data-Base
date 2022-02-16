<?php

include "config.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rooms</title>
</head>
<body>

<style>
     body {
        background-image: url("http://designazure.com/wp-content/uploads/2018/05/long-shadow.png");
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
  background-color: #955251;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #955251;
}

div {
  border-radius: 5px;
  background-color: #ffffff;
  padding: 20px;
}
</style>


<div>
  
  <form action="newroom.php" method="POST"><br>
    Status
    <select id="status" name="status">
      <option value="Empty">Empty</option>
      <option value="Occupied">Occupied</option>
    </select>
    

    <label for="roomtype">Type of Room:</label>
    <select id ="roomtype" name="roomtype">
    <?php
    $sql_command =
    "SELECT rtype FROM roomcost";
    $myresult = mysqli_query($db, $sql_command);
    while($id_rows = mysqli_fetch_assoc($myresult)) {
    $r_type = $id_rows['rtype'];
    echo "<option value= '$r_type' >". $r_type. "</option>";
    } 
?>
</select>
  
    <input type="submit" value="Submit">
  </form>
</div>
<?php


if (!empty($_POST['roomtype'])){ // Check roomID is not empty

    $status = $_POST['status'];
    $type = $_POST['roomtype'];
    $sql_statement ="INSERT INTO `rooms` (`rID`, `rtype`, `status`) VALUES (NULL, '$type', '$status')";
    $result = mysqli_query($db, $sql_statement);
    echo "New " . $type. " room added to database";
 }

 ?>


</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Find</title>
</head>
<body>

<style>
     body {
        background-image: url("http://designazure.com/wp-content/uploads/2018/05/long-shadow.png");
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
  background-color: #955251;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #955251;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>


<div>
 <form action="findPatient.php" method="POST">
    Name of Patient:
   <input type="name" id="name" name="name" <br>
   <input type="submit" value="Submit">
  </form>
</div>


<?php
include "config.php";

if (!empty($_POST['name'])){ // Check sname is not empty
    $pFullName = $_POST['name'];
    $sql_statement2 = "SELECT * FROM patients WHERE pFullName = '$pFullName'";
    $result = mysqli_query($db,$sql_statement2);
    while ( $row = mysqli_fetch_assoc($result))
    {
        $pID = $row["pID"];
    }
    $sql_statement3 = "SELECT * FROM assigned_room WHERE pID = $pID";
    $result_ = mysqli_query($db,$sql_statement3);
    while ( $roomrow = mysqli_fetch_assoc($result_))
    {
        $rID = $roomrow["rID"];
        echo "<p>Patient is in room with ID: $rID </p>";
    }
}
?>

</body>
</html>