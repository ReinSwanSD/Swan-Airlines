<?php
 //check the user input first

if (empty($_GET['first_name'])||empty($_GET['last_name'])||empty($_GET['phone'])||empty($_GET['address'])||empty($_GET['city'])||empty($_GET['zip'])||empty($_GET['state']))
    exit ("<p> You must enter values in all fields ! Click your browser's Back button to return to the previous page.</p>");

    $Last=$_GET["last_name"];
    $First=$_GET["first_name"];
    $Phone=$_GET["phone"];
    $Address=$_GET["address"];
    $State=$_GET["state"];
    $City=$_GET["city"];
    $Zip=$_GET["zip"];

    if(isset($_GET['flyerID']))
        $FlyerID = $_GET['flyerID'];
   

    require_once("config.php");

    $TableName = "frequent_flyers";
    $sql = "UPDATE $TableName SET first=:fs,last=:ls, phone=:ph,address=:ad,state=:st,city=:ct, zip=:zip WHERE flyerID = '$FlyerID' ";
    $result = $pdo->prepare($sql);
    $result->execute(array(":fs"=>$First,":ls"=>$Last,":ph"=>$Phone,":ad"=>$Address,":st"=>$State,":ct"=>$City,":zip"=>$Zip));

    

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
<h2>Contact Info Updated</h2>
<p> Your contact information was successfully updated. </p>

<p><a href="FrequentFlyerClub.php?flyerID=<?= $FlyerID ?>">Frequent Flyer Club Home Page</a></p>
</body>
</html>