<?php
    require "header.php";
?>

    <main>
        <div class="signupform" >
            <img src="img/guitar2.png" style="width:100px; height:100px;">
            <h1>Sign Up</h1>
            <?php
            
                if(isset($_GET['error'])){
                    if($_GET['error'] == "emptyfields"){
                        echo '<p>Fill up all the fields!</p>';
                    }
                    else if($_GET['error'] == "invalidemailuid"){
                        echo '<p>Invalid email and username!</p>';
                    }
                    else if($_GET['error'] == "invalidemail"){
                        echo '<p>Invalid email!</p>';
                    }
                    else if($_GET['error'] == "invaliduid"){
                        echo '<p>Invalid username!</p>';
                    }
                    else if($_GET['error'] == "pwderror"){
                        echo '<p>Passwords do not match!</p>';
                    }
                    else if($_GET['error'] == "uidtaken"){ 
                        echo '<p>Username is taken!</p>';
                    }
                } 
                
                else if($_GET['signup']=="success"){
                    echo '<div = "success">Sign up successful! Login to proceed.</div>';
                }
            ?>
            <form class = "signup" action="includes/signup.inc.php" method="POST">

                
                
                <input type="text" name="email" placeholder="Email">
                
                <input type="text" name="uid" placeholder="Username">
                
                <input type="password" name="pwd" placeholder="Password">
                
                <input type="password" name="pwd-repeat" placeholder="Repeat Password">
                
                <button type="submit" name="signup-submit">Sign up</button>
            </form>
        </div>    
    </main>

<?php
    require "footer.php";
?>