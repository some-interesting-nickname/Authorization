<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
</head>
<body>
<?php

if(!empty($_GET)) {
    echo "<p><b>Hello, &nbsp;". $_GET["login"]."!</b></p>";
} else {
    header('Location: http://127.0.0.2/register.php');
    die();

}

?>

<a href="register.php"> Log out</a>
</body>
</html>