<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMIN PANEL</title>
</head>
<body>
<style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>


<div align = "center">

<b>ADMIN PANEL</b> 

<br>
<br>
<br>
<br>

<button id = "button1" class="button">Doctor</button>
<script>
document.getElementById('button1').onclick = function() {
    window.location.href = "newdoctor.php";
}
</script>
<br>
<br>

<button id = "button2" class="button">New Specialization</button>
<script>
document.getElementById('button2').onclick = function() {
    window.location.href = "Newspecialization.php";
}
</script>
</div>
</body>
</html>