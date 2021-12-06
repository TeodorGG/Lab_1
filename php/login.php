<?php
    // $login = $_POST["login"];
    // // $email = $_POST["email"];
    // // $pasw = $_POST["pasw"];
    // // $res = $login + " | " + $email + " | " + $pasw;
    // echo "ASDASD" + $login;
    
    if(isset($_POST))
{
    $l = $_POST['login'];
    $p = $_POST['pasw'];
    
    $conn = mysqli_connect("localhost","root","root","kidan");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        $res->error_code = 1;
        $res = json_encode($res);

        echo $res;
        return;
    }

    if(strlen($l) < 5){
        $res->error_code = 2;
        $res->text = $l;

        $res = json_encode($res);

        echo $res;
        return;
    }

    if(strlen($p) < 6){
        $res->error_code = 3;
        $res = json_encode($res);

        echo $res;
        return;

    }


    $sql_emails = "SELECT * FROM users WHERE pasw = '".$p."' AND login = '".$l."' ";
    if(mysqli_num_rows(mysqli_query($conn, $sql_emails)) == 1){
        $sql_ypdate_date = "UPDATE `users` SET `last_login_date` = NOW() WHERE pasw = '".$p."' AND login = '".$l."' ";
        mysqli_query($conn, $sql_ypdate_date);
        $res->error_code = 0;
       
    } else {
        $res->error_code = 9;

    }

    $res = json_encode($res);

    echo $res;
   
}
else
{
    $res->error_code = 7;
    
    $res = json_encode($res);

    echo $res;
}
?>