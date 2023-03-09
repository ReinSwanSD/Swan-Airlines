<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Skyward Aviation</title>
</head>
<body>
<?php
if (empty($_GET['email'])||empty($_GET['password']))
    exit ("<p> You must enter values in all fields! Click your browser's Back button to return to the previous page.</p>");

$Email=$_GET['email'];
$Password = $_GET['password'];

//connecting to the database with PDO
require_once("config.php");

$TableName = "frequent_flyers";



//solution: use prepared statements properly

$sql = "SELECT * FROM $TableName 
        WHERE email = :em 
        AND password = :pw";
$result = $pdo->prepare($sql);
$result->execute(array(":em"=>$Email,":pw"=>$Password));

//echo "<pre>$sql<pre>";

if(!$row = $result->fetch())
   exit("You must enter a valid email address and password. Click your browser's Back button to return to the previous page.</p>");
else {
      //print_r($row);
      $FlyerID = $row['flyerID'];}

 // closes connection and frees the resources used by the PDO object
 $pdo = null;
?>

<h2> Login Successful</h2>

<!--send the flyerID to FrequentFlyerClub.php-->
<p><a href="FrequentFlyerClub.php?flyerID=<?=$FlyerID?>"> Frequent Flyer Club Home Page</a></p>






</body>
</html>