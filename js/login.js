
async function login(){
    var login = document.getElementById("login_input").value;
    var pasw = document.getElementById("pasw_input").value;
   

    document.getElementById("s_i_1").innerHTML = "";
    document.getElementById("s_i_2").innerHTML = "";
   

    var c = false;

    if(login.length < 5){
        c = true;
        document.getElementById("s_i_1").innerHTML = "Loginul e prea scurt";
    }

    if(pasw.length < 6){
        c = true;
        document.getElementById("s_i_2").innerHTML = "Parola este prea scurtă";

    }

    if(c){
        return;
    }

    var body_data = {
        login: login,
        pasw: pasw
    }

    $.ajax({
        type : 'POST',
        url : 'http://localhost:8888/Lab_3/php/login.php',
        data : body_data,
        dataType : 'text',
        success : function(data) {
            
            var json = JSON.parse(data);
            if(json.error_code === 0){
            
                document.getElementById("_succes").innerHTML= "<p id = 'text_succes_login'> Feedback trimis cu succes</p>";

                setTimeout(function(){
                    document.getElementById("login_input").value = "";
                    document.getElementById("pasw_input").value = "";
                    window.location.replace('./auth.html');
                }, 2000)

            } else if (json.error_code === 1){
                
            } else if(json.error_code === 2){
                document.getElementById("s_i_1").innerHTML = "Loginul e prea scurt";
            } else if(json.error_code === 3){
                document.getElementById("s_i_2").innerHTML = "Parola este prea scurtă";
            } else if(json.error_code === 9){
                document.getElementById("s_i_1").innerHTML = "Loginul sau parola greșită";
            }  
        }
    });

    // const data = new FormData();
    // data.append("login", login)
    // data.append('pasw', pasw)
    
    // var request = new XMLHttpRequest();

    //     request.onreadystatechange = async (e) => {
    //         if (request.readyState !== 4) {
    //             return;
    //         } 
        

    //         if (request.status === 200) {
    //             //alert('tes ' + request.responseText)
    //             try {
    //                 var json = JSON.parse(request.responseText);
    //                 if(json.error_code === 0){
                       
    //                     document.getElementById("succes_login").style.display = "block";

    //                     setTimeout(function(){
    //                         document.getElementById("login_input").value = "";
    //                         document.getElementById("pasw_input").value = "";
    //                         window.open('./auth.html');
    //                     }, 2000)

    //                 } else if (json.error_code === 1){
                        
    //                 } else if(json.error_code === 2){
    //                     document.getElementById("s_i_1").innerHTML = "Loginul e prea scurt";
    //                 } else if(json.error_code === 3){
    //                     document.getElementById("s_i_3").innerHTML = "Parola este prea scurtă";
    //                 } else if(json.error_code === 9){
    //                     document.getElementById("s_i_1").innerHTML = "Loginul sau parola greșită";
    //                 } 
                
                
                    
    //             } catch (e) {

    //             }

    //         } else {
    //         }
    //     };

    //     request.open('POST', 'http://localhost:8888/Lab_3/php/login.php');
    //     request.send(data);

}



