
async function sendFeedback(){
    var email = document.getElementById("email_input").value.trim();
    var text = document.getElementById("text_input").value.trim();
   
    document.getElementById("s_i_1").innerHTML = "";
    document.getElementById("s_i_2").innerHTML = "";
   

    var c = false;

    if(!validateEmail(email)){
        c = true;
        document.getElementById("s_i_1").innerHTML = "Email-ul nu este valid";
    }

    if(text.length < 40){
        c = true;
        document.getElementById("s_i_2").innerHTML = "Text estee prea scrut(min. 40 caractere)";
    }

    if(c){
        return;
    }


    const data = new FormData();
    data.append("email", email)
    data.append('text', text)

    
        $.post("http://localhost:8888/Lab_3/php/send_feedback.php",
        {
            email: email,
            text: text
        },
        function(data, status){
            var json = JSON.parse(data);
                if(json.error_code === 0){
                    
                    document.getElementById("_succes").innerHTML= "<p id = 'text_succes_login'> Feedback trimis cu succes</p><script>setTimeout(() => { window.location.replace('./auth.php') }, 2000);</script>";
                    
                    setTimeout(function(){
                        document.getElementById("email_input").value = "";
                        document.getElementById("text_input").value = "";
                        window.open('./auth.html');
                    }, 2000);

                } else if(json.error_code === 1){
                    document.getElementById("s_i_1").innerHTML = "Errore de conexiune";
                } else if(json.error_code === 2){
                    document.getElementById("s_i_1").innerHTML = "Email-ul nu e valid";
                } else if(json.error_code === 3){
                    document.getElementById("s_i_3").innerHTML = "Text de prea scrut(min. 40 caractere)";
                } 
        });
}

function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

