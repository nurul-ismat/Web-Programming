<?php

if(isset($_POST['login-submit'])){

    require 'dbh.inc.php';

    $emailuid = $_POST['mailuid'];
    $pwd = $_POST['pwd'];

    if(empty($emailuid) || empty($pwd)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else{
        $sql = "SELECT * FROM users WHERE uid = ? OR email=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        } else{
            mysqli_stmt_bind_param($stmt, "ss", $emailuid, $emailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($pwd, $row['pwd']);
                if ($pwdCheck == false){
                    header("Location: ../index.php? error=wrongpwd");
                    exit();
                }
                else if($pwdCheck == true){
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uid'];
                    header("Location: ../index.php?login=success");
                    exit();
                } else header("Location: ../index.php? error=wrongpwd");
                        exit();
            } else{
                header("Location: ../index.php?error=nouser");
            }
        }
    }

} else{
    header("Location: ../index.php");
    exit();
}