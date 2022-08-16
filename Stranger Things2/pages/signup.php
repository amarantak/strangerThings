<?php
session_start();
error_reporting(0);
include_once('../functions/functions.php');
$dbConnect = dbLink();
if ($dbConnect) {
    echo '<!-- Connection established -->';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="logo">
        <a href="../index.php"><img src="../images/logo.svg" class="logo" alt="Stranger Things Logo">
    </div>
    <div class="banner">
        <h3>Sign Up</h3>
    </div>
    <div class="signup-content">
        <form action="resolve.php" method="post">
            <input type="text" name="name" placeholder="Enter name"><br>
            <input type="text" name="uname" placeholder="Enter Username"><br>
            <input type="password" name="pwd" placeholder="Enter Password">
            <input type="password" name="pwd2" placeholder="Confirm Password"><br><br>
            <input type="submit" value="Create Account">
        </form><br>
        <p><a href="../index.php">Return</a></p>
    </div>

</body>

</html>