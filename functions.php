<?php
    function check_login($conn){
        if(isset($_SESSION['user_id'])){
            $id= $_SESSION['user_id'];
            $query = "select * from users where user_id='$id'"; 
            //user id generally unique, don't have to put LIMIT 1 in sql
            // bad practice
            $result = mysqli_query($conn,$query);
            if($result && mysqli_num_rows($result)>0){
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
        // redirect to login 
        header("Location: login.php");
        die;
    }
    function random_num($max){
        $text = "";
        // if($length<5){
        //     $length=5;
        // }
        $len = rand(4,$max);
        for($i=0;$i<$len;$i++){
            $text .= rand(0,9);
        }
        return $text;
    }
?>