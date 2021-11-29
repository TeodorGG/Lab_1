
<?php
if(isset($_POST))
{         
    $message = $_POST['message'];                       
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

        <title>Păcală și boierul</title>
        <link rel="stylesheet" href = "css/auth.css"/>
    </head>
    

    <body>
        <div class = "welcome">
            <span class = "title">Păcală și boierul</span>
            <?php echo $message  ?>
            <div class = "login_div">
                <a id = "sign" href = "./sign_in.php">SignIn</a>
                <a id = "sign" href = "./sign_up.php">SignUp</a>
                <a id = "sign" href = "./send_feedback.php">Feedback</a>
            </div>
        </div>
    </body>
</html>


