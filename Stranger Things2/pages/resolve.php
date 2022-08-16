<?php
session_start();
error_reporting(0);
include_once('../functions/functions.php');
$dbConnect = dbLink();
if ($dbConnect) {
    echo '<!-- Connection established -->';
}
// showMem();

$name = $_POST['name'];
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$pwd2 = $_POST['pwd2'];

//if (pwd is the same as pwd 2) validatePwds = true
$validatePwds = ($pwd == $pwd2) ? true : false;
//if (pwd is not empty && pwd2 is not empty) valiatePwds = true
$validatePwds = ($pwd != NULL && $pwd2 != NULL) ? true : false;
// if (uname is not empty) validateUname = true
$validateUname = ($uname != NULL) ? true : false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <style></style>
</head>

<body onload="bounce()">
    <div class="content">
        <?php
        if ($validatePwds && $validateUname) {
            insertUser($dbConnect, $name, $uname, $pwd);
        }
        ?>
    </div>

    <script>
        function bounce() {
            window.location.href = '../index.php';
        }
    </script>
</body>

</html>