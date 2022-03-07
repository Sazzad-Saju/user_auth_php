<?php
    session_start();
    include("connection.php");
    include("functions.php");
    $showDivFlag=false; //hide or show alert
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name = $_POST['user_name'];
        $pass = $_POST['password'];
        if(!empty($name) && !empty($pass) && !is_numeric($name)){
            //read from db
            $query = "select * from users where user_name = '$name' limit 1";
            $result = mysqli_query($conn,$query);
            if($result){
                if($result && mysqli_num_rows($result)>0){
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['password']===$pass){
                        // set login session
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php");
                        die;
                    }
                }
            }
            // echo "Wrong username or password";
            $showDivFlag=true;
        }else{
            // echo "Wrong username or password";
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
    <title>Login</title>
</head>
<body>
    <div id="box">
        <form method="post" action="">
            <div style="font-size: 20px; margin:10px; color:white">Login</div>
            <input id="text" type="text" name="user_name" placeholder="User Name" value="<?php echo isset($_POST["user_name"]) ? $_POST["user_name"] : ''; ?>">
            <input id="text" type="password" name="password" placeholder="Password" >
            <div class="alert" <?php if ($showDivFlag===false){?>style="display:none"<?php } ?>>
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                Wrong username or password!
            </div>
            <input id="button" type="submit" value="login">
            <a href="signup.php">Click to Signup</a>
        </form>
    </div>
    <br>
    <div style="text-align:center">
        <footer class="text-muted foot-note">Sazzad-Saju &copy; 2022</footer>
    </div>
    <br>
</body>
</html>