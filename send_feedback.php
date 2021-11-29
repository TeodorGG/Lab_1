
<?php
    
    if(isset($_POST))
    {
        $e = $_POST['email'];
        $t = $_POST['text'];
        
        if($e != null || $t != null){
            if(strlen($t) > 40){
           
                if (filter_var($e, FILTER_VALIDATE_EMAIL)) {
                    $succes_message = "
                    <p id = 'text_succes_login'>
                        Feedback-ul a fost trimis
                    </p>
                    <script>setTimeout(() => { window.location.replace('./auth.php') }, 2000);</script>

                ";

                    

                    
                } else {
                    $email_error = "<span  class = 'span_error' >Email-ul nu este valid</span>";
                }
            
            } else {
                $email_error = "<span  class = 'span_error' >Text trebuie sa fie minim 40 de caractere</span>";
    
            }
        }
    
        
       
     
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

            
            <form method="POST" >
                <div class = "form">
                    <?php echo $succes_message  ?>
                    <?php  echo $email_error  ?>
                    <?php echo '<input class = "input" placeholder = "Email" name = "email" type = "email"   id = "email_input" value = "'.$_POST['email'].'" required/>'?>
                    <?php  echo $text_error  ?>
                    <?php echo '<textarea class = "input big_input" placeholder = "Mesaj" name="text" id="text_input" value = '.$_POST['text'].' rows="4" minlength = "40"  maxlength = "999" required></textarea>'?>
                    <input type="submit" class = "login_bt" />
                </div>
            </form>
        </div>
    </body>

    <script type="text/javascript" src="./js/feedback.js"></script>

</html>




