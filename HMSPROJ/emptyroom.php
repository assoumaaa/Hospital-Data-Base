<?php

include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Room</title>
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
  background-color: #feb236;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #feb236;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>


</body>
</html>

<div>
<form action="" method="POST">
<label for="room">Room:</label>
<select id ="room" name="room">
<?php
$sql_command =
"SELECT rID FROM rooms WHERE rooms.status = 'Occupied'";
$myresult = mysqli_query($db, $sql_command);
while($room_rows = mysqli_fetch_assoc($myresult)) {
$rID = $room_rows['rID'];
echo "<option value=$rID>".$rID. "</option>";
} 
?>
</select>

<input type="submit" value="Submit"/>
</form>

<?php
if(!empty($_POST['room'])){
    $rID = $_POST['room'];
    $sql_statement6 = "UPDATE `rooms` SET `status`='Empty' WHERE rooms.rID = $rID";
    $result_ = mysqli_query($db,$sql_statement6);
    echo "Room $rID has been set to empty.";
}
?>
</div>