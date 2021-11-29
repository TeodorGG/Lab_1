

<?php
if(isset($_POST))
{
    $l = $_POST['login'];
    $p = $_POST['pasw'];
    
  
    if($l != null || $p !=null){
        if(strlen($l) > 5){
        
            if(strlen($p) > 6){
                
                
                $succes_message = "
                                        <p id = 'text_succes_login'>
                                            Logare cu succes
                                        </p>
                                        <script>setTimeout(() => { window.location.replace('./auth.php') }, 2000);</script>
                                        ";
                                    
                
    
            } else {
                $pasw_error = "<span  class = 'span_error' >Parola e prea scurta</span>";
            }
        } else {
            $email_error = "<span  class = 'span_error' >Loginul e prea scurt</span>";
    
        }
    }
   
}
else
{
   
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>Pacală și Boierul</title>
        <link rel="stylesheet" href = "css/sign.css"/>
    </head>
    

    <body>
        <div class = "welcome">

            <div id = "succes_login">
                <p id = "text_succes_login">
                    Vați logat cu succes!
                </p> 
            </div>
            <form method="POST" >
                <div class = "form">
                    <?php  echo $succes_message  ?>

                    <?php  echo $email_error  ?>
                    <?php echo '<input class = "input" name = "login"  placeholder = "login"  minlength = "5"    id = "login_input" value = "'.$_POST['login'].'" required/>'?>
                    <?php  echo $pasw_error  ?>
                    <?php echo '<input class = "input" name = "pasw"  placeholder = "password"  minlength = "6"  id = "pasw_input" type="password"  required/>'?>

                    <!-- <input class = "input" placeholder = "login"    id = "login_input" />
                    <input class = "input" placeholder = "password" id = "pasw_input" type="password"/> -->
                    <input type="submit" class = "login_bt" />
                </div>
            </form>

            
        </div>
    </body>

    <script type="text/javascript" src="./js/login.js"></script>
</html>