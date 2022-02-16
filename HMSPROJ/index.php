<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DBMS</title>
</head>
<body>

<style>
.button {
  background-color: #686256; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 4px 2px;
  cursor: pointer;

}
.buttonn {
  background-color: #98B4D4; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 4px 2px;
  cursor: pointer;
}
.buttonnn {
  background-color: #d9ad7c; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 4px 2px;
  cursor: pointer;
}
.buttonnnn {
  background-color: #a2836e; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 4px 2px;
  cursor: pointer;
}

.buttonnnnn {
  background-color: #feb236; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 4px 2px;
  cursor: pointer;
}


.button3 {
    width: 100%;
    color: #f2f2f2;
}
</style>

<style>
     body {
        background-image: url("https://mocah.org/uploads/posts/4562144-simple-simple-background-primary-colors-minimalism-geometry-abstract.png")
</style>


<div align="center">
<font size="+100" style="font-family:Copperplate;" >Hospital Data Base </font>
</div> 

<br>

<font size="+2" style="font-family:Copperplate;" >What would you like to add? </font>
<button id = "button1" class="button button3">Patients</button>
<script>
document.getElementById('button1').onclick = function() {
    window.location.href = "newpatient.php";
}
</script>


<button id = "button2" class="button button3">Doctors</button>
<script>
document.getElementById('button2').onclick = function() {
    window.location.href = "newdoctor.php";
}
</script>


<button id = "button3" class="button button3">Specializations</button>
<script>
document.getElementById('button3').onclick = function() {
    window.location.href = "Newspecialization.php";
}
</script>


<button id = "button4" class="button button3">Patient to Room</button>
<script>
document.getElementById('button4').onclick = function() {
    window.location.href = "roomassignment.php";
}
</script>

<br> <br>
<font size="+2" style="font-family:Copperplate;" >What would you like to find? </font>
<br>


<button id = "button5" class="buttonn button3">Patient's Room</button>
<script>
document.getElementById('button5').onclick = function() {
    window.location.href = "findPatient.php";
}
</script>


<button id = "button9" class="buttonn button3">Patients's Bill</button>
<script>
document.getElementById('button9').onclick = function() {
    window.location.href = "viewbills.php";
}
</script>

<button id = "button6" class="buttonn button3">Doctor's with a specific Specialization</button>
<script>
document.getElementById('button6').onclick = function() {
    window.location.href = "findSpec.php";
}
</script>


<br> <br>
<font size="+2" style="font-family:Copperplate;" >What would you like to Modify?</font>
<button id = "button10" class="buttonnnnn button3">Rooms</button>
<script>
document.getElementById('button10').onclick = function() {
    window.location.href = "emptyroom.php";
}
</script>

<br> <br>
<font size="+2" style="font-family:Copperplate;" >Medical</font>
<button id = "button7" class="buttonnn button3">Consultation</button>
<script>
document.getElementById('button7').onclick = function() {
    window.location.href = "consult.php";
}
</script>

<br> <br>
<font size="+2" style="font-family:Copperplate;" >Payment</font>
<button id = "button8" class="buttonnnn button3">Billing</button>
<script>
document.getElementById('button8').onclick = function() {
    window.location.href = "paybills.php";
}
</script>


<br> <br>
<font size="+2" style="font-family:Copperplate;" >What would you like to delete?</font>
<button id = "lastbutton" class="buttonnnn button3">Patients</button>
<script>
document.getElementById('lastbutton').onclick = function() {
    window.location.href = "deletepatients.php";
}
</script>

















</body>
</html>