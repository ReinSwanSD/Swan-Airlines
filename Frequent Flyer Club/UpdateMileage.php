<?php
 //check the user input first

    if (empty($_GET['mileage'])||empty($_GET['travel_Date']))
      exit ("<p> You must enter values in all fields ! Click your browser's Back button to return to the previous page.</p>");

    $Mileage=$_GET["mileage"];
    $TravelDate=$_GET["travel_Date"];
    if(isset($_GET['flyerID']))
        $FlyerID = $_GET['flyerID'];


    require_once("config.php");
    
    $TableName = "mileage";
    //insert into new user data to the table
    $sql = "INSERT INTO $TableName VALUES (NULL, '$FlyerID',:td,:mg)";
    $result = $pdo->prepare($sql);
    $result->execute(array(":td"=>$TravelDate, ":mg"=>$Mileage));

// closes connection and frees the resources used by the PDO object
    $pdo = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Skyward Aviation</title>
</head>
<body>
<h1>Skyward Aviation</h1>
<h2>Mileage Info Updated</h2>
<p> Your Mileage information was successfully updated. </p>
<p><a href="FrequentFlyerClub.php?flyerID=<?=$FlyerID?>"> Frequent Flyer Club Home Page</a></p>

</body>
</html>