<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Skyward Aviation</title>
</head>
<body>
    <h1>Skyward Aviation</h1>
<?php
require_once("config.php");
if(isset($_GET['flyerID']))
  $FlyerID = $_GET['flyerID'];
$pdo=null;
?>

<h2> Mileage Credit Information </h2>

<form action ="UpdateMileage.php" method="get">
    <table border="1">
        <tr>
            <td align="left" valign="top">
                <p>Travel Date <input type="date" name="travel_Date" value="2022-10-21"/></p>
            </td>
            <td align="left" valign="top">
                <p>Mileage <input type="text" name="mileage"/></p>
                <p><input type="hidden" name = "flyerID" value = "<?=$FlyerID?>"/></p>
            </td>
        </tr></table>

        <p><input type="submit" value="Submit"/></p>
</form></body></html>
   