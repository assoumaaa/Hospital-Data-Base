<?php
include "config.php"


?>

<style>
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
  background-color: #55B4B0;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #55B4B0;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
 body {
        background-image: url("https://mocah.org/uploads/posts/4562144-simple-simple-background-primary-colors-minimalism-geometry-abstract.png")
        }
</style>
<div>
<form action="" method="POST">
Specialization:
<input type="text" id="specialization" name="specialization">
Cost: <input type="text" id="cost" name="cost">
<input type="submit" value="Submit">
</form>
</div>


<?php

if ((!empty($_POST['specialization'])) && (!empty($_POST['cost']))){ // Check sname is not empty
$special = $_POST['specialization'];
$cost = $_POST['cost'];
$sql_statement =
"INSERT INTO `doctorcost` (`Specialization`, `Cost`) VALUES ('$special', $cost)";
$result = mysqli_query($db, $sql_statement);
echo "Successfully added to database.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Specialization</title>
</head>
<body>
<br>
<style>
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
<div>
<table>
  <tr>
    <th>Specialization</th>
    <th>Cost</th>
    
  <?php 
    include "config.php";
    $sql_statement2 = "SELECT * FROM doctorcost";
    $result = mysqli_query($db,$sql_statement2);
    while ( $row = mysqli_fetch_assoc($result))
    {
        $cost = $row["Cost"];
        $spec = $row["Specialization"];

        echo "<tr>". "<th>" . $spec . "</th>" . "<th>". $cost . "</th>". "</tr>";
    }
  ?>  
</table>
</div>
</body>
</html>







