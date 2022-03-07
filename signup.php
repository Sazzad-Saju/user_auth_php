<?php
    session_start();
    include("connection.php");
    include("functions.php");
    $showDivFlag=false; //hide or show alert
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name = $_POST['user_name'];
        $pass = $_POST['password'];
        if(!empty($name) && !empty($pass) && !is_numeric($name) && strlen($name)>3){
            //save to db
            $uid = random_num(10);
            $query = "insert into users (user_id,user_name,password) values ('$uid','$name','$pass')";
            mysqli_query($conn,$query);
            header("Location: login.php");
            die;
        }else{
            // echo "Enter valid Information";
            $showDivFlag=true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Signup</title>
</head>
<body>
    <div id="box">
        <form method="post" action="">
            <div style="font-size: 20px; margin:10px; color:white">Signup</div>
            <!-- maintain prev value when submission failed -->
            <input id="text" type="text" name="user_name" placeholder="User Name"  value="<?php echo isset($_POST["user_name"]) ? $_POST["user_name"] : ''; ?>">
            <input id="text" type="password" name="password" placeholder="Password">
            <!-- conditionally show div -->
            <div class="alert" <?php if ($showDivFlag===false){?>style="display:none"<?php } ?>>
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                Enter Valid Information
            </div>
            <input id="signupButton" type="submit" value="signup">
            <a href="login.php">Click to Login</a>
        </form>
    </div>
</body>
</html>