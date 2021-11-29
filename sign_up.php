<?php
    
    if(isset($_POST))
    {
        $l = $_POST['login'];
        $e = $_POST['email'];
        $p = $_POST['pas'];
        $r = $_POST['rep_pas'];

        if($l != null || $e != null || $p != null || $r != null){
            if(strlen($l) > 5){
           
                if (filter_var($e, FILTER_VALIDATE_EMAIL)) {
                    
                    if(strlen($p) > 6){

                        if($p == $r){
                            $succes_message = "
                            <p id = 'text_succes_login'>
                                Înregistrare cu succes
                            </p>
                            <script>setTimeout(() => { window.location.replace('./auth.php') }, 2000);</script>
        
                        ";
                        } else {
                            $repeat_pas_erro = "<span  class = 'span_error' >Parolele nu sunt egale</span>";

                        }
                    } else {
                        $pas_error = "<span  class = 'span_error' >Parola e prea scurtă</span>";

                    }
                    
                   
                } else {
                    $email_error = "<span  class = 'span_error' >Email-ul nu este valid</span>";
                }
            
            } else {
                $login_error = "<span  class = 'span_error' >Loginul e prea scurt</span>";
    
            }
        }
    
        
       
     
    }
       
    
?>
    
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>Păcală și boierul</title>
        <link rel="stylesheet" href = "css/sign.css"/>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

    </head>
    

    <body>
        <div class = "welcome">
            <form method="POST" >
                <div class = "form">
                <?php echo $succes_message  ?>

                    <!-- <span class = "span_error" id = "s_i_1"></span> -->
                    <?php  echo $login_error  ?>
                    <?php echo '<input class = "input" placeholder = "Login" name = "login" type = "text"  id = "email_input" value = "'.$_POST['login'].'" minlength = "5"  required/>'?>

                    <!-- <input class = "input" placeholder = "Login" id = "login_input" minlength="6"/> -->
                    <!-- <span class = "span_error" id = "s_i_2"></span>
                    <input class = "input" placeholder = "Email" id = "email_input" type="email"/> -->

                    <?php  echo $email_error  ?>
                    <?php echo '<input class = "input" placeholder = "Email" name = "email" type = "email"  id = "email_input" value = "'.$_POST['email'].'" minlength = "5"  required/>'?>


                    <!-- <span class = "span_error" id = "s_i_3"></span>
                    <input class = "input" placeholder = "Parolă" type="password" id = "pasw_input" minlength="6"/> -->
                    <?php  echo $pas_error  ?>
                    <?php echo '<input class = "input" placeholder = "Parolă" name = "pas" type = "password"  id = "email_input"  minlength = "6"  required/>'?>

                    <!-- <span class = "span_error" id = "s_i_4"></span>
                    <input class = "input" placeholder = "Repetă parola" type="password" id = "pasw_2_input" minlength="6"/> -->

                    <?php  echo $repeat_pas_erro  ?>
                    <?php echo '<input class = "input" placeholder = "Repetă parola" name = "rep_pas" type = "password"  id = "email_input"  minlength = "6"  required/>'?>


                    <input type="submit" class = "login_bt" />

                </div>
            </form>
        </div>
    </body>

    <script type="text/javascript" src="./js/register.js"></script>

</html>


