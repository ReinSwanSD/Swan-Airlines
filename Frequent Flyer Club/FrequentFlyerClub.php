<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Skyward Aviation</title>
</head>
<body>
<h1>Skyward Aviation</h1>
<h2> Frequent Flyer Club</h2>
<?php
if(isset($_GET['flyerID']))
  $FlyerID = $_GET['flyerID'];


//connecting to the database with PDO
require_once("config.php");


//retrieve the other information of this flyer from its ID
$TableName = "frequent_flyers";
$sql = "SELECT * FROM $TableName WHERE flyerID = '$FlyerID'";
$result = $pdo->query($sql);
if($row = $result->fetch())
  $CustomerName=$row["first"]." ".$row["last"];

$TableName = "mileage";
$Mileage = 0;

//from mileage Table to calculate the total mileage for this ID
$sql = "SELECT SUM(mileage) FROM $TableName WHERE flyerID = '$FlyerID'";
$result = $pdo->query($sql);
if($row = $result->fetch())
   $Mileage = floatval($row[0]);

// closes connection and frees the resources used by the PDO object
$pdo = null;
?>

<table border="1">
  <tr> 
    <td align="left">
      <p><strong>Custmer Name: </strong> <?=$CustomerName?></p>
      <p><strong>Frequent Flyer #: </strong> <?=$FlyerID ?></p>
      <p><strong>Mileage credit: </strong> <?=$Mileage ?></p>
    </td>
    <td align="left">
      <p><a href='RequestMileage.php?flyerID=<?= $FlyerID ?>'>Request Mileage Credit</a></p>
      <p><a href='UpdateContactInfo.php?flyerID=<?=$FlyerID?>'>Update Contact Info</a></p>
    </td>
  </tr>
</table>

<p><a href="SkywardFlyers.php">Log Out</a></p>



</body>
</html>