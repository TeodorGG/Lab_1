<?php
    // $login = $_POST["login"];
    // // $email = $_POST["email"];
    // // $pasw = $_POST["pasw"];
    // // $res = $login + " | " + $email + " | " + $pasw;
    // echo "ASDASD" + $login;
    
    if(isset($_POST))
{
    $l = $_POST['login'];
    $e = $_POST['email'];
    $p = $_POST['pasw'];

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

    if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
        $res->error_code = 4;
        $res = json_encode($res);

        echo $res;
        return;
    }

        
    $conn = mysqli_connect("localhost","root","root","kidan");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        $res->error_code = 1;
        $res = json_encode($res);

        echo $res;
        return;
    }


    $sql_logins = "SELECT * FROM users WHERE login = '".$l."'";
    if(mysqli_num_rows(mysqli_query($conn, $sql_logins)) != 0){
        $res->error_code = 10;
        $res = json_encode($res);

        echo $res;
        return;
    }


    $sql_emails = "SELECT * FROM users WHERE email = '".$e."'";
    if(mysqli_num_rows(mysqli_query($conn, $sql_emails)) != 0){
        $res->error_code = 11;
        $res = json_encode($res);

        echo $res;
        return;
    }


    $sql = "INSERT INTO `users`(`login`, `email`, `pasw`) VALUES ('".$l."', '".$e."', '".$p."')";

  
   
    $rs = mysqli_query($conn, $sql);


    if(!$rs)
    {
        $res->error_code = mysqli_error();
    }
    else
    {
        $res->error_code = 0;
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