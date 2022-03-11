<?php
    session_start();
    include("connection.php");
    include("functions.php");
    $user_data = check_login($conn);
    // fetch profile picture
    $id = $user_data['user_id'];
    $ownerImg = "select * from profileimg where user_id = '$id'";
    $resultImg = mysqli_query($conn,$ownerImg);
    $rowImg = mysqli_fetch_assoc($resultImg);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Simple PHP Auth</title>
</head>
<body>
    <div class="content-section">
    <div class="center">
    <div class='user-container'>
        <?php if($rowImg['status'] == 0){
            echo "<img src='uploads/profile".$id.".jpg'>";
        }else{
            echo "<img src='uploads/profileDefault.jpg'>";
        }
            echo "<br> <p class='username' style='color:#fff; font-size: 18px;'>".$user_data['user_name']."</p><br><br>"; ?>
    </div>
    </div>
    <div class="news-feed">
    <h1>Hello, <?php echo $user_data['user_name']; ?></h1>
    <br>
    <h3>Change Profile Picture</h3>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="proPic">
        <button type="submit" name="submit" class="uploadButt">Upload</button>
    </form>
    <br><br>
    <?php 
        date_default_timezone_set('Asia/Dhaka');
        echo "Today: ".date('d/m/Y')." ".date('h:i:s a')." ";
    ?>
    <br> <br>
    <a href="logout.php" id="delButton" class="left">Logout</a>
    <br><br><br><br>
    <footer class="foot-note">Sazzad-Saju &copy; 2022</footer>
    </div>
    </div>
    
</body>
</html>