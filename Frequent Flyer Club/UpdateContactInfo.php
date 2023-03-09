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

//根据flyerID来调取此用户所有其他基本信息
$TableName = "frequent_flyers";
$sql = "SELECT * FROM $TableName WHERE flyerID = '$FlyerID' ";
$result = $pdo->query($sql);
if($row = $result->fetch()){
    $Last=$row["last"];
    $First=$row["first"];
    $Phone=$row["phone"];
    $Address=$row["address"];
    $State=$row["state"];
    $City=$row["city"];
    $Zip=$row["zip"];
}
else{
    $Last="";
    $First="";
    $Phone="";
    $Address="";
    $State="";
    $City="";
    $Zip="";
}

// closes connection and frees the resources used by the PDO object
$pdo = null;
?>

<h2> Contact Information </h2>
<?php echo $First;?>


<!--<form action ="ContactUpdate.php?flyerID=<?=$FlyerID?>" method="get">样写不管用：FLYERID压根没被传输过去-->
<form action ="ContactUpdate.php" method="get">
    <table border="1">
        <tr>
            <td align="left" valign="top">
                <p>First Name <input type="text" name="first_name" value="<?=$First?>" size="36"/></p>
                <p>Last Name <input type="text" name="last_name" value="<?=$Last?>" size="36"/></p>
                <p>Phone <input type="text" name="phone" value="<?=$Phone?>" size="36"/></p>
                <p><input type="hidden" name = "flyerID" value = "<?=$FlyerID?>"/></p>
            </td>
            <td align="left" valign="top">
                <p>Address <input type="text" name="address" value="<?=$Address?>" size="40"/></p>
                <p>City <input type="text" name="city" value="<?=$City?>" size="10"/></p>
                <p>State <input type="text" name="state" value="<?=$State?>" size="2"/></p>
                <p>Zip <input type="text" name="zip" value="<?=$Zip?>" size="10" maxlength="10"/></p>
            </td>
        </tr></table>

        <p><input type="submit" value="Submit"/></p>
</form></body></html>
   