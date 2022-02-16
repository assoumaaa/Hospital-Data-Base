<?php

include "config.php";

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
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>

<form action="" method="POST">
Room type:
<input type="text" id="rtype" name="rtype">
Cost: 
<input type="text" id="cost" name="cost">
<input type="submit" value="Submit">
</form>

<?php
if ((!empty($_POST['rtype'])) && (!empty($_POST['cost']))){ // Check sname is not empty
    $rtype = $_POST['rtype'];
    $cost = $_POST['cost'];
    $sql_statement =
    "INSERT INTO `roomcost` (`rtype`, `cost`) VALUES ('$rtype', $cost)";
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
<table>
  <tr>
    <th>Room type</th>
    <th>Cost</th>
    
  <?php 
    include "config.php";
    $sql_statement2 = "SELECT * FROM roomcost";
    $result = mysqli_query($db,$sql_statement2);
    while ( $row = mysqli_fetch_assoc($result))
    {
        $r_type = $row["rtype"];
        $cost_ = $row["cost"];
        
        echo "<tr>". "<td>" . $r_type . "</td>" . "<td>". $cost_ . "</td>". "</tr>";
    }
  ?>  
</table>
</body>
</html>