<?php
session_start();
include "config.php";

if (!empty($_POST['room'])){
    $rID = $_POST['room'];
    $_SESSION['room'] = $rID;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Room</title>
</head>
<style>
     body {
        background-image: url("https://mocah.org/uploads/posts/4562144-simple-simple-background-primary-colors-minimalism-geometry-abstract.png")
      </style>
<style>

* {
  box-sizing:border-box;
}
body {
  margin:20px;
  background-color: #fafafa;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<style>
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
<body>
<div>
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
        header("Location: getpatientid.php");
        exit;
    }
    $pID = $row["pID"];
    $pName = $row["pFullName"];
    $_SESSION['patients']=$pID;
}

?>

<form action="makeassignment.php" method="POST">
    Room Entry Date:
   <input type="date" id="entrydate" name="entrydate" <br>
   Length of stay:
    <input type="number" id="staylength" name="staylength" <br>

   <a href="makeassignment.php">
      <input type="submit" value="submit"/>
     </a>
  </form>
</div>

</body>
</html>
