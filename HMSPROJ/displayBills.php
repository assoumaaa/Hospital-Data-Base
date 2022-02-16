<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Bill</title>

</head>
<body>
<br>
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
</style>
<div>
<table>
  <tr>
    <th>PatientID</th>
    <th>Bill ID</th>
    <th>Amount</th>
    <th>Status</th>
    <th>Description</th>
    
  <?php 
    session_start();
    include "config.php";
    $pID = $_SESSION['PatientID']; 
    $sql_statement2 = "SELECT * FROM payment WHERE payment.pID = $pID";
    $result = mysqli_query($db,$sql_statement2);
    while ( $row = mysqli_fetch_assoc($result))
    {
        $bID= $row["bID"];
        $amount = $row["amount"];
        $status = $row["status"];
        $desc = $row["TreatmentDescription"];
        
        echo "<tr>". "<td>" . $pID . "</td>" . "<td>". $bID . "</td>". "<td>". $amount . "</td>". "<td>". $status . "</td>". "<td>". $desc . "</td>"."</tr>";
    }
  ?>  

 
</style>
</table>
</div>
</body>
</html>