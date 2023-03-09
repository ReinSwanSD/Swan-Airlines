<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Skyward Aviation</title>
</head>
<body>
    <h1> Skyward Aviation Frequent Flyer Program </h1>
    <h2> New Flyer Registration</h2>
    <form action = "RegisterFlyer.php" method="get">
        <table border="1">
            <tr>
              <td align="left">
                <p>E-mail Address</p>
                <p><input type="text" name="email" size="36"/></p>
                <p>Confirm E-mail Address</p>
                <p><input type="text" name="email_confirm" size="36"/></p>
              </td>
              <td align="left">
                <p>Password</p>
                <p><input type="password" name="password" size="36"/></p>
                <p>Confirm password</p>
                <p><input type="password" name="password_confirm" size="36"/></p>
              </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="submit" value="Register"/>
                </td>
            </tr>
        </table>
    </form>

    <h2>Returning Flyers</h2>
    
    
    <form method="get" action = "ValidateUser.php">
      <table border="1">
        <tr>
            <td align="left">
                <p>E-mail Address</p>
                <p><input type="text" name="email" size="36"/></p>
            </td>

            <td align="left">
                <p>Password</p>
                <p><input type="password" name="password" size="36"/></p>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                    <input type="submit" value="log in"/>
            </td>
        </tr>
      </table>
    </form>
    
</body>
</html>