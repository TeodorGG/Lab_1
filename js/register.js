
async function register(){
    var login = document.getElementById("login_input").value.trim();
    var email = document.getElementById("email_input").value.trim();
    var pasw = document.getElementById("pasw_input").value.trim();
    var pasw_2 = document.getElementById("pasw_2_input").value.trim();

    document.getElementById("s_i_1").innerHTML = "";
    document.getElementById("s_i_2").innerHTML = "";
    document.getElementById("s_i_3").innerHTML = "";
    document.getElementById("s_i_4").innerHTML = "";

    var c = false;

    if(login.length < 5){
        c = true;
        document.getElementById("s_i_1").innerHTML = "Loginul e prea scurt";
    }

    if(!validateEmail(email)){
        c = true;
        document.getElementById("s_i_2").innerHTML = "Email-ul nu este valid";

    }

    if(pasw.length < 6){
        c = true;
        document.getElementById("s_i_3").innerHTML = "Parola este prea scurtă";

    }

    if(pasw !== pasw_2){
        c = true;
        document.getElementById("s_i_4").innerHTML = "Parolele nu sunt egale"

    }

    if(c){
        return;
    }


    var body_data = {
        login: login,
        email: email,
        pasw: pasw

    }

    $.ajax({
        type : 'POST',
        url : 'http://localhost:8888/Lab_3/php/register.php',
        data : body_data,
        dataType : 'text',
        success : function(data) {
            var json = JSON.parse(data);
            if(json.error_code === 0){
                document.getElementById("_succes").innerHTML= "<p id = 'text_succes_login'> Înregistrare cu succes</p>";

                document.getElementById("login_input").value = "";
                document.getElementById("email_input").value = "";
                document.getElementById("pasw_input").value = "";
                document.getElementById("pasw_2_input").value = "";

                setTimeout(function(){
                    window.location.replace('./sign_in.html');
                }, 1000);
            } else if (json.error_code === 1){
                
            } else if(json.error_code === 2){
                document.getElementById("s_i_1").innerHTML = "Loginul e prea scurt";
            } else if(json.error_code === 3){
                document.getElementById("s_i_3").innerHTML = "Parola este prea scurtă";
            } else if(json.error_code === 4){
                document.getElementById("s_i_2").innerHTML = "Email-ul nu este valid";
            } else if(json.error_code === 10){
                document.getElementById("s_i_1").innerHTML = "Loginul este utilizat deja de alt utilizator";
            } else if(json.error_code === 11){
                document.getElementById("s_i_2").innerHTML = "Email-ul este utilizat deja de alt utilizator";
            }
        
        }
    });
}




function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

