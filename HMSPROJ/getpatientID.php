<?php

include "config.php";

?>

<form action="" method="POST">
    Patient Name:
   <input type="text" id="patient" name="patient" ><br>
   Age:
   <input type="text" id="age" name= "age"><br>
   <input type="submit" value="Submit">
  </form>

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
    <th>Patient ID</th>
    <th>Full Name</th>
    <th>Age</th>
    <th>Weight</th>
    <th>Height</th>
    <th>Gender</th>
    <th>Bloodgroup</th>
    <th>Genotype</th>
  </tr>
<?php
if (!empty($_POST['patient'])){ 
    $pName = $_POST['patient'];
    $pAge = $_POST['age'];
    $sql_statement =
    "SELECT * FROM `patients` WHERE patients.pFullName = '$pName' AND patients.age =  '$pAge'";
    $result = mysqli_query($db, $sql_statement);
    $id_rows = mysqli_fetch_assoc($result);
    if (!$id_rows){
        header("Location: newpatient.php");
        exit;
    }
    $pID = $id_rows['pID'];
    $pFullName = $id_rows['pFullName'];
    $age = $id_rows['age'];
    $weight = $id_rows['weight'];
    $height = $id_rows['height'];
    $gender = $id_rows['gender'];
    $bloodgroup = $id_rows['bloodgroup'];
    $genotype = $id_rows['genotype'];
    echo "<tr>". "<td>" . $pID . "</td>" . "<td>". $pFullName . "</td>" . "<td>" .$age . "</td>" . "<td>" . $weight . "</td>" . "<td>" . $height . "</td>". "<td>" . $gender . "</td>". "<td>" . $bloodgroup . "</td>". "<td>" . $genotype . "</td>". "</tr>";
    while ($id_rows = mysqli_fetch_assoc($result)){
        $pID = $id_rows['pID'];
        $pFullName = $id_rows['pFullName'];
        $age = $id_rows['age'];
        $weight = $id_rows['weight'];
        $height = $id_rows['height'];
        $gender = $id_rows['gender'];
        $bloodgroup = $id_rows['bloodgroup'];
        $genotype = $id_rows['genotype'];
        echo "<tr>". "<td>" . $pID . "</td>" . "<td>". $pFullName . "</td>" . "<td>" .$age . "</td>" . "<td>" . $weight . "</td>" . "<td>" . $height . "</td>". "<td>" . $gender . "</td>". "<td>" . $bloodgroup . "</td>". "<td>" . $genotype . "</td>". "</tr>";
    }
    }
?>

</table>
</body>
