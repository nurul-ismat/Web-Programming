<?php
    if(isset($_POST['signup-submit'])){
        require 'dbh.inc.php'; //db connection

       
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $uid = mysqli_real_escape_string($conn, $_POST['uid']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
        $pwdrepeat = mysqli_real_escape_string($conn, $_POST['pwd-repeat']);
        $hashedPwdinDb = password_hash($pwd, PASSWORD_DEFAULT);

        if (empty($email) || empty($uid) || empty($pwd) || empty($pwdrepeat)){
            header("Location: ../signup.php?error=emptyfields&uid=".$uid."&email=".$email);
            exit();
        } 
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $uid)){
            header("Location: ../signup.php?error=invalidemailuid");
            exit();
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ../signup.php?error=invalidemail&uid=".$uid);
            exit();
        } 
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $uid)){
            header("Location: ../signup.php?error=invaliduid&email=".$email);
            exit();
        }
        else if ($pwd !== $pwdrepeat){
            header("Location: ../signup.php?error=pwderror&uid=".$uid."&email=".$email);
        } 
        else{
            $sql = "SELECT uid FROM users WHERE uid = ?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../signup.php?error=sqlerror");
                exit();
            } else{
                mysqli_stmt_bind_param($stmt, "s", $uid);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if($resultCheck>0){
                    header("Location: ../signup.php?error=uidtaken&email=".$email);
                    exit();
                }  else{
                    $sql = "INSERT INTO users (uid, email, pwd) VALUES (?,?,?);";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                    } else {
                        $pwdhashed = password_hash($pwd, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "sss", $uid, $email, $pwdhashed);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../signup.php?signup=success");
                        exit();
                    }
                     
                }
            }
        }
        
        
        
          
        
        

    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    } else {
        header("Location: ../signup.php");
        exit();
    }
    