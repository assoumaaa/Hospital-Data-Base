<?php
include "config.php"
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Bill</title>
</head>
<body>

</body>
</html>
<style>
* {
  box-sizing:border-box;
}
body {
  margin:20px;
  background-color: #fafafa;
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
  background-color: #a2836e;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #a2836e;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<div>

<style>
       body {
        background-image: url("https://mocah.org/uploads/posts/4562144-simple-simple-background-primary-colors-minimalism-geometry-abstract.png")
     }
</style>

<form action="bill.php" method="POST">
    Patient ID:
   <input type="text" id="patient" name="patient" <br>
   <a href="bill.php">
      <input type="submit" value="Submit"/>
     </a>
  </form>