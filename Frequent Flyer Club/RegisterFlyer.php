<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Skyward Aviation</title>
</head>
<body>
    <h1>Skyward Aviation</h1>
    <h2> Frequent Flyer Registration</h2>
    <?php
    //check the user input first
    if (empty($_GET['email'])||empty($_GET['email_confirm'])||empty($_GET['password'])||empty($_GET['password_confirm']))
        exit ("<p> You must enter values in all fields ! Click your browser's Back button to return to the previous page.</p>");
    else if ($_GET["email"]!=$_GET["email_confirm"])
        exit ("<p> You did not enter the same email address! Click your browser's Back button to return to the previous page.</p>");
    else if ($_GET["password"]!=$_GET["password_confirm"])
        exit ("<p> You did not enter the same password! Click your browser's Back button to return to the previous page.</p>");
    
    
    //connecting to the database with PDO
    require_once("config.php");

    $TableName = "frequent_flyers";
    $Email=$_GET['email'];
    $Password = $_GET['password'];

    // check if already registered with the email
    $sql = "SELECT * FROM $TableName";
    $result = $pdo->query($sql);
    while ($row = $result->fetch()) {
        //the email match the field from the table
        if ($row['email']==$Email)
        exit("<p>The email address you entered is already registered! Click your browser's Back button to return to the previous page.</p>");
    }

    //insert into new user data to the table
    $sql = "INSERT INTO $TableName VALUES (NULL, :em,:ps,NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
    $result = $pdo->prepare($sql);
    $result->execute(array(":em"=>$Email,":ps"=>$Password));

    //retrieve the flyerID
    $sql = "SELECT * FROM $TableName WHERE email = :em";
    $result = $pdo->prepare($sql);
    $result->execute(array(":em"=>$Email));
    $row = $result->fetch();
    $FlyerID = $row['flyerID'];

    // closes connection and frees the resources used by the PDO object
	$pdo = null;
    ?>

    <p>Your new frequent_flyer ID is <strong><?=$FlyerID?></strong></p>
    <p><a href="UpdateContactInfo.php?flyerID=<?=$FlyerID?>">Enter Contact Information </a></p>

</body>
</html>

