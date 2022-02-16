<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Consult</title>

<style>
html * {
	padding: 0;
	margin: 0;
	box-sizing: border-box;
}

body {
	background-color: #FFFFFF;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
	font-family: sans-serif;
	padding: 5rem;
}

details {
	position: relative;
	width: 300px;
	margin-right: 1rem;
}

details[open] {
	z-index: 1;
}

summary {
	padding: 1rem;
	cursor: pointer;
	border-radius: 5px;
	background-color: #ddd;
	list-style: none;
}

summary::-webkit-details-marker {
	display: none;
}

details[open] summary:before {
	content: '';
	display: block;
	width: 100vw;
	height: 100vh;
	background: transparent;
	position: fixed;
	top: 0;
	left: 0;
}

summary:after {
	content: '';
	display: inline-block;
	float: right;
	width: .5rem;
	height: .5rem;
	border-bottom: 1px solid currentColor;
	border-left: 1px solid currentColor;
	border-bottom-left-radius: 2px;
	transform: rotate(45deg) translate(50%, 0%);
	transform-origin: center center;
	transition: transform ease-in-out 100ms
}

summary:focus {
	outline: none;
}

details[open] summary:after {
	transform: rotate(-45deg) translate(0%, 0%);
}

ul {
	width: 100%;
	background: #ddd;
	position: absolute;
	top: calc(100% + .5rem);
	left: 0;
	padding: 1rem;
	margin: 0;
	box-sizing: border-box;
	border-radius: 5px;
	max-height: 200px;
	overflow-y: auto;
}

li {
	margin: 0;
	padding: 1rem 0;
	border-bottom: 1px solid #ccc;
}

li:first-child {
	padding-top: 0;
}

li:last-child {
	padding-bottom: 0;
	border-bottom: none;
}
</style>
</head>
<body>
	

<form action="" method="POST">
<label for="specialization">Specialization:</label>
<details class = "custom-select">

<?php
	$sql_command ="SELECT Specialization FROM doctorcost";
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
if (!empty($_POST['specialization'])){ // Check sname is not empty
    $specialization = $_POST['specialization'];
    $sql_statement =
    "SELECT cost FROM `doctorcost` WHERE doctorcost.specialization = '$specialization'";
    $result = mysqli_query($db, $sql_statement);
    $id_rows = mysqli_fetch_assoc($result);
    $cost = $id_rows['cost'];
    $_SESSION['cost'] = $cost;
    }
?>


<form action="consultpatient.php" method="POST">
<label for="doctor">Preferred doctor:</label>
	<select id ="doctor" name="doctor">
	<?php
	$sql_command =
	"SELECT dID, dFullName FROM doctors WHERE doctors.specialization = '$specialization'";
	$myresult = mysqli_query($db, $sql_command);
	while($doctor_rows = mysqli_fetch_assoc($myresult)) {
	$dID = $doctor_rows['dID'];
	$_SESSION['doc'] = $dID;
	$dName = $doctor_rows['dFullName'];
	echo "<option value=$dID>".$dID. "-" . $dName . "</option>";
	} 
	?>
</select>

<a href="consultpatient.php">
<input type="submit" value="submit"/>
</a>

</form>
</body>
</html>