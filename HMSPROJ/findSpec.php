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
  background-color: #98B4D4;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #98B4D4;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>


<div>
 <form action="findSpec.php" method="POST">
    Name of Specialization:
   <input type="text" id="spec" name="spec" <br>
   <input type="submit" value="Submit">
  </form>
</div>

 <div align="center">
    <font size="+2" style="font-family:Copperplate;" >Name and ID of doctors who have this specialization:  </font>
<?php
include "config.php";

if (!empty($_POST['spec'])){ // Check sname is not empty
    $specc = $_POST['spec'];
    $sql_statemen = "SELECT * FROM doctors WHERE Specialization = '$specc'";
    $result = mysqli_query($db,$sql_statemen);
   
    while ( $row = mysqli_fetch_assoc($result))
    {
        $id = $row["dID"];
        $name = $row["dFullName"];

        echo "<p align=center> $name -- ID: $id </p>" ;
    }
}
?>
</div>



</body>
</html>
