
function register(){
    var login = document.getElementById("login_input").value.trim();
    var email = document.getElementById("email_input").value.trim();
    var pasw = document.getElementById("pasw_input").value.trim();
    var pasw_2 = document.getElementById("pasw_2_input").value.trim();
    var span_1 = document.getElementById("s_i_1").innerHTML = "";
    var span_1 = document.getElementById("s_i_2").innerHTML = "";
    var span_1 = document.getElementById("s_i_3").innerHTML = "";
    var span_1 = document.getElementById("s_i_4").innerHTML = "";

    var c = false;

    if(login.length < 8){
        c = true;
        span_1.innerHTML = "Loginul e prea scurt"
    }

    if(!validateEmail(email)){
        c = true;
        span_2.innerHTML = "Email-ul nu este valid"
    }

    if(pasw !== pasw_2){
        c = true;
        span_4.innerHTML = "Parolele nu sunt egale"
    }

    if(c)
        return;

    const formData = new FormData();
    formData.append('login', login)
    formData.append('email', email)
    formData.append('pasw', pasw)

    
    
    // fetch('http://localhost:8888/Lab_3/php/register.php', {
    //     method: 'POST',
    //     headers: {
    //         'Content-Type': 'multipart/form-data'
    //     },
    //     body: formData
    // })
    // .then((response) => response.json())
    // .then((json) => {

    //     if(json.error_code === 0){

    //     }
    // })
    // .catch((error) => {
    //   console.error(error);
    // });


   
}


function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

