

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
</style>
<div>
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
</div>


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
    <title>Doctors</title>
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
<br>

  <div>
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
</div>



</body>
</html>

