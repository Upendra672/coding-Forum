<?php

$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $user_email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users where user_email='$user_email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
       $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['user_password'])){
            session_start();
            $_SESSION['loggedin']= true;
            $_SESSION['name']= $row['name'];
            $_SESSION['user_id']= $row['user_id'];
            $_SESSION['user_email']= $user_email;
            echo "logged in" . $user_email;
            // header("Locataion: PHP_LEARNING/46_FORUM/index.php");
        }
        header("Location: /PHP_LEARNING/46_FORUM/index.php");
    }
    header("Location: /PHP_LEARNING/46_FORUM/index.php");
}


?>