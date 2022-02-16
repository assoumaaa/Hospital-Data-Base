


<?php
include "config.php";
?>

<form action="" method="POST">
Doctor Fullname:
    <input type="text" id="dFullName" name="dFullName"><br><br>
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

if (!empty($_POST['dFullName'])){ // Check sname is not empty
$dFullName = $_POST['dFullName'];
$special = $_POST['specialization'];
$sql_statement =
"INSERT INTO `doctors` (`dID`, `dFullName`, `Specialization`) VALUES (NULL, '$dFullName', '$special')";
$result = mysqli_query($db, $sql_statement);
echo "Successfully Added";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN PANEL</title>
</head>
<body>
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
    <th>ID</th>
    <th>Full Name</th>
    <th>Specialization</th>
  <?php 
    include "config.php";
    $sql_statement1 = "SELECT * FROM doctors";
    $result = mysqli_query($db,$sql_statement1);
    while ( $row = mysqli_fetch_assoc($result))
    {
        $id = $row["dID"];
        $doctorName = $row["dFullName"];
        $spec = $row["Specialization"];

        echo "<tr>". "<th>" . $id . "</th>" . "<th>". $doctorName . "</th>" . "<th>" .$spec . "</th>" . "</tr>";
    }
  ?>  
</table>

<form action = "deletedoctors.php" method = "POST">
<select name = "ids">
<?php
    
    $sql_command = "SELECT dID FROM doctors";
    $myresult = mysqli_query($db,$sql_command);
    while( $id_rows = mysqli_fetch_assoc($myresult))
    {
        $id = $id_rows['dID'];
        echo "<option value=$id>". $id . "</option>";
    }
?>
</select>
<button>DELETE</button>
</form>


</body>
</html>

