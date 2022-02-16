
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Patients</title>
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
</style>
<div>
<form action="newpatient.php" method="POST">
    Patient Fullname:
    <input type="text" id="pFullName" name="pFullName"><br><br>
    Patient Age: 
    <input type="number" id="age" name="age"><br><br>
    Patient Weight:
    <input type="number" id="weight" name="weight"><br><br>
    Patient Height:
    <input type="number" id="height" name="height"><br><br>


    <br>
    <label for="gender">Gender:</label>
    <select id="gender" name="gender">
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Other">Other</option>
    </select><br><br>
    <label for="bloodgroup">Select Patient Bloodgroup:</label>
    <select id="bloodgroup" name="bloodgroup">
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
    <option value="O+">O+</option>
    <option value="O-">O-</option>
    </select><br><br>
    <label for="genotype">Select Patient Genotype:</label>
    <select id="genotype" name="genotype">
    <option value="AA">AA</option>
    <option value="AS">AS</option>
    <option value="SS">SS</option>
    <option value="AC">AC</option>
    </select><br><br>
    <input type="submit" value="Submit">
</form>


<?php
include "config.php";


if (!empty($_POST['pFullName'])){ // Check sname is not empty
    $pFullName = $_POST['pFullName'];
    $weight = $_POST['weight'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $bloodgroup = $_POST['bloodgroup'];
    $genotype = $_POST['genotype'];
    $gender = $_POST['gender'];
    $sql_statement =
    "INSERT INTO `patients` (`pID`, `pFullName`, `age`, `weight`, `height`, `bloodgroup`, `genotype`) VALUES (NULL, '$pFullName', $age, $weight, $height, '$bloodgroup', '$genotype')";
    $result = mysqli_query($db, $sql_statement);
    echo $pFullName. " added to database";
    }

?>
</div>

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
  body {
        background-image: url("https://mocah.org/uploads/posts/4562144-simple-simple-background-primary-colors-minimalism-geometry-abstract.png")
</style>
<br>

<div>
  <table>
  <tr>
    <th>ID</th>
    <th>Full Name</th>
    <th>age</th>
    <th>weight</th>
    <th>height</th>
    <th>gender</th>
    <th>bloodgroup</th>
    <th>genotype</th>
  </tr>

    <?php 
    include "config.php";
    $sql_statement5 = "SELECT * FROM patients";
    $result = mysqli_query($db,$sql_statement5);
    while ( $row = mysqli_fetch_assoc($result) )
    {
        $myid = $row["pID"];
        $mypatientName = $row["pFullName"];
        $myage = $row["age"];
        $myweight = $row["weight"];
        $myheight = $row["height"];
        $mygender = $row["gender"];
        $mybloodgroup = $row["bloodgroup"];
        $mygenotype = $row["genotype"];

        echo "<tr>". "<th>" . $myid . "</th>" . "<th>". $mypatientName . "</th>" . "<th>" .  $myage . "</th>" . "<th>". $myweight . "</th>". "<th>". $myheight . "</th>"."<th>". $mygender . "</th>". "<th>" . $mybloodgroup . "</th>". "<th>" .  $mygenotype . "</th>" . "</tr>";
    }
   ?> 

</table>

</div>
</body>
</html>
