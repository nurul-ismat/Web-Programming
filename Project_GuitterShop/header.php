<?php
    session_start();

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guitar Store</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/favicon.ico" />
    <script>
        alert("Hello! Browse throught our guitars and sign up to become a member!")
        alert("Login if you are already a member")
    </script>
</head> 

<body>
    
    <header>
        <div class = "topnav">           
            
                <a href = "index.php"><img src = "img/guitar2.png" alt = "logo" style="width: 18px;height: 18px;"></a> 
                <a href = "index.php">Buy Instruments</a>
                <a href = "#">Sell Instruments</a>
                <a href = "#">About Us</a>
                
                
            
            
            
                <?php
                    if (isset($_SESSION['userId'])){
                        echo'<div class="logout-container">
                        <form action="includes/logout.inc.php" method = "POST">
                        <button type="submit" name="logout-submit">Log Out</button>
                        </form>
                        </div>';
                    }
                     else{
                    echo '<a href="signup.php">Sign Up</a>';
                    echo '<div class="login-container">
                    <form action="includes/login.inc.php" method = "POST">
                    <input type="text" name="mailuid" placeholder="Username/email...">
                    <input type="password" name="pwd" placeholder="Password">
                    <button type="submit" name="login-submit">Login</button>
                    </form>
                    </div>';} ?> 
            

        </div>
        
    </header>

</body>
</html>