<?php
    session_start();
    include("connection.php");
    include("functions.php");
    $user_data = check_login($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Simple PHP Auth</title>
</head>
<body>
    <a href="logout.php" id="delButton">Logout</a>
    <h1>Hello, <?php echo $user_data['user_name']; ?></h1>
    <h3>This is the index page</h3>
    <?php 
        date_default_timezone_set('Asia/Dhaka');
        echo "Today: ".date('d/m/Y')." ".date('h:i:s a')." ";
    ?>
    <br>
    
</body>
</html>